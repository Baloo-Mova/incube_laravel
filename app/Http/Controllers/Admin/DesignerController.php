<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Designer\CreateRequest;
//use App\Http\Requests\Designer\EditRequest;
use App\Http\Requests\Designer\UpdateRequest;
use App\Models\EconomicActivity;
use App\Models\Document;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
Use App\Models\ProposalForms;
use App\Notifications\RegisterSuccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class DesignerController extends Controller
{

    public function index()
    {
        $designerProjects = UserForm::withAll()->where([
           'form_type_id'=> TableType::Designer
        ])->orderBy('id', 'desc')->paginate(config('app.post_per_page20'));
        
            
        
        return view('admin.designer.index')->with([
            'designerProjects' => $designerProjects,
            
            
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();
        return view('admin.designer.create', compact('economicActivities'));
    }

    public function store(CreateRequest $request)
    {
        $model = new UserForm();
        $model->fill($request->all());
        $model->form_type_id = TableType::Project;
        $reg_email = $request->get('reg_email');
        $pass  = str_random(10);

        if(isset($reg_email) && !empty($reg_email)) {
            $user = User::firstOrNew([
                'email' => $reg_email,
            ]);

            $user->password = bcrypt($pass);
            $user->save();

            Mail::send('auth.emails.register', ['email' => $reg_email, 'password'=>$pass], function ($m) use ($user) {
                $m->from('incube.zp.ua@gmail.com', 'Incube');
                $m->to($user->email)->subject('Приветствуем');
            });
        }

        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;
        if ($request->hasFile('logo_file')) {
            $filename = uniqid('project', true) . '.' . $request->file('logo_file')->getClientOriginalExtension();
            $request->file('logo_file')->storeAs('documents', $filename);
            $model->logo = $filename;
        }
        $model->save();

        if (!Auth::check() && Auth::attempt(['email' => $reg_email, 'password' => $pass])) {
            return redirect(route('personal_area.index'));
        }
        if ($request->hasFile('project_files')) {
            foreach ($request->file('project_files') as $item) {
                $filename = uniqid('project', true) . '.' . $item->getClientOriginalExtension();
                $item->storeAs('documents', $filename);

                $doc = new Document();
                $doc->form_id = $model->id;
                $doc->name = $filename;
                $doc->save();
            }
        }

        return redirect(route('designer.index'));
    }

    public function edit(UserForm $designer)
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();
        return view('admin.designer.edit', compact('designer', 'economicActivities'));
    }

    public function update(UpdateRequest $request, UserForm $designer)
    {        
        $designer->fill($request->all());
        //$designer->status_id = Status::EDITED;
        if ($request->hasFile('logo_file')) {
            $filename = uniqid('project', true) . '.' . $request->file('logo_file')->getClientOriginalExtension();
            $request->file('logo_file')->storeAs('documents', $filename);
            Storage::disk('documents')->delete($designer->logo);
            $designer->logo = $filename;
        }

        if ($request->hasFile('project_files')) {
            $designer->clearDocuments();
            foreach ($request->file('project_files') as $item) {
                $filename = uniqid('project', true) . '.' . $item->getClientOriginalExtension();
                $item->storeAs('documents', $filename);
                $doc = new Document();
                $doc->form_id = $designer->id;
                $doc->name = $filename;
                $doc->save();
            }
        }
        
        $designer->save();

        return back()->with(['message' => 'Редагування завершено']);
    }

    public function show(UserForm $designer)
    {
        $files = [];

        if (!empty($designer->logo)) {
            $files[] = $designer->logo;
        }
        $documents = $designer->documents;
        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];
        foreach ($documents as $item) {
            $contentType = mime_content_type(storage_path('app/documents') . '//' . $item->name);
            if (in_array($contentType, $allowedMimeTypes)) {
                $files[] = $item->name;
            }
        }
        return view('admin.designer.show', compact('designer', 'files'));
    }
    
     public function delete(UserForm $designer)
    {
         $prForms = ProposalForms::where([
           'sender_table_id'=> $designer->id,])
            ->orWhere(['receiver_table_id' => $designer->id,  
        ])->orderBy('id', 'desc')->get();        

         foreach($prForms as $pr){
             $pr->delete();
         }         
        $designer->delete();
        return redirect(route('designer.index'));
    }
}

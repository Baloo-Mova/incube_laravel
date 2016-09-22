<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Designer\CreateRequest;
use App\Http\Requests\Designer\EditRequest;
use App\Http\Requests\Designer\UpdateRequest;
use App\Models\EconomicActivity;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
use App\Notifications\RegisterSuccess;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class DesignerController extends Controller
{

    public function index()
    {
        $designerProjects = UserForm::withAll()->where([
           'form_type_id'=> TableType::Project
        ])->orderBy('id', 'desc')->get();
        
            
        
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
        $model->save();

        if (!Auth::check() && Auth::attempt(['email' => $reg_email, 'password' => $pass])) {
            return redirect(route('personal_area.index'));
        }

        return redirect(route('designer.index'));
    }

    public function edit(EditRequest $request, UserForm $designer)
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();
        return view('admin.designer.edit', compact('designer', 'economicActivities'));
    }

    public function update(UpdateRequest $request, UserForm $designer)
    {        
        $designer->fill($request->all());
        //$designer->status_id = Status::EDITED;
        $designer->save();

        return back()->with(['message' => 'Редагування завершено']);
    }

    public function show(UserForm $designer)
    {
        return view('admin.designer.show', compact('designer'));
    }
    
     public function delete(UserForm $designer)
    {
        $designer->delete();

        return redirect(route('designer.index'));
    }
}

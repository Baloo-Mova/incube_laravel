<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Executor\CreateRequest;
use App\Http\Requests\Executor\EditRequest;
use App\Http\Requests\Executor\UpdateRequest;
use App\Models\Status;
use App\Notifications\RegisterSuccess;
use App\Models\TableType;
use App\Models\UserForm;
use App\Models\ProposalForms;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class ExecutorController extends Controller {
    public function __construct()
    {
        $this->middleware('checkOwner:executor',['except'=>['index','create','store']]);
    }

    public function index() {
        $executors = UserForm::withAll()->where([
            'status_id' => Status::PUBLISHED,
            'form_type_id'=> TableType::Executor
        ])->orderBy('id', 'desc')->take(10)->get();

        $designers = UserForm::withAll()->where([
            'status_id' => Status::PUBLISHED,
            'form_type_id'=> TableType::Designer
        ])->orderBy('id', 'desc')->take(10)->get();

        $problems = UserForm::withAll()->where([
            'status_id' => Status::PUBLISHED,
            'form_type_id' => TableType::Problem
        ])->orderBy('id', 'desc')->take(10)->get();


        return view('frontend.executor.index')->with([
                    'executors' => $executors,
                    'problems' => $problems,
                    'designers' => $designers,
        ]);
    }

    public function create() {
        return view('frontend.executor.create');
    }

    public function store(CreateRequest $request) {
     
        $model = new UserForm();
        $model->fill($request->all());
        $model->name = implode(" ",[$request->get("second_name"),$request->get("first_name"),$request->get("last_name")] );
        $model->form_type_id = TableType::Executor;
        $email = $request->get('email');
        $pass = str_random(10);

        if (isset($email) && !empty($email)) {
            $user = User::firstOrNew([
                        'email' => $email,
            ]);

            $user->password = bcrypt($pass);
            $user->save();

            $user->notify(new RegisterSuccess($pass));
        }

        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;

        if ($request->hasFile('logo_img_file')) {
            $filename = uniqid('executor', true) . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $request->file('logo_img_file')->storeAs('documents', $filename);
            $model->logo = $filename;
        }

        $model->save();

        if (!Auth::check()) {
            Auth::attempt(['email' => $email, 'password' => $pass]);
        }
        return redirect(route('personal_area.executor'));
    }

    public function edit(UserForm $executor) {

       return view('frontend.executor.edit', compact('executor'));
    }

    public function update(UpdateRequest $request, UserForm $executor) {

       $executor->fill($request->all());
       $executor->name = implode(" ",[$request->get("second_name"),$request->get("first_name"),$request->get("last_name")] );
       $executor->status_id = Status::EDITED;

        if ($request->hasFile('logo_img_file')) {
            $filename = uniqid('executor', true) . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $request->file('logo_img_file')->storeAs('documents', $filename);
            $executor->logo = $filename;
        }

       $executor->save();

        return back()->with(['message' => 'Заявка оновлена']);
    }

    public function show(UserForm $executor) {
        return view('frontend.executor.show', compact('executor'));
    }
    
     public function delete(UserForm $executor)
    {
          $prForms = ProposalForms::where([
           'sender_table_id'=> $executor->id,])
            ->orWhere(['receiver_table_id' => $executor->id,  
        ])->orderBy('id', 'desc')->get();        

         foreach($prForms as $pr){
             $pr->delete();
         }
        $executor->delete();

        return redirect(route('executor.index'));
    }
}

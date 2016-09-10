<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Executor\CreateRequest;
use App\Http\Requests\Executor\EditRequest;
use App\Http\Requests\Executor\UpdateRequest;
use App\Models\ExecutorForm;
use App\Models\ProjectForm;
use App\Models\Status;
use App\Notifications\RegisterSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class ExecutorController extends Controller {

    public function index() {
        $executorProjects = ExecutorForm::orderBy('id', 'desc')->where(['status_id' => Status::PUBLISHED])->take(10)->get();
        $projects = ProjectForm::where([
            'status_id' => Status::PUBLISHED,
        ])->orderBy('id', 'desc')->take(10)->get();
        return view('frontend.executor.index')->with([
                    'executorProjects' => $executorProjects,
                    'projects' => $projects,
        ]);
    }

    public function create() {
        return view('frontend.executor.create');
    }

    public function store(CreateRequest $request) {
     
        $model = new ExecutorForm();
        $model->fill($request->all());

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
        $model->save();

        if (!Auth::check()) {
            Auth::attempt(['email' => $email, 'password' => $pass]);
        }
        return redirect(route('personal_area.index'));
        //return redirect(route('executor.index'));
    }

    public function edit(EditRequest $request, ExecutorForm $executor) {
       
       return view('frontend.executor.edit', compact('executor'));
    }

    public function update(UpdateRequest $request, ExecutorForm $executor) {

       $executor->fill($request->all());
       $executor->status_id = Status::EDITED;
       $executor->save();

        return back()->with(['message' => 'Заявка оновлена']);
    }

    public function show(ExecutorForm $executor) {
        return view('frontend.executor.show', compact('executor'));
    }
    
     public function delete(ExecutorForm $executor)
    {
        $executor->delete();

        return redirect(route('executor.index'));
    }
}

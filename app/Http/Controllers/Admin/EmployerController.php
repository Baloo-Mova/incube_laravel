<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employer\CreateRequest;
use App\Http\Requests\Employer\EditRequest;
use App\Http\Requests\Employer\UpdateRequest;
use App\Models\EconomicActivity;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
use App\Notifications\RegisterSuccess;

use Illuminate\Support\Facades\Auth;
use App\User;

class EmployerController extends Controller
{

    public function index()
    {
        
        $employerProjects = UserForm::withAll()->where([
            'form_type_id'=> TableType::Employer
        ])->orderBy('id', 'desc')->get();

        return view('admin.employer.index')->with([
            
            'employerProjects' => $employerProjects,
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();
        return view('admin.employer.create', compact('economicActivities'));
    }

    public function store(CreateRequest $request)
    {
        $model = new UserForm();
        $model->fill($request->all());
        $model->form_type_id = TableType::Employer;
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

        return redirect(route('admin.employer.index'));
    }

    public function edit(EditRequest $request, UserForm $employer)
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();
        return view('admin.employer.edit', compact('employer', 'economicActivities'));
    }

    public function update(UpdateRequest $request, UserForm $employer)
    {
        $employer->fill($request->all());
        //$employer->status_id = Status::EDITED;
        $employer->save();

        return back()->with(['message' => 'Відредаговано']);
    }

    public function show(UserForm $employer)
    {
        return view('admin.employer.show', compact('employer'));
    }

    public function delete(UserForm $employer)
    {
        $employer->delete();

        return redirect(route('admin.employer.index'));
    }
}

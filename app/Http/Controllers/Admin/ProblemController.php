<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateRequest;
use App\Http\Requests\Customer\EditRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\EconomicActivity;
use App\Models\ProblemForm;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
use App\Notifications\RegisterSuccess;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;

//use Illuminate\Support\Facades\Mail;

class ProblemController extends Controller
{

    public function index()
    {
        $problems = UserForm::withAll()->where([
           'form_type_id' => TableType::Problem
        ])->orderBy('id', 'desc')->get();

        return view('admin.customer.index')->with([
            'problems' => $problems,
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();

        return view('admin.customer.create', compact('economicActivities'));
    }

    public function store(CreateRequest $request)
    {
        $model = new UserForm();
        $model->fill($request->all());
        $model->form_type_id = TableType::Problem;
        $email               = $request->get('email');
        $pass                = str_random(10);

        if (isset($email) && ! empty($email)) {
            $user           = User::firstOrNew([
                'email' => $email,
            ]);
            $user->password = bcrypt($pass);
            $user->save();

            $user->notify(new RegisterSuccess($pass));
        }
        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;

        if ($request->hasFile('logo_img_file')) {
            $filename = uniqid('problem', true) . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $request->file('logo_img_file')->storeAs('documents', $filename);
            $model->logo = $filename;
        }

        $model->save();

        if ( ! Auth::check()) {
            Auth::attempt(['email' => $email, 'password' => $pass]);
        }

        return redirect(route('problem.index'));
    }

    public function edit(EditRequest $request, UserForm $problem)
    {

        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();

        return view('admin.customer.edit', compact('problem', 'economicActivities'));
    }

    public function update(UpdateRequest $request, UserForm $problem)
    {

        $problem->fill($request->all());
        
        $problem->save();

        return back()->with(['message' => 'Відредаговано']);
    }

    public function show(UserForm $problem)
    {
        //dd($problem);
        return view('admin.customer.show', compact('problem'));
    }

    public function delete(UserForm $problem)
    {
        $problem->delete();

        return redirect(route('problem.index'));
    }

}

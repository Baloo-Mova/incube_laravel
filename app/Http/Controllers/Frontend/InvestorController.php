<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Investor\CreateRequest;
use App\Http\Requests\Investor\EditRequest;
use App\Http\Requests\Investor\UpdateRequest;
use App\Models\ProblemForm;
use App\Models\ProjectForm;
use App\Models\EconomicActivity;
use App\Models\InvestorForm;
use App\Models\Status;
use App\Notifications\RegisterSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\User;
use Illuminate\Support\Facades\Mail;

class InvestorController extends Controller
{

    public function index()
    {
        $investProjects = InvestorForm::orderBy('id', 'desc')->where(['status_id' => Status::PUBLISHED])->take(10)->get();

        $problems = ProblemForm::where([
            'status_id' => Status::PUBLISHED,
        ])->orderBy('id', 'desc')->take(10)->get();

        $projects = ProjectForm::where([
            'status_id' => Status::PUBLISHED,
        ])->orderBy('id', 'desc')->take(10)->get();

        return view('frontend.investor.index')->with([
            'investProjects' => $investProjects,
            'problems' => $problems,
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivity::where(['parent_id' => null])->get();
        return view('frontend.investor.create', compact('economicActivities'));
    }

    public function store(CreateRequest $request)
    {
        $model = new InvestorForm();
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
    }

    public function edit(EditRequest $request, InvestorForm $investor)
    {
        $economicActivities = EconomicActivity::where(['parent_id' => null])->get();
        return view('frontend.investor.edit', compact('investor', 'economicActivities'));
    }

    public function update(UpdateRequest $request, InvestorForm $investor)
    {

        $investor->fill($request->all());
        $investor->status_id = Status::EDITED;
        $investor->save();

        return back()->with(['message' => 'Відредаговано']);
    }

    public function show(InvestorForm $investor)
    {
        return view('frontend.investor.show', compact('investor'));
    }

    public function delete(InvestorForm $investor)
    {
        $investor->delete();

        return redirect(route('investor.index'));
    }
}

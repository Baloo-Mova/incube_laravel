<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateRequest;
use App\Http\Requests\Customer\EditRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\EconomicActivity;
use App\Models\ProblemForm;
use App\Models\Status;
use App\Notifications\RegisterSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class ProblemController extends Controller {

    public function index() {
        $problems = ProblemForm::orderBy('id', 'desc')->where(['status_id' => Status::PUBLISHED])->take(10)->get();
        return view('frontend.customer.index')->with([
                    'problems' => $problems,
        ]);
    }

    public function create() {
        $economicActivities = EconomicActivity::where(['parent_id' => null])->get();
        return view('frontend.customer.create', compact('economicActivities'));
    }

    public function store(CreateRequest $request) {

        $model = new ProblemForm();
        $model->fill($request->all());

        $email = $request->get('email');
        $pass = str_random(10);

        if (isset($email) && !empty($email)) {
            $user = User::firstOrNew([
                        'email' => $email,
            ]);

            $user->password = bcrypt($pass);
            $user->save();

            Mail::send('auth.emails.register', ['email' => $email, 'password' => $pass], function ($m) use ($user) {
                $m->from('incube.zp.ua@gmail.com', 'Incube');
                $m->to($user->email)->subject('Приветствуем');
            });
        }

        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;
        $model->save();

        if (!Auth::check()) {
            Auth::attempt(['email' => $email, 'password' => $pass]);
        }

        return redirect(route('customer.index'));
        //return redirect(route('personal_area.index'));
    }

    public function edit(EditRequest $request, ProblemForm $problem) {

        $economicActivities = EconomicActivity::where(['parent_id' => null])->get();

        return view('frontend.customer.edit', compact('customer', 'economicActivities'));
    }

    public function update(UpdateRequest $request, ProblemForm $problem) {


        $problem->fill($request->all());
        $problem->status_id = Status::EDITED;
        $problem->save();

        return back()->with(['message' => 'Відредаговано']);
    }

    public function show(ProblemForm $problem) {
        return view('frontend.customer.show', compact('problem'));
    }
    public function delete(ProblemForm $problem)
    {
        $problem->delete();

        return redirect(route('customer.index'));
    }

}

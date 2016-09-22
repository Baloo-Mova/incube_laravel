<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SaveFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Investor\CreateRequest;
use App\Http\Requests\Investor\EditRequest;
use App\Http\Requests\Investor\UpdateRequest;
use App\Models\EconomicActivity;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
use App\Notifications\RegisterSuccess;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Facades\Auth;
use App\User;

class InvestorController extends Controller
{

    public function index()
    {
        
        $projects = UserForm::withAll()->where([
           'form_type_id'=> TableType::Investor
        ])->orderBy('id', 'desc')->get();

        return view('admin.investor.index')->with([
           'projects' => $projects,
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();
        return view('admin.investor.create', compact('economicActivities'));
    }

    public function store(CreateRequest $request)
    {
        $model = new UserForm();
        $model->fill($request->all());
        $model->form_type_id = TableType::Investor;
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

        return redirect(route('admin.investor.index'));
    }

    public function edit(EditRequest $request, UserForm $investor)
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();
        return view('admin.investor.edit', compact('investor', 'economicActivities'));
    }

    public function update(UpdateRequest $request, UserForm $investor)
    {
        $investor->fill($request->all());
        //$investor->status_id = Status::EDITED;
        $investor->save();

        return back()->with(['message' => 'Відредаговано']);
    }

    public function show(UserForm $investor)
    {
        return view('admin.investor.show', compact('investor'));
    }

    public function delete(UserForm $investor)
    {
        $investor->delete();

        return redirect(route('admin.investor.index'));
    }
}

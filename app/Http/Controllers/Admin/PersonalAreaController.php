<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Requests\PersonalArea\CreateRequest;
use App\Http\Requests\PersonalArea\CreateRequest;
use App\Http\Requests\PersonalArea\EditRequest;
use App\Http\Requests\PersonalArea\UpdateRequest;
use App\Models\TableType;
use App\Models\UserForm;
use App\Notifications\Test;
use Illuminate\Http\Request;
use App\Models\ProblemForm;
use App\Models\InvestorForm;
use App\Models\ProjectForm;
use App\Models\ExecutorForm;
use App\Models\WorkForm;
use App\Models\Country;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalAreaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {


        $ListUsers = User::orderBy('id', 'desc')->get();

        return view('admin.users.index')->with([
                    'ListUsers' => $ListUsers,
        ]);
    }

    public function create() {
        $country = Country::orderBy('id', 'desc')->get();
        return view('admin.users.create', compact('country'));
    }

    public function store(CreateRequest $request) {


        $email = $request->get('email');
        $pass = $request->get('password');

        if (isset($email) && !empty($email)) {
          
            $user = User::firstOrNew([
                        'email' => $email,
            ]);
            $user-> fill($request->all());
            $user->password      =    bcrypt($pass);
            $user->name          =    $request->get('name');
            $user->adress        =    $request->get('adress');
            $user->phone_number  =    $request->get('phone_number');
            $user->web_site      =    $request->get('web_site');
            $user->contacts      =    $request->get('contacts');
            
            if ($request->hasFile('logo_img_file')) {
                $filename = uniqid('user', true) . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
                $request->file('logo_img_file')->storeAs('documents', $filename);
                $user->logo = $filename;
            }
            if ($request->hasFile('bg_img_file')) {
                $filename = uniqid('user', true) . '.' . $request->file('bg_img_file')->getClientOriginalExtension();
                $request->file('bg_img_file')->storeAs('documents', $filename);
                $user->bg_logo = $filename;
            }
            $user->save();
            //$user->notify(new RegisterSuccess($pass));
        }




        if (!Auth::check()) {
            Auth::attempt(['email' => $email, 'password' => $pass]);
        }

        return redirect(route('admin.users.index'));
    }

    public function edit(Request $request, User $user) {
       
        $country = Country::orderBy('id', 'desc')->get();

        return view('admin.users.edit', compact('user', 'country'));
    }

    public function update(UpdateRequest $request, User $user) {

        $user->fill($request->all());
        if ($request->hasFile('logo_img_file')) {
            $filename = uniqid('user', true) . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $request->file('logo_img_file')->storeAs('documents', $filename);
            Storage::disk('documents')->delete($user->logo);
            $user->logo = $filename;
        }
        if ($request->hasFile('bg_img_file')) {
            $filename = uniqid('user', true) . '.' . $request->file('bg_img_file')->getClientOriginalExtension();
            $request->file('bg_img_file')->storeAs('documents', $filename);
            Storage::disk('documents')->delete($user->bg_logo);
            $user->bg_logo = $filename;
        }
        $user->save();

        return back()->with(['message' => 'Відредаговано']);
    }

    public function show(User $user)
    {
        $files = [];

        if (!empty($user->logo)) {
            $files[] = $user->logo;
        }
        

        return view('admin.users.show', compact('user'));
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect(route('admin.users.index'));
    }

    
}

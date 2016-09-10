<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\ProblemForm;
use App\Models\InvestorForm;
use App\Models\ProjectForm;
use App\Models\ExecutorForm;
use App\Models\WorkForm;
use App\Models\Country;
use App\Models\EconomicActivities;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $thisUser = Auth::user();
        $usersCustomerProjects = ProblemForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        $usersInvestorProjects = InvestorForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        $usersDesignerProjects = ProjectForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        $usersExecutorProjects = ExecutorForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        $usersEmployerProjects = WorkForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        return view('frontend.personal_area.index')->with([
        'thisUser'              => $thisUser,
        'usersCustomerProjects' => $usersCustomerProjects, 
        'usersInvestorProjects' => $usersInvestorProjects,
        'usersDesignerProjects' => $usersDesignerProjects,
        'usersExecutorProjects' => $usersExecutorProjects,
        'usersEmployerProjects' => $usersEmployerProjects,
            
        ]);
    }
    
     public function edit(User $myUser)
    {
        $countries = Country::orderBy('id', 'desc')->get();

        return view('frontend.personal_area.edit', compact('myUser', 'countries'));
    }

    public function update(Request $request, User $myUser)
    {
        $this->validate($request, [
            //'name'     => 'required',
          //  'email' => 'required',
            
        ], [
          //  'name.required'     => "Поле ПІБ інвестування  обов'язкове для заповнення;",
          //  'email.required' => "Поле Пошта  обов'язкове для заповнення;",
            
        ]);

        $myUser->fill($request->all());
        if ($request->file('logo_img_file')) {
            $filename       = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image          = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/users/images/' . $filename));
            $myUser->logo = $filename;
        }
        if ($request->file('bg_img_file')) {
            $filename       = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image          = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/users/images/' . $filename));
            $myUser->logo = $filename;
        }

        $myUser->save();

        return back()->with(['message' => 'Редагування завершено']);
    }
    
}

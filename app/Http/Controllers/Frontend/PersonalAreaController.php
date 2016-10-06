<?php

namespace App\Http\Controllers\Frontend;

//use App\Http\Requests\PersonalArea\CreateRequest;
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
use App\Models\EconomicActivities;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $usersCustomerProjects = UserForm::orderBy('id', 'desc')->where(['author_id'=>$thisUser->id,'form_type_id'=>TableType::Problem])->paginate(5);
        $usersInvestorProjects = UserForm::orderBy('id', 'desc')->where(['author_id'=>$thisUser->id,'form_type_id'=>TableType::Investor])->paginate(5);
        $usersDesignerProjects = UserForm::orderBy('id', 'desc')->where(['author_id'=>$thisUser->id,'form_type_id'=>TableType::Designer])->paginate(5);
        $usersExecutorProjects = UserForm::orderBy('id', 'desc')->where(['author_id'=>$thisUser->id,'form_type_id'=>TableType::Executor])->paginate(5);
        $usersEmployerProjects = UserForm::orderBy('id', 'desc')->where(['author_id'=>$thisUser->id,'form_type_id'=>TableType::Employer])->paginate(5);

        $usersNotifications = $thisUser->notifications()->orderBy('created_at', 'desc')->paginate(10);

        return view('frontend.personal_area.index')->with([
        'thisUser'              => $thisUser,
        'usersCustomerProjects' => $usersCustomerProjects, 
        'usersInvestorProjects' => $usersInvestorProjects,
        'usersDesignerProjects' => $usersDesignerProjects,
        'usersExecutorProjects' => $usersExecutorProjects,
        'usersEmployerProjects' => $usersEmployerProjects,
        'usersNotifications'    => $usersNotifications,
        ]);
    }

    public function customer()
    {
        $thisUser = Auth::user();
        $usersCustomerProjects = UserForm::orderBy('id', 'desc')->where(['author_id'=>$thisUser->id,'form_type_id'=>TableType::Problem])->paginate(5);
        return view('frontend.personal_area.customer')->with([
            'thisUser'              => $thisUser,
            'usersCustomerProjects' => $usersCustomerProjects,
        ]);
    }

    public function investor()
    {
        $thisUser = Auth::user();
        $usersInvestorProjects = UserForm::orderBy('id', 'desc')->where(['author_id'=>$thisUser->id,'form_type_id'=>TableType::Investor])->paginate(5);
        return view('frontend.personal_area.investor')->with([
            'thisUser'              => $thisUser,
            'usersInvestorProjects' => $usersInvestorProjects,
        ]);
    }

    public function designer()
    {
        $thisUser = Auth::user();
        $usersDesignerProjects = UserForm::orderBy('id', 'desc')->where(['author_id'=>$thisUser->id,'form_type_id'=>TableType::Designer])->paginate(5);
        return view('frontend.personal_area.designer')->with([
            'thisUser'              => $thisUser,
            'usersDesignerProjects' => $usersDesignerProjects,
        ]);
    }

    public function executor()
    {
        $thisUser = Auth::user();
        $usersExecutorProjects = UserForm::orderBy('id', 'desc')->where(['author_id'=>$thisUser->id,'form_type_id'=>TableType::Executor])->paginate(5);
        return view('frontend.personal_area.executor')->with([
            'thisUser'              => $thisUser,
            'usersExecutorProjects' => $usersExecutorProjects,
        ]);
    }

    public function event()
    {
        $thisUser = Auth::user();
        $usersNotifications = $thisUser->notifications()->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.personal_area.event')->with([
            'thisUser'              => $thisUser,
            'usersNotifications' => $usersNotifications,
        ]);
    }
    
     public function edit()
    {
         $myUser=Auth::user();
         
        $country = Country::orderBy('id', 'desc')->get();

        return view('frontend.personal_area.edit', compact('myUser', 'country'));
    }

    public function update(Request $request)
    {
       
        $myUser=Auth::user();

        $myUser->fill($request->all());
       if ($request->hasFile('logo_img_file')) {
            $filename = uniqid('user', true) . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $request->file('logo_img_file')->storeAs('documents', $filename);
            Storage::disk('documents')->delete($myUser->logo);
            $myUser->logo = $filename;
        }
        if ($request->hasFile('bg_img_file')) {
            $filename = uniqid('user', true) . '.' . $request->file('bg_img_file')->getClientOriginalExtension();
            $request->file('bg_img_file')->storeAs('documents', $filename);
            Storage::disk('documents')->delete($myUser->bg_logo);
            $myUser->bg_logo = $filename;
        }
        $myUser->save();

        return back()->with(['message' => 'Редагування завершено']);
    }
     public function security(){
         
      return view('frontend.personal_area.security');
     }
}

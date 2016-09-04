<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Executor;
use App\Models\Investor;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $thisUserId = Auth::id();
        $usersExecutorProjects = Executor::orderBy('id', 'desc')->where('author_id',$thisUserId)->get();
        return view('frontend.personal_area.index')->with([
            'usersExecutorProjects' => $usersExecutorProjects,
        ]);
    }
}

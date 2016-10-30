<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\RegisterSuccess;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function __construct()
    {
       // dd($this);
       // $this->middleware('checkadmin');
    }
    public function index()
    {
        return view('admin.site.index');
    }
}
   
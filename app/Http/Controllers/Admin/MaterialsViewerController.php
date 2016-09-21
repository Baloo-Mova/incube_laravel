<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MaterialsViewerController extends Controller
{
    public function index(){
        return "View Materials";
    }

    public function search(){
        return "Search";
    }
}

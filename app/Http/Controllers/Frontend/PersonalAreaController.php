<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalAreaController extends Controller
{
    public function index(){
        return "ВЫ В ЛИЧНОМ КАБИНЕТЕ !!!!";
    }
}

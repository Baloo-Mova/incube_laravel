<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainApiController extends Controller
{
    public function getCities($id){
        return City::where('country_id','=',$id)->get()->pluck('name','id');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class JsonController extends Controller
{
    public function index($model){
        $model = 'App\\Models\\'.$model;
        $data = $model::orderBy('id', 'desc')->take(10)->get();
        return $data;
    }
}

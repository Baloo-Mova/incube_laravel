<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;
use Intervention\Image\Facades\Image;

class ImagesShowController extends Controller
{
    public function index($name, $id,$height,$width)
    {
        if ( ! File::exists(storage_path("app/$name/images/$id"))) {
            abort(404);
        }
        $img = Image::make(storage_path("app/$name/images/$id"))->resize($width, $height);

        return $img->response('jpg');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;
use Intervention\Image\Facades\Image;

class ImagesShowController extends Controller
{
    public function index($id, $height, $width)
    {// ТУТ гавнокод но мне лень его исправлять, я хочу покататся а велосипеде(

        if ( ! File::exists(storage_path("app/documents/$id"))) {
            $imgNumber = random_int(1, 9);
            $image     = Image::make(asset('img/default_placeholders/' . $imgNumber . '.jpg'));
            if ($width == 'max') {
                $width = $image->width();
            }
            if ($height == 'max') {
                $height = $image->height();
            }

            return $image->resize($width, $height)->response('jpg');
        }

        $img = Image::make(storage_path("app/documents/$id"));
        if ($width == 'max') {
            $width = $img->width();
        }
        if ($height == 'max') {
            $height = $img->height();
        }

        return $img->resize($width, $height)->response('jpg');
    }
}

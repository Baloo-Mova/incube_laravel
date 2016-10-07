<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ActivityRelationship;
use App\Models\UserForm;
use App\Notifications\NewOffer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainApiController extends Controller
{
    public function getCities($id)
    {
        return City::where('country_id', '=', $id)->get()->pluck('name', 'id');
    }

    public function createOffer(Request $request)
    {

        $data = $request->all();
        $form = UserForm::find($data['receiver_id']);

        $offer = UserForm::find($data['sender_id']);

        if(!isset($offer)){
            return [
                'NO GOOOD PLS NOOOOOO'
            ];
        }

        if ($form->offers->contains($data['sender_id'])) {
            return [
                'status' => 'danger',
                'text' => 'Вы уже делали такое предложение'
            ];
        }

        $form->offers()->syncWithoutDetaching([$data['sender_id']]);
        $form->author->notify(new NewOffer($form, $offer));

        return [
            'status'=>'success',
            'text' => 'Вы успешно сделали предложение, ожидайте, с вами свяжутся.'
        ];
    }
}

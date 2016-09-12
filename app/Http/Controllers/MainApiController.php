<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ActivityRelationship;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainApiController extends Controller
{
    public function getCities($id){
        return City::where('country_id','=',$id)->get()->pluck('name','id');
    }

    public function createOffer(Request $request) {
        $requestArray = $request->all();
        $sender_id = $requestArray['sender_id'];
        $sender_type = $requestArray['sender_type'];
        $receiver_id = $requestArray['receiver_id'];
        $receiver_type = $requestArray['receiver_type'];

        $offer = ActivityRelationship::where([
            'sender_table_id' => $sender_id,
            'sender_table_type' => $sender_type,
            'receiver_table_id' => $receiver_id,
            'receiver_table_type_id' => $receiver_type
        ])->get();

        if(!$offer->isEmpty()) {
            return "You can't create this offer";
        } else {
            $offer = new ActivityRelationship();
            $offer->sender_table_id = $sender_id;
            $offer->sender_table_type = $sender_type;
            $offer->receiver_table_id = $receiver_id;
            $offer->receiver_table_type_id = $receiver_type;
            $offer->save();
            return "Offer created successfully";
        }
    }
}

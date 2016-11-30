<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ActivityRelationship;
use App\Models\UserForm;
use App\Models\TableType;
use App\Notifications\NewOffer;
use App\Models\ProposalForms;
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
                ''
            ];
        }

        if ($form->offers->contains($data['sender_id'])) {
            return [
                'status' => 'danger',
                'text' => 'Ви вже робили цю пропозицію'
            ];
        }

        $form->offers()->syncWithoutDetaching([$data['sender_id']]);
        $form->author->notify(new NewOffer($form, $offer));

        return [
            'status'=>'success',
            'text' => "Ви успішно зробили пропозицію."
        ];
    }

    public function getData(Request $request)
    {
        $cat_id = $request->get('cat_id');
        $tableType = $request->get('table_types');
        $skval = $request->get('number');
        $materials = UserForm::query()->published();
        if(empty($skval)) {
            $skip_val = 0;
        }else{
            $skip_val = $skval * config('posts.project_viewer_number');
        }
        if($tableType != "All") {
            $tableTypes = TableType::where('name', $tableType)->first();
            $materials = $materials->where(['form_type_id' => $tableTypes->id]);
        }
        if(isset($cat_id)) {
            $materials = $materials->withEconomicActivities($cat_id);
        }

        $materials = $materials->orderBy('id','desc')->skip($skip_val)->take(config('posts.project_viewer_number'))->get();

        return [
            'materials' => $materials,
        ];
    }
    public function deleteOffer(UserForm $send, UserForm $rec){
       // dd($rec);
        
       // dd($send);
       // sender_table_id',
       // 'receiver_table_id',
       
        if(\Illuminate\Support\Facades\Auth::check() &&  ((\Illuminate\Support\Facades\Auth::user()->can('edit', $send) ||  \Illuminate\Support\Facades\Auth::user()->can('edit', $rec))|| \Illuminate\Support\Facades\Auth::user()->user_type_id==1) ){
        $prForms = ProposalForms::where([
           'sender_table_id'=> $send->id, 'receiver_table_id' => $rec->id])
              
        ->orderBy('id', 'desc')->delete(); 
        //$prForms->delete();
        //dd($prForms);
        }
//
//         foreach($prForms as $pr){
//             $pr->delete();
//         }
//        
        return redirect()->back();
    }
}

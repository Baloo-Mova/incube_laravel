<?php

namespace App\Http\Controllers\Frontend;

use App\Models\EconomicActivities;
use App\Models\Investor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class InvestorController extends Controller
{
    public function index(){
        $investProjects = Investor::orderBy('id','desc')->take(10)->get();
        return view('frontend.investor.index')->with([
            'investProjects' => $investProjects,
        ]);
    }
    public function create(){
        $economicActivities = EconomicActivities::pluck('name', 'id');
        return view('frontend.investor.create',compact('economicActivities'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'investor_name' => 'required',
            'investor_contacts'=>'required',
            'investor_cost' => 'numeric',
        ],[
            'investor_name.required' => 'Поле инвестора обязательно к заполнению;',
            'investor_contacts.required' => 'Поле контактов инвестора обязательно к заполнению;',
            'investor_cost.numeric' => 'Поле суммы инвестиций должно быть числом;',
        ]);

        $model = new Investor();
        $model->fill($request->all());
        if($request->file('logo_img_file')){
            $filename = uniqid().'.'.$request->file('logo_img_file')->getClientOriginalExtension();
            $image = Image::make($request->file('logo_img_file'))->resize(250, 300)->save(storage_path('app/investor/images/'.$filename));
            $model->logo = $filename;
        }
        $model->author_id = Auth::check() ? Auth::user()->id : 0;
        $model->save();

        return redirect(route('personal_area.index'));

    }
    public function edit($id){
//        $investor = Investor::findOrFail($id);

    }
    public function update($id){

    }

    public function show($id){
        $model = Investor::findOrFail($id);
        return view('frontend.investor.show', compact('model'));
    }
}

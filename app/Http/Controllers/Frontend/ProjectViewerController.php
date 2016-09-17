<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EconomicActivity;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
use App\Notifications\RegisterSuccess;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProjectViewerController extends Controller {

    public function index() {
        $allMaterials = UserForm::withAll()->where([
                    'status_id' => Status::PUBLISHED,
                ])->orderBy('id', 'desc')->get();

        return view('frontend.project_viewer.index')->with([
                    'allMaterials' => $allMaterials,
        ]);
    }

    public function show(UserForm $material) {

        return redirect(route($material->formType->name.'.show',[$material->id]));
    }

}

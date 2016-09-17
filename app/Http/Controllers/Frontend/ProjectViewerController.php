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
        
        switch ($material->form_type_id) {
            case 1: return redirect(route('investor.show', [$material->id]));
                break;
            case 2: return redirect(route('customer.show', [$material->id]));
                break;
            case 3: return redirect(route('designer.show', [$material->id]));
                break;
            case 4: return redirect(route('employer.show', [$material->id]));
                break;
            case 5: return redirect(route('executor.show', [$material->id]));
                break;
            
        }
        
    }

}

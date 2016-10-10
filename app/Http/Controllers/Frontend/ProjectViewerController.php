<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectViewer\ShowProjectRequest;
use App\Models\EconomicActivity;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
use App\Notifications\RegisterSuccess;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProjectViewerController extends Controller {

    public function index(Request $request) {

        $cat_id = $request->get('cat_id');

        $allMaterials = UserForm::query()->published();

        if(isset($cat_id)) {
            $allMaterials = $allMaterials->withEconomicActivities($cat_id);
        }

        $allMaterials = $allMaterials->orderBy('id','desc')->skip(0)->take(9)->get();
        $economicActivities = EconomicActivity::all();

        return view('frontend.project_viewer.index')->with([
            'allMaterials' => $allMaterials,
            'economicActivities' => $economicActivities,
            'catId' => $cat_id,
        ]);
    }

    public function show(ShowProjectRequest $request, UserForm $material) {

        $files = [];
        if (!empty($material->logo)) {
            $files[] = $material->logo;
        }
        $documents = $material->documents;
        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];
        foreach ($documents as $item) {
            $contentType = mime_content_type(storage_path('app\documents') . '\\' . $item->name);
            if (in_array($contentType, $allowedMimeTypes)) {
                $files[] = $item->name;
            }
        }

        return view('frontend.'.strtolower($material->formType->name).'.show')
            ->with([strtolower($material->formType->name)=>$material, 'files'=>$files]);

    }

}

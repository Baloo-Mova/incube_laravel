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

    public function index() {
        $allMaterials = UserForm::withAll()->where([
                    'status_id' => Status::PUBLISHED,
                ])->orderBy('id', 'desc')->get();

        return view('frontend.project_viewer.index')->with([
                    'allMaterials' => $allMaterials,
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

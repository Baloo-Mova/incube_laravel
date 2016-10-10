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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];
            $allMaterials = UserForm::withAll()->where([
                'status_id' => Status::PUBLISHED,
                'economic_activities_id' => $cat_id,
            ])->orderBy('id', 'desc')->get();
        }else{
            $cat_id = 1;

            $allMaterials = UserForm::withAll()->where([
                'status_id' => Status::PUBLISHED,
            ])->orderBy('id', 'desc')->get();
        }

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

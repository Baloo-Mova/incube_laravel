<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Executor\CreateRequest;
use App\Http\Requests\Executor\EditRequest;
use App\Http\Requests\Executor\UpdateRequest;
use App\Models\Status;
use App\Models\Document;
use App\Notifications\RegisterSuccess;
use App\Models\TableType;
use App\Models\UserForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class ExecutorController extends Controller {

    public function index() {
        $executorProjects = UserForm::withAll()->where([
                    'form_type_id' => TableType::Executor
                ])->orderBy('id', 'desc')->get();

        return view('admin.executor.index')->with([
                    'executorProjects' => $executorProjects,
        ]);
    }

    public function create() {
        return view('admin.executor.create');
    }

    public function store(CreateRequest $request) {

        $model = new UserForm();
        $model->fill($request->all());
        $model->form_type_id = TableType::Executor;
        $email = $request->get('email');
        $pass = str_random(10);

        if (isset($email) && !empty($email)) {
            $user = User::firstOrNew([
                        'email' => $email,
            ]);

            $user->password = bcrypt($pass);
            $user->save();

            $user->notify(new RegisterSuccess($pass));
        }

        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;
        if ($request->hasFile('logo_file')) {
            $filename = uniqid('executor', true) . '.' . $request->file('logo_file')->getClientOriginalExtension();
            $request->file('logo_file')->storeAs('documents', $filename);
            $model->logo = $filename;
        }
        
        $model->save();

        if (!Auth::check()) {
            Auth::attempt(['email' => $email, 'password' => $pass]);
        }
        if ($request->hasFile('executor_files')) {
            foreach ($request->file('executor_files') as $item) {
                $filename = uniqid('executor', true) . '.' . $item->getClientOriginalExtension();
                $item->storeAs('documents', $filename);

                $doc = new Document();
                $doc->form_id = $model->id;
                $doc->name = $filename;
                $doc->save();
            }
        
        }
        
        return redirect(route('admin.executor.index'));
        //return redirect(route('executor.index'));
    }

    public function edit(EditRequest $request, UserForm $executor) {

        return view('admin.executor.edit', compact('executor'));
    }

    public function update(UpdateRequest $request, UserForm $executor) {

        $executor->fill($request->all());
        //$executor->status_id = Status::EDITED;
        if ($request->hasFile('logo_file')) {
            $filename = uniqid('executor', true) . '.' . $request->file('logo_file')->getClientOriginalExtension();
            $request->file('logo_file')->storeAs('documents', $filename);
            Storage::disk('documents')->delete($executor->logo);
            $executor->logo = $filename;
        }

        if ($request->hasFile('executor_files')) {
            $executor->clearDocuments();
            foreach ($request->file('executor_files') as $item) {
                $filename = uniqid('executor', true) . '.' . $item->getClientOriginalExtension();
                $item->storeAs('documents', $filename);
                $doc = new Document();
                $doc->form_id = $executor->id;
                $doc->name = $filename;
                $doc->save();
            }
        }
        
        $executor->save();

        return back()->with(['message' => 'Заявка оновлена']);
    }

    public function show(UserForm $executor) {
        $files = [];

        if (!empty($executor->logo)) {
            $files[] = $executor->logo;
        }
        $documents = $executor->documents;
        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];
        foreach ($documents as $item) {
            $contentType = mime_content_type(storage_path('app\documents') . '\\' . $item->name);
            if (in_array($contentType, $allowedMimeTypes)) {
                $files[] = $item->name;
            }
        }

        return view('admin.executor.show', compact('executor', 'files'));
       // return view('admin.executor.show', compact('executor'));
    }

    public function delete(UserForm $executor) {
        $executor->delete();

        return redirect(route('admin.executor.index'));
    }

}

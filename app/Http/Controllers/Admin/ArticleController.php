<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Article\CreateRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Status;
use App\Models\Article;
use App\Models\Category;
use App\Notifications\RegisterSuccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(config('app.post_per_page20'));
        $categories = Category::orderBy('id', 'desc')->get();
            
      
        return view('admin.article.index')->with([
            'articles' => $articles,
            'categories' => $categories,
            
            
        ]);
    }

    public function create()
    {
        $categories = Category::with('childrens')->where(['parent_id' => null])->get();
        return view('admin.article.create', compact('categories'));
    }

    public function store(CreateRequest $request)
    {
        $model = new Article();
        $model->fill($request->all());
        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;
        if($model->status_id == (Status::PUBLISHED)) $model->publisher_id = Auth::check() ? Auth::user()->id : $user->id; 
        if ($request->hasFile('logo_file')) {
            $filename = uniqid('article', true) . '.' . $request->file('logo_file')->getClientOriginalExtension();
            $request->file('logo_file')->storeAs('documents', $filename);
            $model->logo = $filename;
        }
        $model->save();

        
        
       

        return redirect(route('admin.article.index'));
    }

    public function edit(Article $article)
    {
        //$categories = Category::orderBy('id', 'desc')->get();
       $categories = Category::with('childrens')->where(['parent_id' => null])->get();
        return view('admin.article.edit', compact('article', 'categories'));
    }

    public function update(UpdateRequest $request, Article $article)
    {        
        $article->fill($request->all());
        //$article->status_id = Status::EDITED;
        if ($request->hasFile('logo_file')) {
            $filename = uniqid('article', true) . '.' . $request->file('logo_file')->getClientOriginalExtension();
            $request->file('logo_file')->storeAs('documents', $filename);
            Storage::disk('documents')->delete($article->logo);
            $article->logo = $filename;
        }

        
        
        
        $article->save();

        return back()->with(['message' => 'Редагування завершено']);
    }

    public function show(Article $article)
    {
        
        return view('admin.article.show', compact('article'));
    }
    
     public function delete(Article $article)
    {
        $article->delete();
        return redirect(route('admin.article.index'));
    }
}

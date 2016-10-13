<?php

namespace App\Http\Controllers\Frontend;

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
        $articles = Article::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
            
       
        return view('frontend.article.index')->with([
            'articles' => $articles,
            'categories' => $categories,
            
            
        ]);
    }

   
    public function show(Article $article)
    {
        
        return view('frontend.article.show', compact('article'));
    }
    
    
}

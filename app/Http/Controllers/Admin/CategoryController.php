<?php
namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       
        $categories = Category::orderBy('id', 'desc')->get();
            
        
        return view('admin.category.index')->with([
           
            'categories' => $categories,
            
            
        ]);
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(CreateRequest $request)
    {
        $model = new Category();
        $model->fill($request->all());
        
        
        $model->save();

        
        
       

        return redirect()->back();
    }

    public function edit(Category $category)
    {
               

        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {        
        $category->fill($request->all());
        //$category->status_id = Status::EDITED;
            
        
        $category->save();

        return redirect(route('admin.category.index'));
    }

    public function show(Category $category)
    {
        
        return view('admin.category.show', compact('category'));
    }
    
     public function delete(Category $category)
    {
       // $category->articles()->detach();
         $articles = Article::where('category_id', $category->id)->get();
         foreach($articles as $article){
             $article->category_id=null;
             $article->save();
         }
         $category->delete();
        return back()->with(['message' => 'deleted']);
    }
}

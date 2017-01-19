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
       
        $categories = Category::orderBy('weight_global', 'id')->get();
            
        
        return view('admin.category.index')->with([
           
            'categories' => $categories,
            
            
        ]);
    }

    public function create()
    {
        
        return view('admin.category.create', compact('categories'));
    }

    public function store(CreateRequest $request)
    {
        $model = new Category();
        $model->fill($request->all());
        if($model->parent_id=="NULL"){$model->parent_id=null;}
        
        $model->save();

        
        
       

        return redirect()->back();
    }

    public function edit(Category $category)
    {
       $categories = Category::with('childrens')->where(['parent_id' => null])->get();

        return view('admin.category.edit', compact('category','categories'));
    }

    public function update(UpdateRequest $request, Category $category)
    {        
        $category->fill($request->all());
        //$category->status_id = Status::EDITED;
            if($category->parent_id=="NULL"){$category->parent_id=null;}
        
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
         if($category->isParent() && count($category->childrens)!=0){
    
         foreach($category->childrens as $child){
             $child->parent_id=null;
             $child->save();
         }
         } 
         $category->delete();
        return back()->with(['message' => 'deleted']);
    }
}

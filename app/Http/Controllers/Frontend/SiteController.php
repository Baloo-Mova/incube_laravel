<?php

namespace App\Http\Controllers\Frontend;

use App\Notifications\RegisterSuccess;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Article;
use App\Models\Category;

class SiteController extends Controller {

    public function index() {
        $allMaterials = UserForm::withAll()->where([
                    'status_id' => Status::PUBLISHED,
                ])->orderBy('id', 'desc')->take(10)->get();
        $articles = Article::where([
                    'status_id' => Status::PUBLISHED,
                ])->orderBy('id', 'desc')->get(); //paginate(config('app.post_per_page20'));

        foreach ($articles as $article) {
            $crawler = new Crawler();
            $crawler->addHtmlContent($article->description);
            $nodeValues = $crawler->filter('body > p, li, h1, h2, h3, h4')->each(function (Crawler $node, $i) {
                return $node->text();
            });
            $nodeValues = array_splice($nodeValues, 0, 5);

            //$crawler =  $crawler->filter('body > p, li, h1, h2, h3, h4');//filterXPath('descendant-or-self::body/p');

            $article->description = implode($nodeValues, "<p>");
        }

        //$categories = Category::orderBy('id', 'desc')->get();
        $absolute_categories = Category::where(['parent_id' => NULL])
                ->where(['to_index' => 1])
                ->orderBy('weight', 'id')
                ->get();
  
$tmp_all_articles[] = null;

        foreach ($absolute_categories as $abs_category) {
            $tmp_ids[] = $abs_category->id;

            $children_category = Category::where(['parent_id' => $abs_category->id])
                    ->get();
            $this->getCategoriesIds($abs_category, $tmp_ids);
          

            $articles = Article::where([
                    'status_id' => Status::PUBLISHED,
                ])->whereIn('category_id',$tmp_ids)->orderBy('id','desc')->take(5)->get(); //paginate(config('app.post_per_page20'));

if(!empty($articles)){
        foreach ($articles as $article) {
            $crawler = new Crawler();
            $crawler->addHtmlContent($article->description);
            $nodeValues = $crawler->filter('body > p, li, h1, h2, h3, h4')->each(function (Crawler $node, $i) {
                return $node->text();
            });
            $nodeValues = array_splice($nodeValues, 0, 5);

            $article->description = implode($nodeValues, "<p>");
        }
            
array_push($tmp_all_articles,$articles);
//dd($tmp_all_articles);
}
unset($tmp_ids);
        }
      $tmp_all_articles=  array_diff($tmp_all_articles, array('', NULL, false));
          
        return view('frontend.site.index')->with([
                    'allMaterials' => $allMaterials,
                    'tmp_all_articles' => $tmp_all_articles,
            'absolute_categories' => $absolute_categories,
        ]);
    }

    private function getCategoriesIds(Category &$cat, &$arr_ids) {
       
        if ($cat->isParent2()) {
            
            $children_category = Category::where(['parent_id' => $cat->id])
                    ->get();
            if (!empty($children_category)) {
                foreach ($children_category as $child_category) {
                    array_push($arr_ids, $child_category->id);
                    if ($child_category->isParent2())
                        $this->getCategoriesIds($child_category, $arr_ids);
                }
            }
        }

        return $arr_ids;
    }

    public function contacts() {
        return view('frontend.site.contacts');
    }

    public function about() {
        return view('frontend.site.about');
    }

    public function ourrules() {
        return view('frontend.site.rules');
    }

    public function news() {

        $articles = Article::join('categories', 'categories.id', '=', 'articles.category_id')
                        ->where(['articles.status_id' => Status::PUBLISHED])
                        ->where(['categories.publish' => 0])->select('articles.*')->orderBy('id', 'desc')->paginate(config('app.post_per_page20'));
        // dd($articles);
        $categories = Category::orderBy('id', 'desc')->get();
        foreach ($articles as $article) {
            $crawler = new Crawler();
            $crawler->addHtmlContent($article->description);
            $nodeValues = $crawler->filter('body > p, li, h1, h2, h3, h4')->each(function (Crawler $node, $i) {
                return $node->text();
            });
            $nodeValues = array_splice($nodeValues, 0, 5);

            //$crawler =  $crawler->filter('body > p, li, h1, h2, h3, h4');//filterXPath('descendant-or-self::body/p');

            $article->description = implode($nodeValues, "<p>");
        }

        return view('frontend.site.news')->with([
                    'articles' => $articles,
        ]);
    }

}

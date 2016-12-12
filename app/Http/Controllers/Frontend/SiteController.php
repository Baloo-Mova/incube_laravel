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

        return view('frontend.site.index')->with([
                    'allMaterials' => $allMaterials,
                    'articles' => $articles,
        ]);
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
                -> where(['articles.status_id' => Status::PUBLISHED])
                ->where(['categories.publish' => 0])->select('articles.*')->get();
//paginate(config('app.post_per_page20'));
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

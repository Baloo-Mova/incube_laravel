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
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class ArticleController extends Controller {

    public function index(Request $request) {
        $cat_id = $request->get('cat_id');

        $articles = Article::where([
                    'status_id' => Status::PUBLISHED
                ])->orderBy('id', 'desc')->get();

        foreach ($articles as $article) {
            $crawler = new Crawler();
            $crawler->addHtmlContent($article->description);
            $nodeValues = $crawler->filter('body > p, li, h1, h2, h3, h4')->each(function (Crawler $node, $i) {
                return $node->text();
            });
            $nodeValues = array_splice($nodeValues, 0, 3);

            //$crawler =  $crawler->filter('body > p, li, h1, h2, h3, h4');//filterXPath('descendant-or-self::body/p');

            $article->description = implode($nodeValues, "<p>");
        }

        $categories = Category::orderBy('id', 'desc')->get();


        return view('frontend.article.index')->with([
                    'articles' => $articles,
                    'categories' => $categories,
                    'posts_number' => count($articles),
                    'catId' => $cat_id,
        ]);
    }

    public function show(Article $article) {

        return view('frontend.article.show', compact('article'));
    }

}

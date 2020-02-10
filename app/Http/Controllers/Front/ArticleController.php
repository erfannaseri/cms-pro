<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Http\Controllers\Controller;
use App\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $portfolios=Portfolio::orderBy('id','DESC')->get();
        $tags=$portfolios->unique('tag');
        $articles=Article::where('status',1)->orderBy('id','DESC')->paginate(3);
        $count_articles=Article::count();
        $all_view=Article::sum('hit');
        return view('front.articles.articles',compact('articles','count_articles','all_view','portfolios','tags'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {

        $article=Article::where(['slug'=>$slug])->first();
        $comments=$article->comments()->orderBy('id','DESC')->paginate(10);
        $article->increment('hit');
        $categories=$article->categories;

        return view('front.articles.article',compact('article','categories','comments'));
    }
}

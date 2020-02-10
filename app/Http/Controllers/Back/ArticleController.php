<?php

namespace App\Http\Controllers\Back;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class ArticleController extends Controller
{
    public function index()
    {
        $articles=Article::orderBy('id','DESC')->paginate(5);
        $count_articles=Article::count();
        return view('back.articles.articles',compact('articles','count_articles'));
    }

    public function create()
    {
        $categories=Category::all();

        return view('back.articles.create-article',compact('categories'));
    }

    /**
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateArticleRequest $request)
    {

        if (empty($request->slug)) {

            $slug = SlugService::createSlug(Article::class, 'slug', $request->name);
        }else{
            $slug = SlugService::createSlug(Article::class, 'slug', $request->slug);
        }
            $request->merge(['slug'=>$slug]);
         $original_slug= $request->slug;

            $article = Article::create([
                'name' => $request->input('name'),
                'content' => $request->input('content'),
                'image' => $request->input('image'),
                'user_id' => Auth::user()->id
            ]);
            $article->slug=$original_slug;
            $article->save();
            $article->categories()->attach($request->input('categories'));





            return redirect(route('admin.articles.index'))->with('success','مقاله مورد نظر شما ثبت شد ولی قابل نمایش نیست لطفا وضعیت آنرا تغییر دهید');

    }

    public function show($slug)
    {

        $article=Article::where(['slug'=>$slug])->first();

        $categories=$article->categories;

        return view('back.articles.show-article',compact('article','categories'));
    }

    public function status(Article $article)
    {
        if ($article->status == 1) {
            $article->status= 0;
            $article->save();
            return back()->with('successStatus'.'مقاله مورد نظر دیگر منتشر نمی شود');
        }elseif ($article->status == 0)
        {
            $article->status=1;
            $article->save();
            return back()->with('successStatus','مقاله مورد نظر منتشر گردید');
        }
        return back()->with('error','خطایی ناشناخته رخ داده است');
    }

    public function edit($slug)
    {
        $article=Article::where('slug',$slug)->first();
        $categories=Category::all();
        return view('back.articles.edit-article',compact('article','categories'));
    }
    public function update(UpdateArticleRequest $request,$slug)
    {
        $article=Article::where('slug',$slug)->first();
        if (empty($request->slug)) {

            $slug = SlugService::createSlug(Article::class, 'slug', $request->name);
        }else{
            $slug = SlugService::createSlug(Article::class, 'slug', $request->slug);
        }
        $request->merge(['slug'=>$slug]);
        $original_slug= $request->slug;



               $article->name=$request->input('name');
                $article->slug=$request->slug;
                $article->content=$request->input('content');
                $article->user_id=Auth::user()->id;
        try {
            $article->slug=$original_slug;
            $article->save();
            $article->categories()->sync($request->input('categories'));
        } catch (Exception $exception) {
            if ($exception->getCode() == 23000) {
                return back()->with('error','نام مستعار قبلا ثبت شده است');
            }

        }
            return redirect(route('admin.articles.show',$article->slug))->with('success','مقاله مورد نظر شما ثبت شد ولی قابل نمایش نیست لطفا وضعیت آنرا تغییر دهید');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('admin.articles.index'))->with('success','مقاله مورد نظر حذف گردید');
    }

}


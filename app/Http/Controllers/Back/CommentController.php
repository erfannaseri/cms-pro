<?php

namespace App\Http\Controllers\Back;

use App\Article;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $comments=Comment::orderBy('id','DESC')->paginate(10);
        $count_comments=Comment::count();

        return view('back.comments.comments',compact('comments','count_comments'));
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Comment $comment)
    {
        return view('back.comments.show-comment',compact('comment'));
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Comment $comment)
    {
        if ($comment->status == 1) {
            $comment->status= 0;
            $comment->save();
            return back()->with('successStatus'.';کامنت  مورد نظر دیگر منتشر نمی شود');
        }elseif ($comment->status == 0)
        {
            $comment->status=1;
            $comment->save();
            return back()->with('successStatus','کامنت  مورد نظر منتشر گردید');
        }
        return back()->with('error','خطایی ناشناخته رخ داده است');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect(route('admin.comments.index'))->with('success','دیدگاه مورد نظر حذف گردید');
    }

    public function comments($slug)
    {
        $article=Article::where('slug',$slug)->first();
//        $comments=$article->comments;
//        foreach ($comments as $comment) {
//            echo $comment->name.'<br>';
//        }
    }
}

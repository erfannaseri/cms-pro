<?php

namespace App\Http\Controllers\Front;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitCommentRequest;
use App\Mail\CommentSentMail;
use Illuminate\Support\Facades\Mail;
use Exception;

class CommentController extends Controller
{

    public function store(SubmitCommentRequest $request)
    {
        try {
            $comment=Comment::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'content'=>$request->input('content'),
                'article_id'=>$request->input('article_id'),
            ]);
            if ($comment) {
                Mail::to($comment->email)->send(new CommentSentMail($comment));
                return back()->with('successComment','نظر شما با موفقیت ارسال شذ پس از تایید ادمین منتشر میگردد');
            }else{
                return back()->with('wrongComment','نظر شما ثبت با شکشت روبرو شد لطفا مجددا تلاش نمایید');
            }
        } catch (Exception $exception) {
            if ($exception->getCode() == 23000) {
                return 'چنین مفاله ای وجود ندارد';
            }
        }
    }
}

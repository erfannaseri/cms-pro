<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p> نظر شما ارسال شد{{$comment->name}}کاربر گرامی </p>
<p>جزییات این کامنت : </p>
<ul>
    <li>ایمیل شما : {{$comment->email}}</li>
    <li>نام مقاله : {{$comment->article->slug}}</li>
    <li>تاریخ ارسال نظر : {!! jdate($comment->created_at) !!}</li>
</ul>
</body>
</html>

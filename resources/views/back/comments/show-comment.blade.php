@extends('back.index')
@section('title')
    اطلاعات دیدگاه : {{$comment->id}}
@endsection
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-8  " style="margin-right: 100px ">

                @if (session('success'))
                    <hr>
                    <h4 align="center" class="alert alert-success">{{session('success')}}</h4>
                @endif
                    @if (session('successStatus'))
                        <hr>
                        <h4 align="center" class="alert alert-success">{{session('successStatus')}}</h4>
                    @endif
                @if (session('error'))
                        <hr>
                    <h4 align="center" class="alert alert-danger">{{session('error')}}</h4>
                @endif
                <div class="card border-success ">

                    <div class="card-header" >جزییات کامنت  </div>
                    <div class="card-body">

                        <h4 class="card-title">نام نظر دهنده : {{$comment->name}}</h4>
                        <hr>
                        <h4 class="card-title">ایمییل نظر دهنده : {{$comment->email}}</h4>
                        <hr>
                        <h4 class="card-title">متن نظر  : {!!$comment->content !!}</h4>
                        <hr>
                        <p class="card-text">عنوان مقاله مورد نظر  : {{$comment->article->name}}</p>
                        <hr>
                        <p class="card-title">تاریخ ارسال نظر : {!! jdate($comment->created_at)->format('%A, %d / %m / %Y  ') !!}</p>
                        <hr>
                        @if ($comment->status == 1)
                            <p class="card-text">وضعیت : منتشر شده</p>
                            <p class="card-text"> برای  جلوگیری از انتشار <a href="{{route('admin.comments.status',$comment->id)}}">کلیک</a> نمایید  </p>
                        @elseif ($comment->status == 0)
                            <p class="card-text">وضعیت :منتشر نشده</p>
                            <p class="card-text">برای  انتشار <a href="{{route('admin.comments.status',$comment->id)}}">کلیک</a>  نمایید </p>
                        @endif
                        <hr>
                        <form action="{{route('admin.comments.delete',$comment->id)}}" method="post">
                            {{csrf_field()}}
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-outline-secondary btn-block btn-lg"
                                    onclick="return confirm('آیا برای حذف این مقاله مطمئن هستید ؟');">حذف</button>
                        </form>
                        <hr>
                        <a class="btn btn-outline-primary btn-light btn-block btn-lg" href="{{route('admin.comments.index')}}">برگشت</a>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection


@extends('front.index')

@section('title')
    {{$article->slug}}
@endsection

@section('main')
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bgcolor">
            <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
            <li class="breadcrumb-item"><a href="{{route('articles.index')}}">مطالب</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$article->name}}</li>

           <li> <a class="btn btn-outline-dark" style="margin-right: 1000px" href="{{route('articles.index')}}">برگشت</a></li>
        </ol>

    </nav>
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">

            @if(session('successComment'))
                <p class="alert alert-success" align="center">{{session('successComment')}}</p>
            @endif
            @if(session('wrongComment'))
                <p class="alert alert-danger" align="center">{{session('wrongComment')}}</p>
            @endif
        </div>
    </div>
</div>

    <div class="d-flex justify-content-center"  >
        <div class="row" >

            <div class="card mb-3">
                <h3 align="center" class="card-header">{{$article->name}}</h3>

                @if ($article->image)
                    <img style="height: 300px; width: 100%; display: block;" src="{{$article->image}}" alt="{{$article->slug}}">
                @else
                    <img  style="height: 300px; width: 800px; display: block;" src="/photos/1/images.png" alt="{{$article->slug}}">
                @endif
                <hr>
                <div class="card-body">
                    <p class="card-text">{!!$article->content!!}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">نویسنده :{{$article->user->name}}</li>
                </ul>
                <div class="card-body">
                    <p>دسته بندی ها :</p>
                    @foreach($article->categories as $category)
                    <a class="btn btn-outline-primary btn-sm"  href="#" class="card-link">{{$category->slug}}</a>
                     @endforeach
                </div>

                <div class="card-footer text-muted">
                   <span> تاریخ انتشار پست : {!! jdate($article->created_at)->format('%A, %Y / %B / %d ') !!}</span>
                    <span class="btn btn-outline-secondary disabled" style="margin-right: 60%">
                        تعداد بازدید های این مطلب : {{$article->hit}}
                    </span>
                </div>
            </div>

        </div>
    </div>
    <h4 class="alert alert-info" align="center" style="font-family: 'Courier New'">نظرات قبلی کاربران </h4>
    <div class="col-8 offset-2">
        @foreach($comments as $comment)
        <div class="card mb-2">

            @if ($comment->status == 1)
                <h4   class="card-header" style="font-family: 'Courier New'">{{$comment->name}}  میگه </h4>

            <div class="card-body">
                <p class="card-text" style="font-family: 'Courier New'">{!!$comment->content!!}</p>
            </div>
                    <div class="card-footer text-muted">
                        <span style="font-family: 'Courier New'"> تاریخ ارسال نظر : {!! jdate($comment->created_at)->format('%A, %d / %B / %Y ') !!}</span>
                        <a class="btn btn-outline-secondary " style="margin-right: 80%" href="#">
                        پاسخ به این نظر
                    </a>
                    </div>
                @endif

        </div>
        @endforeach
        <div class="col-4 offset-4">
            <hr>
            {{$comments->links()}}
        </div>

    </div>
    <div class="col-6 offset-3">
        <form action="{{route('comment.store')}}" method="post">
        {{csrf_field()}}
            <div class="form-group">
                <label for="content">نظر شما :</label>
                <textarea name="content" id="content" cols="30" rows="10"
                          class="form-control @error('content') is-invalid @enderror"
                >{{old('content')}}</textarea>
                @error('content')
                <div class="alert alert-danger ">{{$message}}</div>
                @enderror
            </div>
            <div class="form-row">
                @auth
                    <p>کاربر گرامی شما عضو شده اید و نظر خود را ارسال نمایید</p>
                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                 @else
                <div class="form-group col-md-6">
                    <label for="name">نام : </label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}" id="name">
                    @error('name')
                    <div class="alert alert-danger ">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="email">ایمیل : </label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}" id="email">
                    @error('email')
                    <div class="alert alert-danger ">{{$message}}</div>
                    @enderror
                </div>
                 @endauth
                    <input type="hidden" name="article_id" value="{{$article->id}}" readonly>
            </div>
            <div class="form-group">
                <label for="recaptcha">تصویر امنیتی</label>
                {!! htmlFormSnippet() !!}
                @error('g-recaptcha-response')
                    <div class="alert alert-danger ">{{$message}}</div>
                    @enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-secondary btn-lg btn-block" value="ثبت دیدگاه">
            </div>
        </form>
    </div>
@endsection

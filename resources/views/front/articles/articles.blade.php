@extends('front.index')

@section('title')
   مطالب سایت
@endsection

@section('main')
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bgcolor">
            <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
            <li class="breadcrumb-item active" aria-current="page">ثبت نام</li>
            <li><a class="btn btn-light disabled" style="margin-right: 1000px">آمار بازدید روزانه از کل سایت :{{$all_view}}</a></li>
        </ol>
    </nav>


    <div class="container-fluid justify-content-center"  >
        <div class="row" >
            @foreach ($articles as $article)
            <div class="col-sm-3 offset-1" >
                @if($article->image)
                         <img src="@php echo '/photos/1/thumbs/'.basename($article->image); @endphp" alt="{{$article->name}}">
                @else
                        <img src="/photos/1/images.png" alt="{{$article->name}}">
                @endif
                        <h3><a href="{{route('articles.show',$article->slug)}}">{{$article->name}}</a></h3>
                        <p>{{mb_substr(html_entity_decode(strip_tags($article->content)),0,100,'utf8')}}
                            <br>
                            <a class="btn btn-block btn-lg btn-outline-secondary"
                               href="{{route('articles.show',$article->slug)}}"> ادامه مطلب </a></p>

            </div>
            @endforeach
            <div class="col-sm-3 offset-6">
                {{$articles->links()}}

            </div>
                <hr>
            <div class="col-sm-4 offset-4">
                <p>آمار بازدید روزانه از کل سایت :{{$all_view}}</p>
            </div>

        </div>
    </div>
@endsection

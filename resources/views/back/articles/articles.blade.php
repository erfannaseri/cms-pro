@extends('back.index')
@section('title, مدیریت وبلاگ')
    ادمین پنل-مقاله ها
@endsection
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1 " style="margin-top:80px ">
                @if (session('success'))
                    <hr>
                    <h4 align="center" class="alert alert-success">{{session('success')}}</h4>
                    <hr>
                @endif
                @if($count_articles >0 )
                    <table align="center" class="table">
                        <h3 class="table table-hover">لیست دسته بندی ها</h3>
                        <thead>
                        <tr>
                            <th>کد مقاله</th>
                            <th>نام</th>
                            <th>نام مستعار</th>
                            <th colspan="4">عملیات لازم</th>
                        </tr>
                        </thead>
                        @foreach($articles as $article)

                            <tbody>
                            <tr>
                                <th>{{$article->id}}</th>
                                <th>{{$article->name}}</th>
                                <th>{{$article->slug}}</th>

                                <th><a href="{{route('admin.articles.show',$article->slug)}}" class="btn btn-outline-primary btn-success">جزئیات</a></th>
                                <th>
                                    @if ($article->status == 1)
                                        <a  class="btn btn-success" href="{{route('admin.articles.status',$article->id)}}">فعال</a>
                                    @elseif ($article->status == 0)
                                        <a class="btn btn-danger" href="{{route('admin.articles.status',$article->id)}}">غیر فعال</a>
                                    @endif
                                </th>
                                <th>
                                    <a class="btn btn-outline-primary btn-dark" href="{{route('admin.comments.comments',$article->slug)}}">نظرات مربوطه</a>
                                </th>
                                <th>
                                    <form action="{{route('admin.articles.delete',$article->id)}}" method="post">
                                        {{csrf_field()}}
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-outline-secondary"
                                                onclick="return confirm('آیا برای حذف این مقاله مطمئن هستید ؟');">حذف</button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>


                    <div style="margin-right: 370px">

                        {{$articles->links()}}
                        <hr>
                        <h4 style="margin-left: 300px"><a href="{{route('admin.articles.create')}}" class="btn btn-outline-primary btn-secondary btn-block">ایجاد مقاله جدید +</a></h4>
                    </div>
                @else
                    <h3 align="center">مقاله ای  وجود ندارد</h3>
                    <h4><a href="{{route('admin.articles.create')}}"  class="btn btn-outline-primary btn-secondary btn-block">ایجاد مقاله جدید +</a></h4>
                @endif
                <hr>

            </div>
        </div>
    </div>

@endsection


@extends('back.index')
@section('title')
    ادمین پنل-نظرات کاربران
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
                @if($count_comments >0 )
                    <table align="center" class="table">
                        <h3 class="table table-hover">لیست دسته بندی ها</h3>
                        <thead>
                        <tr>
                            <th>کد </th>
                            <th>مقاله</th>
                            <th>کامنت</th>
                            <th>وضعبت</th>
                            <th colspan="3">عملیات لازم</th>
                        </tr>
                        </thead>
                        @foreach($comments as $comment)

                            <tbody>
                            <tr>
                                <th>{{$comment->id}}</th>
                                <th>{{$comment->article->name}}</th>
                                <th>{!! mb_substr($comment->content,0,30,'utf8')!!} ...</th>

                                <th><a href="{{route('admin.comments.show',$comment->id)}}" class="btn btn-outline-primary btn-success">جزئیات</a></th>
                                <th>
                                    @if ($comment->status == 1)
                                        <a  class="btn btn-success" href="{{route('admin.comments.status',$comment->id)}}">فعال</a>
                                    @elseif ($comment->status == 0)
                                        <a class="btn btn-danger" href="{{route('admin.comments.status',$comment->id)}}">غیر فعال</a>
                                    @endif
                                </th>
                                <th>
                                    <form action="{{route('admin.comments.delete',$comment->id)}}" method="post">
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

                        {{$comments->links()}}
                        <hr>

                    </div>
                @else
                    <h3 align="center">مقاله ای  وجود ندارد</h3>

                @endif
                <hr>

            </div>
        </div>
    </div>

@endsection


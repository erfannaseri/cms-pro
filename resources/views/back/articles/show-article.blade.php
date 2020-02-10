@extends('back.index')
@section('title, مدیریت وبلاگ')
   ادمین پنل-نمایش پست
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

                    <div class="card-header" >جزییات مقاله  </div>
                    <div class="card-body">

                        <h4 class="card-title">عنوان : {{$article->name}}</h4>
                        <hr>
                        <h4 class="card-title">نام مستعار : {{$article->slug}}</h4>
                        <hr>
                        <h4 class="card-title">متن : {!!$article->content !!}</h4>
                        <hr>
                        <h4 class="card-title">تصویر شاخص :<img src="{{$article->image}}" alt="{{$article->title}}" style="margin-top:15px;max-height:100px;"></h4>
                        <hr>
                        <p class="card-text">نویسنده : {{$article->user->name}}</p>
                        <hr>
                        @if ($article->status == 1)
                            <p class="card-text">وضعیت : منتشر شده</p>
                            <p class="card-text"> برای  جلوگیری از انتشار <a href="{{route('admin.articles.status',$article->id)}}">کلیک</a> نمایید  </p>
                        @elseif ($article->status == 0)
                            <p class="card-text">وضعیت :منتشر نشده</p>
                            <p class="card-text">برای  انتشار <a href="{{route('admin.articles.status',$article->id)}}">کلیک</a>  نمایید </p>
                        @endif
                        <hr>
                        <p class="card-text">تعداد بازدید ها : {{$article->hit}}</p>
                        <hr>
                        <p class="card-text">دسته بندی های مربوطه</p>
                        @foreach($categories as $category)
                               <span class="btn btn-light">{{$category->slug}},</span>
                            @endforeach
                        <hr>
                        <a class="btn btn-outline-primary btn-dark btn-block btn-lg" href="{{route('admin.articles.edit',$article->slug)}}">ویرایش</a>
                        <br>
                        <form action="{{route('admin.articles.delete',$article->id)}}" class="post">
                            {{csrf_field()}}
                            @method('DELETE')
                            <button  type="submit" onclick="return confirm('آیا برای حذف این مقاله مطمئن هستید؟؟')" class="btn btn-outline-danger btn-dark btn-block btn-lg">حذف </button>
                        </form>
                        <hr>
                        <a class="btn btn-outline-primary btn-light btn-block btn-lg" href="{{route('admin.articles.index')}}">برگشت</a>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection


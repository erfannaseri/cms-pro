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

                    <div class="card-header" >جزییات نمونه کار  </div>
                    <div class="card-body">

                        <h4 class="card-title">عنوان : {{$portfolio->name}}</h4>
                        <hr>
                        <h4 class="card-title">نام مستعار : {{$portfolio->link}}</h4>
                        <hr>

                        <h4 class="card-title">متن : {!!$portfolio->description !!}</h4>
                        <hr>
                        <h4 class="card-title">تصویر شاخص :<img src="{{$portfolio->image}}" alt="{{$portfolio->name}}" style="margin-top:15px;max-height:100px;"></h4>
                        <hr>
                        <a class="btn btn-outline-primary btn-dark btn-block btn-lg" href="{{route('admin.portfolios.edit',$portfolio->id)}}">ویرایش</a>
                        <br>
                        <form action="{{route('admin.portfolios.delete',$portfolio->id)}}" class="post">
                            {{csrf_field()}}
                            @method('DELETE')
                            <button  type="submit" onclick="return confirm('آیا برای حذف این مقاله مطمئن هستید؟؟')" class="btn btn-outline-danger btn-dark btn-block btn-lg">حذف </button>
                        </form>
                        <hr>
                        <a class="btn btn-outline-primary btn-light btn-block btn-lg" href="{{route('admin.portfolios.index')}}">برگشت</a>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection


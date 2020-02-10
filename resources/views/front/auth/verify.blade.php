@extends('front.index')

@section('title')
   فعالسازی ایمیل کاربری
@endsection

@section('main')
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bgcolor">
            <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
            <li class="breadcrumb-item">فعالسازی ایمیل کاربری</li>


            <li> <a class="btn btn-outline-dark" style="margin-right: 1000px" href="{{route('articles.index')}}">برگشت</a></li>
        </ol>

    </nav>

    <div class="container"  >
        <div class="row" >
            <div class="col-6 offset-3" >
                <h4 align="center" class="alert alert-dark">کاربر گرامی برای دسترسی به این قسمت باید ایمیل خود را فعال کنید </h4>
                @if (session('resent'))
                    <hr>
                    <br><br><br>
                    <h4 class="alert alert-success">  ایمیل فعالسازی برای شما ارسال گردید لطفا ایمیل خود را چک نموده و سپس رو لینک فعالسازی کلیک نمایید</h4>
                @endif

                <form action="{{route('verification.resend')}}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-block btn-outline-primary btn-dribbble"> ارسال لینک فعالساری لینک کاربری</button>
                </form>
            </div>
        </div>
    </div>
@endsection

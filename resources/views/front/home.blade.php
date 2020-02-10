@extends('front.index')
@section('title')
    پنل اصلی
@endsection
@section('main')

    <section id="intro" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center">
                <div class="col-md-6 intro-info order-md-first order-last">
                    <h2>در این وب سایت<br><span> شما آموزش رایگان  </span>را تجربه نمایید</h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">فقط شروع نمایید</a>
                    </div>
                </div>

                <div class="col-md-6 intro-img order-md-last order-first">
                    <img src="front/img/intro-img.svg" alt="" class="img-fluid">
                </div>
            </div>

        </div>
    </section>
@endsection

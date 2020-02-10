<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
    {!! htmlScriptTagJsApi(['lang'=>'fa']) !!}
  <!-- Favicons -->
  <link href="front/img/favicon.png" rel="icon">
  <link href="front/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
    rel="stylesheet">
    <link href="{{asset('front/css/front-css.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

</head>

<body dir="rtl">
  <!--==========================
  Header
  ============================-->
  @include('front.navbar')
  <div class="container">
      <div class="row">
          <div class="col-4 offset-4">
              @if(session('register-user'))
                  <h4 >{{session('register-user')}}</h4>
              @endif
          </div>
      </div>
  </div>
@yield('main')

  @include('front.body')

  @include('front.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <script src="{{url('front/js/front-js.js')}}"></script>

</body>

</html>

@extends('back.index')
@section('title, مدیریت وبلاگ')
    ادمین پنل-مدیدت وبلاگ
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h4 style="margin-right: 400px" class="page-title">پنل مدیریت</h4>
                </div>
            </div>
            <div class="col-12" >
                <div class="page-header">
                    <h6 style="margin-right: 400px" class="page-title">{{Auth::user()->name }}  عزیز :به صفحه مدریت وبلاگ خوش آمدی </h6>
                </div>
            </div>
        </div>
    </div>
@endsection


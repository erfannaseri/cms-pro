@extends('front.index')

@section('title')
    پروفایل-{{Auth::user()->name}}
@endsection

@section('main')
    <br><br><br>
    <div class="container"  >
        <div class="row" >
            <div class="col-6 offset-3" >
                @if (session('success-error'))
                    <h4 align="center" class="alert alert-danger">{{session('success-error')}}</h4>
                @endif

                <div class="card mb-3">

                    @foreach ($user as $u)
                    <h3 align="center" class="card-header">اطلاعات کاربری</h3>
                    <ul class="list-group list-group-flush">



                        <li class="list-group-item">نام: {{$u->name}}</li>
                        <li class="list-group-item">ایمیل : {{$u->email}}</li>
                        @if ($u->role == 1)
                            <li class="list-group-item">نقش : ادمین</li>
                        @else
                            <li class="list-group-item">نقش : کاربر عادی</li>
                        @endif
                        @if($u->status == 1)
                            <li class="list-group-item">وضعیت : فعال</li>
                        @else
                            <li class="list-group-item">وضعیت : غیر فعال</li>
                        @endif


                    </ul>
                    <div class="card-body">
                        <a href="{{route('user.edit',$u->name)}}" class="btn btn-outline-primary">بروز رسانی</a>
                        <br><br>
                        <a style="position: center" href="" class="btn btn-outline-secondary">حذف حساب کاربری</a>
                    </div>
                    <div class="card-footer text-muted">
                        تاریخ ایجاد حساب : {{$u->created_at}}
                        <br>
                        اخرین بروز رسانی : {{$u->updated_at}}
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

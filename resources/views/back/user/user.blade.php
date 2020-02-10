@extends('back.index')
@section('title, مدیریت وبلاگ')
    ادمین پنل-مدیریت کاربران
@endsection
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1 " style="margin-top:80px ">
                @if($count_user >0 )
                    <table align="center" class="table">
                        <thead>
                        <tr>
                            <th>کد کاربر</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th colspan="2">وظیفه</th>
                            <th colspan="2">وضعیت</th>
                            <th colspan="3">عملیات لازم</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)

                            <tbody>
                            <tr>
                                <th>{{$user->id}}</th>
                                <th>{{$user->name}}</th>
                                <th>{{$user->email}}</th>
                                @if ($user->role == 1)
                                    <th>ادمین</th>
                                    <th><a href="{{route('admin.user.changeRole',$user->id)}}" class="btn btn-outline-warning">تعویض به کاربر عادی </a></th>
                                @else
                                    <th>کاربر عادی</th>
                                    <th><a href="{{route('admin.user.changeRole',$user->id)}}" class="btn btn-outline-info btn-secondary">ادمین شدن</a></th>
                                @endif
                                @if ($user->status)
                                    <th>فعال</th>
                                    <th><a href="{{route('admin.user.changeStatus',$user->id)}}" class="btn btn-outline-danger btn-secondary">مسدود سازی</a></th>
                                @else
                                    <th>غیر فعال</th>
                                    <th><a href="{{route('admin.user.changeStatus',$user->id)}}" class="btn btn-outline-success btn-warning">آزاد سازی</a></th>
                                @endif

                                <th>
                                    <form action="{{route('admin.user.deleteUser',$user->id)}}" method="post">
                                        {{csrf_field()}}
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-outline-secondary">حذف</button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>


                    <div style="margin-right: 370px">
                        <br><br><br>
                        {{$users->links()}}
                    </div>
                @else
                    مطلبی جهت نمایشش وجود ندارد
                @endif
                <hr>
                <div class="offset-4">
                </div>
            </div>
        </div>
    </div>

@endsection


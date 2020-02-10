@extends('back.index')
@section('title, مدیریت وبلاگ')
    ادمین پنل-مدیریت نمونه کارها
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
                @if($count_portfloios >0 )
                    <table align="center" class="table">
                        <h3 class="table table-hover">لیست نمونه کار ها</h3>
                        <thead>
                        <tr>
                            <th>کد نمونه کار</th>
                            <th>نام</th>
                            <th>تگ</th>
                            <th colspan="2">عملیات لازم</th>
                        </tr>
                        </thead>
                        @foreach($portfolios as $portfolio)

                            <tbody>
                            <tr>
                                <th>{{$portfolio->id}}</th>
                                <th>{{$portfolio->name}}</th>
                                <th>{{$portfolio->tag}}</th>

                                <th>
                                    <a href="{{route('admin.portfolios.show',$portfolio->id)}}" class="btn btn-outline-secondary btn-warning">جزئیات</a>
                                </th>
                                <th>
                                    <a href="{{route('admin.portfolios.edit',$portfolio->id)}}" class="btn btn-outline-primary btn-success">ویرایش</a>
                                </th>
                                <th>
                                    <form action="{{route('admin.portfolios.delete',$portfolio->id)}}" method="post">
                                        {{csrf_field()}}
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-outline-secondary"
                                                onclick="return confirm('آیا برای حذف این دسته بندی مطمئن هستید ؟');">حذف</button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>


                    <div style="margin-right: 370px">

                        {{$portfolios->links()}}
                        <hr>
                        <h4 style="margin-left: 300px"><a href="{{route('admin.portfolios.create')}}" class="btn btn-outline-primary btn-secondary btn-block">ثبت نمونه کار +</a></h4>
                    </div>
                @else
                    <h3 align="center">نمونه کار وجود ندارد</h3>
                    <h4><a href="{{route('admin.portfolios.create')}}"  class="btn btn-outline-primary btn-secondary btn-block">ثبت نمونه کار +</a></h4>
                @endif
                <hr>

            </div>
        </div>
    </div>

@endsection


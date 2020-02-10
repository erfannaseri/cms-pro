@extends('back.index')
@section('title, مدیریت وبلاگ')
    ادمین پنل-مدیریت کاربران
@endsection
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1 " style="margin-top:80px ">
                @if (session('successCreateCategory'))
                    <hr>
                    <h4 align="center" class="alert alert-success">{{session('successCreateCategory')}}</h4>
                    <hr>
                @endif
                    @if (session('successUpdateCategory'))
                        <hr>
                        <h4 align="center" class="alert alert-success">{{session('successUpdateCategory')}}</h4>
                        <hr>
                    @endif
                    @if (session('successDeleteCategory'))
                        <hr>
                        <h4 align="center" class="alert alert-info">{{session('successDeleteCategory')}}</h4>
                        <hr>
                    @endif
                @if($count_categories >0 )
                    <table align="center" class="table">
                        <h3 class="table table-hover">لیست دسته بندی ها</h3>
                        <thead>
                        <tr>
                            <th>کد دسته بندی</th>
                            <th>نام</th>
                            <th>نام مستعار</th>
                            <th colspan="2">عملیات لازم</th>
                        </tr>
                        </thead>
                        @foreach($categories as $category)

                            <tbody>
                            <tr>
                                <th>{{$category->id}}</th>
                                <th>{{$category->name}}</th>
                                <th>{{$category->slug}}</th>

                                <th><a href="{{route('admin.category.edit',$category->slug)}}" class="btn btn-outline-primary btn-success">ویرایش</a></th>
                                <th>
                                    <form action="{{route('admin.category.delete',$category->id)}}" method="post">
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

                        {{$categories->links()}}
                        <hr>
                        <h4 style="margin-left: 300px"><a href="{{route('admin.category.create')}}" class="btn btn-outline-primary btn-secondary btn-block">ایجاد دسته بندی +</a></h4>
                    </div>
                @else
                    <h3 align="center">دسته بندی وجود ندارد</h3>
                    <h4><a href="{{route('admin.category.create')}}"  class="btn btn-outline-primary btn-secondary btn-block">ایجاد دسته بندی +</a></h4>
                @endif
                <hr>

            </div>
        </div>
    </div>

@endsection


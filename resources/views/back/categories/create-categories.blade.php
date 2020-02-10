@extends('back.index')
@section('title, مدیریت وبلاگ')
    ادمین پنل-مدیریت کاربران
@endsection
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-8  " style="margin-top:80px ">
                <form action="{{route('admin.category.store')}}" method="post">
                    {{csrf_field()}}
                    <fieldset style="margin-top: 10px;margin-right: 300px">
                        <legend style="margin-top: 10px "><h4 align="center" >لطفا فیلد های مربوطه را کامل نمایید</h4></legend>

                        <div class="form-group">
                            <label for="exampleInputEmail1">نام دسته بندی</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{old('name')}}"  name="name">
                            @error('name')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام مستعار دسته بندی</label>
                            <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="exampleInputEmail1" value="{{old('slug')}}"  name="slug">
                            @error('slug')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-block btn-outline-success btn-info" value="ثبت دسته بندی">
                        <a href="{{route('admin.categories.index')}}"  class="btn btn-block btn-outline-secondary btn-success"  >برگشت</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection


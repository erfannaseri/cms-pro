@extends('back.index')
@section('title, مدیریت وبلاگ')
    ادمین پنل-مدیریت کاربران
@endsection
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-8  " style="margin-top:80px ">
                @if (session('successUpdateCategory'))
                    <div class="alert alert-success ">{{session('successUpdateCategory')}}</div>
                @endif
                @foreach($category as $c)
                <form action="{{route('admin.category.update',$c->id)}}" method="post">
                    {{csrf_field()}}
                    @method('PUT')
                    <fieldset style="margin-top: 10px;margin-right: 300px">
                        <legend style="margin-top: 10px "><h4 align="center" >لطفا فیلد های مربوطه را کامل نمایید</h4></legend>

                        <div class="form-group">
                            <label for="exampleInputEmail1">نام دسته بندی</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{$c->name}}"  name="name">
                            @error('name')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام مستعار دسته بندی</label>
                            <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="exampleInputEmail1" value="{{$c->slug}}"  name="slug">
                            @error('slug')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                            @if (session('slugError'))
                                <div class="alert alert-danger ">{{session('slugError')}}</div>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-block btn-outline-success btn-info" value="بروز رسانی دسته بندی">
                        <a href="{{route('admin.categories.index')}}"  class="btn btn-block btn-outline-secondary btn-success"  >برگشت</a>
                    </fieldset>
                </form>
                    @endforeach
            </div>
        </div>
    </div>

@endsection


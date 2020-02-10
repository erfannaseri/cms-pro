@extends('back.index')
@section('title, مدیریت وبلاگ')
    ادمین پنل-ایجاد مقاله جدید
@endsection
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-12"  style="margin-top:10px ">

                <form action="{{route('admin.articles.update',$article->slug)}}" method="post">
                    {{csrf_field()}}
                    @method('PUT')"
                    <fieldset style="margin-top: 10px">
                        <legend style="margin-top: 10px "><h4 align="center" >لطفا فیلد های مربوطه را کامل نمایید</h4></legend>

                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان مقاله</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{$article->name}}"  name="name">
                            @error('name')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام مستعار مقاله</label>
                            <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="exampleInputEmail1"  value="{{$article->slug}}" name="slug">
                            @error('slug')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                            @if (session('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="content">محتوای مقاله
                            </label>
                            <textarea name="content" id="content" cols="30" rows="10"
                                      class="form-control @error('content') is-invalid @enderror"
                            >{{$article->content}}</textarea>
                            @error('content')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect2">دسته بندی ها</label>
                            <div id="output"></div>
                            <select  name="categories[]" class="chosen-select" id="exampleSelect2" multiple style="width: 400px;">
                                @foreach($categories as $category)
                                    <option @php if ($category->slug){echo 'selected';} @endphp value="{{$category->id}}">{{$category->slug}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group">
                        <span class="input-group-btn">
                            <a href="#" id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> انتخاب
                            </a>
                        </span>
                            <input id="image" class="form-control" type="text" name="image" value="{{$article->image}}">
                        </div>
                            <img src="{{$article->image}}" id="holder" style="margin-top:15px;max-height:100px;">

                        <p>ویراستار : {{Auth::user()->name}}</p>
                        <input type="submit" class="btn btn-block btn-outline-success btn-info" value="ثبت مقاله">
                        <a href="{{route('admin.articles.index')}}"  class="btn btn-block btn-outline-secondary btn-success"  >برگشت</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection


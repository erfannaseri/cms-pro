@extends('back.index')
@section('title')
    ادمین پنل-ویرایش  نمونه کار {{$portfolio->id}}
@endsection
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-12  " style="margin-top:10px ">
                @if (session('error'))
                    <h4 align="center" class="alert alert-success">{{session('error')}}</h4>
                @endif
                <form action="{{route('admin.portfolios.update',$portfolio->id)}}" method="post">
                    {{csrf_field()}}
                    @method('PUT')
                    <fieldset style="margin-top: 10px">
                        <legend style="margin-top: 10px "><h4 align="center" >لطفا فیلد های مربوطه را ویرایش نمایید</h4></legend>

                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان نمونه کار</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{$portfolio->name}}"  name="name">
                            @error('name')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">جزییات نمونه کار
                            </label>
                            <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control @error('description') is-invalid @enderror"
                            >{{$portfolio->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLink1">لینک نمونه کار </label>
                            <input type="text" class="form-control  @error('link') is-invalid @enderror" id="exampleInputEmail1" value="{{$portfolio->link}}"  name="link">
                            @error('link')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect2">تگ ها</label>
                            <div id="output"></div>
                            <select  name="tag" class="chosen-select" id="exampleSelect2" style="width: 400px;">

                                    <option value="App">اپلیکیشن</option>
                                    <option value="Card">گرافیک</option>
                                    <option value="Web">وب سایت</option>

                            </select>
                        </div>
                        <div class="input-group">
                        <span class="input-group-btn">
                            <a href="#" id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> انتخاب
                            </a>
                        </span>
                            <input id="image" class="form-control" type="text" name="image">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                        <hr>
                        <p>ویراستار : {{Auth::user()->name}}</p>
                        <input type="submit" class="btn btn-block btn-outline-success btn-info" value="ویرایش نمونه کار">
                        <a href="{{route('admin.portfolios.index')}}"  class="btn btn-block btn-outline-secondary btn-success"  >برگشت</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection


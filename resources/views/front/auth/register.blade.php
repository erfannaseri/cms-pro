@extends('front.index')

@section('title')
    ثبت نام کاربران
@endsection

@section('main')

    <div class="container"  >
        <div class="row" >
            <div class="col-6 offset-1" >

                <form action="{{route('register')}}" method="post"  >
                    {{csrf_field()}}
                    <fieldset style="margin-top: 100px">
                        <legend style="margin-top: 10px "><h4 align="center" >فرم ثبت نام</h4></legend>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{old('name')}}" name="name"  placeholder="نام ...">
                            @error('name')
                                <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">آدرس آیمیل</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{old('email')}}"  name="email" placeholder="example@id.com">
                            @error('email')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">رمز عبور</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" placeholder="1234!@#$?">
                            @error('password')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">تکرار رمز عبور </label>
                            <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword1"  name="password_confirmation" placeholder="1234!@#$?">
                            @error('password_confirmation')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">ثبت نام</button>
                        <a href="#" class="btn btn-secondary ">قبلا عضو شده ای؟</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">وبلاگ رسمی برنامه نویسان جوان</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">صفحه اصلی <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">تیم وب سایت</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('articles.index')}}">مطالب سایت</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">درباره ما</a>
            </li>
            @auth()

                <li >
                    <a href="{{route('user.show',Auth::user()->name)}}" class="btn btn-outline-dark">پروفایل کاربری</a>
                </li>

                @if(Auth::user()->role == 1)
                    <li >
                        <a href="{{route('admin.index')}}" target="_blank" class="btn btn-outline-warning">مدیریت وب سایت</a>
                    </li>
                 @endif
                <li>
                    <form action="{{route('logout')}}" method="post">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">خروج</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{route('register')}}" class="btn btn-outline-dark">ثبت نام</a>
                </li>
                <li  >
                    <a href="{{route('login')}}" class="btn btn-outline-secondary">ورود</a>
                </li>
            @endauth
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="عنوان مورد نظرتو سرچ کن">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">جستجو</button>
        </form>
    </div>
</nav>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="photos/1/images.png" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">ابوالفضل طالبی</p>
                    <p class="designation">مدیریت سایت</p>
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">

                <span class="menu-title">کنترل پنل</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">المان ها</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.user.index')}}">کاربران</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">دسته بندی ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.articles.index')}}">مقالات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.comments.index')}}">نظرات</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">ابزار ها</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.portfolios.index')}}"> نمونه کار ها </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/login.html"> سوالات متداول </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/register.html">خدمات ما </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/error-404.html">اعضای تیم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>

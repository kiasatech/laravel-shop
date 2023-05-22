<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow " data-scroll-to-active="true" data-img="../../../app-{{ asset('') }}admin/assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a style="cursor: default" class="navbar-brand" href="#"><img class="brand-logo" alt="Chameleon admin logo" src="{{ asset('') }}admin/assets/images/logo/logo.png" />
                    <h3 class="brand-text">مدیر محترم خوش آمدید</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{ route('admin.index') }}"><i class="ft-home"></i><span class="menu-title" data-i18n="">داشبورد</span></a>
                {{--<ul class="menu-content">
                    <li class="active"><a class="menu-item" href="index.php">صفحه اصلی</a></li>
                    <li><a class="menu-item" href="login.php">ورود به حساب کاربری</a></li>
                </ul>--}}
            </li>
            <hr>

            <li class=" nav-item"><a href="#"><i class="ft-shopping-cart"></i><span class="menu-title" data-i18n="">محصولات</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('products.index') }}">لیست محصولات</a></li>
                    <li><a class="menu-item" href="{{ route('products.create') }}">افزودن محصول</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-shopping-cart"></i><span class="menu-title" data-i18n="">سفارشات</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('orders.index') }}">لیست سفارشات</a></li>
                    <li><a class="menu-item" href="{{ route('orders.create') }}">سفارش جدید</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title" data-i18n="">مدیریت کاربران</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('users.index') }}">لیست کاربران</a></li>
                    <li><a class="menu-item" href="{{ route('users.index') }}">افزودن کاربر</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-layers"></i><span class="menu-title" data-i18n="">دسته بندی ها</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('categories.index') }}">لیست دسته بندی ها</a></li>
                    <li><a class="menu-item" href="{{ route('categories.create') }}">افزودن دسته بندی</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-file-text"></i><span class="menu-title" data-i18n="">مدیریت اسلایدر</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('sliders.index') }}">لیست تصاویر اسلایدر</a></li>
                    <li><a class="menu-item" href="addslide.php">افزودن تصویر</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-file-text"></i><span class="menu-title" data-i18n="">مدیریت پوسترها</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('posters.index') }}">لیست پوستر ها</a></li>
                    <li><a class="menu-item" href="{{ route('posters.create') }}">افزودن پوستر</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-tag"></i><span class="menu-title" data-i18n="">برچسب ها</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('tags.index') }}">لیست برچسب ها</a></li>
                    <li><a class="menu-item" href="#">افزودن نظر</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-tag"></i><span class="menu-title" data-i18n="">نظرات کاربران</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('comments.index') }}">لیست نظرات</a></li>
                    <li><a class="menu-item" href="{{ route('comments.create') }}">افزودن نظر</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-mail"></i><span class="menu-title" data-i18n="">صندوق پیام ها</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#">پیام های من</a></li>
                    <li><a class="menu-item" href="#">ایجاد پیام جدید</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-edit"></i><span class="menu-title" data-i18n="">اکانت مدیریت</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#">لیست مدیران سایت</a></li>
                    <li><a class="menu-item" href="#">افزودن مدیر جدید</a></li>
                </ul>
            </li>

            <hr>


            <li class=" nav-item"><a href="{{ route('home.index') }}"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">نمایش سایت</span></a>
            </li>

            <li class=" nav-item"><a href="#"><i class="ft-link"></i><span class="menu-title" data-i18n="">وبلاگ شخصی من</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="ft-log-out"></i><span class="menu-title" data-i18n="">خروج از پنل کاربری</span></a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </ul>
    </div>
</div>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport' />
    <title>
        @yield('title')
    </title>

    <!--font------------------------------------>
    <link rel="stylesheet" href="{{ asset('assets/icon/css/all.min.css') }}">

    <!--bootstrap------------------------------->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!--owl.carousel---------------------------->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!--responsive------------------------------>
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!--main style------------------------------>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.cart.css') }}">
</head>

<body>
@if(!request()->is('login', 'register'))
<!--header------------------------------------->
<header>
    <div class="container-main">
        <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
            <div class="header-right">
                <div class="logo">
                    <a href="index.html">
                        <h2 style="margin-top: 10px;">فروشگاه ماندورا</h2>
                    </a>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12 pull-right">
                    <div class="search-header">
                        @include('home.search')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
            @auth
            <div class="header-left">
                <ul class="nav-lr">
                    <li class="nav-item-account">
                        <a href="#">
                            <img src="{{ Gravatar::get( auth()->user()->email ) }}" class="rounded-circle" width="34" alt="user">
                            {{ auth()->user()->name }}
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="dropdown-menu-item">
                                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            <i class="mdi mdi-account-card-details-outline"></i>
                                            خروج
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            @else
                <div class="header-left text-left">
                    <a href="{{ route('login') }}" class="btn btn-primary ml-3">ورود</a>
                    <a href="{{ route('register') }}" class="btn btn-primary ml-3">ثبت نام</a>
                </div>
            @endauth
        </div>
        <div class="overlay-search-box"></div>
    </div>
    <!--        menu------------------------------->
    <nav class="main-menu">
        <div class="container-main">
            <div>
                <ul class="list-menu">
                    <li class="item-list-menu megamenu">
                        <a href="{{ route('home.index') }}" class="list-category">خانه</a>
                    </li>
                    @foreach($categories as $category)
                    <li class="item-list-menu megamenu lp-drop">
                        <a href="{{ $category->parents()->count() ? '#' : $category->id }}">
                            {{ $category->name }}
                            @if($category->parents()->count())
                                <i class="fa fa-angle-down" style="font-size: 12px"></i>
                            @endif
                        </a>
                        @if($category->parents()->count())
                        <div class="dropdown-menu dlp-menu"><a href="#">
                            </a>
                            <ul><a href="#">
                                </a>
                                @foreach($category->parents as $parent)
                                <li><a href="#">
                                    </a><a href="{{ route('home.category', $parent->id) }}" class="dropdown-item">
                                        <i class="mdi mdi-account-card-details-outline"></i>
                                        {{ $parent->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </li>
                    @endforeach

                    <li class="item-list-menu megamenu">
                        <a href="#" class="list-category">درباره ما</a>
                    </li>
                    <li class="item-list-menu megamenu">
                        <a href="#" class="list-category">تماس با ما</a>
                    </li>
                    <li class="nav-item-account nav-item-cart">
                        <a href="#">
                            <i class="fa-duotone fa-basket-shopping-simple"></i>
                            سبد خرید
                            @if(Cart::getContent()->count())
                            <span class="count">{{Cart::getContent()->count()}}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu-cart">
                            <div class="dropdown-header">
                                <a href="#" class="view-cart">مشاهده سبد خرید</a>
                            </div>
                            <div class="wrapper">
                                <div class="scrollbar" id="style-1">
                                    <div class="force-overflow">
                                        <ul class="dropdown-list">
                                            @foreach($itemCarts as $item)
                                            <a href="{{ route('home.product', $item->attributes->slug) }}">
                                                <li class="dropdown-item">
                                                    <div class="title-cart">
                                                        <img src="{{ asset('storage/'.$item->attributes->image) }}">
                                                        <h3>{{ $item->name }}</h3>
                                                        <div class="price">{{ number_format($item->price) }}
                                                            <span>تومان</span>
                                                        </div>
                                                        <button class="btn-delete">
                                                            <span class="mdi mdi-close"></span>
                                                        </button>
                                                    </div>
                                                </li>
                                            </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-dropdown">
                                <div class="amount-total-buy">
                                    <div class="price">
                                        <span class="total">مبلغ کل خرید :</span>
                                        <span class="toman">
                                            @if(empty(Cart::getTotal()))
                                                محصولی اضافه نشده
                                            @else
                                                {{number_format(Cart::getTotal())}} <span>تومان</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                @if(Cart::getContent()->count())
                                    <a href="{{ route('home.cart') }}" class="checkout">تسویه حساب</a>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="nav-btn nav-slider">
            <span class="linee1"></span>
            <span class="linee2"></span>
            <span class="linee3"></span>
        </div>
    </nav>
    <!--        menu------------------------------->

    <!--    menu-responsiver----------------------->
    <nav class="sidebar">
        <div class="nav-header">
            <!--              <img class="pic-header" src="images/header-pic.jpg" alt="">-->
            <div class="header-cover"></div>
            <div class="logo-wrap">
                <a class="logo-icon" href="#"><img alt="logo-icon" src="{{ asset('/') }}assets/images/cryptonlogo.svg"
                                                   width="40"></a>
            </div>
        </div>
        <ul class="nav-categories ul-base">
            <li><a href="#">فروشگاه</a></li>
            <li><a href="#">محصولات</a></li>
            <li><a href="#">ثبت فروشگاه</a></li>
            <li><a href="#">مقالات</a></li>
            <li><a href="#">درباره ما</a></li>
            <li><a href="#">تماس با ما</a></li>
        </ul>
    </nav>
    <div class="overlay"></div>
    <!--    menu-responsiver----------------------->

</header>
<div class="nav-categories-overlay"></div>
<!--header------------------------------------->
@endif
<!--    slider--------------------------------->

@yield('content')

@if(!request()->is(['login', 'register']))
<!--footer------------------------------------->
<footer class="footer mt-3">
    <div class="row">
        <div class="footer-jumpup">
            <div class="container">
                <a href="#">
                    <span href="#" class="footer-jumpup-container"><i class="fa fa-angle-up"></i></span>
                </a>
            </div>
        </div>
    </div>
    <article class="container-main">
        <div class="footer-more-info">
            <div class="footer-description-content">
                <div class="col-xs-8 col-md-8 col-xs-12 pull-right">
                    <div class="footer-content">
                        <article class="footer-seo mt-3">
                            <h1>فروشگاه اینترنتی ماندورا، بررسی، انتخاب و خرید آنلاین</h1>
                            <p>ماندورا به عنوان یکی از قدیمی‌ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه،
                                با پایبندی به سه اصل، پرداخت در محل، 7 روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا
                                موفق شده تا همگام با فروشگاه‌های معتبر جهان، به بزرگ‌ترین فروشگاه اینترنتی ایران
                                تبدیل شود. به محض ورود به سایت ماندورا با دنیایی از کالا رو به رو می‌شوید! هر
                                آنچه که نیاز دارید و به ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.</p>
                        </article>
                    </div>
                    <div class="footer-community">
                        <div class="footer-social mb-4 mt-4">
                            <span>ماندورا را در شبکه‌های اجتماعی دنبال کنید:</span>
                            <div class="footer-social">
                                <ul class="footer-ul-social">
                                    <li class="footer-social-item">
                                        <a href="#" class="footer-social-link">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="footer-social-item">
                                        <a href="#" class="footer-social-link">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="footer-social-item">
                                        <a href="#" class="footer-social-link">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li class="footer-social-item">
                                        <a href="#" class="footer-social-link">
                                            <i class="fa-brands fa-telegram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                        <aside>
                            <ul class="footer-safety-partner mt-4 pull-left">
                                <li class="footer-safety-partner-1">
                                    <a href="#">
                                        <img src="{{ asset('/') }}assets/images/L-2.png">
                                    </a>
                                </li>
                                <li class="footer-safety-partner-1">
                                    <a href="#">
                                        <img src="{{ asset('/') }}assets/images/L-1.png">
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="footer-copyright-text">
                استفاده از مطالب فروشگاه اینترنتی ماندورا فقط برای مقاصد غیرتجاری و با ذکر منبع
                بلامانع است. کلیه حقوق این سایت متعلق به شرکت کیاساتک (فروشگاه آنلاین ماندورا) می‌باشد.
            </div>
        </div>
    </article>
</footer>
<!--footer------------------------------------->
@endif
</body>
<!--jquery--------------------------------------->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--bootstrap-------------------------------->
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<!--    owl.carousel----------------------------->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!--main----------------------------------------->
<script src="{{ asset('assets/js/main.js') }}"></script>

</html>

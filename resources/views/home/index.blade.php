@extends('layouts.app')

@section('title', 'فروشگاه اینترنتی ماندورا')

@section('content')
    <article class="container-main">
        <div class="page-row-main-top">
            <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
                <div class="main-slider-container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($sliders as $key => $slider)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ ($key == 0) ? 'active' : ''}}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($sliders as $key => $slider)
                            <div class="carousel-item {{ ($key == 0) ? 'active' : ''}}">
                                <img class="d-block w-100" src="{{ asset('storage/'.$slider->image) }}" alt="First slide">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <i class="fa-duotone fa-chevrons-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <i class="fa-duotone fa-chevrons-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--    slider--------------------------------->
            <!--adplacement-------------------------------->
            <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                <aside class="adplacement-container-column">
                    <a href="{{ $posters[0]->url }}" class="adplacement-item adplacement-item-column">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[0]->image) }}">
                        </div>
                    </a>
                    <a href="{{ $posters[1]->url }}" class="adplacement-item adplacement-item-column">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[1]->image) }}">
                        </div>
                    </a>
                </aside>
            </div>
        </div>
        <!--adplacement-------------------------------->

        <!--    product-slider------------------------->
        <div class="col-lg-9 col-md-9 col-xs-12 pull-right">
            <div class="section-slider-product mb-4 mt-3">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">جدید ترین ها</span>
                        <h3 class="card-title">مشاهده همه</h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach($products as $product)
                                    <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="{{ route('home.product', $product->slug) }}">
                                            <div class="stars-plp">
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                            </div>
                                            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="{{ route('home.product', $product->slug) }}">
                                                {{ $product->title_fa }}
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <ins>
                                                <span>{{ number_format($product->price) }} <span>تومان</span></span>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--    product-slider------------------------->
        <!--slider-sidebar----------------------------->
        <div class="col-lg-3 col-md-3 col-xs-12 pull-left">
            <div class="promo-single mb-4 mt-3">
                <div class="widget-suggestion widget card">
                    <header class="card-header cart-sidebar">
                        <h3 class="card-title ts-3">پیشنهادهای لحظه‌ای</h3>
                    </header>
                    <div id="progressBar">
                        <div class="slide-progress" style="width: 100%; transition: width 5000ms ease 0s;"></div>
                    </div>
                    <div id="suggestion-slider" class="owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(1369px, 0px, 0px); transition: all 0.25s ease 0s; width: 2190px;">
                                @foreach($offers as $offer)
                                <div class="owl-item cloned" style="width: 273.75px;">
                                    <div class="item">
                                        <a href="{{ route('home.product', $offer->slug) }}">
                                            <img src="{{ asset('storage/'.$offer->image) }}" class="w-100" alt="">
                                        </a>
                                        <h3 class="product-title">
                                            <a href="{{ route('home.product', $offer->slug) }}"> {{ $offer->title_fa }} </a>
                                        </h3>
                                        <div class="price">
                                            <span class="amount">{{ number_format($offer->price) }} <span>تومان</span></span>
                                            <div class="stars-plp">
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                                                                   class="owl-next"><span aria-label="Next">›</span></button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--slider-sidebar----------------------------->

        <!--    adplacemen-container----------------------------->
        <div class="col-12">
            <div class="adplacement-container-row mb-4">
                <div class="col-6 col-lg-3 pull-right" style="padding-left:0;">
                    <a href="{{ $posters[2]->url }}" class="adplacement-item mb-4">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[2]->image) }}" alt="خرید خانه - نوشیدنی" title="خرید خانه - نوشیدنی">
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-3 pull-right" style="padding-left:0;">
                    <a href="{{ $posters[3]->url }}" class="adplacement-item mb-4">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[3]->image) }}" alt="خرید خانه - پروتئینی" title="خرید خانه - پروتئینی">
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-3 pull-right" style="padding-left:0;">
                    <a href="{{ $posters[4]->url }}" class="adplacement-item mb-4">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[4]->image) }}" alt="داده پرداز" title="داده پرداز">
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-3 pull-right" style="padding-left:0;">
                    <a href="{{ $posters[5]->url }}" class="adplacement-item mb-4">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[5]->image) }}" alt="خرید خانه - شوینده و سلولزی"
                                 title="خرید خانه - شوینده و سلولزی">
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                    <a href="{{ $posters[6]->url }}" class="adplacement-item">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[6]->image) }}" alt="باراد" title="باراد">
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                    <a href="{{ $posters[7]->url }}" class="adplacement-item">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[7]->image) }}" alt="پارس حیان" title="پارس حیان">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--    adplacemen-container----------------------------->

        <!--    product-slider----------------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">محبوب ترین ها</span>
                        <h3 class="card-title">مشاهده همه</h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach($randoms as $random)
                                    <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="{{ route('home.product', $random->slug) }}">
                                            <img src="{{ asset('storage/'.$random->image) }}" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="{{ route('home.product', $random->slug) }}">
                                                {{ $random->title_fa }}
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <ins>
                                                <span>{{ number_format($random->price) }} <span>تومان</span></span>
                                                <div class="stars-plp">
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                </div>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--    product-slider------------------------->

        <!--    adplacemen-container----------------------------->
        <div class="col-12">
            <div class="adplacement-container-row mb-4">

                <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                    <a href="{{ $posters[8]->url }}" class="adplacement-item">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[8]->image) }}" alt="پوشاک ورزشی مردانه" title="پوشاک ورزشی مردانه">
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                    <a href="{{ $posters[9]->url }}" class="adplacement-item">
                        <div class="adplacement-sponsored-box">
                            <img src="{{ asset('storage/'.$posters[9]->image) }}" alt="نوشت افزار" title="نوشت افزار">
                        </div>
                    </a>
                </div>

            </div>
        </div>
        <!--    adplacemen-container----------------------------->

        <!--    product-slider------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">پرفروش ترین‌ها</span>
                        <h3 class="card-title">مشاهده همه</h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach($bSellers as $bSeller)
                                    <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="{{ route('home.product', $bSeller->slug) }}">
                                            <img src="{{ asset('storage/'.$bSeller->image) }}" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="{{ route('home.product', $bSeller->slug) }}">
                                                {{ $bSeller->title_fa }}
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <ins>
                                                <span>{{ number_format($bSeller->price) }} <span>تومان</span></span>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--    product-slider------------------------->
    </article>
@endsection

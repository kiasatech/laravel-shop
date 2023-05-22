@extends('layouts.app')

@section('title', $product->title_fa)

@section('content')
    <div class="nav-categories-overlay"></div>
    <!--header------------------------------------->

    <!--single-product----------------------------->
    <div class="container-main">
        <div class="col-12">
            <div class="breadcrumb-container">
                <ul class="js-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home.index') }}" class="breadcrumb-link">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link">{{ $product->category->name }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="breadcrumb-link active-breadcrumb" onclick="event.preventDefault()">{{ $product->title_fa }}</a>
                    </li>
                </ul>
            </div>
            <article class="product">
                <div class="col-lg-4 col-xs-12 pb-5 pull-right">
                    <!-- Product Options-->
                    <div class="product-gallery">
                        <div>
                            <img src="{{ asset('storage/'.$product->image) }}" alt="Product" class="img-pro">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xs-12 pull-right">
                    <section class="product-info">
                        <div class="product-headline">
                            <h1 class="product-title">
                                {{ $product->title_fa }}
                                <span class="product-title-en">{{ $product->title_en }}</span>
                            </h1>
                        </div>
                        <div class="product-attributes">
                            <div class="col-lg-6 col-xs-12 pull-right">
                                <div class="product-config">
                                    <div class="product-config-wrapper">
                                        <div class="product-directory">
                                            <ul>
                                                <li>
                                                    <span>برند</span>
                                                    :
                                                    <a href="#" class="product-brand-title">{{ $product->brand }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-params">
                                            <ul>ویژگی‌های محصول
                                                @php
                                                    $explode = explode('-', $product->options)
                                                @endphp

                                                @foreach($explode as $key => $option)
                                                    <li @if($key > 2) class="product-params-more" @endif>
                                                        <span>{{ $option }}</span>
                                                    </li>
                                                @endforeach

                                                <li class="product-params-more-handler">
                                                    <a href="#" class="more-attr-button">
                                                        <span class="show-more">+ موارد بیشتر</span>
                                                        <span class="show-less">- بستن</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xs-12 pull-left">
                                <div class="product-summary">
                                    <div class="product-seller-info">
                                        <div class="seller-info-changable">
                                            <div class="product-seller-row vendor">
                                                <span class="title"> فروشنده:</span>
                                                <a href="#" class="product-name">{{ $product->seller }}</a>
                                            </div>
                                            <div class="product-seller-row guarantee">
                                                <span class="title"> گارانتی:</span>
                                                <a href="#" class="product-name">{{ $product->garanty }}</a>
                                            </div>
                                            <div class="product-seller-row guarantee">
                                                <span class="title"> تعداد:</span>
                                                <a href="#" class="product-name">3</a>
                                            </div>
                                            <div class="product-seller-row price last_item">
                                                <div class="product-seller-price-info price-value mb-3">
                                                    <span class="title"> قیمت:</span>
                                                </div>
                                                <div class="product-seller-price-info price-value mb-3">
                                                    <span class="amount text-danger">
                                                        {{ number_format($product->price) }}
                                                        <span>تومان</span>
                                                    </span>
                                                </div>
                                            </div><br>
                                            <div class="parent-btn">
                                                <form action="{{ route('carts.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$product->id}}" name="id">
                                                    <input type="hidden" value="{{$product->title_fa}}" name="name">
                                                    <input type="hidden" value="{{$product->garanty}}" name="garanty">
                                                    <input type="hidden" value="{{$product->seller}}" name="seller">
                                                    <input type="hidden" value="{{$product->price}}" name="price">
                                                    <input type="hidden" value="{{$product->slug}}" name="slug">
                                                    <input type="hidden" value="{{$product->image}}" name="image">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <button class="dk-btn dk-btn-info at-c as-c">
                                                        افزودن به سبد خرید
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </article>
        </div>
        <!--    product-slider----------------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4 mt-3">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">محصولات مشابه</span>
                        <h3 class="card-title">مشاهده همه</h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1493px;">
                                @foreach($similars as $similar)
                                    <div class="owl-item active" style="width: 203.25px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="{{ route('home.product', $similar->slug) }}">
                                            <div class="stars-plp">
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                            </div>
                                            <img src="{{ asset('storage/'.$similar->image) }}" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="{{ route('home.product', $similar->slug) }}">
                                                {{ $similar->title_fa }}
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <ins>
                                                <span>{{ number_format($similar->price) }} <span>تومان</span></span>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i
                                    class="fa fa-angle-right"></i></button><button type="button" role="presentation"
                                                                                   class="owl-next"><i class="fa fa-angle-left"></i></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--    product-slider------------------------->
        <div class="col-12">
            <div class="tabs mt-4 pt-3 mb-5">
                <div class="tabs-product">
                    <div class="tab-wrapper">
                        <ul class="box-tabs">
                            <li class="box-tabs-tab tabs-active">
                                <p class="box-tab-item">
                                    <i class="mdi mdi-glasses"></i>
                                    نقد و بررسی</p>
                            </li>

                            <li class="box-tabs-tab">
                                <p class="box-tab-item">
                                    <i class="mdi mdi-comment-question-outline"></i>
                                    پرسش و پاسخ</p>
                            </li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="content-expert">
                            <section class="tab-content-wrapper" style="display:block;">
                                <article>
                                    <h2 class="params-headline">نقد و بررسی
                                        <span>{{ $product->title_fa }}</span>
                                    </h2>
                                    <section class="content-expert-summary">
                                        <div class="mask pm-3">
                                            <div class="mask-text">
                                                <p>{{ $product->desc }}</p>
                                            </div>
                                            <a href="#" class="mask-handler">
                                                <span class="show-more">+ ادامه مطلب</span>
                                                <span class="show-less">- بستن</span>
                                            </a>
                                            <div class="shadow-box"></div>
                                        </div>
                                    </section>


                                </article>
                            </section>

                            <section class="tab-content-wrapper">
                                <div class="faq-headline">
                                    نظرات
                                    <span>نظر خود را درمورد محصول مطرح فرمایید</span>
                                </div>
                                <div class="form-faq">
                                    @if(session()->has('success'))
                                        <div class="alert alert-info text-center">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    @auth()
                                        <form action="{{ route('comment', $product->id) }}" method="post">
                                            @csrf
                                            <div class="form-faq-row mt-3">
                                                <div class="form-faq-col">
                                                    <div class="ui-textarea">
                                                        <textarea title="متن سوال" name="contents" class="ui-textarea-field"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-faq-row mt-3">
                                                <div class="form-faq-col form-faq-col-submit">
                                                    <button class="btn-tertiary">ثبت نظر</button>
                                                </div>

                                            </div>
                                        </form>
                                    @else
                                        <div class="alert alert-success text-center">برای ارسال نظر ابتدا وارد شوید</div>
                                    @endauth
                                </div>
                                <div id="product-questions-list">
                                    @foreach($product->comments as $comment)
                                        <div class="questions-list">
                                            <ul class="faq-list">
                                                <li class="is-question">
                                                    <div class="section">
                                                        <div class="faq-header">
                                                            <img src="{{ Gravatar::get($comment->user->email, ['size'=>40]) }}" alt="" class="rounded-circle">
                                                            <p class="h5">
                                                                <span>{{ $comment->user->name }}</span>
                                                            </p>
                                                        </div>
                                                        <p class="mt-4">{{ $comment->content }}</p>
                                                        <div class="faq-date">
                                                            <em>{{$comment->created_at->diffForHumans()}}</em>
                                                        </div>
{{--                                                        <a href="#" class="js-add-answer-btn">به این پرسش پاسخ دهید</a>--}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        @if($comment->replies()->count())
                                            @foreach($comment->replies as $reply)
                                                    <div class="questions-list answer-questions">
                                                        <ul class="faq-list">
                                                            <li class="is-question">
                                                                <div class="section">
                                                                    <div class="faq-header">
                                                                        <img src="{{ Gravatar::get($reply->user->email, ['size'=>40]) }}" alt="" class="rounded-circle">
                                                                        <p class="h5">
                                                                            <span>{{ $reply->user->name }}</span>
                                                                        </p>
                                                                    </div>
                                                                    <p class="mt-4">{{ $reply->content }}</p>
                                                                    <div class="faq-date">
                                                                        <em>{{$reply->created_at->diffForHumans()}}</em>
                                                                    </div>
{{--                                                                     <a href="#" class="js-add-answer-btn">به این پرسش پاسخ دهید</a>--}}
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--single-product----------------------------->
@endsection

@extends('layouts.app')

@section('title', 'محصولات مربوط به دسته بندی '.$category->name)

@section('content')
    <article class="container-main">
        <!--    product-slider------------------------->

            <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4 mt-3 px-4 py-3">
                <div class="widget widget-product card">
                    @if($category->products()->count())
                        <header class="card-header mt-2">
                        <span class="title-one mr-2">{{ 'دسته بندی '.$category->name }}</span>
                        <h3 class="card-title">مشاهده همه</h3>
                    </header>
                        <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach($category->products as $product)
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
                    @else
                        <div class="alert alert-primary mb-0">درحال حاضر محصولی در این دسته بندی وجود ندارد!</div>
                    @endif
                </div>
            </div>
        </div>

        <!--    product-slider------------------------->
    </article>
@endsection

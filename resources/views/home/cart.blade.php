@extends('layouts.app')

@section('title', 'سبد خرید')

@section('content')
<section class="main-cart container">
    <div class="o-page__content">
        @if(session()->has('success'))
            <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
        @endif

        @if(session()->has('unSuccess'))
            <div class="alert alert-danger text-center">{{ session()->get('unSuccess') }}</div>
        @endif
{{--{{ dd($itemCarts->All()) == [] }}--}}

        <div class="o-headline">
            <div id="main-cart"><span class="c-checkout-text c-checkout__tab--active">سبد خرید</span><span
                    class="c-checkout__tab-counter">{{Cart::getContent()->count()}}</span></div>
        </div>
            @if($itemCarts->All() == [])
                <div class="alert alert-primary text-center mb-3">محصولی در سبد خرید شما وجود ندارد!</div>
            @endif
        <div class="c-checkout">
            <ul class="c-checkout__items">
                @php
                    $price = 0;
                    if (empty(Cart::getTotal()) || Cart::getTotal() >= 2000000){
                        $price = 0;
                    }else{
                        $price = 20000;
                    }
                @endphp
                <li class="c-checkout__item">
                    @foreach($itemCarts as $item)
                        <div class="c-checkout__row">
                            <div class="c-checkout__col--thumb">
                                <a href="{{ route('home.product', $item->attributes->slug) }}"><img src="{{ asset('storage/'.$item->attributes->image) }}" alt=""></a>
                            </div>
                            <div class="c-checkout__col--desc">

                                <form action="{{ route('carts.remove-cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button class="btn btn-sm btn-danger float-left">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                                <a href="{{ route('home.product', $item->attributes->slug) }}">{{$item->name}}</a>
                                <p class="c-checkout__guarantee">{{ $item->attributes->garanty }}</p>
                                <p class="c-checkout__dealer"> فروشنده: {{ $item->attributes->seller }}</p>
                                <div class="c-checkout__variant c-checkout__variant--color"></div>
                                <div class="c-checkout__col--information">
                                    <div class="c-checkout__col c-checkout__col--counter">
                                        <div class="c-cart-item__quantity-row">
                                            @php
                                                $rNum = rand(1000,9999);
                                            @endphp
                                            <form id="submit-form{{$rNum}}" action="{{ route('carts.cart-update') }}" method="post">
                                                @csrf
                                                <div class="c-quantity-selector">
                                                    <button type="button" class="c-quantity-selector__add"
                                                            onclick="changeQuantity(event,{{$rNum}})">
                                                        <i class="fa fa-plus"></i>
                                                    </button>

                                                    <div  class="c-quantity-selector__number quan{{$rNum}}">{{ $item->quantity }}</div>

                                                    <input type="hidden" name="id" value="{{$item->id}}">

                                                    <input type="hidden" class="quan{{$rNum}}" name="quantity">

                                                    <button type="button" class="c-quantity-selector__remove"
                                                            onclick="changeQuantity(event,{{$rNum}})">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </form>
                                            <a href="#" class="c-cart-item__save-for-later"><i
                                                    class="fa fa-th-list"></i>
                                                ذخیره در لیست خرید بعدی </a>
                                            <div class="c-checkout__quantity-error">امکان تغییر تعداد برای این کالا وجود
                                                ندارد.</div>
                                        </div>
                                    </div>
                                    <div class="c-checkout__col c-checkout__col--price">
                                        <!--incredible
                                    <div class="c-checkout__price c-checkout__price--del">۱۵۰,۰۰۰ تومان </div>
                                    <div class="c-checkout__price c-checkout__price--discount"> تخفیف شگفت‌انگیز: ۷۱,۰۰۰ تومان </div>
                                    incredible-->
                                        <div class="c-checkout__price">{{ number_format($item->price) }} تومان</div>
                                    </div>
                                </div>
                                <div class="c-cart-item__stock-info"><span><i class="fa fa-bell"></i> ۴ عدد در انبار
                                        باقیست
                                        - پیش از اتمام بخرید </span></div>
                            </div>

                        </div>
                    @endforeach

                </li>
                <!--cart-item-->
            </ul>
            <div class="c-checkout__to-shipping-sticky">
                @if(Cart::getContent()->count())
                    <form action="{{route('pay.request')}}" method="post">
                        @csrf
                        <button href="shipping.html" class="c-checkout__to-shipping-link">ادامه فرایند خرید</button>
                    </form>
                @endif
                <div class="c-checkout__to-shipping-price-report">
                    @if(Cart::getContent()->count())
                    <p>مبلغ قابل پرداخت</p>
                    <div class="c-checkout__to-shipping-price-report--price">
                        @php
                            session()->put('total', Cart::getTotal() + $price)
                        @endphp
                        {{ number_format(Cart::getTotal() + $price) }} <span>تومان</span>
                    </div>
                    @else
                        <div class="c-checkout__to-shipping-price-report--price">سبد خالی است.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <aside class="o-page__aside">
        <div class="o-headline">
            <div id="main-cart"><span class="c-checkout-text c-checkout__tab--active">جمع هزینه</span></div>
        </div>
        <div class="c-checkout-aside">
            <div class="c-checkout-summary">
                <ul class="c-checkout-summary__summary">
                    <li>
                        <span>قیمت کالاها ({{ Cart::getContent()->count() }})</span>
                        <span>{{ number_format(Cart::getTotal()) }} تومان</span>
                    </li>
                    <!--incredible-->
                    <li class="c-checkout-summary__discount">
                        <span> تخفیف کالاها </span>
                        <span class="discount-price">۱,۵۰۰ تومان</span>
                    </li>
                    <!--incredible-->
                    <li class="has-devider">
                        <span>جمع</span>
                        <span>{{ number_format(Cart::getTotal()) }} تومان</span>
                    </li>
                    <li>
                        <span>هزینه ارسال</span>
                        <span>{{ $price == 20000? number_format($price).' تومان' : 'هزینه‌ای ندارد' }}</span>
                    </li>
                    <li>
                        <span>نحوه ارسال</span>
                        <span>
                            @if(Cart::getTotal() >= 2000000)
                                تحویل اکسپرس
                            @else
                                تحویل معمولی
                            @endif
                        </span>
                    </li>
                    <li class="has-devider">
                        <span> مبلغ قابل پرداخت </span>
                        <span>{{ number_format(Cart::getTotal() + $price) }} تومان</span>
                    </li>
                    <li class="pd-10">
                        <span> <i class="fa fa-money"></i> امتیاز دیجی کلاب</span>
                        <span> ۲۰ امتیاز </span>
                    </li>
                </ul>
                <div class="c-checkout-summary__main">
                    <div class="c-checkout-summary__content">
                        <div><span> کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی را تکمیل
                                    کنید.</span></div>
                    </div>
                </div>
            </div>
            <div class="c-checkout-feature-aside">
                <ul>
                    <li class="c-checkout-feature-aside__item c-checkout-feature-aside__item--guarantee"><i class="fa-duotone fa-box-check"></i> هفت روز
                        ضمانت
                        تعویض</li>
                    <li class="c-checkout-feature-aside__item c-checkout-feature-aside__item--cash"><i class="fa-duotone fa-credit-card-front"></i> پرداخت در محل با
                        کارت بانکی</li>
                    <li class="c-checkout-feature-aside__item c-checkout-feature-aside__item--express"><i class="fa-duotone fa-truck"></i> تحویل اکسپرس
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    @if(Cart::getContent()->count())
        <form action="{{ route('carts.cart-all-clear') }}" method="post">
            @csrf
            <button class="btn btn-danger">حذف کل سبد خرید</button>
        </form>
    @endif
</section>
@endsection

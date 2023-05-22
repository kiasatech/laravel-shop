@extends('admin.layouts.app')


@section('title')
    {{ isset($order) ? 'ویرایش سفارش' : 'ایجاد سفارش جدید' }}
@endsection


@section('head')
    @include('admin.layouts.head')
@endsection


@section('navbar')
    @include('admin.layouts.navbar')
@endsection


@section('sidebar')
    @include('admin.layouts.sidebar')
@endsection


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    @isset($order)
                                        ویرایش سفارش
                                    @else
                                        افزودن سفارش
                                    @endisset
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">

                                <div class="table-responsive">
                                    <div class="card mb-0">
                                        <div class="card-block">
                                            <div class="card-body pb-0 pt-0">
                                                @if($errors->any())
                                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                        @foreach($errors->all() as $error)
                                                            <div>
                                                                {{ $error }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <form class="needs-validation" action="{{ isset($order) ? route('orders.update', $order->id) : route('orders.store') }}" method="post" novalidate>
                                                    @csrf
                                                    @isset($order)
                                                        @method('PUT')
                                                    @endisset

                                                    <fieldset class="row mt-2">
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">کاربر</label>
                                                            <select class="form-control @error('status') is-invalid @enderror" id="basicSelect" name="user_id">
                                                                <option selected disabled>نام کاربر را انتخاب کنید</option>
                                                                @foreach($users as $user)
                                                                    <option value="{{$user->id}}" {{ $order->user_id == $user->id? 'selected': '' }}>{{$user->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">لطفا نام کاربر را انتخاب کنید!</div>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">محصول</label>
                                                            <select class="form-control @error('status') is-invalid @enderror" id="basicSelect" name="product_id">
                                                                <option selected disabled>نام محصول را انتخاب کنید</option>
                                                                @foreach($products as $product)
                                                                    <option value="{{$product->id}}" {{ $order->product_id == $product->id? 'selected': '' }}>{{$product->title_fa}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">لطفا نام محصول را انتخاب کنید!</div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset class="row">
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">قیمت</label>
                                                            <input type="text" class="form-control" id="helpInput"
                                                                   name="price" placeholder="قیمت محصول را وارد کنید" value="{{ isset($order) ? $order->price : old('price') }}" required>
                                                            <div class="invalid-feedback">لطفا قیمت محصول را وارد کنید!</div>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">تعداد</label>
                                                            <input type="text" class="form-control" id="helpInput"
                                                                   name="quantity" placeholder="تعداد محصول را وارد کنید" value="{{ isset($order) ? $order->quantity : old('quantity') }}" required>
                                                            <div class="invalid-feedback">لطفا تعداد محصول را وارد کنید!</div>
                                                        </div>
                                                    </fieldset>

                                                    <div class="form-group pt-2">
                                                        <button type="submit" class="btn btn-success btn-block mr-1 mb-1">
                                                            @isset($order)
                                                                ویرایش
                                                            @else
                                                                افزودن
                                                            @endisset
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    @include('admin.layouts.footer')
@endsection

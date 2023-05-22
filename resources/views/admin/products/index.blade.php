@extends('admin.layouts.app')


@section('title', 'لیست محصولات')


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
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-blue mbt-1v2">ایجاد محصول</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4 class="card-title">لیست محصولات</h4>
                                    </div>
                                </div>

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
                                <form method="post">
                                    <div class="table-responsive">

                                        <div class="card mb-0">
                                            <div class="card-block">
                                                <div class="card-body pb-0 pt-0">
                                                    @include('layouts.alert')
                                                </div>
                                            </div>
                                        </div>

                                        <table class="table table-hover text-center">
                                            <thead class="bg-primary white">
                                            <tr>
                                                <th>ردیف</th>
                                                <th>نام ایجاد کننده</th>
                                                <th>نام محصول</th>
                                                <th>تصویر</th>
                                                <th>دسته بندی</th>
                                                <th>قیمت</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $key => $product)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $product->user->name }}</td>
                                                    <td>{{ $product->title_fa }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/'.$product->image) }}" alt="" height="40" class="shadow rounded">
                                                    </td>
                                                    <td>
                                                        <p>{{ $product->category->name }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ number_format($product->price) }} تومان</p>
                                                    </td>
                                                    <td>
                                                        <a href="#delete_{{ $product->id }}" data-toggle="modal">
                                                            <i class="ft-trash-2 font-medium-5 text-danger ml-1" data-toggle="tooltip" data-placement="right" title="حذف محصول"></i>
                                                        </a>

                                                        <a href="#edit_{{ $product->id }}" data-toggle="modal">
                                                            <i class="ft-edit font-medium-5 text-primary" data-toggle="tooltip" data-placement="right" title="ویرایش محصول"></i>
                                                        </a>
                                                    </td>
                                                    @include('admin.products.modal')
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
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

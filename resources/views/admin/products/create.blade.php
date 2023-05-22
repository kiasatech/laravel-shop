@extends('admin.layouts.app')


@section('title')
    {{ isset($product) ? 'ویرایش محصول' : 'ایجاد محصول جدید' }}
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
                                    @isset($product)
                                        ویرایش محصول
                                    @else
                                        افزودن محصول
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
                                                    @foreach($errors->all() as $error)
                                                        <div class="alert bg-danger alert-icon-left alert-dismissible mb-1" role="alert">
                                                        <span class="alert-icon">
                                                            <i class="ft-alert-circle"></i>
                                                        </span>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <strong>هشدار!</strong>
                                                                {{ $error }}
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <form class="needs-validation" action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="post" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    @isset($product)
                                                        @method('PUT')
                                                    @endisset

                                                    <fieldset class="form-group mt-2">
                                                        <select class="form-control" id="basicSelect" name="category_id">
                                                            <option class="text-muted" selected disabled>انتخاب دسته بندی</option>
                                                            @foreach($categories as $cat)
                                                                <option value="{{ $cat->id }}"
                                                                    @isset($product)
                                                                        @if($product->category_id == $cat->id)
                                                                            selected
                                                                        @endif
                                                                    @endisset
                                                                >{{ $cat->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </fieldset>

                                                    <fieldset class="row">
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">نام محصول</label>
                                                            <input type="text" class="form-control" id="helpInput"
                                                                   name="title_fa" placeholder="نام محصول را وارد کنید" value="{{ isset($product) ? $product->title_fa : old('title_fa') }}" required>
                                                            <div class="invalid-feedback">لطفا نام محصول را وارد کنید!
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">نام به انگلیسی</label>
                                                            <input type="text" class="form-control" id="helpInput"
                                                                   name="title_en" placeholder="نام محصول را به انگلیسی وارد کنید" value="{{ isset($product) ? $product->title_en : old('title_en') }}" required>
                                                            <div class="invalid-feedback">لطفا نام محصول را به انگلیسی وارد کنید!</div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label>توضیحات محصول</label>
                                                        <textarea class="form-control" id="description" name="desc" rows="3"
                                                                  placeholder="توضیحات محصول را وارد کنید" required> {{ isset($product) ? $product->desc : old('desc') }} </textarea>
                                                        <div class="invalid-feedback">لطفا توضیحات محصول را وارد کنید!</div>
                                                        <script>
                                                            CKEDITOR.replace('description', {
                                                                language : 'fa'
                                                            })
                                                        </script>
                                                    </fieldset>

                                                    <fieldset class="row">
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">انتخاب تصویر محصول</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" {{ isset($product) ? '' : 'required' }}>
                                                                <label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
                                                                <div class="invalid-feedback">لطفا تصویر محصول را انتخاب کنید!</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">قیمت</label>
                                                            <input type="text" class="form-control" id="helpInput" name="price"
                                                                   value="{{ isset($product) ? $product->price : old('price') }}" placeholder="قیمت محصول را وارد کنید" required>
                                                            <div class="invalid-feedback">لطفا قیمت محصول را وارد کنید!</div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset class="row">
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">برند محصول</label>
                                                            <input type="text" class="form-control" id="helpInput"
                                                                   name="brand" placeholder="نام برند محصول را وارد کنید" value="{{ isset($product) ? $product->brand : old('brand') }}" required>
                                                            <div class="invalid-feedback">لطفا نام برند محصول را وارد کنید!</div>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">فروشنده محصول</label>
                                                            <input type="text" class="form-control" id="helpInput"
                                                                   name="seller" placeholder="نام فروشنده محصول را وارد کنید" value="{{ isset($product) ? $product->seller : old('seller') }}" required>
                                                            <div class="invalid-feedback">لطفا نام فروشنده محصول را وارد کنید!</div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label for="helpInput">نام ارائه دهنده گارانتی را وارد کنید (در صورت موجود بودن)</label>
                                                            <input type="text" class="form-control" id="helpInput" name="garanty"
                                                                   value="{{ isset($product) ? $product->garanty : old('garanty') }}" placeholder="ارائه دهنده گارانتی">
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label>ویژگی های محصول</label>
                                                        <textarea class="form-control" id="descTextarea" rows="3" name="options"
                                                                  placeholder="ویژگی های محصول را وارد کنید" required> {{ isset($product) ? $product->options : old('options') }} </textarea>
                                                        <div class="invalid-feedback">لطفا ویژگی های محصول را وارد کنید!</div>
                                                    </fieldset>


                                                    @isset($product)
                                                        <img src="{{ asset('storage/'.$product->image) }}" alt="" height="150" class="shadow rounded">
                                                    @endisset
                                                    <div class="form-group pt-2">
                                                        <button type="submit" class="btn btn-success btn-block mr-1 mb-1">
                                                            @isset($product)
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

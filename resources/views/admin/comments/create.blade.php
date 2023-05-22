@extends('admin.layouts.app')


@section('title')
    {{ isset($comment) ? 'ویرایش نظر' : 'ایجاد نظر جدید' }}
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
                                    @isset($comment)
                                        ویرایش نظر
                                    @else
                                        افزودن نظر
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

                                                <form class="needs-validation" action="{{ route('comments.update', $comment->id) }}" method="post" novalidate>
                                                    @csrf
                                                    @method('PUT')

                                                    <fieldset class="row mt-2">
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">نام کاربر:</label>
                                                            <input type="text" class="form-control" id="helpInput" disabled value="{{ $comment->user->name }}">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="helpInput">نام محصول:</label>
                                                            <input type="text" class="form-control" id="helpInput" disabled value="{{ $comment->product->title_fa }}">
                                                        </div>
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label>متن نظر:</label>
                                                        <textarea class="form-control" id="description" name="contents" rows="3"
                                                                  placeholder="توضیحات نظر را وارد کنید" required> {{ $comment->content }} </textarea>
                                                        <div class="invalid-feedback">فیلد نظر خالی است!</div>
                                                    </fieldset>

                                                    <fieldset class="form-group mt-2">
                                                        <select class="form-control col-3 @error('status') is-invalid @enderror" id="basicSelect" name="status">
                                                            <option value="" selected disabled>وضعیت نمایش</option>
                                                            <option value="0">رَد کن</option>
                                                            <option value="1">تایید کن</option>
                                                        </select>
                                                    </fieldset>

                                                    <div class="form-group pt-2">
                                                        <button type="submit" class="btn btn-success btn-block mr-1 mb-1">
                                                            @isset($comment)
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

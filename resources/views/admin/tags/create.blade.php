@extends('admin.layouts.app')


@section('title')
    {{ isset($tag) ? 'ویرایش برچسب' : 'ایجاد برچسب جدید' }}
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
                                    @isset($tag)
                                        ویرایش برچسب
                                    @else
                                        افزودن برچسب
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
                                                <form class="needs-validation" action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="post" novalidate>
                                                    @csrf
                                                    @isset($tag)
                                                        @method('PUT')
                                                    @endisset
                                                    <fieldset class="form-group">
                                                        <input type="text" class="form-control" id="helpInput" name="name" placeholder="نام برچسب"
                                                               value="{{ isset($tag) ? $tag->name : ''}}" required>
                                                        <div class="invalid-feedback">لطفا نام برچسب را وارد کنید!</div>
                                                    </fieldset>

                                                    <div class="form-group pt-2">
                                                        <button type="submit" class="btn btn-success btn-block mr-1 mb-1">
                                                            @isset($tag)
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

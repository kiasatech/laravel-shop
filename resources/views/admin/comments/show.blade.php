@extends('admin.layouts.app')


@section('title', 'پاسخ به نظر')


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
                                <h4 class="card-title"> پاسخ به نظر {{ $comment->user->name }} </h4>
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

                                                <form class="needs-validation" action="{{ route('comments.reply', $comment->id) }}" method="post" novalidate>
                                                    @csrf
                                                    <fieldset class="form-group mt-2">
                                                        <label>نظر کاربر:</label>
                                                        <textarea class="form-control" id="descTextarea" rows="3" disabled>{{ $comment->content }}</textarea>
                                                    </fieldset>

                                                    <fieldset class="form-group">
                                                        <label>پاسخ مدیر:</label>
                                                        <textarea class="form-control" id="descTextarea" rows="3" name="contents"
                                                                  placeholder="پاسخ خود را بنویسید" required></textarea>
                                                        <div class="invalid-feedback">لطفا پاسخ خود را برای این نظر بنویسید!</div>
                                                    </fieldset>

                                                    <div class="form-group pt-2">
                                                        <button type="submit" class="btn btn-success btn-block mr-1 mb-1">
                                                            ثبت پاسخ
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

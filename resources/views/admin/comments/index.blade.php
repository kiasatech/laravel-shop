@extends('admin.layouts.app')


@section('title', 'لیست نظرات')


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
                                        <a href="{{ route('comments.create') }}" class="btn btn-sm btn-blue mbt-1v2">ایجاد نظر</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4 class="card-title">لیست نظرات</h4>
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
                                                <th>نام کاربر</th>
                                                <th>نام محصول</th>
                                                <th>وضعیت</th>
                                                <th>پاسخ</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($comments as $key => $comment)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $comment->user->name }}</td>
                                                    <td>{{ $comment->product->title_fa }}</td>
                                                    <td>
                                                        @if($comment->status == 0)
                                                            <span class="text-danger">تایید نشده</span>
                                                        @else
                                                            <span class="text-success">تایید شده</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($comment->child != null)
                                                            <span class="btn btn-info text-white btn-sm shadow">پاسخ
                                                                <span style="background-color: springgreen" class="badge">✓</span>
                                                            </span>
                                                        @else
                                                            <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-info text-white btn-sm shadow">پاسخ
                                                                <span style="background-color: springgreen" class="badge">
                                                        @if($comment->replies->count())
                                                                {{ $comment->replies->count() }}
                                                                    @else
                                                                        0
                                                                    @endif
                                                                </span>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="#delete_{{ $comment->id }}" data-toggle="modal">
                                                            <i class="ft-trash-2 font-medium-5 text-danger ml-1" data-toggle="tooltip" data-placement="right" title="حذف نظر"></i>
                                                        </a>

                                                        <a href="#edit_{{ $comment->id }}" data-toggle="modal">
                                                            <i class="ft-edit font-medium-5 text-primary" data-toggle="tooltip" data-placement="right" title="ویرایش نظر"></i>
                                                        </a>
                                                    </td>
                                                    @include('admin.comments.modal')
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

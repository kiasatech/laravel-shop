@extends('admin.layouts.app')


@section('title', 'لیست کاربران')


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
                                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-blue mbt-1v2" data-toggle="tooltip" onclick="event.preventDefault()"
                                           data-placement="bottom" data-custom-class="tooltip-warning" title="درحال حاضر فعال نیست!">ایجاد کاربر</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4 class="card-title">لیست کاربران</h4>
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
                                                <th>تصویر</th>
                                                <th>نام</th>
                                                <th>ایمیل</th>
                                                <th>نقش کاربری</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $key => $user)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>
                                                        <img src="{{ Gravatar::get($user->email) }}" alt="" height="40" class="shadow rounded">
                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td> {{ $user->email }} </td>
                                                    <td>
                                                        @if($user->role == 'admin')
                                                            <span class="text-success">ادمین</span>
                                                        @else
                                                            <span class="text-info">کاربر</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="#delete_{{ $user->id }}" data-toggle="modal">
                                                            <i class="ft-trash-2 font-medium-5 text-danger ml-1" data-toggle="tooltip" data-placement="right" title="حذف کاربر"></i>
                                                        </a>

                                                        <a href="#edit_{{ $user->id }}" data-toggle="modal">
                                                            <i class="ft-edit font-medium-5 text-primary" data-toggle="tooltip" data-placement="right" title="ویرایش کاربر"></i>
                                                        </a>
                                                    </td>
                                                    @include('admin.users.modal')
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

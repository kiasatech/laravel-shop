@extends('admin.layouts.app')


@section('title', 'لیست پوستر ها')


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
                                        <a href="{{ route('posters.create') }}" class="btn btn-sm btn-blue mbt-1v2">ایجاد پوستر</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4 class="card-title">لیست پوستر ها</h4>
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
                                                <th>نام</th>
                                                <th>تصویر</th>
                                                <th>یو آر ال</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($posters as $key => $poster)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $poster->name }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/'.$poster->image) }}" alt="" height="40" class="shadow rounded">
                                                    </td>
                                                    <td>
                                                        <p>{{ $poster->url }}</p>
                                                    </td>
                                                    <td>
                                                        <a href="#delete_{{ $poster->id }}" data-toggle="modal">
                                                            <i class="ft-trash-2 font-medium-5 text-danger ml-1" data-toggle="tooltip" data-placement="right" title="حذف پوستر"></i>
                                                        </a>

                                                        <a href="#edit_{{ $poster->id }}" data-toggle="modal">
                                                            <i class="ft-edit font-medium-5 text-primary" data-toggle="tooltip" data-placement="right" title="ویرایش پوستر"></i>
                                                        </a>
                                                    </td>
                                                    @include('admin.posters.modal')
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

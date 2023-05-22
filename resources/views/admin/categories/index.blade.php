@extends('admin.layouts.app')


@section('title', 'لیست دسته بندی ها')


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
                                        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-blue mbt-1v2">ایجاد دسته بندی</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4 class="card-title">لیست دسته بندی ها</h4>
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
                                                <th>آیدی</th>
                                                <th>نام دسته بندی</th>
                                                <th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <th scope="row">{{ $category->id }}</th>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if($category->parent_id == 0)
                                                        <span class="text-success">دسته بندی اصلی</span>
                                                    @else
                                                        <span class="text-info">زیر منو</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#delete_{{ $category->id }}" data-toggle="modal">
                                                        <i class="ft-trash-2 font-medium-5 text-danger ml-1" data-toggle="tooltip" data-placement="right" title="حذف دسته بندی"></i>
                                                    </a>

                                                    <a href="#edit_{{ $category->id }}" data-toggle="modal">
                                                        <i class="ft-edit font-medium-5 text-primary" data-toggle="tooltip" data-placement="right" title="ویرایش دسته بندی"></i>
                                                    </a>
                                                </td>
                                                @include('admin.categories.modal')
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pr-2 float-right">{{ $categories->links() }}</div>
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

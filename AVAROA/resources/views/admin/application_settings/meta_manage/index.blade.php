@extends('layout.master')
@section('title')
    {{ $title }}
@endsection
@section('main_content')
    <!-- Page content area start -->

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Application Settings') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{ url('admin\dashboard') }}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __(@$title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-lg-3 col-md-4">
                    @include('admin.application_settings.sidebar')
                </div>
                <div class="col-lg-9 col-md-8">
                    @if (session()->has('success'))
                        <script>
                            toastr.success('{{ session('success') }}');
                        </script>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h2>{{ __(@$title) }}</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table id="basic-1" class="row-border data-table-filter table-style">
                                    <thead>
                                        <tr>
                                            <th width="25%">{{ __('Page Name') }}</th>
                                            <th>{{ __('Meta Content') }}</th>
                                            <th width="5%">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($metas as $meta)
                                            <tr>
                                                <td>
                                                    {{ $meta->page_name }}
                                                </td>
                                                <td>
                                                    <div class="mb-2">
                                                        <b>{{ __('Meta Title') }}: </b> {{ $meta->meta_title }}
                                                    </div>
                                                    <div class="mb-2">
                                                        <b>{{ __('Meta Description') }}: </b>
                                                        {{ $meta->meta_description }}
                                                    </div>
                                                    <div>
                                                        <b>{{ __('Meta Keywords') }}: </b> {{ $meta->meta_keyword }}
                                                    </div>
                                                    <div>
                                                        <b>{{ __('OG Image') }}: </b> <a target="__blank"
                                                            class="font-bold text-info"
                                                            href="{{ getImageFile($meta->og_image) }}">{{ __('View') }}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="action__buttons">
                                                        <a href="{{ route('settings.meta.edit', [$meta->uuid]) }}"
                                                            title="Edit"
                                                            class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                            data-toggle="tooltip"> <i class="fa fa-edit"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Page content area end -->
@endsection

@extends('layout.master')
@section('title')
    {{ $title }}
@endsection
@section('main_content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ session::get('success') }}</p>
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">
                    <p>{{ session::get('fail') }}</p>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card" >
                        <div class="card-header">
                            <h2>{{ __('Language Settings') }}</h2>
                            <a href="{{ route('language.create') }}" class="btn btn-success btn-sm pull-right"> <i
                                    class="fa fa-plus"></i> {{ __('Add Language') }} </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-1" class="row-border data-table-filter table-style">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Flag') }}</th>
                                            <th>{{ __('Language') }}</th>
                                            <th>{{ __('ISO Code') }}</th>
                                            <th>{{ __('RTL') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($languages as $key => $language)
                                            <tr class="removable-item">
                                                <td>
                                                    <i class="flag-icon flag-icon-{{ $language->iso_code }}"></i>
                                                </td>
                                                <td>{{ $language->language }}</td>
                                                <td>{{ $language->iso_code }}</td>
                                                <td>{{ $language->rtl == 1 ? 'Yes' : 'No' }}</td>
                                                <td>
                                                    <div class="action__buttons">
                                                        <a href="{{ route('language.edit', [$language->id, $language->iso_code]) }}"
                                                            title="Edit"class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                            data-toggle="tooltip"> <i class="fa fa-edit"></i>
                                                        </a>
                                                        @if ($language->id != 1)
                                                            <a href="javascript:void(0);"
                                                                data-url="{{ url('admin/language/delete', [$language->id]) }}"
                                                                title="Delete"
                                                                class="btn btn-icon waves-effect waves-light btn-danger m-b-5"
                                                                onclick="return confirm('{{ trans('do you want to delete') }}')"
                                                                data-toggle="tooltip" title="{{ trans('remove') }}"> <i
                                                                    class="fa fa-remove"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('language.translate', [$language->id]) }}"
                                                            title="Edit"
                                                            class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                            data-toggle="tooltip"> Translate
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

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
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ __('Country') }}</h2>
                                <button class="btn btn-success btn-sm pull-right" type="button" data-bs-toggle="modal"
                                    data-bs-target="#add-todo-modal">
                                    <i class="fa fa-plus"></i> {{ __('Add Country') }}
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-respnsive">
                                    <table id="basic-1" class="row-border data-table-filter table-style">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SL') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Short Name') }}</th>
                                                <th>{{ __('Phone Code') }}</th>
                                                <th>{{ __('Continent') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($countries as $country)
                                                <tr class="removable-item">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $country->country_name }}</td>
                                                    <td>{{ $country->short_name }}</td>
                                                    <td>{{ $country->phonecode }}</td>
                                                    <td>{{ $country->continent }}</td>
                                                    <td>
                                                        <div class="action__buttons">
                                                            <a href="{{ route('settings.location.country.edit', [$country->id, $country->slug]) }}"
                                                                title="Edit"
                                                                class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                                data-toggle="tooltip"> <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-link"
                                                                data-id="{{ $country->id }}" data-toggle="tooltip"
                                                                title="{{ trans('remove') }}">
                                                                <i class="fa fa-remove"></i>
                                                            </a>

                                                            <form id="delete-form-{{ $country->id }}"
                                                                action="{{ route('settings.location.country.delete', $country->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>



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

    <!-- Add Modal section start -->
    <div class="modal fade" id="add-todo-modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Country') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('settings.location.country.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="input__group mb-25">
                                    <label for="country_name">{{ __('Name') }}</label>
                                    <input type="text" name="country_name" class="form-control" id="country_name"
                                        placeholder="{{ __('Type country name') }}" value="{{ old('country_name') }}"
                                        required>
                                    @if ($errors->has('country_name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('country_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input__group mb-25">
                                    <label for="country_name">{{ __('Short Name') }}</label>
                                    <input type="text" name="short_name" class="form-control" id="short_name"
                                        placeholder="{{ __('Type short name') }}" value="{{ old('short_name') }}"
                                        required>
                                    @if ($errors->has('short_name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('short_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input__group mb-25">
                                    <label for="phonecode">{{ __('Phone Code') }}</label>
                                    <input type="text" name="phonecode" class="form-control" id="phonecode"
                                        placeholder="{{ __('Type phone code') }}" value="{{ old('phonecode') }}" required>
                                    @if ($errors->has('phonecode'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('phonecode') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input__group mb-25">
                                    <label for="continent">{{ __('Continent') }}</label>
                                    <input type="text" name="continent" class="form-control" id="continent"
                                        placeholder="{{ __('Type continent') }}" value="{{ old('continent') }}"
                                        required>
                                    @if ($errors->has('continent'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('continent') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Modal section end -->
    <!-- Page content area end -->
    <script>
        // Initialize Toastr with options
toastr.options = {
    "timeOut": 5000, // Set the duration to 5 seconds (5000 milliseconds)
    "positionClass": "toast-bottom-right"
};

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-link').forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();

            if (confirm('{{ trans('do you want to delete') }}')) {
                const form = document.getElementById('delete-form-' + this.dataset.id);

                // Send AJAX request
                axios.post(form.action, new FormData(form))
                    .then(function (response) {
                        if (response.data.success) {
                            toastr.success(response.data.message);
                            // Wait for the Toastr message to be visible before reloading the page
                            setTimeout(function () {
                                window.location.reload();
                            }, 5000); // 5000 milliseconds = 5 seconds
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            }
        });
    });
});
    </script>
@endsection

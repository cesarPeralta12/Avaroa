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
                                <h2>{{ __('City') }}</h2>
                                <button class="btn btn-success btn-sm pull-right" type="button" data-bs-toggle="modal"
                                    data-bs-target="#add-todo-modal">
                                    <i class="fa fa-plus"></i> {{ __('Add City') }}
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-1" class="row-border data-table-filter table-style">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('State') }}</th>
                                                <th>{{ __('Country') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cities as $city)
                                                <tr class="removable-item">
                                                    <td>{{ $city->name }}</td>
                                                    <td>{{ @$city->state->name }}</td>
                                                    <td>{{ @$city->state->country->country_name }}</td>

                                                    <td>
                                                        <div class="action__buttons">
                                                            <a href="{{ route('settings.location.city.edit', [$city->id, Str::slug($city->name)]) }}"
                                                                title="Edit"
                                                                class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                                data-toggle="tooltip"> <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-link"
                                                                data-id="{{ $city->id }}" data-toggle="tooltip"
                                                                title="{{ trans('remove') }}">
                                                                <i class="fa fa-remove"></i>
                                                            </a>

                                                            <form
                                                                action="{{ route('settings.location.city.delete', $city->id) }}"
                                                                method="post" id="delete-form-{{ $city->id }}"
                                                                style="display: none;">
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


    <!-- Page content area end -->

    <!-- Add Modal section start -->
    <div class="modal fade" id="add-todo-modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add City') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="input__group mb-25">
                                    <label for="name">{{ __('State Name') }}</label>
                                    <select name="state_id" class="form-control" required>
                                        <option value="">--{{ __('Select Option') }}--</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('state_id'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('state_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input__group mb-25">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="{{ __('Type name') }}" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Modal section end -->
    <script>
        // Initialize Toastr with options
        toastr.options = {
            "timeOut": 5000, // Set the duration to 5 seconds (5000 milliseconds)
            "positionClass": "toast-bottom-right"
        };

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-link').forEach(function(element) {
                element.addEventListener('click', function(event) {
                    event.preventDefault();

                    if (confirm('{{ trans('do you want to delete') }}')) {
                        const formId = 'delete-form-' + this.dataset.id;
                        console.log('Form ID:', formId);
                        const form = document.getElementById(formId);

                        if (form) {
                            console.log('Form found, sending request to:', form.action);

                            // Send AJAX request
                            axios.post(form.action, new FormData(form))
                                .then(function(response) {
                                    console.log('Response received:', response);
                                    if (response.data.success) {
                                        toastr.success(response.data.message);
                                        // Wait for the Toastr message to be visible before reloading the page
                                        setTimeout(function() {
                                            window.location.reload();
                                        }, 5000); // 5000 milliseconds = 5 seconds
                                    }
                                })
                                .catch(function(error) {
                                    console.error('Error:', error);
                                });
                        } else {
                            console.error('Form not found');
                        }
                    }
                });
            });
        });
    </script>
@endsection

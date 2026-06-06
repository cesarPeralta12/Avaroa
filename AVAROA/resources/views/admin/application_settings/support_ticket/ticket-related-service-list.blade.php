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
                                        <li class="breadcrumb-item"><a href="{{url('admin\dashboard')}}">{{__('Dashboard')}}</a></li>
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
                                <h2>{{ __(@$title) }}</h2>
                                <button class="btn btn-success btn-sm pull-right" type="button" data-bs-toggle="modal" data-bs-target="#add-todo-modal">
                                    <i class="fa fa-plus"></i> {{ __('Add Related Service') }}
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="advance-1" class="row-border data-table-filter table-style">
                                        <thead>
                                        <tr>
                                            <th width="25%">{{ __('Name') }}</th>
                                            <th width="5%">{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($services as $service)
                                            <tr>
                                                <td>
                                                    {{$service->name}}
                                                </td>
                                                <td>
                                                    <div class="action__buttons">
                                                        <a href="#" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-link"
                                                        data-id="{{ $service->uuid }}" data-toggle="tooltip" title="{{ trans('remove') }}">
                                                        <i class="fa fa-remove"></i>
                                                     </a>

                                                     <form action="{{ route('settings.support-ticket.services.delete', $service->uuid) }}" method="post" id="delete-form-{{ $service->uuid }}" style="display: none;">
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
                    <h5 class="modal-title">{{ __('Add Related Service') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('settings.support-ticket.services.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="input__group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Type name') }}" value="" required>
                            @if ($errors->has('name'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                            @endif
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

    <!-- Edit Modal section start -->
    <div class="modal fade edit_modal" id="add-todo-modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Edit Related Service') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('settings.support-ticket.services.store') }}" id="updateEditModal" method="post">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="input__group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Type name') }}" value="" required>
                            @if ($errors->has('name'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal section end -->
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
                        const formId = 'delete-form-' + this.dataset.id;
                        console.log('Form ID:', formId);
                        const form = document.getElementById(formId);

                        if (form) {
                            console.log('Form found, sending request to:', form.action);

                            // Send AJAX request
                            axios.post(form.action, new FormData(form))
                                .then(function (response) {
                                    console.log('Response received:', response);
                                    if (response.data.success) {
                                        toastr.success(response.data.message);
                                        // Wait for the Toastr message to be visible before reloading the page
                                        setTimeout(function () {
                                            window.location.reload();
                                        }, 5000); // 5000 milliseconds = 5 seconds
                                    } else {
                                        toastr.error(response.data.message || 'Error occurred');
                                    }
                                })
                                .catch(function (error) {
                                    console.error('Error:', error);
                                    toastr.error('Error occurred while deleting');
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


@push('script')


    <script>
        $(function(){
            'use strict'
            $('.edit').on('click', function(e){
                e.preventDefault();
                const modal = $('.edit_modal');
                modal.find('input[name=name]').val($(this).data('item').name)
                modal.find('input[name=id]').val($(this).data('item').id)
                modal.modal('show')
            })
        })
    </script>
@endpush

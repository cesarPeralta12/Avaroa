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
                                <h2>{{ __(@$title) }}</h2>
                                <button class="btn btn-success btn-sm pull-right" type="button" data-bs-toggle="modal"
                                    data-bs-target="#add-todo-modal">
                                    <i class="fa fa-plus"></i> {{ __('Add Bank') }}
                                </button>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('settings.save.setting') }}" class="form-horizontal" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="input__group mb-25">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <input type="text" name="bank_currency"
                                                    value="{{ get_option('bank_currency') }}"
                                                    class="form-control bank_currency">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span
                                                    class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0"
                                                    name="bank_conversion_rate"
                                                    value="{{ get_option('bank_conversion_rate') ? get_option('bank_conversion_rate') : 1 }}"
                                                    class="form-control">
                                                <span class="input-group-text bank_append_currency"></span>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="input__group mb-25">
                                                <label for="bank_status">{{ __('Status') }} </label>
                                                <div class="input-group mb-3">
                                                    <select name="bank_status" id="bank_status" class="form-control">
                                                        <option value="1"
                                                            {{ get_option('bank_status') == 1 ? 'selected' : '' }}>
                                                            {{ __('Enable') }} </option>
                                                        <option value="0"
                                                            {{ get_option('bank_status') == '0' ? 'selected' : '' }}>
                                                            {{ __('Disable') }} </option>
                                                    </select>
                                                    <button class="btn btn-primary input-group-text"
                                                        id="basic-addon2">{{ __('Update') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table id="basic-1" class="row-border data-table-filter table-style">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SL') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Account Name') }}</th>
                                                <th>{{ __('Account Number') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banks as $bank)
                                                <tr class="removable-item">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bank->name }}</td>
                                                    <td>{{ $bank->account_name }}</td>
                                                    <td>{{ $bank->account_number }}</td>
                                                    <td>
                                                        <a href="{{ route('settings.bank.status', $bank->id) }}"> <span
                                                                class="status {{ $bank->status == 1 ? 'active' : 'blocked' }}">{{ $bank->status == 1 ? 'Active' : 'Inactive' }}</span></a>
                                                    </td>
                                                    <td>
                                                        <div class="action__buttons">

                                                            <a href="{{ route('settings.bank.edit', [$bank->id]) }}"
                                                                title="Edit"
                                                                class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                                data-toggle="tooltip"> <i class="fa fa-edit"></i>
                                                            </a>

                                                            <a href="#"
                                                                class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-link"
                                                                data-id="{{ $bank->id }}" data-toggle="tooltip"
                                                                title="{{ trans('remove') }}">
                                                                <i class="fa fa-remove"></i>
                                                            </a>

                                                            <form action="{{ route('settings.bank.delete', $bank->id) }}"
                                                                method="post" id="delete-form-{{ $bank->id }}"
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
                                    <div class="mt-3">
                                        {{ $banks->links() }}
                                    </div>
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Bank') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('settings.bank.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="input__group mb-25">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="{{ __('Type Bank Name') }}" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input__group mb-25">
                                    <label for="account_name">{{ __('Account Name') }}</label>
                                    <input type="text" class="form-control" name="account_name" id="account_name"
                                        placeholder="{{ __('Type Bank Account Name') }}"
                                        value="{{ old('account_name') }}" required>
                                    @if ($errors->has('account_name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('account_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input__group mb-25">
                                    <label for="account_number">{{ __('Account Number') }}</label>
                                    <input type="text" class="form-control" name="account_number" id="account_number"
                                        placeholder="{{ __('Type Bank Account Number') }}"
                                        value="{{ old('account_number') }}" required>
                                    @if ($errors->has('account_number'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('account_number') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input__group mb-25">
                                    <label for="status">{{ __('Status') }}</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="0">{{ __('Inactive') }}</option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('status') }}</span>
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

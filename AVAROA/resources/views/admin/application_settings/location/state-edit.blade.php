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
                                <h2>{{ __('Edit State') }}</h2>
                                <a href="{{ route('settings.location.state.index') }}" class="btn btn-success btn-sm" >
                                    <i class="fa fa-arrow-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                            <div class="card-body">
                                <form action="{{route('settings.location.state.update', [$state->id])}}" method="post" class="form-horizontal">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input__group mb-25">
                                                <label for="name">{{ __('Country name') }}</label>
                                                <select name="country_id" class="form-control" required>
                                                    <option value="">--{{ __('Select Option') }}--</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" {{ $state->country_id == $country->id ? 'selected' : '' }}>{{ $country->country_name }} </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('country_id'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('country_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input__group mb-25">
                                                <label for="name">{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('Type name') }}" value="{{ $state->name }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

<br>
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary btn-sm">{{ __('Update') }}</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Page content area end -->
@endsection

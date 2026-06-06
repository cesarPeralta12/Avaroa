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
                                <h2>{{ __('Edit City') }}</h2>
                                <a href="{{ route('settings.location.city.index') }}" class="btn btn-success btn-sm pull-right" >
                                    <i class="fa fa-arrow-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                            <div class="card-body">
                                <form action="{{route('settings.location.city.update', [$city->id])}}" method="post" class="form-horizontal">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input__group mb-25">
                                                <label for="name">{{ __('State Name') }}</label>
                                                <select name="state_id" class="form-control" required>
                                                    <option value="">--{{ __('Select Option') }}--</option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}" {{ $city->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }} </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('state_id'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('state_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input__group mb-25">
                                                <label for="name">{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('Type name') }}" value="{{ $city->name }}" required>
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

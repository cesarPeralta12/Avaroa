@extends('layout.master')
@section('title')
    {{ $title }}
@endsection
@section('main_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.repeater/jquery.repeater.min.js"></script>
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
                            <div class="card-header"><h2>{{ __(@$title) }}</h2></div>
                            <div class="card-body">
                                <form action="{{route('settings.about.our-history.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-form-group mb-3 row">
                                        <label for="our_history_title" class="col-lg-3 text-lg-right text-black"> {{ __('Our History Title') }} </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="our_history_title" id="our_history_title" value="{{ @$aboutUsGeneral->our_history_title }}"
                                                   class="form-control" placeholder="{{ __('Type our history title') }}">
                                        </div>
                                    </div>

                                    <div class="custom-form-group mb-3 row">
                                        <label for="our_history_subtitle" class="col-lg-3 text-lg-right text-black"> {{ __('Our History Subtitle') }} </label>
                                        <div class="col-lg-9 ">
                                        <textarea name="our_history_subtitle" class="form-control" rows="5" id="our_history_subtitle" placeholder="{{ __('Type our history subtitle') }}"
                                                  required>{{ @$aboutUsGeneral->our_history_subtitle }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="add_repeater" class="mb-3">
                                        <div data-repeater-list="our_histories" class="">
                                            @if($ourHistories->count() > 0)
                                                @foreach($ourHistories as $ourHistory)
                                                    <div data-repeater-item="" class="form-group row">
                                                    <input  type="hidden" name="id" value="{{$ourHistory->id}}">
                                                        <div class="custom-form-group mb-3 col-lg-3">
                                                            <label for="year_{{ $ourHistory['id'] }}" class=" text-lg-right text-black">{{ __('Year') }} </label>
                                                            <input type="number" name="year" id="year_{{ $ourHistory['id'] }}" value="{{ $ourHistory->year }}" class="form-control" placeholder="{{ __('Type year') }}" required>
                                                        </div>

                                                        <div class="custom-form-group mb-3 col-lg-4">
                                                            <label for="title_{{ $ourHistory['id'] }}" class="text-lg-right text-black"> {{ __('Title') }} </label>
                                                            <input type="text" name="title" id="title_{{ $ourHistory['id'] }}" value="{{ $ourHistory->title }}" class="form-control" placeholder="{{ __('Type subtitle') }}" required>
                                                        </div>
                                                        <div class="custom-form-group mb-3 col-lg-4">
                                                            <label for="subtitle_{{ $ourHistory['id'] }}" class="text-lg-right text-black"> {{ __('Subtitle') }} </label>
                                                            <textarea name="subtitle" class="form-control" rows="5" id="subtitle_{{ $ourHistory['id'] }}" required>{{ $ourHistory->subtitle }}</textarea>
                                                        </div>

                                                        <div class="col-lg-1 mb-3 removeClass">
                                                            <label class="text-lg-right text-black opacity-0">{{ __('Remove') }}</label>
                                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-icon-remove btn-danger" onclick="deleteMember({{ $ourHistory['id'] }})">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item="" class="form-group row ">
                                                    <div class="custom-form-group mb-3 col-lg-3">
                                                        <label for="upgrade_skill_title" class=" text-lg-right text-black">{{ __('Year') }} </label>
                                                        <input type="number" name="year" id="year" value="" class="form-control" placeholder="{{ __('Type year') }}" required>
                                                    </div>

                                                    <div class="custom-form-group mb-3 col-lg-4">
                                                        <label for="title" class="text-lg-right text-black"> {{ __('Title') }} </label>
                                                        <input type="text" name="title" id="title" value="" class="form-control" placeholder="{{ __('Type subtitle') }}" required>

                                                    </div>
                                                    <div class="custom-form-group mb-3 col-lg-4">
                                                        <label for="subtitle" class="text-lg-right text-black"> {{ __('Subtitle') }} </label>
                                                        <textarea name="subtitle" class="form-control" rows="5" id="subtitle" required></textarea>
                                                    </div>

                                                    <div class="col-lg-1 mb-3 removeClass">
                                                        <label class="text-lg-right text-black opacity-0">{{ __('Remove') }}</label>
                                                        <a href="javascript:;" data-repeater-delete=""
                                                           class="btn btn-icon-remove btn-danger">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-lg-2">
                                            <a id="add" href="javascript:;" data-repeater-create=""
                                               class="btn btn-blue">
                                                <i class="fas fa-plus"></i> {{ __('Add') }}
                                            </a>
                                        </div>

                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-md-2 text-right ">
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
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                let formRepeaterId = "#add_repeater";

                let KTFormRepeater = function() {
                    let demo1 = function() {
                        $(formRepeaterId).repeater({
                            initEmpty: false,
                            defaultValues: {
                                'text-input': 'foo'
                            },
                            show: function() {
                                $(this).slideDown();
                            },
                            hide: function(deleteElement) {
                                $(this).slideUp(deleteElement);
                            }
                        });
                    };

                    return {
                        // public functions
                        init: function() {
                            demo1();
                        }
                    };
                }();

                // Initialize the repeater
                KTFormRepeater.init();

                // Bind add button to create new repeater item
                $("#add").on("click", function() {
                    $(formRepeaterId).repeater('add');
                });
            });

            // Function to handle member deletion
            window.deleteMember = function(memberId) {
                if (confirm("Are you sure you want to delete this member?")) {
                    $.ajax({
                        url: '{{ url('admin/settings/about/historyDelete') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: memberId
                        },
                        success: function(response) {
                            location.reload();
                        },
                        error: function(response) {
                            alert('Failed to delete the member.');
                        }
                    });
                }
            };
        })(jQuery);
    </script>
@endsection


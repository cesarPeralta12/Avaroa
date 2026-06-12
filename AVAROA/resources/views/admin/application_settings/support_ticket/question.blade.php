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
                                <form action="{{route('settings.support-ticket.question.update')}}" method="post">
                                    @csrf
                                    <div id="add_repeater" class="mb-3">
                                        <div data-repeater-list="question_answers" class="">
                                            @if($supportTickets->count() > 0)
                                                @foreach($supportTickets as $question)
                                                    <div data-repeater-item="" class="form-group row ">
                                                        <input type="hidden" name="id" value="{{ @$question['id'] }}"/>
                                                        <div class="custom-form-group mb-3 col-lg-5">
                                                            <label for="question_{{ @$question['id'] }}" class="text-lg-right text-black"> {{ __('Question') }} </label>
                                                            <div class="">
                                                                <input type="text" name="question" id="question_{{ @$question['id'] }}" value="{{ $question->question }}"
                                                                       class="form-control" placeholder="{{ __('Type question') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="custom-form-group mb-3 col-lg-6">
                                                            <label for="answer_{{ @$question['id'] }}" class="text-lg-right text-black"> {{ __('Answer') }} </label>
                                                            <div class="">
                                                                <textarea name="answer" id="answer_{{ @$question['id'] }}" rows="5"
                                                                          class="form-control" required>{{ $question->answer }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-1 mb-3 removeClass">
                                                            <label class="text-lg-right text-black opacity-0">{{ __('Remove') }}</label>
                                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-icon-remove btn-danger" onclick="deleteMember({{ @$question['id'] }})">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item="" class="form-group row">
                                                    <div class="custom-form-group mb-3 col-lg-5">
                                                        <label for="question" class="text-lg-right text-black">{{ __('Question') }}</label>
                                                        <input type="text" name="question" id="question" value="" class="form-control" placeholder="{{ __('Type question') }}" required>
                                                    </div>
                                                    <div class="custom-form-group mb-3 col-lg-6">
                                                        <label for="answer" class="text-lg-right text-black">{{ __('Answer') }}</label>
                                                        <textarea name="answer" id="answer" class="form-control" rows="5" required></textarea>
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
                                               class="btn btn-success btn-sm">
                                                <i class="fas fa-plus text-gray"></i> {{ __('Add') }}
                                            </a>
                                        </div>

                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-md-2 text-right">
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
                        url: '{{ url('admin/settings/support-ticket/questionAnsDelete') }}',
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


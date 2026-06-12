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
                            </div>
                            <div class="card-body">
                                <form action="{{ route('settings.about.team-member.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="custom-form-group mb-3 row">
                                        <label class="col-lg-3 text-lg-right text-black">{{ __('Logo') }} </label>
                                        <div class="col-lg-3">
                                            <div class="upload-img-box">
                                                @if (@$aboutUsGeneral->team_member_logo)
                                                    <img src="{{ getImageFile($aboutUsGeneral->team_member_logo_path) }}">
                                                @else
                                                    <img src="" alt="">
                                                @endif
                                                <input type="file" name="team_member_logo" id="team_member_logo"
                                                    accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{ __('Image') }}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('team_member_logo'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('team_member_logo') }}</span>
                                            @endif
                                            <p><span class="text-black">{{ __('Accepted Files') }}: </span> PNG <br> <span
                                                    class="text-black">{{ __('Accepted Size') }}:</span> 70 x 70 (1MB)</p>
                                        </div>
                                    </div>

                                    <div class="row custom-form-group mb-3">
                                        <label for="team_member_title"
                                            class="col-lg-3 text-lg-right text-black">{{ __('Title') }} </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="team_member_title" id="team_member_title"
                                                value="{{ @$aboutUsGeneral->team_member_title }}" class="form-control"
                                                placeholder="{{ __('Type title') }}">
                                            @if ($errors->has('team_member_title'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('team_member_title') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="custom-form-group mb-3 row">
                                        <label for="team_member_subtitle"
                                            class="col-lg-3 text-lg-right text-black">{{ __('Subtitle') }} </label>
                                        <div class="col-lg-9">
                                            <textarea name="team_member_subtitle" class="form-control" rows="5" id="team_member_subtitle" required>{{ @$aboutUsGeneral->team_member_subtitle }}</textarea>
                                            @if ($errors->has('team_member_subtitle'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('team_member_subtitle') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="add_repeater" class="mb-3">
                                        <div data-repeater-list="team_members" class="">
                                            @if (count($teamMembers) > 0)
                                                @foreach ($teamMembers as $teamMember)
                                                    <div data-repeater-item="" class="form-group row ">
                                                        <input type="hidden" name="id"
                                                            value="{{ @$teamMember['id'] }}" />
                                                        <div
                                                            class="custom-form-group mb-3 col-md-12 col-lg-3 col-xl-3 col-xxl-2">
                                                            <label for="image_{{ $teamMember->id }}"
                                                                class=" text-lg-right text-black"> {{ __('Member Image') }}
                                                            </label>
                                                            <div class="upload-img-box">
                                                                @if ($teamMember->image)
                                                                    <img src="{{ getImageFile($teamMember->image_path) }}">
                                                                @else
                                                                    <img src="" alt="">
                                                                @endif
                                                                <input type="file" name="image"
                                                                    id="image_{{ $teamMember->id }}" accept="image/*"
                                                                    onchange="preview300343DimensionFile(this)">
                                                                <div class="upload-img-box-icon">
                                                                    <i class="fa fa-camera"></i>
                                                                    <p class="m-0">{{ __('Image') }}</p>
                                                                </div>
                                                            </div>
                                                            <p><span class="text-black">{{ __('Accepted Files') }}:
                                                                </span>JPG, JPEG, PNG <br> <span
                                                                    class="text-black">{{ __('Accepted Size') }}:</span>
                                                                300 x 343 (1MB)</p>
                                                        </div>

                                                        <div
                                                            class="custom-form-group mb-3 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                            <label for="name_{{ $teamMember->id }}"
                                                                class="text-lg-right text-black"> {{ __('Name') }}
                                                            </label>
                                                            <div class="">
                                                                <input type="text" name="name"
                                                                    id="name_{{ $teamMember->id }}"
                                                                    value="{{ $teamMember['name'] }}"
                                                                    class="form-control"
                                                                    placeholder="{{ __('Type name') }}" required>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="custom-form-group mb-3 col-md-12 col-lg-4 col-xl-4 col-xxl-5">
                                                            <label for="designation_{{ $teamMember->id }}"
                                                                class="text-lg-right text-black"> {{ __('Designation') }}
                                                            </label>
                                                            <input type="text" name="designation"
                                                                id="designation_{{ $teamMember->id }}"
                                                                value="{{ $teamMember['designation'] }}"
                                                                class="form-control"
                                                                placeholder="{{ __('Type designation') }}" required>
                                                        </div>

                                                        <!-- Delete button for removing the team member -->
                                                        <div class="col-lg-1 mb-3 removeClass">
                                                            <label
                                                                class="text-lg-right text-black opacity-0">{{ __('Remove') }}</label>
                                                            <a href="javascript:;" data-repeater-delete=""
                                                                class="btn btn-icon-remove btn-danger"
                                                                onclick="deleteMember({{ $teamMember->id }})">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item="" class="form-group row ">
                                                    <div class="custom-form-group mb-3 col-lg-3">
                                                        <label for="image" class=" text-lg-right text-black">
                                                            {{ __('Member Image') }} </label>
                                                        <div class="upload-img-box">
                                                            <img src="" alt="">
                                                            <input type="file" name="image" id="image"
                                                                accept="image/*"
                                                                onchange="preview300343DimensionFile(this)">
                                                            <div class="upload-img-box-icon">
                                                                <i class="fa fa-camera"></i>
                                                                <p class="m-0">{{ __('Image') }}</p>
                                                            </div>
                                                        </div>
                                                        <p><span class="text-black">{{ __('Accepted Files') }}:
                                                            </span>JPG, JPEG, PNG <br> <span
                                                                class="text-black">{{ __('Accepted Size') }}:</span> 300 x
                                                            343 (1MB)</p>
                                                    </div>

                                                    <div class="custom-form-group mb-3 col-lg-4">
                                                        <label for="name" class="text-lg-right text-black">
                                                            {{ __('Name') }} </label>
                                                        <input type="text" name="name" id="name"
                                                            value="" class="form-control"
                                                            placeholder="{{ __('Type name') }}" required>
                                                    </div>
                                                    <div class="custom-form-group mb-3 col-lg-4">
                                                        <label for="designation" class="text-lg-right text-black">
                                                            {{ __('Designation') }} </label>
                                                        <input type="text" name="designation" id="designation"
                                                            value="" class="form-control"
                                                            placeholder="{{ __('Type designation') }}" required>
                                                    </div>

                                                    <div class="col-lg-1 mb-3 removeClass">
                                                        <label
                                                            class="text-lg-right text-black opacity-0">{{ __('Remove') }}</label>
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
                                        <div class="col-md-2 text-right">
                                            <button type="submit"
                                                class="btn btn-primary float-right">{{ __('Update') }}</button>
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
                        url: '{{ url('admin/settings/about/memberDelete') }}',
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

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
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
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
                            <form action="{{ route('settings.about.upgrade-skill.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Upgrade Skill Logo -->
                                <div class="custom-form-group mb-3 row">
                                    <label class="col-lg-3 text-lg-right text-black">{{ __('Upgrade Skill Logo') }}</label>
                                    <div class="col-lg-3">
                                        <div class="upload-img-box">
                                            <img src="{{ @$aboutUsGeneral->upgrade_skill_logo ? getImageFile(@$aboutUsGeneral->upgrade_skill_logo_path) : '' }}" alt="">
                                            <input type="file" name="upgrade_skill_logo" id="upgrade_skill_logo" accept="image/*" onchange="previewFile(this)">
                                            <div class="upload-img-box-icon">
                                                <i class="fa fa-camera"></i>
                                            </div>
                                        </div>
                                        @if ($errors->has('upgrade_skill_logo'))
                                            <span class="text-danger">
                                                <i class="fas fa-exclamation-triangle"></i> {{ $errors->first('upgrade_skill_logo') }}
                                            </span>
                                        @endif
                                        <p><span class="text-black">{{ __('Accepted Files') }}:</span> JPG, JPEG, PNG <br> <span class="text-black">{{ __('Accepted Size') }}:</span> 505 x 540 (1MB)</p>
                                    </div>
                                </div>

                                <!-- Title -->
                                <div class="custom-form-group mb-3 row">
                                    <label class="col-lg-3 text-lg-right text-black">{{ __('Title') }}</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="upgrade_skill_title" value="{{ @$aboutUsGeneral->upgrade_skill_title }}" class="form-control" placeholder="{{ __('Type upgrade skill title') }}">
                                    </div>
                                </div>

                                <!-- Subtitle -->
                                <div class="custom-form-group mb-3 row">
                                    <label class="col-lg-3 text-lg-right text-black">{{ __('Subtitle') }}</label>
                                    <div class="col-lg-9">
                                        <textarea name="upgrade_skill_subtitle" class="form-control" rows="5" required>{{ @$aboutUsGeneral->upgrade_skill_subtitle }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <!-- Dynamic Upgrade Skills -->
                                <div id="add_repeater" class="mb-3">
                                    <div data-repeater-list="upgrade_skills">
                                        @foreach ($upgradeSkills as $skill)
                                            <div data-repeater-item class="form-group row">
                                                <input type="hidden" name="id" value="{{ $skill['id'] }}" />

                                                <!-- Skill Image -->
                                                <div class="custom-form-group mb-3 col-lg-3">
                                                    <label class="text-lg-right text-black">{{ __('Skill Image') }}</label>
                                                    <div class="upload-img-box">
                                                        <img src="{{ $skill->image ? getImageFile($skill->image_path) : '' }}" alt="">
                                                        <input type="file" name="image" accept="image/*" onchange="previewFile(this)">
                                                        <div class="upload-img-box-icon">
                                                            <i class="fa fa-camera"></i>
                                                        </div>
                                                    </div>
                                                    <p><span class="text-black">{{ __('Accepted Files') }}:</span> JPG, JPEG, PNG <br> <span class="text-black">{{ __('Accepted Size') }}:</span> 300 x 343 (1MB)</p>
                                                </div>

                                                <!-- Skill Name -->
                                                <div class="custom-form-group mb-3 col-lg-4">
                                                    <label class="text-lg-right text-black">{{ __('Skill Name') }}</label>
                                                    <input type="text" name="name" value="{{ $skill['name'] }}" class="form-control" placeholder="{{ __('Type skill name') }}" required>
                                                </div>

                                                <!-- Skill Description -->
                                                <div class="custom-form-group mb-3 col-lg-4">
                                                    <label class="text-lg-right text-black">{{ __('Description') }}</label>
                                                    <textarea name="description" class="form-control" rows="3" placeholder="{{ __('Type skill description') }}" required>{{ $skill['description'] }}</textarea>
                                                </div>

                                                <!-- Remove Button -->
                                                <div class="col-lg-1">
                                                    <label class="text-lg-right text-black opacity-0">{{ __('Remove') }}</label>
                                                    <a href="javascript:;" onclick="deleteSkill({{ $skill['id'] }}, this)" class="btn btn-icon-remove btn-danger">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-2 mt-3">
                                        <a href="javascript:;" data-repeater-create class="btn btn-blue">
                                            <i class="fas fa-plus"></i> {{ __('Add') }}
                                        </a>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row justify-content-end">
                                    <div class="col-md-2 text-right">
                                        <button type="submit" class="btn btn-primary float-right">{{ __('Update') }}</button>
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
                // Initialize Repeater
                $('#add_repeater').repeater({
                    initEmpty: false,
                    defaultValues: {
                        'name': '',
                        'description': '',
                    },
                    show: function() {
                        $(this).slideDown();
                    },
                    hide: function(deleteElement) {
                        if (confirm("Are you sure you want to delete this skill?")) {
                            $(this).slideUp(deleteElement);
                        }
                    }
                });

                // Delete skill via AJAX
                window.deleteSkill = function(skillId, element) {
                    if (confirm("Are you sure you want to delete this skill?")) {
                        $.ajax({
                            url: '{{ route('settings.about.skill.delete') }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: skillId
                            },
                            success: function(response) {
                                if (response.success) {
                                    $(element).closest('[data-repeater-item]').remove();
                                    alert(response.message);
                                } else {
                                    alert('Failed to delete skill.');
                                }
                            },
                            error: function() {
                                alert('An error occurred.');
                            }
                        });
                    }
                };

                // Preview uploaded image
                window.previewFile = function(input) {
                    const file = input.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            $(input).siblings('img').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                };
            });
        })(jQuery);
    </script>
@endsection

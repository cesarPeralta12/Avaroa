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
                            <h2>{{ __('Gallery Settings') }}</h2>
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
                        <form action="{{ route('settings.about.gallery-area.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Gallery Title -->
                            <div class="custom-form-group mb-3 row">
                                <label class="col-lg-3 text-lg-right text-black">{{ __('Gallery Title') }}</label>
                                <div class="col-lg-9">
                                    <input type="text" name="gallery_title" value="{{ @$gallerySettings->gallery_title }}" class="form-control" placeholder="{{ __('Type gallery title') }}">
                                </div>
                            </div>

                            <!-- Gallery Subtitle -->
                            <div class="custom-form-group mb-3 row">
                                <label class="col-lg-3 text-lg-right text-black">{{ __('Gallery Subtitle') }}</label>
                                <div class="col-lg-9">
                                    <textarea name="gallery_subtitle" class="form-control" rows="5" placeholder="{{ __('Type gallery subtitle') }}">{{ @$gallerySettings->gallery_subtitle }}</textarea>
                                </div>
                            </div>

                            <hr>

                            <!-- Repeater Section -->
                            <div id="gallery_repeater" class="mb-3">
                                <div data-repeater-list="gallery_images">
                                    <div data-repeater-item class="form-group row">
                                        <div class="col-md-4">
                                            <div class="upload-img-box">
                                                <img src="" alt="Preview" class="preview-img">
                                                <input type="file" name="image" accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="caption" class="form-control" placeholder="Caption">
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:;" data-repeater-delete class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="addImage" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus"></i> Add Image
                                </button>
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

<!-- JavaScript -->
<script>
    (function ($) {
        "use strict";

        $(document).ready(function () {
            let galleryRepeaterId = "#gallery_repeater";

            // Initialize repeater
            $(galleryRepeaterId).repeater({
                initEmpty: false,
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm("Are you sure you want to delete this image?")) {
                        $(this).slideUp(deleteElement);
                    }
                },
            });

            // Image preview
            window.previewFile = function (input) {
                const file = input.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $(input).siblings('img.preview-img').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            };
        });
    })(jQuery);
</script>

@endsection

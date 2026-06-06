@extends('layout.master')

@section('title')
    {{ __('Add New Testimonial') }}
@endsection

@section('main_content')
    <!-- Page content area start -->

        <div class="container">
            <!-- Add testimonial page start-->
            <div class="card mt-4 p-4 " >
                <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-vertical__item bg-style">
                                <div class="item-top mb-30">
                                    <h2>{{ __('Add New Testimonial') }}</h2>
                                </div>
                                <form id="Form" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Testimonial Name -->
                                    <div class="input__group mb-25">
                                        <label for="name"> {{ __('Client Name') }} </label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            class="form-control flat-input" placeholder="{{ __('Client Name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <!-- Testimonial Role -->
                                    <div class="input__group mb-25">
                                        <label for="role"> {{ __('Client Role') }} </label>
                                        <input type="text" name="role" id="role" value="{{ old('role') }}"
                                            class="form-control flat-input" placeholder="{{ __('Client Role') }}">
                                        @if ($errors->has('role'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('role') }}</span>
                                        @endif
                                    </div>

                                    <!-- Testimonial Feedback -->
                                    <div class="input__group mb-25">
                                        <label for="feedback"> {{ __('Testimonial') }} </label>
                                        <textarea name="feedback" id="feedback" rows="4" class="form-control"
                                            placeholder="{{ __('Client Testimonial') }}">{{ old('feedback') }}</textarea>
                                        @if ($errors->has('feedback'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('feedback') }}</span>
                                        @endif
                                    </div>

                                    <!-- Client Image -->
                                    <div class="input__group mb-25">
                                        <label for="image"> {{ __('Client Image') }} </label>
                                        <input type="file" name="image" id="image" class="form-control flat-input" accept="image/*">
                                        @if ($errors->has('image'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('image') }}</span>
                                        @endif
                                    </div>

                                    <!-- Image Preview -->
                                    <div class="input__group mb-25">
                                        <label for="imagePreview">{{ __('Image Preview') }}</label>
                                        <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; display: none;" />
                                    </div>

                                    <br>

                                    <!-- Submit Button -->
                                    <div class="input__group mb-25">
                                        <div class="">
                                            <button class="btn btn-primary" type="submit">Save</button>
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

    <!-- jQuery (required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
    // Image Preview Functionality
    $('#image').change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(this.files[0]);
    });

    // Submit Form with AJAX
    $('#Form').submit(function (e) {
        e.preventDefault();  // Prevent default form submission

        let formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "{{ route('testimonials.store') }}", // Ensure this route is correct for storing testimonials
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token to header
            },
            success: function (response) {
                if (response.success) {
                    // SweetAlert success notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Testimonial Created Successfully',
                        text: response.message || 'The testimonial was created successfully.',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('testimonials.index') }}"; // Redirect to testimonial list
                        }
                    });
                } else {
                    // SweetAlert error notification
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Creating Testimonial',
                        text: response.message || 'Unable to create the testimonial.',
                        confirmButtonText: 'OK',
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                // SweetAlert error notification
                Swal.fire({
                    icon: 'error',
                    title: 'An error occurred',
                    text: 'Unable to create the testimonial. Please try again later.',
                    confirmButtonText: 'OK',
                });
            }
        });
    });
});

        </script>
@endsection

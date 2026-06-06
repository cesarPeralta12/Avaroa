@extends('layout.master')

@section('title')
    {{ __('Edit Testimonial') }}
@endsection

@section('main_content')
    <!-- Page content area start -->

        <div class="container">
            <!-- Edit page start-->
            <div class="card mt-4 p-4 ">
                <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-vertical__item bg-style">
                                <div class="item-top mb-30">
                                    <h2>{{ __('Edit Testimonial') }}</h2>
                                </div>
                                <form id="update-testimonial-form" action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Testimonial Name -->
                                    <div class="input__group mb-25">
                                        <label for="name"> {{ __('Client Name') }} </label>
                                        <input type="text" name="name" id="name"
                                            value="{{ $testimonial->client_name }}" class="form-control flat-input"
                                            placeholder="{{ __('Client Name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <!-- Testimonial Role -->
                                    <div class="input__group mb-25">
                                        <label for="role"> {{ __('Client Role') }} </label>
                                        <input type="text" name="role" id="role"
                                            value="{{ $testimonial->client_role }}" class="form-control flat-input"
                                            placeholder="{{ __('Client Role') }}">
                                        @if ($errors->has('role'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('role') }}</span>
                                        @endif
                                    </div>

                                    <!-- Testimonial Feedback -->
                                    <div class="input__group mb-25">
                                        <label for="feedback"> {{ __('Testimonial') }} </label>
                                        <textarea name="feedback" id="feedback" rows="4" class="form-control"
                                            placeholder="{{ __('Client Testimonial') }}">{{ $testimonial->content }}</textarea>
                                        @if ($errors->has('feedback'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('feedback') }}</span>
                                        @endif
                                    </div>

                                    <!-- Testimonial Image -->
                                    <div class="input__group mb-25">
                                        <label for="image">{{ __('Client Image') }}</label>
                                        <input type="file" name="image" id="image" class="form-control flat-input">
                                        @if ($testimonial->client_image_url)
                                            <div class="mt-2">
                                                <img src="{{ asset($testimonial->client_image_url) }}" alt="Client Image"
                                                    width="100">
                                            </div>
                                        @endif
                                        @if ($errors->has('image'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                    <br>
                                    <!-- Submit Button -->
                                    <div class="input__group mb-25">
                                        <div class="">
                                            <button class="btn btn-primary" type="submit">Update</button>
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
        $(document).ready(function() {
    // Submit the update form via AJAX (for Update)
    $('#update-testimonial-form').submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Collect form data including files

        $.ajax({
            url: $(this).attr('action'), // The action URL, which is the update route
            type: 'POST',
            data: formData,
            contentType: false, // Do not set content type
            processData: false, // Do not process data
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token to header
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Testimonial Updated',
                        text: response.message,
                    }).then(function() {
                        // Redirect to the index page after success
                        window.location.href = '{{ route('testimonials.index') }}'; // Redirect after success
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred. Please try again.',
                });
            }
        });
    });
});

    </script>
@endsection

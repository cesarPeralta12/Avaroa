@extends('layout.master')
@section('title')
    {{ __('Edit Portfolio') }}
@endsection
@section('main_content')
    <!-- Page content area start -->

        <div class="container">
            <!-- Edit page start-->
            <div class="card mt-4 p-4 " >
                <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-vertical__item bg-style">
                                <div class="item-top mb-30">
                                    <h2>{{ __('Edit Portfolio') }}</h2>
                                </div>
                                <form id="Form" method="POST">
                                    @csrf
                                    <!-- Portfolio Title -->
                                    <div class="input__group mb-25">
                                        <label for="title"> {{ __('Project Title') }} </label>
                                        <input type="text" name="title" id="title" value="{{ $portfolioItem->title }}"
                                            class="form-control flat-input" placeholder="{{ __('Project Title') }}">
                                        @if ($errors->has('title'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('title') }}</span>
                                        @endif
                                    </div>

                                    <!-- Portfolio Description -->
                                    <div class="input__group mb-25">
                                        <label for="description"> {{ __('Description') }} </label>
                                        <textarea name="description" id="description" rows="4" class="form-control"
                                            placeholder="{{ __('Description') }}">{{ $portfolioItem->description }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('description') }}</span>
                                        @endif
                                    </div>

                                    <!-- Portfolio Image URL -->
                                    <div class="input__group mb-25">
                                        <label for="image_url"> {{ __('Image URL') }} </label>
                                        <input type="url" name="image_url" id="image_url" value="{{ $portfolioItem->image_url }}"
                                            class="form-control flat-input" placeholder="{{ __('Image URL') }}">
                                        @if ($errors->has('image_url'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('image_url') }}</span>
                                        @endif
                                    </div>

                                    <!-- Portfolio Link URL -->
                                    <div class="input__group mb-25">
                                        <label for="link"> {{ __('Project Link') }} </label>
                                        <input type="url" name="link" id="link" value="{{ $portfolioItem->link }}"
                                            class="form-control flat-input" placeholder="{{ __('Project Link') }}">
                                        @if ($errors->has('link'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('link') }}</span>
                                        @endif
                                    </div>

                                    <!-- Skills (Multiple Select) -->
                                    <div class="input__group mb-25">
                                        <label for="skills"> {{ __('Skills') }} </label>
                                        <select name="skills[]" id="skills" class="form-control select2" multiple>
                                            <option value="PHP" {{ in_array('PHP', explode(',', $portfolioItem->skills)) || in_array('PHP', old('skills', [])) ? 'selected' : '' }}>PHP</option>
                                            <option value="Laravel" {{ in_array('Laravel', explode(',', $portfolioItem->skills)) || in_array('Laravel', old('skills', [])) ? 'selected' : '' }}>Laravel</option>
                                            <option value="JavaScript" {{ in_array('JavaScript', explode(',', $portfolioItem->skills)) || in_array('JavaScript', old('skills', [])) ? 'selected' : '' }}>JavaScript</option>
                                            <option value="HTML/CSS" {{ in_array('HTML/CSS', explode(',', $portfolioItem->skills)) || in_array('HTML/CSS', old('skills', [])) ? 'selected' : '' }}>HTML/CSS</option>
                                            <option value="Vue.js" {{ in_array('Vue.js', explode(',', $portfolioItem->skills)) || in_array('Vue.js', old('skills', [])) ? 'selected' : '' }}>Vue.js</option>
                                            <option value="MySQL" {{ in_array('MySQL', explode(',', $portfolioItem->skills)) || in_array('MySQL', old('skills', [])) ? 'selected' : '' }}>MySQL</option>
                                        </select>
                                        @if ($errors->has('skills'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('skills') }}</span>
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
            $('#Form').submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('portfolios.update', $portfolioItem->id) }}", // Correct route for update
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Portfolio updated successfully',
                                text: response.message || 'The portfolio was updated successfully.',
                                confirmButtonText: 'Accept',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('portfolios.index') }}"; // Redirect to portfolio list
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error updating portfolio',
                                text: response.message || 'Unable to update the portfolio.',
                                confirmButtonText: 'Accept',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'An error occurred',
                            text: 'The portfolio could not be updated. Please try again later.',
                            confirmButtonText: 'Accept',
                        });
                    }
                });
            });
        });
    </script>
@endsection

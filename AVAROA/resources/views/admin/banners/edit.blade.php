@extends('layout.master')
@section('title')
    Editar banner
@endsection
@section('main_content')
    <!-- page-wrapper Start-->

        <div class="container">

                <div class="card mt-4 p-4" >
                    <div class="card-body">
                        <h4 class="text-center">Editar banner</h4>

                        <!-- Form to edit an existing banner -->
                        <form action="{{ route('admin.banners.update', $banner->id) }}" class="theme-form" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ session('success') }}</p>
                                </div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">
                                    <p>{{ session('fail') }}</p>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title1">Título 1:</label>
                                        <input type="text" class="form-control" name="title1" value="{{ old('title1', $banner->title1) }}">
                                        @error('title1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="title2">Título 2:</label>
                                        <input type="text" class="form-control" name="title2" value="{{ old('title2', $banner->title2) }}">
                                        @error('title2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="title3">Título 3:</label>
                                        <input type="text" class="form-control" name="title3" value="{{ old('title3', $banner->title3) }}">
                                        @error('title3')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="button">Botón:</label>
                                        <input type="text" class="form-control" name="button" value="{{ old('button', $banner->button) }}" placeholder="Texto del botón">
                                        @error('button')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="link">Enlace de botón:</label>
                                        <input type="text" class="form-control" name="link" value="{{ old('link', $banner->link) }}" placeholder="https://example.com">
                                        @error('link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Imagen:</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                        <img id="preview" src="#" alt="Imagen Preview" style="display:none; width: 100%; max-width: 500px; margin-top: 10px;" />
                                        <span>Image must 1920*1280 Dimension</span>
                                    </div>

                                    <script>
                                        document.getElementById('image').addEventListener('change', function(event) {
                                            var reader = new FileReader();
                                            reader.onload = function() {
                                                var preview = document.getElementById('preview');
                                                preview.src = reader.result;
                                                preview.style.display = 'block';
                                            }
                                            reader.readAsDataURL(event.target.files[0]);
                                        });

                                        // Set preview if there's an existing image
                                        window.onload = function() {
                                            var preview = document.getElementById('preview');
                                            var existingImage = "{{ asset($banner->image) }}";
                                            preview.src = existingImage;
                                            preview.style.display = 'block';
                                        }
                                    </script>
                                </div>

                                <div class="col-sm-6 text-center">
                                    <img src="{{ asset('Screenshot (317).png') }}" width="300px" alt="Ejemplo de Banner" class="img-fluid" style="margin-top: 20px;">
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Actualizar banner</button>
                        </form>
                    </div>

                </div>

        </div>
        <!-- sign up page ends-->

    <!-- page-wrapper Ends-->
@endsection

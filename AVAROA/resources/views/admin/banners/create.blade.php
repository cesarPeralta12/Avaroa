@extends('layout.master')
@section('title')
    Agregar banner
@endsection
@section('main_content')
    <!-- page-wrapper Start-->

        <div class="container">
            <div class="card" >
                <div class="card-header text-center">
                    <h4>Agregar banner</h4>
                </div>
                <div class="card-body">

                    <!-- Form to create a new banner -->
                    <form action="{{ route('admin.banners.store') }}" class="theme-form" method="post" enctype="multipart/form-data">
                        @csrf

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
                                    <input type="text" class="form-control" name="title1" value="{{ old('title1') }}" placeholder="Colección 2024">
                                    @error('title1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title2">Título 2:</label>
                                    <input type="text" class="form-control" name="title2" value="{{ old('title2') }}" placeholder="Ruedas">
                                    @error('title2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title3">Título 3:</label>
                                    <input type="text" class="form-control" name="title3" value="{{ old('title3') }}" placeholder="Parte del cuerpo">
                                    @error('title3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="button">Botón:</label>
                                    <input type="text" class="form-control" name="button" value="{{ old('button') }}" placeholder="Texto del botón">
                                    @error('button')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link">Enlace de botón:</label>
                                    <input type="text" class="form-control" name="link" value="{{ old('link') }}" placeholder="https://example.com">
                                    <small class="form-text text-muted">Enlaces disponibles que puedes introducir en la entrada de enlaces</small>
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
                                </script>
                            </div>
                            <br>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="page_banner" class="form-label">Seleccione una opción:</label>
                                    <select class="form-select text-dark" name="page_banner" id="page_banner" onchange="window.location.href=this.value">
                                        <option value="">Seleccione una opción</option>
                                        <option value="nosotros">Nosotros</option>
                                        <option value="course">Cursos</option>
                                        <option value="blog">Blog</option>
                                        <option value="contact">Contáctanos</option>
                                        <option value="ayuda">¿Necesitas ayuda?</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-6 text-center">
                                <img src="{{ asset('Screenshot (317).png') }}" width="300px" alt="Ejemplo de Banner" class="img-fluid" style="margin-top: 20px;">
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Crear banner</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- sign up page ends-->

    <!-- page-wrapper Ends-->
@endsection

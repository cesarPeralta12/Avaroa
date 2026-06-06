@extends('layout.master')

@section('title')
    Editar Noticia
@endsection

@section('main_content')
    <!-- Page content area start -->

        <div class="card" >
            <div class="card-body">
                <h1>Editar Noticia</h1>
                <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data" id="newsForm">
                    @csrf
                    @method('POST') <!-- Use POST method, typically for updates when route expects POST -->

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label text-light">Título</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- News Type -->
                    <div class="mb-3">
                        <label for="type" class="form-label text-light">Tipo</label>
                        <select name="type" class="form-control" id="newsType" required>
                            <option value="text" {{ $news->type == 'text' ? 'selected' : '' }}>Texto</option>
                            <option value="image" {{ $news->type == 'image' ? 'selected' : '' }}>Imagen</option>
                            <option value="audio" {{ $news->type == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="video" {{ $news->type == 'video' ? 'selected' : '' }}>Video</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Content Field for Text -->
                    <div class="mb-3" id="textField" >
                        <label for="content" class="form-label text-light">Contenido</label>
                        <textarea name="content" class="form-control" id="editor1" rows="5">{{ old('content', $news->content) }}</textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- File Field for Image, Audio, Video -->
                    <div class="mb-3" id="fileField" style="{{ $news->type == 'text' ? 'display: none;' : '' }}">
                        <label for="file" class="form-label text-light">Archivo</label>
                        <input type="file" name="file" class="form-control" id="fileInput">
                        @if ($news->file_path) <!-- Display current file (image/audio/video) -->
                            <div class="mt-2">
                                @if ($news->type == 'image')
                                    <img src="{{ asset($news->file_path) }}" alt="Current Image" class="img-fluid" style="max-height: 150px;">
                                @elseif ($news->type == 'audio')
                                    <audio controls>
                                        <source src="{{ asset($news->file_path) }}" type="audio/mp3">
                                    </audio>
                                @elseif ($news->type == 'video')
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset($news->file_path) }}" type="video/mp4">
                                    </video>
                                @endif
                            </div>
                        @endif

                        <!-- Preview uploaded file (for image, audio, and video) -->
                        <div class="mt-2" id="filePreview" style="display: none;">
                            <img id="imagePreview" src="#" alt="Preview" class="img-fluid" style="max-height: 150px;">
                            <audio id="audioPreview" controls style="display: none;">
                                <source src="#" type="audio/mp3">
                            </audio>
                            <video id="videoPreview" width="320" height="240" controls style="display: none;">
                                <source src="#" type="video/mp4">
                            </video>
                        </div>

                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Thumbnail Field -->
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label text-light">Portada (Thumbnail)</label>
                        <input type="file" name="thumbnail" class="form-control">
                        @if ($news->thumbnail) <!-- Display current thumbnail -->
                            <div class="mt-2">
                                <img src="{{ asset($news->thumbnail) }}" alt="Current Thumbnail" class="img-fluid" style="max-height: 150px;">
                            </div>
                        @endif
                        @error('thumbnail')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Author -->
                    <div class="mb-3">
                        <label for="author" class="form-label text-light">Autor</label>
                        <input type="text" name="author" class="form-control" value="{{ old('author', $news->author) }}">
                        @error('author')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>

    <!-- Page content area end -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const newsType = document.getElementById('newsType');

            const fileField = document.getElementById('fileField');
            const fileInput = document.getElementById('fileInput');
            const filePreview = document.getElementById('filePreview');
            const imagePreview = document.getElementById('imagePreview');
            const audioPreview = document.getElementById('audioPreview');
            const videoPreview = document.getElementById('videoPreview');

            // Show/Hide fields based on selected type
            newsType.addEventListener('change', function () {
                const type = this.value;

                // Reset all fields

                fileField.style.display = 'none';
                filePreview.style.display = 'none';

                // Display the appropriate field based on the selected news type
                 if (type === 'image' || type === 'audio' || type === 'video') {
                    fileField.style.display = 'block';
                }
            });

            // Handle file input for preview
            fileInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                const fileType = file.type.split('/')[0]; // Extract the type (image/audio/video)

                // Display preview based on file type
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        if (fileType === 'image') {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                            audioPreview.style.display = 'none';
                            videoPreview.style.display = 'none';
                        } else if (fileType === 'audio') {
                            audioPreview.src = e.target.result;
                            audioPreview.style.display = 'block';
                            imagePreview.style.display = 'none';
                            videoPreview.style.display = 'none';
                        } else if (fileType === 'video') {
                            videoPreview.src = e.target.result;
                            videoPreview.style.display = 'block';
                            imagePreview.style.display = 'none';
                            audioPreview.style.display = 'none';
                        }

                        filePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Trigger the change event on page load to handle old values
            newsType.dispatchEvent(new Event('change'));
        });
    </script>
@endsection

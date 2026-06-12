@extends('layout.master')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/summernote.css') }}">
@endsection
@section('main_content')

        <div class="container-fluid" >
                <div class="col-sm-12">
                    <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                    <div class="card mt-4 p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="customers__area bg-style mb-30">
                                    <div class="item-title d-flex justify-content-between">
                                        <h2>{{ __('Editar Blog') }}</h2>
                                    </div>
                                    <form action="{{ url('admin/blog/update', [$blog->uuid]) }}" method="post"
                                        class="theme-form form-horizontal" enctype="multipart/form-data">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">
                                                <p>{{ session::get('success') }}</p>
                                            </div>
                                        @endif
                                        @if (Session::has('fail'))
                                            <div class="alert alert-danger">
                                                <p>{{ session::get('fail') }}</p>
                                            </div>
                                        @endif
                                        @csrf

                                        <div class="input__group mb-25">
                                            <label>{{ __('Título') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="title" value="{{ $blog->title }}"
                                                placeholder="{{ __('Título') }}" class="form-control slugable"
                                                onkeyup="slugable()">
                                            @if ($errors->has('title'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label>{{ __('Slug') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="slug" value="{{ $blog->slug }}"
                                                placeholder="{{ __('Slug') }}" class="form-control slug"
                                                onkeyup="getMyself()">
                                            @if ($errors->has('slug'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('slug') }}</span>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label>{{ __('Descripción breve') }} <span class="text-danger">*</span></label>
                                            <textarea name="short_description" id="editor1" >{{ $blog->short_description }}</textarea>

                                            @if ($errors->has('short_description'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('short_description') }}</span>
                                            @endif

                                        </div>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label for="blog_category_id"> {{ __('Categoría del Blog') }} </label>
                                            <select name="blog_category_id" id="blog_category_id" class="form-control">
                                                <option value="">--{{ __('Select Option') }}--</option>
                                                @foreach ($blogCategories as $blogCategory)
                                                    <option value="{{ $blogCategory->id }}"
                                                        @if ($blogCategory->id = $blog->blog_category_id) selected @endif>
                                                        {{ $blogCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label>Estado</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">--{{ __('Select Option') }}--</option>
                                                <option value="1" @if ($blog->status == 1) selected @endif>
                                                    {{ __('Published') }}</option>
                                                <option value="0" @if ($blog->status != 1) selected @endif>
                                                    {{ __('Unpublished') }}</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label for="tag_ids"> {{ __('Etiqueta') }} </label>
                                            <select name="tag_ids[]" multiple id="tag_ids"
                                                class="multiple-basic-single form-control">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}"
                                                        {{ in_array($tag->id, @$blog->tags->pluck('tag_id')->toArray() ?? []) ? 'selected' : null }}>
                                                        {{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label>{{ __('Detalles') }} <span class="text-danger">*</span></label>
                                            <textarea name="details" class="summernote">{{ $blog->details }}</textarea>

                                            @if ($errors->has('details'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('details') }}</span>
                                            @endif

                                        </div>
                                        <br>
                                        <div class="row">
                                            <label>{{ __('Imagen OG') }}</label>
                                            <div class="col-md-3">
                                                <div class="upload-img-box mb-25">
                                                    @if ($blog->image)
                                                        <img src="{{ asset($blog->image_path) }}" alt="img">
                                                    @else
                                                        <img src="" alt="No img">
                                                    @endif
                                                    <input type="file" name="image" id="image" accept="image/*"
                                                        onchange="previewFile(this)">
                                                    <div class="upload-img-box-icon">
                                                        <i class="fa fa-camera"></i>
                                                        <p class="m-0">{{ __('Image') }}</p>
                                                    </div>
                                                </div>
                                                @if ($errors->has('image'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                        {{ $errors->first('image') }}</span>
                                                @endif
                                                <p>{{ __('Archivos Aceptados') }}: JPEG, JPG, PNG <br>
                                                    {{ __('Tamaño Recomendado') }}: 870 x 500 (1MB)</p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label>{{ __('Título Meta') }}</label>
                                            <input type="text" name="meta_title"
                                                value="{{ old('meta_title', $blog->meta_title) }}"
                                                placeholder="{{ __('Título Meta') }}" class="form-control">
                                            @if ($errors->has('meta_title'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('meta_title') }}</span>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label>{{ __('Descripción Meta') }}</label>
                                            <input type="text" name="meta_description"
                                                value="{{ old('meta_description', $blog->meta_description) }}"
                                                placeholder="{{ __('Descripción Meta') }}" class="form-control">
                                            @if ($errors->has('meta_description'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('meta_description') }}</span>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label>{{ __('Palabras Clave Meta') }}</label>
                                            <input type="text" name="meta_keywords"
                                                value="{{ old('meta_keywords', $blog->meta_keywords) }}"
                                                placeholder="{{ __('Palabras Clave Meta') }}" class="form-control">
                                            @if ($errors->has('meta_keywords'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('meta_keywords') }}</span>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="input__group mb-25">
                                            <label>{{ __('Imagen OG') }}</label>
                                            <div class="upload-img-box">
                                                @if ($blog->og_image != null && $blog->og_image != '')
                                                    <img src="{{ getImageFile($blog->og_image) }}">
                                                @else
                                                    <img src="">
                                                @endif
                                                <input type="file" name="og_image" id="og_image" accept="image/*"
                                                    onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{ __('OG Image') }}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('og_image'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('og_image') }}</span>
                                            @endif
                                            <p><span class="text-black">{{ __('Archivos Aceptados') }}:</span> PNG, JPG
                                                <br>
                                                <span class="text-black">{{ __('Tamaño Recomendado') }}:</span> 1200 x 627
                                            </p>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12 text-right">
                                                <button class="btn btn-primary" type="submit">Actualizar</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>


@endsection
@section('scripts')
    <script src="{{ asset('assets/js/jquery.ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/editor/summernote/summernote.js') }}"></script>
    <script src="{{ asset('assets/js/editor/summernote/summernote.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection

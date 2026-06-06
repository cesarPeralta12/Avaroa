@extends('layout.master')
@section('title')
    {{ $title }}
@endsection
@section('main_content')

        <!-- Page content area start -->
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card form-vertical__item bg-style" >
                            <div class="card-header item-top mb-30">
                                <h2>{{ __('Agregar subcategoría') }}</h2>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('subcategory.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="input__group mb-25">
                                        <label for="parent_category_id"> {{ __('Categoría principal') }} </label>
                                        <select name="parent_category_id" id="parent_category_id"
                                            class="select2 form-control">
                                            <option value="">{{ __('Seleccionar categoría principal') }}</option>
                                            @foreach ($categories as $parentCategory)
                                                <option value="{{ $parentCategory->id }}"
                                                    {{ old('parent_category_id') == $parentCategory->id ? 'selected' : '' }}>
                                                    {{ $parentCategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('parent_category_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('parent_category_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="input__group mb-25">
                                        <label for="category_id"> {{ __('Categoría') }} </label>
                                        <select name="category_id" id="category_id" class="select2 form-control">
                                            <option value="">{{ __('Seleccionar Categoría') }}</option>
                                            @foreach ($subcategories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="input__group mb-25">
                                        <label for="name"> {{ __('Nombre') }} </label>
                                        <div>
                                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                                class="form-control" placeholder="{{ __('Nombre') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="input__group mb-25">
                                        <label>{{ __('Meta título') }}</label>
                                        <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                                            placeholder="{{ __('Meta título') }}" class="form-control">
                                        @if ($errors->has('meta_title'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('meta_title') }}</span>
                                        @endif
                                    </div>

                                    <div class="input__group mb-25">
                                        <label>{{ __('Meta descripción') }}</label>
                                        <input type="text" name="meta_description" value="{{ old('meta_description') }}"
                                            placeholder="{{ __('Meta descripción') }}" class="form-control">
                                        @if ($errors->has('meta_description'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('meta_description') }}</span>
                                        @endif
                                    </div>

                                    <div class="input__group mb-25">
                                        <label>{{ __('Meta Palabras clave') }}</label>
                                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}"
                                            placeholder="{{ __('meta Palabras clave') }}" class="form-control">
                                        @if ($errors->has('meta_keywords'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('meta_keywords') }}</span>
                                        @endif
                                    </div>

                                    <div class="input__group mb-25">
                                        <label>{{ __('Y imagen') }}</label>
                                        <div class="upload-img-box">
                                            <img src="">
                                            <input type="file" name="og_image" id="og_image" accept="image/*"
                                                onchange="previewFile(this)">
                                            <div class="upload-img-box-icon">
                                                <i class="fa fa-camera"></i>
                                                <p class="m-0">{{ __('Y imagen') }}</p>
                                            </div>
                                        </div>
                                        @if ($errors->has('og_image'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('og_image') }}</span>
                                        @endif
                                        <p><span class="text-black">{{ __('Archivos aceptados') }}:</span> PNG, JPG <br> <span
                                                class="text-black">{{ __('Recomendar tamaño') }}:</span> 1200 x 627</p>
                                    </div>

                                    <div class="input__group">
                                        <div>
                                            <button type="submit" class="btn btn-primary">{{ __('Ahorrar') }}</button>
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

@endsection

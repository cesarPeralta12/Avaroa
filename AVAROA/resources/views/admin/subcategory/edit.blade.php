@extends('layout.master')
@section('title')
    Editar subcategoría
@endsection
@section('main_content')

 <!-- Page content area start -->
 <div class="page-content" style="background: #000">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card form-vertical__item bg-style" >
                    <div class="card-header item-top mb-30">
                        <h2>{{__('Editar subcategoría')}}</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('subcategory.update', [$subcategory->uuid])}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="input__group mb-25">
                                <label for="parent_category_id"> {{ __('Categoría principal') }} </label>
                                <select name="parent_category_id" id="parent_category_id"
                                    class="select2 form-control">
                                    <option value="">{{ __('Seleccionar categoría principal') }}</option>
                                    @foreach ($categories as $parentCategory)
                                        <option value="{{ $parentCategory->id }}"
                                           @if ($parentCategory->id == $subcategory->parent_category_id)
                                               @selected(true)
                                           @endif>
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
                                    <option value="">{{ __('selecciona una categoría') }}</option>
                                    @php

                                    @endphp
                                    @foreach ($subcategories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $subcategory->category_id)
                                               @selected(true)
                                           @endif>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                        {{ $errors->first('category_id') }}</span>
                                @endif
                            </div>


                            <div class="input__group mb-25">
                                <label for="name"> {{__('Nombre')}} </label>
                                <div>
                                    <input type="text" name="name" id="name" value="{{$subcategory->name}}" class="form-control" placeholder="{{__('Nombre')}} ">
                                    @if ($errors->has('name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="input__group mb-25">
                                <label>{{ __('Meta Título') }}</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title', $subcategory->meta_title) }}" placeholder="{{ __('Meta Título') }}" class="form-control">
                                @if ($errors->has('meta_title'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meta_title') }}</span>
                                @endif
                            </div>

                            <div class="input__group mb-25">
                                <label>{{ __('Meta Descripción') }}</label>
                                <input type="text" name="meta_description" value="{{ old('meta_description', $subcategory->meta_description) }}" placeholder="{{ __('meta Descripción') }}" class="form-control">
                                @if ($errors->has('meta_description'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meta_description') }}</span>
                                @endif
                            </div>

                            <div class="input__group mb-25">
                                <label>{{ __('Meta Palabras clave') }}</label>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords',  $subcategory->meta_keywords) }}" placeholder="{{ __('meta Palabras clave') }}" class="form-control">
                                @if ($errors->has('meta_keywords'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meta_keywords') }}</span>
                                @endif
                            </div>

                            <div class="input__group mb-25">
                                <label>{{ __('Y imagen') }}</label>
                                <div class="upload-img-box">
                                    @if($subcategory->og_image != NULL && $subcategory->og_image != '')
                                        <img src="{{getImageFile($subcategory->og_image)}}">
                                    @else
                                        <img src="">
                                    @endif
                                    <input type="file" name="og_image" id="og_image" accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="fa fa-camera"></i>
                                        <p class="m-0">{{__('Y imagen')}}</p>
                                    </div>
                                </div>
                                @if ($errors->has('og_image'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('og_image') }}</span>
                                @endif
                                <p><span class="text-black">{{ __('Archivos aceptados') }}:</span> PNG, JPG <br> <span class="text-black">{{ __('Recomendar tamaño') }}:</span> 1200 x 627</p>
                            </div>

                            <div class="input__group">
                                <div>
                                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
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



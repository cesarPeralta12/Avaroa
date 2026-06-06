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
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__content__left">
                                <div class="breadcrumb__title">
                                    <h2>{{ __('Blogs') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ url('admin/dashboard') }}">{{ __('Panel') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Blogs') }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" >
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
                            <div class="card-header">
                                <h2>{{ __('Blog Category') }}</h2>
                                <button class="btn btn-danger btn-sm " type="button" id="bulk-delete-btn">
                                    <i class="fa fa-trash"></i> {{ __('Delete Selected') }}
                                </button>
                                <button class="btn btn-success btn-sm pull-right mr-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#add-todo-modal">
                                    <i class="fa fa-plus"></i> {{ __('Agregar Categoría de Blog') }}
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form id="bulk-delete-form" method="POST" action="{{ route('blog.bulkDeleteBlogCategory') }}">
                                        @csrf
                                        <table id="basic-1" class="row-border data-table-filter table-style">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <input type="checkbox" id="select-all" class="mr-2">&nbsp;
                                                            <label for="select-all" class="mb-0 text-dark">Select All</label>
                                                        </div>
                                                    </th>
                                                    <th>{{ __('Nombre') }}</th>
                                                    <th>{{ __('Estado') }}</th>
                                                    <th>{{ __('Acción') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blogCategories as $category)
                                                    <tr class="removable-item">
                                                        <td class="text-center">
                                                            <input type="checkbox" class="select-item" name="selected_ids[]" value="{{ $category->uuid }}">
                                                        </td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            @if ($category->status == 1)
                                                                <span class="status bg-green">{{ __('Activo') }}</span>
                                                            @else
                                                                <span class="status bg-red">{{ __('Desactivado') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="action__buttons">
                                                                <a href="{{ route('blog.blog-category.delete', [$category->uuid]) }}"
                                                                    class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-category"
                                                                    data-id="{{ $category->uuid }}"
                                                                    data-toggle="tooltip" title="{{ trans('remove') }}">
                                                                    <i class="fa fa-remove"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content area end -->

        <!-- Add Modal section start -->
        <div class="modal fade" id="add-todo-modal" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Add Blog Category') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('blog.blog-category.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="input__group mb-30">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="{{ __('Type name') }}" value="" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                        {{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="input__group mb-30">
                                <label for="status" class="text-lg-right text-black"> {{ __('Status') }} </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">--{{ __('Select Option') }}--</option>
                                    <option value="1">{{ __('Active') }}</option>
                                    <option value="0">{{ __('Deactivated') }}</option>
                                </select>
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary btn-purple">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add Modal section end -->

        <!-- Edit Modal section start -->
        <div class="modal fade" id="edit-blog-category-modal" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Edit Blog Category') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateEditModal" method="post">
                        @csrf
                        @method('patch')
                        <div class="modal-body">
                            <div class="input__group mb-30">
                                <label for="edit_name">{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control" id="edit_name" placeholder="{{ __('Type name') }}" value="" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                        {{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="input__group mb-30">
                                <label for="edit_status" class="text-lg-right text-black">{{ __('Status') }}</label>
                                <select name="status" id="edit_status" class="form-control">
                                    <option value="">--{{ __('Select Option') }}--</option>
                                    <option value="1">{{ __('Active') }}</option>
                                    <option value="0">{{ __('Deactivated') }}</option>
                                </select>
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary btn-purple">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal section end -->


    <!-- JavaScript for Select All and Bulk Delete -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert Library -->
    <script>
        $(function() {
            'use strict';

            // Seleccionar/Deseleccionar todas las casillas de verificación
            document.getElementById('select-all').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.select-item');
                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
            });

            // SweetAlert para Confirmación de Eliminación (Individual)
            $('.delete-category').on('click', function(e) {
                e.preventDefault();
                const deleteUrl = $(this).attr('href');
                const categoryId = $(this).data('id');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¡No podrás recuperar este archivo imaginario!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, elimínalo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl; // Redirigir a la URL de eliminación
                    }
                });
            });

            // Acción de Eliminación Masiva
            $('#bulk-delete-btn').on('click', function() {
                const selectedIds = [];
                $('.select-item:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length === 0) {
                    Swal.fire({
                        title: '¡No se seleccionaron categorías!',
                        text: 'Por favor selecciona al menos una categoría para eliminar.',
                        icon: 'info',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar'
                    });
                    return;
                }

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¡No podrás recuperar estas categorías!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, elimínalas!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Enviar el formulario para la eliminación masiva
                        $('#bulk-delete-form').submit();
                    }
                });
            });
        });
    </script>

@endsection


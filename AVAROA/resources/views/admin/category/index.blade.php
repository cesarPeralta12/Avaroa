@extends('layout.master')

@section('title')
    Categorías
@endsection

@section('main_content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">
                    <p>{{ session('fail') }}</p>
                </div>
            @endif
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>{{ __('Lista de categoría') }}</h2>
                            <a href="{{ route('category.create') }}" class="btn btn-success btn-sm pull-right"> <i
                                    class="fa fa-plus"></i> {{ __('añadir categoría') }} </a>
                        </div>
                        <div class="card-body">
                            <button id="bulk-delete" class="btn btn-danger mb-3" disabled>
                                <i class="fas fa-trash-alt"></i> Eliminar Seleccionados
                            </button>
                            <div class="table-responsive">
                                <table id="basic-1" class="row-border data-table-filter table-style">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>{{ __('categoria ID') }}</th>
                                            <th>{{ __('Nombre') }}</th>
                                            <th>{{ __('Función') }}</th>
                                            <th>{{ __('Acción') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr class="removable-item">
                                                <td><input type="checkbox" class="category-checkbox"
                                                        value="{{ $category->uuid }}"></td>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if ($category->is_feature == 'yes')
                                                        <span class="status active">{{ __('Sí') }}</span>
                                                    @else
                                                        <span class="status blocked">{{ __('No') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="action__buttons">
                                                        <a href="{{ route('category.edit', [$category->id]) }}" title="Edit"
                                                            class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                            data-toggle="tooltip"> <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" title="Delete"
                                                            class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-category"
                                                            data-toggle="tooltip" title="{{ trans('remove') }}"
                                                            data-url="{{ route('category.delete', $category->id) }}">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            // Add CSRF token to all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            // Select all checkboxes
            $('#select-all').click(function () {
                $('.category-checkbox').prop('checked', this.checked);
                toggleBulkDeleteButton();
            });

            // Enable/disable bulk delete button
            $('.category-checkbox').change(function () {
                toggleBulkDeleteButton();
            });

            function toggleBulkDeleteButton() {
                $('#bulk-delete').prop('disabled', $('.category-checkbox:checked').length === 0);
            }

            // Bulk delete action
            $('#bulk-delete').click(function () {
                const selectedIds = $('.category-checkbox:checked').map(function () {
                    return $(this).val();
                }).get();

                if (selectedIds.length > 0) {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡Esta acción eliminará permanentemente las categorías seleccionadas!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#007bff',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('category.bulk.delete') }}",
                                type: 'POST',
                                data: {
                                    ids: selectedIds
                                },
                                success: function (response) {
                                    if (response.success) {
                                        Swal.fire({
                                            title: 'Éxito',
                                            text: response.message,
                                            icon: 'success'
                                        }).then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error',
                                            text: response.message,
                                            icon: 'error'
                                        });
                                    }
                                },
                                error: function (xhr) {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Ocurrió un error al eliminar las categorías seleccionadas.',
                                        icon: 'error'
                                    });
                                }
                            });
                        }
                    });
                }
            });

            // Individual delete confirmation
            $('.delete-category').click(function (e) {
                e.preventDefault();
                let deleteUrl = $(this).data('url');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción eliminará permanentemente esta categoría!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#007bff',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: deleteUrl,
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Éxito',
                                        text: 'Categoría eliminada correctamente.',
                                        icon: 'success'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error',
                                        text: response.message || 'No se pudo eliminar la categoría.',
                                        icon: 'error'
                                    });
                                }
                            },
                            error: function (xhr) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'No se pudo eliminar la categoría. Por favor, inténtelo de nuevo más tarde.',
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection

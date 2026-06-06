@extends('layout.master')

@section('title')
    subcategoría
@endsection

@section('main_content')

        <!-- Page content area start -->
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                           <p>{{session::get('success')}}</p>
                        </div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">
                           <p>{{session::get('fail')}}</p>
                        </div>
                        @endif
                        <div class="card customers__area bg-style mb-30" >
                            <div class="card-header item-title d-flex justify-content-between">
                                <h2>{{ __('Subcategorías') }}</h2>
                                <a href="{{ route('subcategory.create') }}" class="btn btn-success btn-sm"> <i
                                        class="fa fa-plus"></i> {{ __('Agregar subcategoría') }} </a>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <button id="bulk-delete" class="btn btn-danger" disabled>
                                            <i class="fas fa-trash-alt"></i> Eliminar Seleccionados
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="advance-1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="select-all">
                                                </th>
                                                <th>ID de subcategoría</th>
                                                <th>{{ __('Categoría') }}</th>
                                                <th>subcategoría</th>
                                                <th>{{ __('Acción') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                // Fetch all categories
                                                $categories = \App\Models\Category::select(
                                                    'id',
                                                    'name',
                                                    'image',
                                                )->get();
                                            @endphp

                                            @foreach ($categories as $parentCategory)
                                                @php
                                                    // Fetch subcategories based on the parent category ID
                                                    $subcategories = \App\Models\Subcategory::where(
                                                        'parent_category_id',
                                                        $parentCategory->id,
                                                    )
                                                    ->where(function ($query) {
                                                        $query
                                                            ->where('category_id', '0')
                                                            ->orWhere('category_id', '!=', '0');
                                                    })
                                                    ->get();
                                                @endphp

                                                @foreach ($subcategories as $subcategory)
                                                    <tr class="removable-item">
                                                        <td>
                                                            <input type="checkbox" class="subcategory-checkbox" value="{{ $subcategory->uuid }}">
                                                        </td>
                                                        <td>{{ $subcategory->id }}</td>
                                                        <td>{{ $parentCategory->name }}</td>
                                                        <td>{{ $subcategory->name }}</td>
                                                        <td>
                                                            <div class="action__buttons">
                                                                <a href="{{ route('subcategory.edit', [$subcategory->uuid]) }}"
                                                                    title="Edit"
                                                                    class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                                    data-toggle="tooltip">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-subcategory"
                                                                    data-toggle="tooltip" title="{{ trans('remove') }}"
                                                                    data-url="{{ route('subcategory.delete', [$subcategory->uuid]) }}">
                                                                    <i class="fa fa-remove"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
        $(document).ready(function() {
            // Select all checkboxes
            $('#select-all').click(function() {
                $('.subcategory-checkbox').prop('checked', this.checked);
                toggleBulkDeleteButton();
            });

            // Enable/disable bulk delete button based on checked checkboxes
            $('.subcategory-checkbox').change(function() {
                toggleBulkDeleteButton();
            });

            // Function to toggle the bulk delete button
            function toggleBulkDeleteButton() {
                $('#bulk-delete').prop('disabled', $('.subcategory-checkbox:checked').length === 0);
            }

            // Bulk delete action
            $('#bulk-delete').click(function() {
                const selectedIds = $('.subcategory-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                if (selectedIds.length > 0) {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡Esta acción eliminará permanentemente las subcategorías seleccionadas!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#007bff',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('subcategory.bulk.delete') }}",
                                type: 'POST',
                                data: {
                                    ids: selectedIds,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if (response.success) {
                                        toastr.success(response.message);
                                        location.reload();
                                    } else {
                                        toastr.error(response.message);
                                    }
                                },
                                error: function(xhr) {
                                    toastr.error('Ocurrió un error al eliminar las subcategorías seleccionadas.');
                                }
                            });
                        }
                    });
                }
            });

            // Individual delete confirmation with SweetAlert
            $('.delete-subcategory').click(function(e) {
                e.preventDefault();
                let deleteUrl = $(this).data('url');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción eliminará permanentemente esta subcategoría!",
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
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    toastr.success("Subcategoría eliminada correctamente.", "", {
                                        onHidden: function() {
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error("No se pudo eliminar la subcategoría.");
                                }
                            },
                            error: function(xhr, status, error) {
                                toastr.error("No se pudo eliminar la subcategoría. Por favor, inténtelo de nuevo más tarde.");
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection

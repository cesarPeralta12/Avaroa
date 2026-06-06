@extends('layout.master')

@section('title')
    {{ $title }}
@endsection

@section('main_content')

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
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
                            <div class="item-title d-flex justify-content-between">
                                <h5 class="mb-0">Manage Blogs</h5>
                                <button type="button" class="btn btn-danger btn-sm" id="bulk-delete-button">
                                    <i class="fa fa-trash"></i> Delete Selected
                                </button>
                                <a href="{{ route('blog.create') }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> {{ __('Add Blog') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form id="bulk-delete-form" method="POST" action="{{ route('blog.bulkDelete') }}">
                                @csrf
                                <table id="basic-1" class="table table-striped table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input type="checkbox" id="select-all" class="mr-2"> &nbsp;
                                                    <label for="select-all" class="mb-0 text-dark">Select All</label>
                                                </div>
                                            </th>

                                            <th>{{ __('Imagen') }}</th>
                                            <th>{{ __('Título') }}</th>
                                            <th>{{ __('Categoría') }}</th>
                                            <th>{{ __('Nombre') }}</th>
                                            <th>{{ __('Acción') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr class="removable-item align-middle">
                                                <td class="text-center">
                                                    <input type="checkbox" class="select-item" name="selected_ids[]" value="{{ $blog->uuid }}">
                                                </td>
                                                <td>
                                                    <div class="admin-dashboard-blog-list-img rounded">
                                                        <img src="{{ getImageFile($blog->image_path) }}" alt="img" class="img-fluid rounded" width="120px" height="80px">
                                                    </div>
                                                </td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->category ? $blog->category->name : '' }}</td>
                                                <td>{{ $blog->user ? $blog->user->name : '' }}</td>
                                                <td>
                                                    <div class="action__buttons">
                                                        <a href="{{ route('blog.edit', [$blog->uuid]) }}" title="Edit" class="btn btn-sm btn-success m-1" data-toggle="tooltip">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger m-1 delete-blog" data-url="{{ route('blog.delete', [$blog->uuid]) }}" data-toggle="tooltip" title="{{ trans('remove') }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>

                        <!-- JavaScript for Select All and Bulk Delete -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert Library -->
                        <script>
                            // Select/Deselect All Checkboxes
                            document.getElementById('select-all').addEventListener('change', function() {
                                const checkboxes = document.querySelectorAll('.select-item');
                                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                            });

                            // Bulk Delete Action
                            document.getElementById('bulk-delete-button').addEventListener('click', function() {
                                Swal.fire({
                                    title: '¿Está seguro de que desea eliminar los registros seleccionados?',
                                    text: '¡Esta acción no se puede deshacer!',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Sí, eliminar!',
                                    cancelButtonText: 'No, cancelar',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById('bulk-delete-form').submit();
                                    }
                                });
                            });

                            // Individual Delete Action
                            $(document).on('click', '.delete-blog', function() {
                                const url = $(this).data('url');

                                Swal.fire({
                                    title: '¿Está seguro de que desea eliminar este blog?',
                                    text: '¡Esta acción no se puede deshacer!',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Sí, eliminar!',
                                    cancelButtonText: 'No, cancelar',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = url; // Redirect to delete URL
                                    }
                                });
                            });
                        </script>

                        <!-- Optional CSS for Hover and Button Styling -->
                        <style>
                            .table-hover tbody tr:hover {
                                background-color: #f1f1f1;
                            }
                            .btn-sm {
                                font-size: 0.9rem;
                                padding: 0.5rem 0.75rem;
                            }
                            .action__buttons a {
                                display: inline-flex;
                                align-items: center;
                            }
                        </style>

                    </div>
                </div>
            </div>
        </div>

    <!-- Page content area end -->
@endsection

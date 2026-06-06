@extends('layout.master')
@section('title')
    LISTA DE BANNERS
@endsection
@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
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
                        <h5> LISTA DE BANNERS</h5>
                        <a class="btn btn-pill btn-primary btn-air-primary pull-right"
                            href="{{ route('admin.banners.create') }}" data-toggle="tooltip" title="" role="button"
                            data-bs-original-title="btn btn-primary">Agregar banner</a>
                    </div>
                    <div class="card-body">
                        <form id="bulk-delete-form" action="{{ route('admin.banners.bulkDestroy') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger" id="bulk-delete-btn" disabled>Eliminar
                                    Seleccionados</button>
                            </div>
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <input type="checkbox" id="select-all">
                                            </th>
                                            <th>Título 1</th>
                                            <th>Título 2</th>
                                            <th>Título 3</th>
                                            <th>Botón</th>
                                            <th>Enlace de botón</th>
                                            <th>Banner</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1; ?>
                                        @foreach ($banners as $row)
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" class="banner-checkbox" name="banners[]"
                                                        value="{{ $row->id }}">
                                                </td>
                                                <td>{{ $row->title1 }}</td>
                                                <td>{{ $row->title2 }}</td>
                                                <td>{{ $row->title3 }}</td>
                                                <td>{{ $row->button }}</td>
                                                <td>{{ $row->link }}</td>
                                                <td><img src="{{ asset($row->image) }}" alt="{{ $row->title1 }}"
                                                        width="100" height="100"></td>
                                                <td class="d-inline-flex align-items-center gap-2">

                                                    <a href="{{ route('admin.banners.edit', ['banner' => $row->id]) }}"
                                                        class="btn btn-sm btn-success d-flex align-items-center justify-content-center">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <button type="button"
                                                        class="btn btn-sm btn-danger d-flex align-items-center justify-content-center"
                                                        onclick="event.preventDefault(); confirmDelete('{{ $row->id }}');">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert Library -->
    <script>
        // SweetAlert for single delete confirmation
        function confirmDelete(bannerId) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡Este banner se eliminará permanentemente!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                dangerMode: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // You can call the delete form submission here if needed
                    document.getElementById('delete-form-' + bannerId).submit();
                }
            });
        }

        // Select/Deselect all checkboxes
        document.getElementById('select-all').addEventListener('change', function(e) {
            const checkboxes = document.querySelectorAll('.banner-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = e.target.checked;
            });
            toggleBulkDeleteButton();
        });

        // Enable/Disable bulk delete button based on checkbox selection
        document.querySelectorAll('.banner-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', toggleBulkDeleteButton);
        });

        function toggleBulkDeleteButton() {
            const checkedCount = document.querySelectorAll('.banner-checkbox:checked').length;
            const bulkDeleteButton = document.getElementById('bulk-delete-btn');
            bulkDeleteButton.disabled = checkedCount === 0;
        }

        // SweetAlert for bulk delete confirmation
        document.getElementById('bulk-delete-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡Estos banners se eliminarán permanentemente!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                dangerMode: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection

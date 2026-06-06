@extends('layout.master')
@section('title')
LISTA DE Clients
@endsection

@section('main_content')
<div class="container-fluid">
    @if (session()->has('success'))
        <div class="alert alert-success" style="background-color: green;">
            <p style="color: #fff;">{{ session()->get('success') }}</p>
        </div>
    @endif
    @if (session()->has('fail'))
        <div class="alert alert-danger" style="background-color: red;">
            <p style="color: #fff;">{{ session()->get('fail') }}</p>
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-12 text-end">
            <!--<a href="{{ url('admin/add_user') }}" class="btn btn-success">+ Agregar Client</a>-->
            <button id="bulkDeleteBtn" class="btn btn-danger">Eliminar Seleccionados</button>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>LISTA DE Client</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="usersTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>#</th>
                                    <th>Nombre</th>

                                    <!--<th>Correo Electrónico</th>-->
                                    <!--<th>Password</th>-->
                                    <th>Número de WhatsApp</th>
                                    <th>Activo</th>
                                    <th>Registrado en</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usersData as $i => $data)
                                    <tr>
                                        <td><input type="checkbox" class="userCheckbox" value="{{ $data->id }}"></td>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $data->name ?? 'N/A' }}</td>

                                        <!--<td>{{ $data->email ?? 'N/A' }}</td>-->
                                        <!--<td>{{ $data->custom_password ?? 'N/A' }}</td>-->
                                        <td>{{ $data->whatsapp_number ?? 'N/A' }}</td>
                                        <td>
                                            @if($data->status == 1)
                                                <span class="badge bg-success">Sí</span>
                                            @else
                                                <span class="badge bg-danger">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $data->created_at ? $data->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                                        <td>
                                            <!--<a href="{{ route('edit_user', $data->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>-->
                                            <button class="btn btn-sm btn-danger deleteBtn" data-id="{{ $data->id }}"><i class="fa fa-remove"></i></button>
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

<!-- DataTables + SweetAlert -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    $('#usersTable').DataTable({
        language: { url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/Spanish.json" },
        responsive: true
    });

    // Select all checkbox
    $('#selectAll').on('change', function() {
        $('.userCheckbox').prop('checked', $(this).is(':checked'));
    });

    // Single delete
    $('.deleteBtn').click(function() {
        let userId = $(this).data('id');
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Este usuario será eliminado permanentemente.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'user/delete_user/' + userId,
                    type: 'GET',
                    success: function() {
                        Swal.fire('Eliminado!', 'El usuario ha sido eliminado.', 'success')
                            .then(() => location.reload());
                    },
                    error: function() {
                        Swal.fire('Error!', 'Ocurrió un error al eliminar.', 'error');
                    }
                });
            }
        });
    });

    // Bulk delete
    $('#bulkDeleteBtn').click(function() {
        let ids = $('.userCheckbox:checked').map(function() {
            return $(this).val();
        }).get();

        if (ids.length === 0) {
            Swal.fire('Atención', 'Selecciona al menos un usuario.', 'info');
            return;
        }

        Swal.fire({
            title: '¿Eliminar seleccionados?',
            text: "Se eliminarán los Inspector seleccionados.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("user.bulkDelete") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: ids
                    },
                    success: function() {
                        Swal.fire('Eliminados!', 'Inspector eliminados correctamente.', 'success')
                            .then(() => location.reload());
                    }
                });
            }
        });
    });
});
</script>
@endsection

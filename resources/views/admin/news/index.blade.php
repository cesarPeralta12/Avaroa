@extends('layout.master')

@section('title')
    Noticias
@endsection

@section('main_content')

        <!-- Page content area start -->
        <div class="page-content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        <p>{{ session('fail') }}</p>
                    </div>
                @endif
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ __('Lista de Noticias') }}</h2>
                                <a href="{{ route('news.create') }}" class="btn btn-success btn-sm pull-right">
                                    <i class="fa fa-plus"></i> {{ __('Añadir Noticia') }}
                                </a>
                            </div>
                            <div class="card-body">
                                <button id="bulk-delete" class="btn btn-danger mb-3" disabled>
                                    <i class="fas fa-trash-alt"></i> Eliminar Seleccionadas
                                </button>
                                <div class="table-responsive">
                                    <table id="basic-1" class="row-border data-table-filter table-style">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select-all"></th>
                                                <th>Fecha de creación</th>
                                                <th>Título</th>
                                                <th>Tipo</th>
                                                <th>Contenido</th>
                                                <th>Autor</th>
                                                <th>Portada</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($news as $item)
                                                <tr class="removable-item">
                                                    <td><input type="checkbox" class="news-checkbox" value="{{ $item->id }}"></td>
                                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ ucfirst($item->type) }}</td>
                                                    <td>{!! $item->type === 'text' ? Str::limit($item->content, 50) : 'N/A' !!}</td>
                                                    <td>{{ $item->author }}</td>
                                                    <td>
                                                        @if ($item->thumbnail)
                                                            <img src="{{ asset($item->thumbnail) }}" alt="Portada" class="img-thumbnail" style="width: 50px;">
                                                        @else
                                                            <span class="text-muted">Sin Portada</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="action__buttons">
                                                            <a href="{{ route('news.edit', $item->id) }}" title="Editar" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" title="Eliminar" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-news" data-toggle="tooltip" data-url="{{ route('news.destroy', $item->id) }}">
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
        $(document).ready(function() {
            // Select all checkboxes
            $('#select-all').click(function() {
                $('.news-checkbox').prop('checked', this.checked);
                toggleBulkDeleteButton();
            });

            // Enable/disable bulk delete button based on selected checkboxes
            $('.news-checkbox').change(function() {
                toggleBulkDeleteButton();
            });

            // Function to toggle the bulk delete button
            function toggleBulkDeleteButton() {
                $('#bulk-delete').prop('disabled', $('.news-checkbox:checked').length === 0);
            }

            // Bulk delete action
            $('#bulk-delete').click(function() {
                const selectedIds = $('.news-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                if (selectedIds.length > 0) {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡Esta acción eliminará permanentemente las noticias seleccionadas!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#007bff',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('news.bulk-delete') }}",
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
                                    toastr.error('Ocurrió un error al eliminar las noticias seleccionadas.');
                                }
                            });
                        }
                    });
                }
            });

            // Individual delete confirmation with SweetAlert
            $('.delete-news').click(function(e) {
                e.preventDefault();

                let deleteUrl = $(this).data('url');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción eliminará permanentemente esta noticia!",
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
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    toastr.success("Noticia eliminada correctamente.", "", {
                                        onHidden: function() {
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error("No se pudo eliminar la noticia.");
                                }
                            },
                            error: function(xhr) {
                                toastr.error("No se pudo eliminar la noticia. Por favor, inténtelo de nuevo más tarde.");
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection

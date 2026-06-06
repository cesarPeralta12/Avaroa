{{-- resources/views/admin/proof-of-delivery/index.blade.php --}}
@extends('layout.master')
@section('title', 'Gestión de Pruebas de Entrega')
@section('css')
<style>
    .pod-card {
        transition: all 0.3s ease;
        border-left: 4px solid;
    }
    .pod-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .pod-card.default { border-left-color: #3b82f6; }
    .photo-preview {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.2s;
    }
    .photo-preview:hover {
        transform: scale(1.05);
    }
    .gallery-modal .modal-dialog {
        max-width: 90%;
        margin: 1.75rem auto;
    }
    .gallery-modal .modal-content {
        background: transparent;
        border: none;
    }
    .gallery-image {
        max-width: 100%;
        max-height: 80vh;
        margin: 0 auto;
        display: block;
        border-radius: 8px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.3);
    }
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }
    .status-completed {
        background: #d1fae5;
        color: #065f46;
    }
    .stats-card {
        transition: all 0.2s;
        border: none;
        border-radius: 15px;
    }
    .stats-card:hover {
        transform: translateY(-3px);
    }

    /* Improved Pagination Styling */
    .pagination {
        margin-top: 25px;
    }
    .pagination .page-link {
        border-radius: 8px;
        margin: 0 3px;
        padding: 8px 14px;
        color: #6c757d;
        border: 1px solid #dee2e6;
        transition: all 0.2s;
    }
    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: white;
        font-weight: 600;
    }
    .pagination .page-link:hover {
        background-color: #f8f9fa;
        color: #0d6efd;
        border-color: #dee2e6;
    }
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Pruebas de Entrega</h3>
                    <div>
                        <a href="{{ route('proof-of-delivery.export', request()->all()) }}"
                           class="btn btn-success me-2">
                            <i class="fas fa-download"></i> Exportar CSV
                        </a>
                    </div>
                </div>
                <p class="text-muted">Gestiona y visualiza todas las pruebas de entrega</p>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stats-card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Total de Entregas</h6>
                                <h3 class="mb-0">{{ number_format($stats['total']) }}</h3>
                            </div>
                            <i class="fas fa-box fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Entregas de Hoy</h6>
                                <h3 class="mb-0">{{ number_format($stats['today']) }}</h3>
                            </div>
                            <i class="fas fa-calendar-day fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Esta Semana</h6>
                                <h3 class="mb-0">{{ number_format($stats['this_week']) }}</h3>
                            </div>
                            <i class="fas fa-chart-line fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Este Mes</h6>
                                <h3 class="mb-0">{{ number_format($stats['this_month']) }}</h3>
                            </div>
                            <i class="fas fa-calendar-alt fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filters --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control"
                               placeholder="Buscar por ID de Viaje, Conductor, Cliente, Receptor"
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="date_from" class="form-control"
                               value="{{ request('date_from') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="date_to" class="form-control"
                               value="{{ request('date_to') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="driver_id" class="form-select">
                            <option value="">Todos los Conductores</option>
                            @foreach($drivers as $driver)
                                <option value="{{ $driver->id }}"
                                    {{ request('driver_id') == $driver->id ? 'selected' : '' }}>
                                    {{ $driver->user->name ?? 'Conductor #'.$driver->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i> Filtrar
                        </button>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('proof-of-delivery.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-redo"></i> Restablecer Filtros
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Proof of Deliveries List --}}
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Pruebas de Entrega</h4>
            </div>
            <div class="card-body">
                @forelse($proofOfDeliveries as $pod)
                <div class="pod-card default card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            {{-- Driver Info --}}
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        @if($pod->trip?->driver?->user?->profile_photo)
                                            <img src="{{ asset($pod->trip->driver->user->profile_photo) }}"
                                                 class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                                        @else
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white"
                                                 style="width: 50px; height: 50px;">
                                                {{ strtoupper(substr($pod->trip?->driver?->user?->name ?? 'C', 0, 1)) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <strong>{{ $pod->trip?->driver?->user?->name ?? 'N/A' }}</strong>
                                        <br>
                                        <small class="text-muted">Viaje #{{ $pod->trip_id }}</small>
                                    </div>
                                </div>
                            </div>

                            {{-- Receiver Info --}}
                            <div class="col-md-2">
                                <div>
                                    <i class="fas fa-user-check text-success me-1"></i>
                                    <strong>{{ $pod->receiver_name }}</strong>
                                    <br>
                                    <small class="text-muted">Receptor</small>
                                </div>
                            </div>

                            {{-- Time & Location --}}
                            <div class="col-md-3">
                                <div>
                                    <i class="fas fa-clock text-info me-1"></i>
                                    <small>{{ $pod->formatted_timestamp }}</small>
                                    <br>
                                    @if($pod->geolocation_lat && $pod->geolocation_long)
                                        <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                        <small class="text-muted">
                                            {{ number_format($pod->geolocation_lat, 4) }},
                                            {{ number_format($pod->geolocation_long, 4) }}
                                        </small>
                                    @else
                                        <small class="text-muted">Sin datos de ubicación</small>
                                    @endif
                                </div>
                            </div>

                            {{-- Photos Preview --}}
                            <div class="col-md-2">
                                @php $photos = $pod->getAllPhotosAttribute(); @endphp
                                @if(count($photos) > 0)
                                    <div class="d-flex gap-1">
                                        <img src="{{ asset($photos[0]) }}"
                                             class="photo-preview"
                                             alt="Foto de entrega"
                                             data-photo-url="{{ asset($photos[0]) }}"
                                             onclick="showPhotoGallery({{ json_encode($photos) }}, 0)">
                                        @if(count($photos) > 1)
                                            <span class="badge bg-secondary align-self-center">
                                                +{{ count($photos) - 1 }}
                                            </span>
                                        @endif
                                    </div>
                                @else
                                    <span class="badge bg-secondary">Sin fotos</span>
                                @endif
                            </div>

                            {{-- Actions --}}
                            <div class="col-md-2 text-end">
                                <a href="{{ route('proof-of-delivery.show', $pod->id) }}"
                                   class="btn btn-sm btn-info" title="Ver Detalles">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-sm btn-danger delete-pod-btn mt-1 mt-md-0"
                                        data-id="{{ $pod->id }}"
                                        data-trip="{{ $pod->trip_id }}"
                                        title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Notes --}}
                        @if($pod->notes)
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="alert alert-secondary mb-0 py-2">
                                    <i class="fas fa-sticky-note me-1"></i>
                                    <strong>Notas:</strong> {{ $pod->notes }}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-inbox fa-3x mb-3"></i>
                    <h5>No se encontraron pruebas de entrega</h5>
                    <p>Intenta ajustar los filtros o vuelve más tarde.</p>
                </div>
                @endforelse

                {{-- Improved Pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $proofOfDeliveries->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Photo Gallery Modal --}}
<div class="modal fade gallery-modal" id="photoGalleryModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-transparent">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal" style="z-index: 1050;"></button>
                <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="galleryCarouselInner"></div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function showPhotoGallery(photos, startIndex = 0) {
    const carouselInner = document.getElementById('galleryCarouselInner');
    carouselInner.innerHTML = '';
    photos.forEach((photo, index) => {
        const isActive = index === startIndex ? 'active' : '';
        const div = document.createElement('div');
        div.className = `carousel-item ${isActive}`;
        div.innerHTML = `<img src="${photo}" class="d-block gallery-image" alt="Foto de entrega ${index + 1}">`;
        carouselInner.appendChild(div);
    });
    const modal = new bootstrap.Modal(document.getElementById('photoGalleryModal'));
    modal.show();
}

// Delete functionality
$(document).ready(function() {
    $('.delete-pod-btn').click(function() {
        const id = $(this).data('id');
        const tripId = $(this).data('trip');

        Swal.fire({
            title: '¿Eliminar Prueba de Entrega?',
            html: `¿Estás seguro de eliminar la prueba de entrega del Viaje #${tripId}?<br><strong>Esta acción no se puede deshacer.</strong>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Eliminando...',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });

                $.ajax({
                    url: `/admin/proof-of-delivery/${id}`,
                    method: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Eliminado!',
                            text: response.message || 'Prueba de entrega eliminada correctamente',
                            timer: 2000
                        }).then(() => location.reload());
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: xhr.responseJSON?.message || 'No se pudo eliminar la prueba de entrega'
                        });
                    }
                });
            }
        });
    });
});
</script>
@endpush
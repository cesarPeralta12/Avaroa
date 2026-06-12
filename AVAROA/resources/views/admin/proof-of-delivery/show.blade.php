{{-- resources/views/admin/proof-of-delivery/show.blade.php --}}
@extends('layout.master')
@section('title', 'Detalles de Prueba de Entrega - Viaje #' . $trip->id)
@section('css')
<style>
    .detail-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    .detail-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
        margin-bottom: 5px;
    }
    .detail-value {
        font-size: 16px;
        font-weight: 500;
        color: #2c3e50;
    }
    .photo-gallery img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.2s;
    }
    .photo-gallery img:hover {
        transform: scale(1.02);
    }
    .info-section {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">Detalles de la Prueba de Entrega</h3>
                        <p class="text-muted">Viaje #{{ $trip->id }} - Información completa de la entrega</p>
                    </div>
                    <div>
                        <a href="{{ route('proof-of-delivery.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver a la Lista
                        </a>
                        <a href="{{ route('proof-of-delivery.download-pdf', $proofOfDelivery->id) }}"
                           class="btn btn-danger">
                            <i class="fas fa-file-pdf"></i> Descargar PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Main Content --}}
            <div class="col-lg-8">
                {{-- Photos Section --}}
                <div class="card detail-card mb-4">
                    <div class="card-header border-0 pt-4">
                        <h5 class="mb-0"><i class="fas fa-images text-primary me-2"></i>Fotos de la Entrega</h5>
                    </div>
                    <div class="card-body">
                        @php $photos = $proofOfDelivery->getAllPhotosAttribute(); @endphp
                        @if(count($photos) > 0)
                            <div class="row photo-gallery g-3">
                                @foreach($photos as $index => $photo)
                                <div class="col-md-4 col-sm-6">
                                    <img src="{{ asset($photo) }}"
                                         alt="Foto de entrega {{ $index + 1 }}"
                                         class="img-fluid gallery-img"
                                         data-photo-url="{{ asset($photo) }}"
                                         onclick="showPhoto('{{ asset($photo) }}')">
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5 text-muted">
                                <i class="fas fa-camera fa-3x mb-3"></i>
                                <h6>No hay fotos cargadas</h6>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Signature Section --}}
                @if($proofOfDelivery->signature)
                <div class="card detail-card mb-4">
                    <div class="card-header border-0 pt-4">
                        <h5 class="mb-0"><i class="fas fa-signature text-primary me-2"></i>Firma del Cliente</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset($proofOfDelivery->signature) }}"
                             alt="Firma del Cliente"
                             class="img-fluid"
                             style="max-width: 300px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>
                </div>
                @endif

                {{-- Notes Section --}}
                @if($proofOfDelivery->notes)
                <div class="card detail-card mb-4">
                    <div class="card-header border-0 pt-4">
                        <h5 class="mb-0"><i class="fas fa-sticky-note text-primary me-2"></i>Notas de la Entrega</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $proofOfDelivery->notes }}</p>
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar Info --}}
            <div class="col-lg-4">
                {{-- Delivery Info --}}
                <div class="card detail-card mb-4">
                    <div class="card-header border-0 pt-4">
                        <h5 class="mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Información de la Entrega</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="detail-label">Nombre del Receptor</div>
                            <div class="detail-value">
                                <i class="fas fa-user-check text-success me-1"></i>
                                {{ $proofOfDelivery->receiver_name }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="detail-label">Fecha y Hora de Entrega</div>
                            <div class="detail-value">
                                <i class="fas fa-clock text-info me-1"></i>
                                {{ $proofOfDelivery->formatted_timestamp }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="detail-label">Ubicación (GPS)</div>
                            <div class="detail-value">
                                @if($proofOfDelivery->geolocation_lat && $proofOfDelivery->geolocation_long)
                                    <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                    Lat: {{ number_format($proofOfDelivery->geolocation_lat, 6) }}<br>
                                    Long: {{ number_format($proofOfDelivery->geolocation_long, 6) }}
                                    <a href="https://maps.google.com/?q={{ $proofOfDelivery->geolocation_lat }},{{ $proofOfDelivery->geolocation_long }}"
                                       target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="fas fa-external-link-alt"></i> Ver en Mapa
                                    </a>
                                @else
                                    <span class="text-muted">No hay datos de GPS disponibles</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Trip Information --}}
                <div class="card detail-card mb-4">
                    <div class="card-header border-0 pt-4">
                        <h5 class="mb-0"><i class="fas fa-truck text-primary me-2"></i>Información del Viaje</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="detail-label">ID del Viaje</div>
                            <div class="detail-value">#{{ $trip->id }}</div>
                        </div>
                        <div class="mb-3">
                            <div class="detail-label">Conductor</div>
                            <div class="detail-value d-flex align-items-center">
                                @if($trip->driver?->user?->profile_photo)
                                    <img src="{{ asset($trip->driver->user->profile_photo) }}"
                                         class="rounded-circle me-2" width="30" height="30">
                                @endif
                                {{ $trip->driver?->user?->name ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="detail-label">Cliente</div>
                            <div class="detail-value">{{ $trip->customer?->name ?? 'N/A' }}</div>
                        </div>
                        <div class="mb-3">
                            <div class="detail-label">Estado del Viaje</div>
                            <div class="detail-value">
                                <span class="badge bg-success">Completado</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="detail-label">Precio</div>
                            <div class="detail-value">${{ number_format($trip->price, 2) }}</div>
                        </div>
                        <div class="mb-3">
                            <div class="detail-label">Método de Pago</div>
                            <div class="detail-value">{{ ucfirst($trip->payment_method ?? 'N/A') }}</div>
                        </div>
                    </div>
                </div>

                {{-- Route Information --}}
                <div class="card detail-card">
                    <div class="card-header border-0 pt-4">
                        <h5 class="mb-0"><i class="fas fa-route text-primary me-2"></i>Información de la Ruta</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="detail-label">Ubicación de Recogida</div>
                            <div class="detail-value small">
                                <i class="fas fa-circle text-success me-1" style="font-size: 10px;"></i>
                                {{ $trip->origin_address ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="detail-label">Ubicación de Entrega</div>
                            <div class="detail-value small">
                                <i class="fas fa-map-marker-alt text-danger me-1" style="font-size: 10px;"></i>
                                {{ $trip->destination_address ?? 'N/A' }}
                            </div>
                        </div>
                        @if($trip->distance)
                        <div class="mb-3">
                            <div class="detail-label">Distancia</div>
                            <div class="detail-value">{{ number_format($trip->distance, 2) }} km</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Photo Modal --}}
<div class="modal fade" id="photoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body text-center p-0">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"></button>
                <img id="modalPhoto" src="" alt="Foto de entrega" class="img-fluid rounded" style="max-height: 80vh;">
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function showPhoto(photoUrl) {
    document.getElementById('modalPhoto').src = photoUrl;
    new bootstrap.Modal(document.getElementById('photoModal')).show();
}

// Gallery image click handler
document.querySelectorAll('.gallery-img').forEach(img => {
    img.addEventListener('click', function() {
        showPhoto(this.dataset.photoUrl);
    });
});
</script>
@endpush
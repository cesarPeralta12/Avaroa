@extends('layout.master')

@section('title', 'Tarifas por Servicio')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row mb-3">
            <div class="col-12">
                <h4 class="mb-0"><i class="fas fa-coins me-2"></i>Tarifas y Configuración de Servicios</h4>
                <p class="text-muted small mt-1">Configura el precio por minuto y tarifa mínima por tipo de servicio. La comisión se aplica igual a todos.</p>
            </div>
        </div>

        {{-- COMISIÓN GLOBAL --}}
        <div class="card mb-4 border-primary">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-percentage me-2"></i>Comisión del Sistema (aplica a todos los servicios)</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.service-rates.commission') }}" method="POST">
                    @csrf
                    <div class="row align-items-end g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Porcentaje de comisión</label>
                            <div class="input-group">
                                <input type="number" name="commission_rate_pct" class="form-control form-control-lg"
                                    value="{{ round(($rates->first()?->commission_rate ?? 0.13) * 100, 2) }}"
                                    min="0" max="100" step="0.5" required>
                                <span class="input-group-text fs-5">%</span>
                            </div>
                            <small class="text-muted">Se descuenta del saldo del conductor al finalizar cada viaje.</small>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-1"></i>Guardar comisión
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- TARIFAS POR SERVICIO --}}
        @foreach($rates as $rate)
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <span class="badge bg-primary me-2">{{ $rate->service_type }}</span>
                <h5 class="mb-0">{{ $rate->label }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.service-rates.update', $rate) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Precio por minuto (Bs)</label>
                            <div class="input-group">
                                <span class="input-group-text">Bs</span>
                                <input type="number" name="price_per_minute" class="form-control"
                                    value="{{ $rate->price_per_minute }}" min="0.01" max="999" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tarifa mínima (Bs)</label>
                            <div class="input-group">
                                <span class="input-group-text">Bs</span>
                                <input type="number" name="minimum_fare" class="form-control"
                                    value="{{ $rate->minimum_fare }}" min="0" max="9999" step="0.50" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Velocidad promedio (km/h)</label>
                            <div class="input-group">
                                <input type="number" name="average_speed_kmh" class="form-control"
                                    value="{{ $rate->average_speed_kmh }}" min="1" max="200" step="1" required>
                                <span class="input-group-text">km/h</span>
                            </div>
                        </div>

                        {{-- Recargo de pasajeros: SOLO taxi --}}
                        @if($rate->service_type === 'taxi')
                        <div class="col-12 mt-2">
                            <hr>
                            <h6 class="text-primary mb-3"><i class="fas fa-users me-1"></i>Recargo por Pasajeros (Taxi)</h6>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Cobrar extra a partir de (N°)</label>
                            <div class="input-group">
                                <input type="number" name="passenger_surcharge_from" class="form-control"
                                    value="{{ $rate->passenger_surcharge_from }}" min="1" max="20" step="1">
                                <span class="input-group-text">pasajeros</span>
                            </div>
                            <small class="text-muted">Ej: 4 = del 4° pasajero en adelante se cobra extra.</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Extra por pasajero adicional (Bs)</label>
                            <div class="input-group">
                                <span class="input-group-text">Bs</span>
                                <input type="number" name="passenger_surcharge_per_head" class="form-control"
                                    value="{{ $rate->passenger_surcharge_per_head }}" min="0" max="999" step="0.50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Máximo de pasajeros permitidos</label>
                            <div class="input-group">
                                <input type="number" name="max_passengers" class="form-control"
                                    value="{{ $rate->max_passengers }}" min="1" max="20" step="1">
                                <span class="input-group-text">personas</span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <small class="text-muted">Actualizado: {{ $rate->updated_at->diffForHumans() }}</small>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection

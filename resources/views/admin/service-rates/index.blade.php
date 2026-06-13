@extends('layout.master')
@section('title', 'Tarifas por Servicio')

@section('css')
<style>
    /* ── Page header ─────────────────────────────────── */
    .rates-hero {
        background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
        border-radius: 16px;
        padding: 28px 32px;
        margin-bottom: 28px;
        color: #fff;
    }
    .rates-hero h3 { font-weight: 700; margin-bottom: 4px; }
    .rates-hero p  { opacity: .7; margin-bottom: 0; font-size: .9rem; }

    /* ── Commission card ─────────────────────────────── */
    .commission-card {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border-radius: 16px;
        padding: 24px 28px;
        color: #fff;
        margin-bottom: 28px;
        box-shadow: 0 8px 30px rgba(99,102,241,.35);
    }
    .commission-card label { opacity: .85; font-size: .8rem; text-transform: uppercase; letter-spacing: .06em; }
    .commission-card .input-group-text {
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.25);
        color: #fff;
        font-weight: 700;
    }
    .commission-card .form-control {
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.25);
        color: #fff;
        font-size: 1.6rem;
        font-weight: 700;
        text-align: center;
    }
    .commission-card .form-control::placeholder { color: rgba(255,255,255,.5); }
    .commission-card .form-control:focus {
        background: rgba(255,255,255,.2);
        border-color: rgba(255,255,255,.5);
        color: #fff;
        box-shadow: 0 0 0 3px rgba(255,255,255,.2);
    }
    .btn-save-commission {
        background: rgba(255,255,255,.2);
        border: 1px solid rgba(255,255,255,.4);
        color: #fff;
        font-weight: 600;
        padding: 10px 24px;
        border-radius: 10px;
        transition: all .2s;
    }
    .btn-save-commission:hover {
        background: rgba(255,255,255,.3);
        color: #fff;
        transform: translateY(-1px);
    }

    /* ── Service cards ───────────────────────────────── */
    .service-card {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,.08);
        border: none;
        margin-bottom: 24px;
        transition: box-shadow .2s;
    }
    .service-card:hover { box-shadow: 0 8px 30px rgba(0,0,0,.13); }

    .service-card-header {
        padding: 20px 24px 16px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .service-icon {
        width: 52px; height: 52px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    .service-card-header h5 { margin: 0; font-weight: 700; font-size: 1.05rem; }
    .service-card-header small { opacity: .65; font-size: .8rem; }

    .service-card-body { padding: 8px 24px 24px; }

    /* field labels */
    .rate-label {
        font-size: .75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: #64748b;
        margin-bottom: 6px;
    }

    .rate-preview {
        background: #f8fafc;
        border-radius: 10px;
        padding: 12px 16px;
        margin-top: 16px;
        border: 1px solid #e2e8f0;
        font-size: .82rem;
        color: #475569;
    }
    .rate-preview strong { color: #1e293b; }

    .btn-save-rate {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 10px 28px;
        border-radius: 10px;
        transition: all .25s;
    }
    .btn-save-rate:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99,102,241,.4);
    }

    .divider-section { border: none; border-top: 1px solid #e2e8f0; margin: 18px 0 20px; }

    .surcharge-section h6 {
        font-size: .85rem;
        font-weight: 700;
        color: #6366f1;
        margin-bottom: 16px;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        {{-- Hero --}}
        <div class="rates-hero">
            <div class="d-flex align-items-center gap-3">
                <div style="background:rgba(255,255,255,.15);border-radius:14px;width:54px;height:54px;display:flex;align-items:center;justify-content:center;font-size:1.7rem;">
                    <i class="fas fa-coins"></i>
                </div>
                <div>
                    <h3>Tarifas y Comisiones</h3>
                    <p>Configura el precio por minuto, tarifa mínima y comisión del sistema para cada tipo de servicio.</p>
                </div>
            </div>
        </div>

        {{-- COMISIÓN GLOBAL --}}
        <div class="commission-card">
            <form action="{{ route('admin.service-rates.commission') }}" method="POST">
                @csrf
                <div class="row align-items-center g-4">
                    <div class="col-auto">
                        <div style="background:rgba(255,255,255,.15);border-radius:12px;width:48px;height:48px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;">
                            <i class="fas fa-percentage"></i>
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label mb-1">Comisión del sistema</label>
                        <p class="mb-0" style="font-size:.8rem;opacity:.7">Se descuenta del saldo del conductor al finalizar cada viaje. Aplica a todos los servicios.</p>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" name="commission_rate_pct" class="form-control form-control-lg"
                                value="{{ round(($rates->first()?->commission_rate ?? 0.13) * 100, 2) }}"
                                min="0" max="100" step="0.5" required>
                            <span class="input-group-text fs-5">%</span>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-save-commission">
                            <i class="fas fa-save me-2"></i>Guardar comisión
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- TARIFAS POR SERVICIO --}}
        @php
            $serviceConfig = [
                'moto'      => ['color' => '#8b5cf6', 'bg' => '#ede9fe', 'icon' => 'fas fa-motorcycle',  'desc' => 'Motocicleta — rápida y económica'],
                'auto'      => ['color' => '#f59e0b', 'bg' => '#fef3c7', 'icon' => 'fas fa-car',         'desc' => 'Automóvil para pasajeros y paquetes pequeños'],
                'minivan'   => ['color' => '#0ea5e9', 'bg' => '#e0f2fe', 'icon' => 'fas fa-van-shuttle', 'desc' => 'Minivan para grupos o carga mediana'],
                'camion'    => ['color' => '#10b981', 'bg' => '#d1fae5', 'icon' => 'fas fa-truck',       'desc' => 'Camión para carga pesada o de gran volumen'],
                'torito'    => ['color' => '#ef4444', 'bg' => '#fee2e2', 'icon' => 'fas fa-truck-pickup', 'desc' => 'Torito (triciclo) para carga pequeña'],
                'bicicleta' => ['color' => '#64748b', 'bg' => '#f1f5f9', 'icon' => 'fas fa-bicycle',    'desc' => 'Bicicleta para entregas ligeras'],
            ];
        @endphp

        <div class="row">
            @foreach($rates as $rate)
            @php
                $cfg = $serviceConfig[$rate->service_type] ?? ['color'=>'#6b7280','bg'=>'#f3f4f6','icon'=>'fas fa-cog','desc'=>''];
            @endphp
            <div class="col-xl-6">
                <div class="service-card card">
                    <div class="service-card-header" style="border-bottom:2px solid {{ $cfg['bg'] }}">
                        <div class="service-icon" style="background:{{ $cfg['bg'] }};color:{{ $cfg['color'] }}">
                            <i class="{{ $cfg['icon'] }}"></i>
                        </div>
                        <div>
                            <h5 style="color:{{ $cfg['color'] }}">{{ $rate->label }}</h5>
                            <small>{{ $cfg['desc'] }}</small>
                        </div>
                        <div class="ms-auto text-end">
                            <span class="badge" style="background:{{ $cfg['bg'] }};color:{{ $cfg['color'] }};font-size:.75rem;padding:6px 10px;border-radius:8px">
                                {{ strtoupper($rate->service_type) }}
                            </span>
                        </div>
                    </div>

                    <div class="service-card-body">
                        <form action="{{ route('admin.service-rates.update', $rate) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3 mt-1">
                                <div class="col-sm-4">
                                    <div class="rate-label">Precio / minuto</div>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background:{{ $cfg['bg'] }};color:{{ $cfg['color'] }};border-color:#e2e8f0;font-weight:700">Bs</span>
                                        <input type="number" name="price_per_minute" class="form-control"
                                            value="{{ $rate->price_per_minute }}" min="0.01" max="999" step="0.01" required
                                            id="ppm_{{ $rate->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="rate-label">Tarifa mínima</div>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background:{{ $cfg['bg'] }};color:{{ $cfg['color'] }};border-color:#e2e8f0;font-weight:700">Bs</span>
                                        <input type="number" name="minimum_fare" class="form-control"
                                            value="{{ $rate->minimum_fare }}" min="0" max="9999" step="0.50" required
                                            id="mf_{{ $rate->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="rate-label">Velocidad promedio</div>
                                    <div class="input-group">
                                        <input type="number" name="average_speed_kmh" class="form-control"
                                            value="{{ $rate->average_speed_kmh }}" min="1" max="200" step="1" required>
                                        <span class="input-group-text" style="background:#f8fafc;border-color:#e2e8f0;font-size:.75rem;color:#64748b">km/h</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Preview cálculo --}}
                            <div class="rate-preview" id="preview_{{ $rate->id }}">
                                <i class="fas fa-calculator me-1"></i>
                                Viaje de <strong>10 min</strong>:
                                tarifa estimada <strong id="est_{{ $rate->id }}">
                                    {{ number_format(max($rate->minimum_fare, $rate->price_per_minute * 10), 2) }} Bs
                                </strong>
                                &nbsp;·&nbsp; comisión aprox.
                                <strong>{{ number_format(max($rate->minimum_fare, $rate->price_per_minute * 10) * ($rates->first()?->commission_rate ?? 0.13), 2) }} Bs</strong>
                            </div>

                            {{-- Recargo de pasajeros: auto y minivan --}}
                            @if($rate->is_passenger_service)
                            <hr class="divider-section">
                            <div class="surcharge-section">
                                <h6><i class="fas fa-users me-1"></i>Recargo por Pasajeros Adicionales</h6>
                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="rate-label">Cobrar extra desde</div>
                                        <div class="input-group">
                                            <input type="number" name="passenger_surcharge_from" class="form-control"
                                                value="{{ $rate->passenger_surcharge_from }}" min="1" max="20" step="1">
                                            <span class="input-group-text" style="background:#f8fafc;border-color:#e2e8f0;font-size:.72rem;color:#64748b">pax</span>
                                        </div>
                                        <div class="mt-1" style="font-size:.72rem;color:#94a3b8">Del N° pax en adelante</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="rate-label">Extra por pax adicional</div>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background:{{ $cfg['bg'] }};color:{{ $cfg['color'] }};border-color:#e2e8f0;font-weight:700">Bs</span>
                                            <input type="number" name="passenger_surcharge_per_head" class="form-control"
                                                value="{{ $rate->passenger_surcharge_per_head }}" min="0" max="999" step="0.50">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="rate-label">Máx. pasajeros</div>
                                        <div class="input-group">
                                            <input type="number" name="max_passengers" class="form-control"
                                                value="{{ $rate->max_passengers }}" min="1" max="20" step="1">
                                            <span class="input-group-text" style="background:#f8fafc;border-color:#e2e8f0;font-size:.72rem;color:#64748b">pax</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span style="font-size:.75rem;color:#94a3b8">
                                    <i class="fas fa-clock me-1"></i>Actualizado {{ $rate->updated_at->diffForHumans() }}
                                </span>
                                <button type="submit" class="btn btn-save-rate">
                                    <i class="fas fa-save me-2"></i>Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
// Live preview — update estimated fare when price_per_minute changes
document.querySelectorAll('[id^="ppm_"]').forEach(function(input) {
    const id  = input.id.replace('ppm_', '');
    const mfEl = document.getElementById('mf_' + id);
    const estEl = document.getElementById('est_' + id);
    function update() {
        const ppm = parseFloat(input.value) || 0;
        const mf  = parseFloat(mfEl?.value) || 0;
        const est = Math.max(mf, ppm * 10);
        if (estEl) estEl.textContent = est.toFixed(2) + ' Bs';
    }
    input.addEventListener('input', update);
    mfEl?.addEventListener('input', update);
});
</script>
@endpush

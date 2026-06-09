@extends('layout.master')

@section('title', 'Crear Nuevo Viaje')

@section('main_content')
<style>
    /* ── Base cards ─────────────────────────────────────────────────────── */
    .section-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px 24px;
        margin-bottom: 20px;
    }
    .section-card .section-title {
        font-size: .8rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: .08em; color: #94a3b8; margin-bottom: 16px;
        display: flex; align-items: center; gap: 8px;
    }
    .section-card .section-title i { color: #5c61f2; }
    .required::after { content: " *"; color: #ef4444; }

    /* ── Driver list ────────────────────────────────────────────────────── */
    .driver-option {
        display: flex; align-items: center; gap: 10px;
        padding: 10px 14px; border: 2px solid #e2e8f0;
        border-radius: 10px; cursor: pointer; transition: all .2s; margin-bottom: 8px;
    }
    .driver-option:hover  { border-color: #5c61f2; background: #f5f3ff; }
    .driver-option.selected { border-color: #5c61f2; background: #f5f3ff; }
    .driver-option .avatar {
        width: 38px; height: 38px; border-radius: 50%;
        background: linear-gradient(135deg,#5c61f2,#764ba2);
        color: #fff; font-weight: 700; font-size: .9rem;
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    .driver-option .info { flex: 1; }
    .driver-option .name { font-weight: 600; font-size: .9rem; color: #1e293b; }
    .driver-option .sub  { font-size: .78rem; color: #64748b; }
    .driver-option .badge-status {
        font-size: .7rem; padding: 2px 8px; border-radius: 20px;
        background: #dcfce7; color: #16a34a; font-weight: 600;
    }
    .broadcast-box {
        border: 2px dashed #e2e8f0; border-radius: 10px; padding: 18px;
        text-align: center; cursor: pointer; transition: all .2s; color: #64748b;
    }
    .broadcast-box:hover, .broadcast-box.selected {
        border-color: #FF8C00; background: #fff8f0; color: #FF8C00;
    }
    .broadcast-box i { font-size: 1.8rem; margin-bottom: 8px; display: block; }

    /* ── Interactive Map UI ─────────────────────────────────────────────── */
    #tripMap {
        height: 380px; border-radius: 10px;
        border: 2px solid #e2e8f0; overflow: hidden;
        transition: border-color .2s;
    }
    #tripMap.mode-origin { border-color: #22c55e; box-shadow: 0 0 0 3px rgba(34,197,94,.15); }
    #tripMap.mode-dest   { border-color: #ef4444; box-shadow: 0 0 0 3px rgba(239,68,68,.15); }

    /* Mode bar */
    .map-mode-bar {
        display: flex; gap: 8px; margin-bottom: 10px; align-items: center;
    }
    .map-mode-btn {
        display: flex; align-items: center; gap: 6px;
        padding: 7px 14px; border-radius: 8px; border: 2px solid #e2e8f0;
        background: #fff; font-size: .8rem; font-weight: 600;
        cursor: pointer; transition: all .2s; color: #64748b;
    }
    .map-mode-btn .dot {
        width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0;
    }
    .map-mode-btn.origin.active,
    .map-mode-btn.origin:hover { border-color: #22c55e; background: #f0fdf4; color: #16a34a; }
    .map-mode-btn.dest.active,
    .map-mode-btn.dest:hover   { border-color: #ef4444; background: #fff5f5; color: #dc2626; }
    .map-mode-btn .dot.origin  { background: #22c55e; }
    .map-mode-btn .dot.dest    { background: #ef4444; }
    .map-mode-btn.clear        { margin-left: auto; color: #94a3b8; font-size: .75rem; }
    .map-mode-btn.clear:hover  { border-color: #94a3b8; background: #f8fafc; }

    /* Point cards */
    .point-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px; }
    .point-card {
        border: 2px solid #e2e8f0; border-radius: 10px;
        padding: 12px 14px; cursor: pointer; transition: all .2s;
        position: relative;
    }
    .point-card.origin:hover, .point-card.origin.active {
        border-color: #22c55e; background: #f0fdf4;
    }
    .point-card.dest:hover, .point-card.dest.active {
        border-color: #ef4444; background: #fff5f5;
    }
    .point-card-header {
        display: flex; align-items: center; gap: 8px; margin-bottom: 8px;
    }
    .point-badge {
        width: 26px; height: 26px; border-radius: 50%;
        font-weight: 800; font-size: .85rem; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center; color: #fff;
    }
    .point-badge.origin { background: #22c55e; }
    .point-badge.dest   { background: #ef4444; }
    .point-label { font-size: .7rem; font-weight: 700; text-transform: uppercase;
                   letter-spacing: .06em; color: #94a3b8; }
    .point-search {
        width: 100%; border: 1px solid #e2e8f0; border-radius: 6px;
        padding: 6px 10px; font-size: .82rem; outline: none;
        background: transparent; color: #1e293b;
        transition: border-color .2s;
    }
    .point-search:focus { border-color: #5c61f2; }
    .point-coord {
        font-size: .72rem; color: #94a3b8; font-family: monospace;
        margin-top: 4px; min-height: 14px;
    }
    .point-coord.set { color: #16a34a; font-weight: 600; }

    /* Nominatim dropdown */
    .nominatim-dropdown {
        position: absolute; left: 0; right: 0; top: 100%;
        background: #fff; border: 1px solid #e2e8f0;
        border-radius: 0 0 8px 8px; box-shadow: 0 8px 20px rgba(0,0,0,.1);
        z-index: 9999; max-height: 200px; overflow-y: auto; display: none;
    }
    .nominatim-item {
        padding: 9px 12px; font-size: .82rem; cursor: pointer;
        border-bottom: 1px solid #f1f5f9; color: #374151;
        display: flex; align-items: flex-start; gap: 8px;
        transition: background .1s;
    }
    .nominatim-item:last-child { border-bottom: none; }
    .nominatim-item:hover { background: #f8fafc; }
    .nominatim-item i { color: #94a3b8; margin-top: 2px; flex-shrink: 0; }
    .nominatim-item .nom-name { font-weight: 600; color: #1e293b; font-size: .8rem; }
    .nominatim-item .nom-detail { font-size: .72rem; color: #94a3b8; }

    /* Map hint */
    .map-hint {
        text-align: center; font-size: .75rem; color: #94a3b8;
        padding: 5px 0 2px; display: flex; align-items: center;
        justify-content: center; gap: 5px;
    }
</style>

<div class="page-content">
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="mb-1"><i class="fas fa-plus-circle me-2" style="color:#5c61f2;"></i>Crear Nuevo Viaje</h4>
            <p class="text-muted mb-0 small">El viaje aparecerá en la app del conductor una vez creado.</p>
        </div>
        <a href="{{ route('trips.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left me-1"></i> Volver
        </a>
    </div>

    <form action="{{ route('trips.store') }}" method="POST" class="ajax-form" id="tripCreateForm">
        @csrf
        <div class="row">

            {{-- ── Columna izquierda ──────────────────────────────────────── --}}
            <div class="col-lg-7">

                {{-- CLIENTE Y SERVICIO --}}
                <div class="section-card">
                    <div class="section-title"><i class="fas fa-user"></i> Cliente & Servicio</div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Cliente</label>
                            <select name="customer_id" class="form-select" required>
                                <option value="">— Seleccionar cliente —</option>
                                @foreach($customers as $c)
                                    <option value="{{ $c->id }}" {{ old('customer_id') == $c->id ? 'selected' : '' }}>
                                        {{ $c->name ?? $c->email }}
                                        @if($c->whatsapp_number) · {{ $c->whatsapp_number }} @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Tipo de servicio</label>
                            <select name="service_type" id="service_type" class="form-select" required>
                                <option value="">— Seleccionar —</option>
                                <option value="Delivery" {{ old('service_type')=='Delivery' ? 'selected':'' }}>🛵 Delivery</option>
                                <option value="Taxi"     {{ old('service_type')=='Taxi'     ? 'selected':'' }}>🚗 Taxi</option>
                                <option value="Cargo"    {{ old('service_type')=='Cargo'    ? 'selected':'' }}>🚛 Carga</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Tarifa estimada</label>
                            <div class="input-group">
                                <input type="number" step="0.5" name="estimated_fare" class="form-control"
                                       value="{{ old('estimated_fare') }}" placeholder="0.00" min="0">
                                <select name="currency" class="form-select" style="max-width:90px;">
                                    <option value="Bs" selected>Bs</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Método de pago</label>
                            <select name="payment_method" class="form-select" required>
                                <option value="cash"          {{ old('payment_method','cash')=='cash'          ? 'selected':'' }}>💵 Efectivo</option>
                                <option value="qr"            {{ old('payment_method')=='qr'            ? 'selected':'' }}>📱 QR</option>
                                <option value="card"          {{ old('payment_method')=='card'          ? 'selected':'' }}>💳 Tarjeta</option>
                                <option value="bank_transfer" {{ old('payment_method')=='bank_transfer' ? 'selected':'' }}>🏦 Transferencia</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Horario (opcional)</label>
                            <input type="datetime-local" name="scheduled_time" class="form-control" value="{{ old('scheduled_time') }}">
                        </div>
                    </div>

                    <div id="passengersGroup" style="display:none;">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nro. de pasajeros</label>
                                <input type="number" name="num_passengers" min="1" max="10" class="form-control" value="{{ old('num_passengers',1) }}">
                            </div>
                            <div class="col-md-6 mb-3 d-flex align-items-end pb-2">
                                <div class="form-check form-switch">
                                    <input name="trunk_required" type="checkbox" class="form-check-input" {{ old('trunk_required') ? 'checked':'' }}>
                                    <label class="form-check-label">Necesita baúl</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="cargoGroup" style="display:none;">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Tipo de carga</label>
                                <input type="text" name="cargo_type" class="form-control" value="{{ old('cargo_type') }}" placeholder="Ej: Electrodomésticos, Documentos">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Peso (kg)</label>
                                <input type="number" step="0.1" name="weight" class="form-control" value="{{ old('weight') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Volumen (m³)</label>
                                <input type="number" step="0.01" name="volume" class="form-control" value="{{ old('volume') }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label">Notas / instrucciones</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="Instrucciones especiales para el conductor...">{{ old('notes') }}</textarea>
                    </div>
                </div>

                {{-- ── MAPA INTERACTIVO ──────────────────────────────────── --}}
                <div class="section-card">
                    <div class="section-title"><i class="fas fa-map-marked-alt"></i> Origen y Destino</div>

                    {{-- Mode selector --}}
                    <div class="map-mode-bar">
                        <button type="button" id="btnSetOrigin" class="map-mode-btn origin active" onclick="setMode('origin')">
                            <span class="dot origin"></span> Fijar ORIGEN
                        </button>
                        <button type="button" id="btnSetDest" class="map-mode-btn dest" onclick="setMode('dest')">
                            <span class="dot dest"></span> Fijar DESTINO
                        </button>
                        <button type="button" class="map-mode-btn clear" onclick="clearPoints()" title="Limpiar puntos">
                            <i class="fas fa-undo"></i> Limpiar
                        </button>
                    </div>

                    {{-- Map hint --}}
                    <div class="map-hint" id="mapHint">
                        <i class="fas fa-hand-pointer"></i>
                        <span id="mapHintText">Clic en el mapa o busca abajo para fijar el <strong>origen</strong></span>
                    </div>

                    {{-- The Map --}}
                    <div id="tripMap" class="mode-origin"></div>

                    {{-- Point cards con búsqueda Nominatim --}}
                    <div class="point-cards">

                        {{-- Origen --}}
                        <div class="point-card origin active" id="originCard" onclick="setMode('origin')">
                            <div class="point-card-header">
                                <div class="point-badge origin">A</div>
                                <div class="point-label">Origen · Recojo</div>
                            </div>
                            <div style="position:relative;">
                                <input type="text" id="origin_address" name="origin_address"
                                       class="point-search" autocomplete="off"
                                       placeholder="Buscar dirección..."
                                       value="{{ old('origin_address') }}"
                                       onclick="setMode('origin'); event.stopPropagation();">
                                <div id="nominatim_origin" class="nominatim-dropdown"></div>
                            </div>
                            <div id="originCoords" class="point-coord"></div>
                            <input type="hidden" name="origin_lat" id="origin_lat" value="{{ old('origin_lat') }}" required>
                            <input type="hidden" name="origin_lng" id="origin_lng" value="{{ old('origin_lng') }}" required>
                            <input type="hidden" name="origin_url" id="origin_url" value="{{ old('origin_url') }}">
                        </div>

                        {{-- Destino --}}
                        <div class="point-card dest" id="destCard" onclick="setMode('dest')">
                            <div class="point-card-header">
                                <div class="point-badge dest">B</div>
                                <div class="point-label">Destino · Entrega</div>
                            </div>
                            <div style="position:relative;">
                                <input type="text" id="destination_address" name="destination_address"
                                       class="point-search" autocomplete="off"
                                       placeholder="Buscar dirección..."
                                       value="{{ old('destination_address') }}"
                                       onclick="setMode('dest'); event.stopPropagation();">
                                <div id="nominatim_dest" class="nominatim-dropdown"></div>
                            </div>
                            <div id="destCoords" class="point-coord"></div>
                            <input type="hidden" name="destination_lat" id="destination_lat" value="{{ old('destination_lat') }}" required>
                            <input type="hidden" name="destination_lng" id="destination_lng" value="{{ old('destination_lng') }}" required>
                            <input type="hidden" name="destination_url" id="destination_url" value="{{ old('destination_url') }}">
                        </div>

                    </div>{{-- /point-cards --}}
                </div>{{-- /section-card mapa --}}

            </div>{{-- /col-lg-7 --}}

            {{-- ── Columna derecha — Conductor ──────────────────────────── --}}
            <div class="col-lg-5">
                <div class="section-card" style="position:sticky; top:80px;">
                    <div class="section-title"><i class="fas fa-user-tie"></i> Asignación de Conductor</div>
                    <input type="hidden" name="driver_id" id="driverIdInput" value="">

                    <div class="broadcast-box selected" id="broadcastBox" onclick="selectBroadcast()">
                        <i class="fas fa-broadcast-tower"></i>
                        <strong>Notificar a todos los conductores</strong>
                        <div class="small mt-1" style="color:inherit;opacity:.8;">El primero en aceptar toma el viaje</div>
                    </div>

                    <div class="text-center text-muted small my-2">— o asignar directamente —</div>

                    @if($drivers->isEmpty())
                        <div class="text-center text-muted py-3">
                            <i class="fas fa-user-slash fa-2x mb-2 d-block opacity-50"></i>
                            No hay conductores disponibles en este momento
                        </div>
                    @else
                        <div style="max-height:380px; overflow-y:auto; padding-right:4px;">
                            @foreach($drivers as $driver)
                            @php
                                $u = $driver->user;
                                $v = $driver->vehicles->first();
                                $initial = strtoupper(substr($u->name ?? 'C', 0, 1));
                            @endphp
                            <div class="driver-option" id="driverOpt{{ $driver->id }}"
                                 onclick="selectDriver({{ $driver->id }}, '{{ addslashes($u->name ?? 'Conductor') }}')">
                                <div class="avatar">{{ $initial }}</div>
                                <div class="info">
                                    <div class="name">{{ $u->name ?? 'Sin nombre' }}</div>
                                    <div class="sub">
                                        @if($v) {{ $v->model ?? '' }} {{ $v->plate_number ? '· '.$v->plate_number : '' }} @endif
                                        @if($u->whatsapp_number) · {{ $u->whatsapp_number }} @endif
                                    </div>
                                </div>
                                <span class="badge-status">{{ ucfirst($driver->status) }}</span>
                            </div>
                            @endforeach
                        </div>
                    @endif

                    <div id="assignmentSummary" class="mt-3 p-3 rounded" style="background:#f8fafc; border:1px solid #e2e8f0; font-size:.88rem; display:none;">
                        <i class="fas fa-check-circle me-1" style="color:#16a34a;"></i>
                        Conductor seleccionado: <strong id="selectedDriverName"></strong>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100 py-2" id="submitBtn">
                            <i class="fas fa-paper-plane me-2"></i>
                            <span id="submitText">Crear y Notificar Conductores</span>
                        </button>
                        <a href="{{ route('trips.index') }}" class="btn btn-outline-secondary w-100 mt-2">Cancelar</a>
                    </div>
                </div>
            </div>

        </div>{{-- /row --}}
    </form>
</div>
</div>
@endsection

{{-- Maps API — al final del layout para que initMap esté definido primero --}}
@push('maps-script')
@if(config('services.google.maps_key'))
<script defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&callback=initMap&v=weekly"></script>
@endif
@endpush

@push('scripts')
<script>
// ════════════════════════════════════════════════════════════════
//  ESTADO GLOBAL
// ════════════════════════════════════════════════════════════════
let map = null, originMarker = null, destMarker = null;
let routeLine = null;
let currentMode = 'origin'; // 'origin' | 'dest'

// ════════════════════════════════════════════════════════════════
//  MODO (qué punto se está fijando)
// ════════════════════════════════════════════════════════════════
function setMode(mode) {
    currentMode = mode;

    // Botones
    document.getElementById('btnSetOrigin').classList.toggle('active', mode === 'origin');
    document.getElementById('btnSetDest').classList.toggle('active', mode === 'dest');

    // Cards
    document.getElementById('originCard').classList.toggle('active', mode === 'origin');
    document.getElementById('destCard').classList.toggle('active', mode === 'dest');

    // Borde del mapa
    if (map) {
        const mapEl = document.getElementById('tripMap');
        mapEl.classList.toggle('mode-origin', mode === 'origin');
        mapEl.classList.toggle('mode-dest',   mode === 'dest');
    }

    // Hint
    const noun = mode === 'origin' ? '<strong>origen</strong>' : '<strong>destino</strong>';
    document.getElementById('mapHintText').innerHTML =
        `Clic en el mapa o busca abajo para fijar el ${noun}`;
}

// ════════════════════════════════════════════════════════════════
//  LIMPIAR
// ════════════════════════════════════════════════════════════════
function clearPoints() {
    ['origin_lat','origin_lng','origin_url','destination_lat','destination_lng','destination_url'].forEach(id => {
        document.getElementById(id).value = '';
    });
    document.getElementById('origin_address').value      = '';
    document.getElementById('destination_address').value = '';
    document.getElementById('originCoords').textContent  = '';
    document.getElementById('destCoords').textContent    = '';
    document.getElementById('originCoords').className    = 'point-coord';
    document.getElementById('destCoords').className      = 'point-coord';

    if (originMarker) { originMarker.setMap(null); originMarker = null; }
    if (destMarker)   { destMarker.setMap(null);   destMarker   = null; }
    if (routeLine)    { routeLine.setMap(null);     routeLine    = null; }

    setMode('origin');
}

// ════════════════════════════════════════════════════════════════
//  GOOGLE MAPS
// ════════════════════════════════════════════════════════════════
@if(config('services.google.maps_key'))
function initMap() {
    map = new google.maps.Map(document.getElementById('tripMap'), {
        center: { lat: -17.7863, lng: -63.1812 },
        zoom: 13,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: true,
        zoomControlOptions: { position: google.maps.ControlPosition.RIGHT_CENTER },
    });

    map.addListener('click', (e) => {
        const lat = e.latLng.lat();
        const lng = e.latLng.lng();
        placeMarker(currentMode, { lat, lng }, null);
        reverseGeocode(lat, lng, currentMode);

        // Auto-avanzar al siguiente punto
        if (currentMode === 'origin') setMode('dest');
        else if (!document.getElementById('origin_lat').value) setMode('origin');
    });
}
@else
function initMap() {}   // sin key — mapa no disponible

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('tripMap').innerHTML =
        '<div style="height:100%;display:flex;align-items:center;justify-content:center;' +
        'background:#f8fafc;border-radius:10px;color:#94a3b8;flex-direction:column;gap:8px;">' +
        '<i class="fas fa-map fa-2x"></i>' +
        '<span class="small">Configura GOOGLE_MAPS_API_KEY para ver el mapa</span></div>';
});
@endif

// ── Colocar/mover marker ─────────────────────────────────────────
function placeMarker(type, latLng, address) {
    const isOrigin = (type === 'origin');
    const latId    = isOrigin ? 'origin_lat'       : 'destination_lat';
    const lngId    = isOrigin ? 'origin_lng'       : 'destination_lng';
    const urlId    = isOrigin ? 'origin_url'       : 'destination_url';
    const coordId  = isOrigin ? 'originCoords'     : 'destCoords';
    const addrId   = isOrigin ? 'origin_address'   : 'destination_address';

    const lat = typeof latLng.lat === 'function' ? latLng.lat() : latLng.lat;
    const lng = typeof latLng.lng === 'function' ? latLng.lng() : latLng.lng;

    document.getElementById(latId).value = lat.toFixed(6);
    document.getElementById(lngId).value = lng.toFixed(6);
    if (address) {
        document.getElementById(urlId).value  = address;
        document.getElementById(addrId).value = address;
    }
    const coordEl = document.getElementById(coordId);
    coordEl.textContent = `📍 ${lat.toFixed(5)}, ${lng.toFixed(5)}`;
    coordEl.className   = 'point-coord set';

    if (!map) return;

    if (isOrigin && originMarker) originMarker.setMap(null);
    if (!isOrigin && destMarker)  destMarker.setMap(null);

    const marker = new google.maps.Marker({
        map,
        position: { lat, lng },
        draggable: true,
        animation: google.maps.Animation.DROP,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 10,
            fillColor:   isOrigin ? '#22c55e' : '#ef4444',
            fillOpacity: 1,
            strokeColor: '#fff',
            strokeWeight: 2,
        },
        title: isOrigin ? '📍 Origen' : '🏁 Destino',
        label: {
            text: isOrigin ? 'A' : 'B',
            color: '#fff', fontWeight: 'bold', fontSize: '11px',
        },
    });

    if (isOrigin) originMarker = marker;
    else          destMarker   = marker;

    marker.addListener('dragend', (ev) => {
        const nlat = ev.latLng.lat();
        const nlng = ev.latLng.lng();
        document.getElementById(latId).value = nlat.toFixed(6);
        document.getElementById(lngId).value = nlng.toFixed(6);
        coordEl.textContent = `📍 ${nlat.toFixed(5)}, ${nlng.toFixed(5)}`;
        reverseGeocode(nlat, nlng, type);
        drawRoute();
    });

    drawRoute();
}

// ── Dibujar línea entre A y B ────────────────────────────────────
function drawRoute() {
    if (!map) return;
    const oLat = document.getElementById('origin_lat').value;
    const oLng = document.getElementById('origin_lng').value;
    const dLat = document.getElementById('destination_lat').value;
    const dLng = document.getElementById('destination_lng').value;

    if (routeLine) { routeLine.setMap(null); routeLine = null; }
    if (!oLat || !dLat) return;

    routeLine = new google.maps.Polyline({
        path: [
            { lat: parseFloat(oLat), lng: parseFloat(oLng) },
            { lat: parseFloat(dLat), lng: parseFloat(dLng) },
        ],
        geodesic: true,
        strokeColor:   '#5c61f2',
        strokeOpacity: 0.7,
        strokeWeight:  3,
        icons: [{ icon: { path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW }, offset: '50%' }],
    });
    routeLine.setMap(map);

    // Centrar el mapa para mostrar ambos puntos
    const bounds = new google.maps.LatLngBounds();
    bounds.extend({ lat: parseFloat(oLat), lng: parseFloat(oLng) });
    bounds.extend({ lat: parseFloat(dLat), lng: parseFloat(dLng) });
    map.fitBounds(bounds, { top: 40, right: 40, bottom: 40, left: 40 });
}

// ════════════════════════════════════════════════════════════════
//  NOMINATIM — Búsqueda de direcciones (gratuito, sin cuotas)
// ════════════════════════════════════════════════════════════════
function setupNominatim(inputId, dropdownId, type) {
    const input = document.getElementById(inputId);
    const dd    = document.getElementById(dropdownId);
    if (!input || !dd) return;

    let timer = null;

    input.addEventListener('input', () => {
        clearTimeout(timer);
        const q = input.value.trim();
        if (q.length < 3) { dd.style.display = 'none'; return; }

        timer = setTimeout(async () => {
            try {
                const url = 'https://nominatim.openstreetmap.org/search?' +
                    'q=' + encodeURIComponent(q + ', Santa Cruz, Bolivia') +
                    '&format=json&limit=6&accept-language=es&addressdetails=1';

                const res  = await fetch(url, { headers: { 'User-Agent': 'AvaroaAdmin/1.0' } });
                const data = await res.json();

                dd.innerHTML = '';
                if (!data.length) { dd.style.display = 'none'; return; }

                data.forEach(r => {
                    const parts  = r.display_name.split(',');
                    const name   = parts.slice(0, 2).join(',').trim();
                    const detail = parts.slice(2, 4).join(',').trim();

                    const item = document.createElement('div');
                    item.className = 'nominatim-item';
                    item.innerHTML =
                        `<i class="fas fa-map-marker-alt"></i>` +
                        `<div><div class="nom-name">${name}</div>` +
                        `<div class="nom-detail">${detail}</div></div>`;

                    item.addEventListener('mousedown', (e) => {
                        e.preventDefault();
                        const lat = parseFloat(r.lat);
                        const lng = parseFloat(r.lon);
                        setMode(type);
                        placeMarker(type, { lat, lng }, name);
                        dd.style.display = 'none';
                        if (map) { map.setCenter({ lat, lng }); map.setZoom(16); }
                        // Auto-switch al siguiente punto
                        if (type === 'origin' && !document.getElementById('destination_lat').value) {
                            setTimeout(() => { setMode('dest'); document.getElementById('destination_address').focus(); }, 200);
                        }
                    });
                    dd.appendChild(item);
                });
                dd.style.display = 'block';
            } catch(err) {
                console.warn('Nominatim error:', err);
            }
        }, 380);
    });

    input.addEventListener('blur', () => setTimeout(() => { dd.style.display = 'none'; }, 200));
    input.addEventListener('focus', () => { if (dd.children.length) dd.style.display = 'block'; });
}

// ── Geocodificación inversa (clic en mapa → nombre de calle) ─────
async function reverseGeocode(lat, lng, type) {
    try {
        const url = `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json&accept-language=es`;
        const res  = await fetch(url, { headers: { 'User-Agent': 'AvaroaAdmin/1.0' } });
        const data = await res.json();
        if (!data.display_name) return;

        const parts   = data.display_name.split(',');
        const address = parts.slice(0, 3).join(',').trim();
        const addrId  = type === 'origin' ? 'origin_address' : 'destination_address';
        const urlId   = type === 'origin' ? 'origin_url'     : 'destination_url';
        document.getElementById(addrId).value = address;
        document.getElementById(urlId).value  = address;
    } catch(e) { /* silencioso */ }
}

// ════════════════════════════════════════════════════════════════
//  DRIVER SELECTION
// ════════════════════════════════════════════════════════════════
function selectBroadcast() {
    document.getElementById('driverIdInput').value = '';
    document.querySelectorAll('.driver-option').forEach(el => el.classList.remove('selected'));
    document.getElementById('broadcastBox').classList.add('selected');
    document.getElementById('assignmentSummary').style.display = 'none';
    updateSubmitBtn();
}

function selectDriver(id, name) {
    document.getElementById('driverIdInput').value = id;
    document.getElementById('broadcastBox').classList.remove('selected');
    document.querySelectorAll('.driver-option').forEach(el => el.classList.remove('selected'));
    document.getElementById('driverOpt' + id).classList.add('selected');
    document.getElementById('selectedDriverName').textContent = name;
    document.getElementById('assignmentSummary').style.display = 'block';
    updateSubmitBtn();
}

function updateSubmitBtn() {
    const id = document.getElementById('driverIdInput').value;
    document.getElementById('submitText').textContent = id
        ? `Crear y Asignar a ${document.getElementById('selectedDriverName').textContent}`
        : 'Crear y Notificar a Conductores';
}

// ════════════════════════════════════════════════════════════════
//  INIT
// ════════════════════════════════════════════════════════════════
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('service_type').addEventListener('change', function () {
        const t = this.value;
        document.getElementById('passengersGroup').style.display = (t === 'Taxi')     ? 'block' : 'none';
        document.getElementById('cargoGroup').style.display      = (t !== 'Taxi' && t !== '') ? 'block' : 'none';
        updateSubmitBtn();
    });
    document.getElementById('service_type').dispatchEvent(new Event('change'));

    // Inicializar Nominatim en ambos campos
    setupNominatim('origin_address',      'nominatim_origin', 'origin');
    setupNominatim('destination_address', 'nominatim_dest',   'dest');
});
</script>
@endpush

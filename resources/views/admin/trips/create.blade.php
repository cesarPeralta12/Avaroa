@extends('layout.master')

@section('title', 'Crear Nuevo Viaje')

@section('main_content')
<style>
    .section-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px 24px;
        margin-bottom: 20px;
    }
    .section-card .section-title {
        font-size: .8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: #94a3b8;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .section-card .section-title i { color: #5c61f2; }

    .driver-option {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        cursor: pointer;
        transition: all .2s;
        margin-bottom: 8px;
    }
    .driver-option:hover { border-color: #5c61f2; background: #f5f3ff; }
    .driver-option.selected { border-color: #5c61f2; background: #f5f3ff; }
    .driver-option .avatar {
        width: 38px; height: 38px; border-radius: 50%;
        background: linear-gradient(135deg, #5c61f2, #764ba2);
        color: white; font-weight: 700; font-size: .9rem;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .driver-option .info { flex: 1; }
    .driver-option .name { font-weight: 600; font-size: .9rem; color: #1e293b; }
    .driver-option .sub  { font-size: .78rem; color: #64748b; }
    .driver-option .badge-status {
        font-size: .7rem; padding: 2px 8px; border-radius: 20px;
        background: #dcfce7; color: #16a34a; font-weight: 600;
    }

    .broadcast-box {
        border: 2px dashed #e2e8f0;
        border-radius: 10px;
        padding: 18px;
        text-align: center;
        cursor: pointer;
        transition: all .2s;
        color: #64748b;
    }
    .broadcast-box:hover, .broadcast-box.selected {
        border-color: #FF8C00;
        background: #fff8f0;
        color: #FF8C00;
    }
    .broadcast-box i { font-size: 1.8rem; margin-bottom: 8px; display: block; }

    #map { height: 360px; border-radius: 10px; border: 1px solid #e2e8f0; }
    .coord-tag { font-size: .75rem; color: #64748b; font-family: monospace; }

    .required::after { content: " *"; color: #ef4444; }
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
                {{-- Columna izquierda --}}
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
                                    <option value="Delivery" {{ old('service_type') == 'Delivery' ? 'selected' : '' }}>🛵 Delivery</option>
                                    <option value="Taxi"     {{ old('service_type') == 'Taxi'     ? 'selected' : '' }}>🚗 Taxi</option>
                                    <option value="Cargo"    {{ old('service_type') == 'Cargo'    ? 'selected' : '' }}>🚛 Carga</option>
                                </select>
                            </div>
                        </div>

                        {{-- Precio --}}
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
                                    <option value="cash"          {{ old('payment_method','cash') == 'cash'          ? 'selected' : '' }}>💵 Efectivo</option>
                                    <option value="qr"            {{ old('payment_method') == 'qr'            ? 'selected' : '' }}>📱 QR</option>
                                    <option value="card"          {{ old('payment_method') == 'card'          ? 'selected' : '' }}>💳 Tarjeta</option>
                                    <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>🏦 Transferencia</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Horario (opcional)</label>
                                <input type="datetime-local" name="scheduled_time" class="form-control" value="{{ old('scheduled_time') }}">
                            </div>
                        </div>

                        {{-- Pasajeros (Taxi) --}}
                        <div id="passengersGroup" style="display:none;">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nro. de pasajeros</label>
                                    <input type="number" name="num_passengers" min="1" max="10" class="form-control" value="{{ old('num_passengers', 1) }}">
                                </div>
                                <div class="col-md-6 mb-3 d-flex align-items-end pb-2">
                                    <div class="form-check form-switch">
                                        <input name="trunk_required" type="checkbox" class="form-check-input" {{ old('trunk_required') ? 'checked' : '' }}>
                                        <label class="form-check-label">Necesita baúl</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Cargo --}}
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

                        {{-- Notas --}}
                        <div class="mb-0">
                            <label class="form-label">Notas / instrucciones</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="Instrucciones especiales para el conductor...">{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    {{-- ORIGEN Y DESTINO --}}
                    <div class="section-card">
                        <div class="section-title"><i class="fas fa-map-marker-alt"></i> Origen y Destino</div>

                        <div class="mb-3">
                            <label class="form-label required">Dirección de origen</label>
                            <input type="text" id="origin_address" name="origin_address" class="form-control"
                                   value="{{ old('origin_address') }}" placeholder="Buscar dirección de origen..." autocomplete="off">
                            <input type="hidden" name="origin_lat" id="origin_lat" value="{{ old('origin_lat') }}" required>
                            <input type="hidden" name="origin_lng" id="origin_lng" value="{{ old('origin_lng') }}" required>
                            <input type="hidden" name="origin_url" id="origin_url" value="{{ old('origin_url') }}">
                            <div id="originCoords" class="coord-tag mt-1"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Dirección de destino</label>
                            <input type="text" id="destination_address" name="destination_address" class="form-control"
                                   value="{{ old('destination_address') }}" placeholder="Buscar dirección de destino..." autocomplete="off">
                            <input type="hidden" name="destination_lat" id="destination_lat" value="{{ old('destination_lat') }}" required>
                            <input type="hidden" name="destination_lng" id="destination_lng" value="{{ old('destination_lng') }}" required>
                            <input type="hidden" name="destination_url" id="destination_url" value="{{ old('destination_url') }}">
                            <div id="destCoords" class="coord-tag mt-1"></div>
                        </div>

                        @if(!config('services.google.maps_key'))
                        <div class="alert alert-warning py-2 small mb-3">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            Mapa no disponible — configurá <code>GOOGLE_MAPS_API_KEY</code> en Coolify para habilitar búsqueda de direcciones.
                        </div>
                        @endif

                        <div id="tripMap"></div>
                    </div>
                </div>

                {{-- Columna derecha — Conductor --}}
                <div class="col-lg-5">
                    <div class="section-card" style="position:sticky; top:80px;">
                        <div class="section-title"><i class="fas fa-user-tie"></i> Asignación de Conductor</div>
                        <input type="hidden" name="driver_id" id="driverIdInput" value="">

                        {{-- Opción: Broadcast --}}
                        <div class="broadcast-box selected" id="broadcastBox" onclick="selectBroadcast()">
                            <i class="fas fa-broadcast-tower"></i>
                            <strong>Notificar a todos los conductores</strong>
                            <div class="small mt-1" style="color:inherit;opacity:.8;">El primero en aceptar toma el viaje</div>
                        </div>

                        <div class="text-center text-muted small my-2">— o asignar directamente —</div>

                        {{-- Lista de conductores disponibles --}}
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

                        {{-- Resumen asignación --}}
                        <div id="assignmentSummary" class="mt-3 p-3 rounded" style="background:#f8fafc; border:1px solid #e2e8f0; font-size:.88rem; display:none;">
                            <i class="fas fa-check-circle me-1" style="color:#16a34a;"></i>
                            Conductor seleccionado: <strong id="selectedDriverName"></strong>
                        </div>

                        {{-- Submit --}}
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100 py-2" id="submitBtn">
                                <i class="fas fa-paper-plane me-2"></i>
                                <span id="submitText">Crear y Notificar Conductores</span>
                            </button>
                            <a href="{{ route('trips.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@push('maps-script')
@if(config('services.google.maps_key'))
<script defer
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&callback=initMap&libraries=places,marker&v=weekly">
</script>
@endif
@endpush

@push('scripts')
<script>
// ── Mostrar/ocultar campos según tipo de servicio ──────────────────────────
document.getElementById('service_type').addEventListener('change', function () {
    const t = this.value;
    document.getElementById('passengersGroup').style.display = (t === 'Taxi')     ? 'block' : 'none';
    document.getElementById('cargoGroup').style.display      = (t !== 'Taxi' && t !== '') ? 'block' : 'none';
    updateSubmitBtn();
});

// ── Selección de conductor ─────────────────────────────────────────────────
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
    const driverId = document.getElementById('driverIdInput').value;
    const serviceType = document.getElementById('service_type').value;
    const label = driverId
        ? `Crear y Asignar a ${document.getElementById('selectedDriverName').textContent || 'conductor'}`
        : 'Crear y Notificar a Conductores';
    document.getElementById('submitText').textContent = label;
}

// ── Google Maps ────────────────────────────────────────────────────────────
@if(config('services.google.maps_key'))
let map, originMarker, destMarker;

function initMap() {
    // Centro en Santa Cruz de la Sierra, Bolivia
    map = new google.maps.Map(document.getElementById('tripMap'), {
        center: { lat: -17.7863, lng: -63.1812 },
        zoom: 13,
        mapTypeControl: false,
        streetViewControl: false,
    });

    // Autocomplete origen
    const originAC = new google.maps.places.Autocomplete(
        document.getElementById('origin_address'),
        { componentRestrictions: { country: 'bo' } }
    );
    originAC.bindTo('bounds', map);
    originAC.addListener('place_changed', () => {
        const place = originAC.getPlace();
        if (!place.geometry) return;
        placeMarker('origin', place.geometry.location, place.formatted_address || place.name);
        map.setCenter(place.geometry.location);
        map.setZoom(15);
    });

    // Autocomplete destino
    const destAC = new google.maps.places.Autocomplete(
        document.getElementById('destination_address'),
        { componentRestrictions: { country: 'bo' } }
    );
    destAC.bindTo('bounds', map);
    destAC.addListener('place_changed', () => {
        const place = destAC.getPlace();
        if (!place.geometry) return;
        placeMarker('dest', place.geometry.location, place.formatted_address || place.name);
    });

    // Clic en mapa: pone origen primero, luego destino
    map.addListener('click', e => {
        if (!document.getElementById('origin_lat').value) {
            placeMarker('origin', e.latLng, null);
        } else if (!document.getElementById('destination_lat').value) {
            placeMarker('dest', e.latLng, null);
        }
    });
}

function placeMarker(type, latLng, address) {
    const isOrigin = (type === 'origin');
    const latId    = isOrigin ? 'origin_lat'   : 'destination_lat';
    const lngId    = isOrigin ? 'origin_lng'   : 'destination_lng';
    const urlId    = isOrigin ? 'origin_url'   : 'destination_url';
    const coordDiv = isOrigin ? 'originCoords' : 'destCoords';

    if (isOrigin && originMarker) originMarker.setMap(null);
    if (!isOrigin && destMarker)  destMarker.setMap(null);

    const marker = new google.maps.Marker({
        map,
        position: latLng,
        draggable: true,
        icon: isOrigin
            ? 'https://maps.google.com/mapfiles/ms/icons/green-dot.png'
            : 'https://maps.google.com/mapfiles/ms/icons/red-dot.png',
        title: isOrigin ? 'Origen' : 'Destino',
    });

    if (isOrigin) originMarker = marker;
    else          destMarker   = marker;

    const lat = typeof latLng.lat === 'function' ? latLng.lat() : latLng.lat;
    const lng = typeof latLng.lng === 'function' ? latLng.lng() : latLng.lng;

    document.getElementById(latId).value = lat.toFixed(6);
    document.getElementById(lngId).value = lng.toFixed(6);
    if (address) document.getElementById(urlId).value = address;
    document.getElementById(coordDiv).textContent = `📍 ${lat.toFixed(5)}, ${lng.toFixed(5)}`;

    marker.addListener('dragend', ev => {
        document.getElementById(latId).value = ev.latLng.lat().toFixed(6);
        document.getElementById(lngId).value = ev.latLng.lng().toFixed(6);
        document.getElementById(coordDiv).textContent = `📍 ${ev.latLng.lat().toFixed(5)}, ${ev.latLng.lng().toFixed(5)}`;
    });
}
@else
// Sin Maps API — mostrar mensaje en el div del mapa
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('tripMap').innerHTML =
        '<div style="height:200px;display:flex;align-items:center;justify-content:center;background:#f8fafc;border-radius:10px;color:#94a3b8;">' +
        '<div class="text-center"><i class="fas fa-map fa-2x mb-2 d-block"></i>Ingresá las coordenadas manualmente</div></div>';

    // Mostrar campos lat/lng visibles si no hay Maps
    ['origin_lat','origin_lng','destination_lat','destination_lng'].forEach(id => {
        const input = document.getElementById(id);
        input.type = 'number';
        input.step = 'any';
        input.classList.add('form-control');
        input.placeholder = id.includes('lat') ? 'Latitud' : 'Longitud';
        const wrapper = document.createElement('div');
        wrapper.className = 'mb-2';
        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(input);
    });
});
@endif

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('service_type').dispatchEvent(new Event('change'));
});
</script>
@endpush

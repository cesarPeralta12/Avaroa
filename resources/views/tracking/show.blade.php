<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastrear Pedido — Avaroa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --orange: #FF8C00;
            --orange-dark: #e07a00;
            --dark: #0f172a;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        .top-bar {
            background: var(--dark);
            color: white;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }
        .top-bar .brand {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--orange);
            letter-spacing: 1px;
        }
        .top-bar .status-chip {
            background: rgba(255,140,0,0.15);
            border: 1px solid var(--orange);
            color: var(--orange);
            padding: 4px 14px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .top-bar .status-chip.live {
            animation: pulse-border 2s infinite;
        }
        @keyframes pulse-border {
            0%, 100% { box-shadow: 0 0 0 0 rgba(255,140,0,0.4); }
            50%       { box-shadow: 0 0 0 6px rgba(255,140,0,0); }
        }

        /* MAPA */
        #map {
            flex: 1;
            width: 100%;
            min-height: calc(100vh - 60px - 200px);
        }

        /* PANEL INFO */
        .info-panel {
            background: white;
            padding: 20px;
            border-top: 3px solid var(--orange);
        }

        .driver-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px;
            background: #f8fafc;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }
        .driver-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.4rem;
            font-weight: 700;
            flex-shrink: 0;
        }
        .driver-name { font-weight: 700; font-size: 1rem; color: var(--dark); }
        .driver-sub  { font-size: 0.82rem; color: #64748b; }

        .stat-box {
            text-align: center;
            padding: 12px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        .stat-val { font-size: 1.3rem; font-weight: 700; color: var(--orange); }
        .stat-lbl { font-size: 0.75rem; color: #64748b; margin-top: 2px; }

        .route-line {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 12px 16px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        .route-line .dots {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 4px;
        }
        .dot-origin { width: 12px; height: 12px; background: var(--orange); border-radius: 50%; }
        .dot-line   { width: 2px; height: 24px; background: #cbd5e1; margin: 3px 0; }
        .dot-dest   { width: 12px; height: 12px; background: var(--dark); border-radius: 50%; }
        .route-text { flex: 1; }
        .route-text p { margin: 0; font-size: 0.88rem; line-height: 1.6; }
        .route-text .label { color: #94a3b8; font-size: 0.75rem; }

        /* OFFLINE banner */
        #offline-banner {
            display: none;
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #dc2626;
            text-align: center;
            padding: 10px;
            font-size: 0.88rem;
            font-weight: 600;
        }

        /* Share */
        .share-btn {
            background: var(--dark);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
        }
        .share-btn:hover { background: #1e293b; transform: translateY(-1px); }

        @media (min-width: 768px) {
            body { flex-direction: row; flex-wrap: wrap; }
            .top-bar { width: 100%; }
            #map { width: 60%; min-height: calc(100vh - 60px); }
            .info-panel { width: 40%; min-height: calc(100vh - 60px); border-top: none; border-left: 3px solid var(--orange); overflow-y: auto; }
            #offline-banner { width: 100%; }
        }
    </style>
</head>
<body>

{{-- TOP BAR --}}
<div class="top-bar">
    <span class="brand">🚚 AVAROA</span>
    <span class="status-chip live" id="liveChip">
        <i class="fas fa-circle me-1" style="font-size:.6rem; color:#22c55e;"></i>
        EN VIVO
    </span>
</div>

{{-- BANNER OFFLINE --}}
<div id="offline-banner">
    <i class="fas fa-wifi-slash me-2"></i>
    Conexión perdida — intentando reconectar...
</div>

{{-- MAPA --}}
<div id="map"></div>

{{-- PANEL DE INFO --}}
<div class="info-panel">

    {{-- CONDUCTOR --}}
    <div class="driver-card mb-3">
        @php
            $driverName = $trip->driver?->user?->name ?? 'Conductor Avaroa';
            $initial    = strtoupper(substr($driverName, 0, 1));
            $photo      = $trip->driver?->user?->profile_photo;
        @endphp
        <div class="driver-avatar">
            @if($photo)
                <img src="{{ \App\Services\FileUploadService::getUrl($photo) }}"
                     style="width:56px;height:56px;border-radius:50%;object-fit:cover;" alt="">
            @else
                {{ $initial }}
            @endif
        </div>
        <div>
            <div class="driver-name">{{ $driverName }}</div>
            <div class="driver-sub">
                <i class="fas fa-car me-1"></i>
                {{ $trip->driver?->vehicle?->model ?? 'Vehículo' }}
                {{ $trip->driver?->vehicle?->plate_number ? '· '.$trip->driver->vehicle->plate_number : '' }}
            </div>
            <div class="driver-sub mt-1" id="statusText">
                <i class="fas fa-circle me-1" style="color:#22c55e; font-size:.6rem;"></i>
                {{ ucfirst(str_replace('_', ' ', $trip->status)) }}
            </div>
        </div>
    </div>

    {{-- STATS --}}
    <div class="row g-2 mb-3">
        <div class="col-4">
            <div class="stat-box">
                <div class="stat-val" id="statSpeed">—</div>
                <div class="stat-lbl">km/h</div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-box">
                <div class="stat-val" id="statUpdate">—</div>
                <div class="stat-lbl">Última act.</div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-box">
                <div class="stat-val" id="statPings">0</div>
                <div class="stat-lbl">Pings</div>
            </div>
        </div>
    </div>

    {{-- RUTA --}}
    <div class="route-line mb-3">
        <div class="dots">
            <div class="dot-origin"></div>
            <div class="dot-line"></div>
            <div class="dot-dest"></div>
        </div>
        <div class="route-text">
            <p class="label">ORIGEN</p>
            <p><strong>{{ $trip->origin_address ?? 'Dirección de origen' }}</strong></p>
            <p class="label mt-1">DESTINO</p>
            <p><strong>{{ $trip->destination_address ?? 'Dirección de destino' }}</strong></p>
        </div>
    </div>

    {{-- COMPARTIR --}}
    <div class="d-flex align-items-center justify-content-between">
        <small class="text-muted">Compartí este link de rastreo:</small>
        <button class="share-btn" onclick="copyLink()">
            <i class="fas fa-copy me-1"></i> Copiar link
        </button>
    </div>
    <div class="mt-2 p-2 rounded" style="background:#f8fafc; font-size:.78rem; color:#64748b; word-break:break-all;" id="shareLink">
        {{ url('/track/' . $token) }}
    </div>

</div>

{{-- Google Maps --}}
@if(config('services.google.maps_key'))
<script>
    let map, driverMarker, originMarker, destMarker, pathLine;
    let pingCount = 0;
    const pathCoords = [];

    const INITIAL_LAT  = {{ $lastLocation?->lat ?? ($trip->origin_lat ?? -17.3895) }};
    const INITIAL_LNG  = {{ $lastLocation?->lng ?? ($trip->origin_lng ?? -66.1568) }};
    const ORIGIN_LAT   = {{ $trip->origin_lat ?? 'null' }};
    const ORIGIN_LNG   = {{ $trip->origin_lng ?? 'null' }};
    const DEST_LAT     = {{ $trip->destination_lat ?? 'null' }};
    const DEST_LNG     = {{ $trip->destination_lng ?? 'null' }};

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: { lat: INITIAL_LAT, lng: INITIAL_LNG },
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: true,
            styles: [
                { featureType: 'poi', stylers: [{ visibility: 'off' }] },
            ],
        });

        // Marcador conductor
        driverMarker = new google.maps.Marker({
            position: { lat: INITIAL_LAT, lng: INITIAL_LNG },
            map,
            title: '{{ $driverName ?? "Conductor" }}',
            icon: {
                url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                        <circle cx="22" cy="22" r="20" fill="#FF8C00" stroke="white" stroke-width="3"/>
                        <text x="22" y="28" text-anchor="middle" font-size="20" fill="white">🚚</text>
                    </svg>`),
                scaledSize: new google.maps.Size(44, 44),
                anchor: new google.maps.Point(22, 22),
            },
        });

        // Línea de trayecto
        pathLine = new google.maps.Polyline({
            path: [],
            geodesic: true,
            strokeColor: '#FF8C00',
            strokeOpacity: 0.8,
            strokeWeight: 3,
            map,
        });

        // Marcadores origen/destino
        if (ORIGIN_LAT && ORIGIN_LNG) {
            originMarker = new google.maps.Marker({
                position: { lat: ORIGIN_LAT, lng: ORIGIN_LNG },
                map,
                title: 'Origen',
                icon: { url: 'https://maps.google.com/mapfiles/ms/icons/green-dot.png' },
            });
        }

        if (DEST_LAT && DEST_LNG) {
            destMarker = new google.maps.Marker({
                position: { lat: DEST_LAT, lng: DEST_LNG },
                map,
                title: 'Destino',
                icon: { url: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png' },
            });
        }

        // Agregar posición inicial al historial
        if (INITIAL_LAT && INITIAL_LNG) {
            pathCoords.push({ lat: INITIAL_LAT, lng: INITIAL_LNG });
            pathLine.setPath(pathCoords);
        }
    }

    function updateDriverPosition(lat, lng, heading, speed, status) {
        const pos = { lat, lng };
        driverMarker.setPosition(pos);
        pathCoords.push(pos);
        if (pathCoords.length > 200) pathCoords.shift(); // limitar historial
        pathLine.setPath(pathCoords);
        map.panTo(pos);

        // Stats
        pingCount++;
        document.getElementById('statPings').textContent  = pingCount;
        document.getElementById('statSpeed').textContent  = speed ? Math.round(speed) : '—';
        document.getElementById('statUpdate').textContent = new Date().toLocaleTimeString('es-BO', { hour:'2-digit', minute:'2-digit' });
        if (status) document.getElementById('statusText').innerHTML =
            `<i class="fas fa-circle me-1" style="color:#22c55e; font-size:.6rem;"></i>${status.replace(/_/g,' ')}`;
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&callback=initMap&libraries=places&v=weekly">
</script>
@else
<div style="background:#1e293b;color:white;display:flex;align-items:center;justify-content:center;flex:1;min-height:300px;">
    <div class="text-center">
        <i class="fas fa-map-marked-alt fa-3x mb-3" style="color:#FF8C00;"></i>
        <p>Mapa no disponible<br><small style="opacity:.6;">API Key de Google Maps no configurada</small></p>
    </div>
</div>
@endif

{{-- Reverb / Laravel Echo --}}
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.16.1/dist/echo.iife.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pusher-js@8.4.0-rc2/dist/web/pusher.js"></script>

<script>
    // ── Laravel Echo (Reverb) ──────────────────────────────────────────
    const echo = new Echo({
        broadcaster: 'reverb',
        key:         '{{ config('broadcasting.connections.reverb.key') }}',
        wsHost:      '{{ config('broadcasting.connections.reverb.options.host') ?? parse_url(config('app.url'), PHP_URL_HOST) }}',
        wsPort:      {{ config('broadcasting.connections.reverb.options.port') ?? 443 }},
        wssPort:     {{ config('broadcasting.connections.reverb.options.port') ?? 443 }},
        forceTLS:    true,
        enabledTransports: ['ws','wss'],
        disableStats: true,
    });

    const TOKEN = '{{ $token }}';

    echo.channel('track.' + TOKEN)
        .listen('.location.updated', (data) => {
            if (typeof updateDriverPosition === 'function') {
                updateDriverPosition(data.lat, data.lng, data.heading, data.speed, data.status);
            }
            document.getElementById('offline-banner').style.display = 'none';
        });

    // Detectar desconexión
    echo.connector.pusher.connection.bind('disconnected', () => {
        document.getElementById('offline-banner').style.display = 'block';
        document.getElementById('liveChip').textContent = '⚠ SIN SEÑAL';
    });
    echo.connector.pusher.connection.bind('connected', () => {
        document.getElementById('offline-banner').style.display = 'none';
        document.getElementById('liveChip').innerHTML =
            '<i class="fas fa-circle me-1" style="font-size:.6rem; color:#22c55e;"></i> EN VIVO';
    });

    // ── Copiar link ───────────────────────────────────────────────────
    function copyLink() {
        navigator.clipboard.writeText('{{ url('/track/' . $token) }}')
            .then(() => {
                const btn = document.querySelector('.share-btn');
                btn.innerHTML = '<i class="fas fa-check me-1"></i> ¡Copiado!';
                btn.style.background = '#16a34a';
                setTimeout(() => {
                    btn.innerHTML = '<i class="fas fa-copy me-1"></i> Copiar link';
                    btn.style.background = '';
                }, 2000);
            });
    }
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastrear Pedido — Avaroa</title>

    {{-- Leaflet (sin API key, gratis, OpenStreetMap) --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --orange: #FF8C00;
            --dark:   #0f172a;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f1f5f9;
            display: flex;
            flex-direction: column;
        }

        /* ── TOP BAR ─────────────────────────────────────────────── */
        .top-bar {
            background: var(--dark);
            color: white;
            padding: 13px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1001;
            box-shadow: 0 2px 10px rgba(0,0,0,.35);
            flex-shrink: 0;
        }
        .top-bar .brand {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--orange);
            letter-spacing: 1px;
        }
        .status-chip {
            background: rgba(255,140,0,.15);
            border: 1px solid var(--orange);
            color: var(--orange);
            padding: 4px 14px;
            border-radius: 50px;
            font-size: .82rem;
            font-weight: 600;
        }
        @keyframes pulse-border {
            0%,100% { box-shadow: 0 0 0 0 rgba(255,140,0,.4); }
            50%      { box-shadow: 0 0 0 6px rgba(255,140,0,0); }
        }
        .live { animation: pulse-border 2s infinite; }

        /* ── OFFLINE BANNER ──────────────────────────────────────── */
        #offline-banner {
            display: none;
            background: #fef2f2;
            border-bottom: 1px solid #fca5a5;
            color: #dc2626;
            text-align: center;
            padding: 9px;
            font-size: .85rem;
            font-weight: 600;
            flex-shrink: 0;
            z-index: 1002;
        }

        /* ── MAP ─────────────────────────────────────────────────── */
        #map {
            width: 100%;
            height: 42vh;
            min-height: 260px;
            z-index: 1;
            flex-shrink: 0;
        }

        /* ── INFO PANEL ──────────────────────────────────────────── */
        .info-panel {
            background: white;
            padding: 18px 20px 24px;
            border-top: 3px solid var(--orange);
            flex: 1;
            overflow-y: auto;
        }

        .driver-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            background: #f8fafc;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }
        .driver-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.35rem;
            font-weight: 700;
            flex-shrink: 0;
            overflow: hidden;
        }
        .driver-name { font-weight: 700; font-size: .97rem; color: var(--dark); }
        .driver-sub  { font-size: .8rem; color: #64748b; margin-top: 2px; }

        .stat-box {
            text-align: center;
            padding: 10px 6px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        .stat-val { font-size: 1.2rem; font-weight: 700; color: var(--orange); }
        .stat-lbl { font-size: .72rem; color: #64748b; margin-top: 2px; }

        .route-line {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 12px 14px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        .route-line .dots { display: flex; flex-direction: column; align-items: center; padding-top: 4px; }
        .dot-origin { width: 11px; height: 11px; background: var(--orange); border-radius: 50%; }
        .dot-line   { width: 2px;  height: 22px; background: #cbd5e1; margin: 3px 0; }
        .dot-dest   { width: 11px; height: 11px; background: var(--dark);   border-radius: 50%; }
        .route-text { flex: 1; }
        .route-text p { margin: 0; font-size: .86rem; line-height: 1.6; }
        .route-text .label { color: #94a3b8; font-size: .72rem; letter-spacing: .5px; }

        .share-btn {
            background: var(--dark);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 7px 18px;
            font-size: .83rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            white-space: nowrap;
        }
        .share-btn:hover { background: #1e293b; transform: translateY(-1px); }

        /* Leaflet driver icon */
        .drv-icon {
            background: var(--orange);
            border: 3px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,.35);
        }

        /* ── DESKTOP side-by-side ────────────────────────────────── */
        @media (min-width: 768px) {
            body { flex-direction: row; flex-wrap: wrap; }
            .top-bar, #offline-banner { width: 100%; flex-shrink: 0; }
            #map {
                width: 60%;
                height: calc(100vh - 56px);
                flex-shrink: 0;
            }
            .info-panel {
                width: 40%;
                height: calc(100vh - 56px);
                border-top: none;
                border-left: 3px solid var(--orange);
                flex: none;
            }
        }
    </style>
</head>
<body>

{{-- TOP BAR --}}
<div class="top-bar">
    <span class="brand">🚚 AVAROA</span>
    <span class="status-chip live" id="liveChip">
        <i class="fas fa-circle me-1" style="font-size:.55rem; color:#22c55e;"></i>EN VIVO
    </span>
</div>

{{-- OFFLINE BANNER --}}
<div id="offline-banner">
    <i class="fas fa-wifi-slash me-2"></i>Conexión perdida — intentando reconectar…
</div>

{{-- MAPA --}}
<div id="map"></div>

{{-- PANEL DE INFO --}}
<div class="info-panel">

    {{-- CONDUCTOR --}}
    @php
        $driverName    = $trip->driver?->user?->name ?? 'Conductor Avaroa';
        $initial       = strtoupper(substr($driverName, 0, 1));
        $photo         = $trip->driver?->user?->profile_photo;
        $driverVehicle = $trip->driver?->vehicles?->first();
    @endphp

    <div class="driver-card mb-3">
        <div class="driver-avatar">
            @if($photo)
                <img src="{{ \App\Services\FileUploadService::getUrl($photo) }}"
                     style="width:100%;height:100%;object-fit:cover;" alt="">
            @else
                {{ $initial }}
            @endif
        </div>
        <div style="flex:1; min-width:0;">
            <div class="driver-name">{{ $driverName }}</div>
            <div class="driver-sub">
                <i class="fas fa-car me-1"></i>
                {{ $driverVehicle?->model ?? 'Vehículo asignado' }}
                @if($driverVehicle?->plate_number)
                    &middot; {{ $driverVehicle->plate_number }}
                @endif
            </div>
            <div class="driver-sub mt-1" id="statusText">
                <i class="fas fa-circle me-1" style="color:#22c55e;font-size:.55rem;"></i>
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
    <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
        <small class="text-muted">Comparte este link con el cliente:</small>
        <button class="share-btn" onclick="copyLink()">
            <i class="fas fa-copy me-1"></i>Copiar link
        </button>
    </div>
    <div class="p-2 rounded" style="background:#f8fafc;font-size:.76rem;color:#64748b;word-break:break-all;">
        {{ url('/track/' . $token) }}
    </div>

</div>

{{-- ── Leaflet ───────────────────────────────────────────────────────── --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Coordenadas
    const INITIAL_LAT = {{ $lastLocation?->lat ?? ($trip->origin_lat  ?? -17.3895) }};
    const INITIAL_LNG = {{ $lastLocation?->lng ?? ($trip->origin_lng  ?? -66.1568) }};
    const ORIGIN_LAT  = {{ $trip->origin_lat       ?? 'null' }};
    const ORIGIN_LNG  = {{ $trip->origin_lng       ?? 'null' }};
    const DEST_LAT    = {{ $trip->destination_lat  ?? 'null' }};
    const DEST_LNG    = {{ $trip->destination_lng  ?? 'null' }};

    let map, driverMarker, pathLine;
    let pingCount = 0;
    const pathCoords = [];

    // Icono del conductor
    const driverIcon = L.divIcon({
        className: 'drv-icon',
        html: '🚚',
        iconSize:   [44, 44],
        iconAnchor: [22, 22],
        popupAnchor:[0, -24],
    });

    function circleIcon(color) {
        return L.divIcon({
            className: '',
            html: `<div style="width:14px;height:14px;background:${color};border-radius:50%;border:2px solid white;box-shadow:0 1px 4px rgba(0,0,0,.4);"></div>`,
            iconSize:   [14, 14],
            iconAnchor: [7, 7],
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Crear mapa
        map = L.map('map', { zoomControl: true, attributionControl: false })
               .setView([INITIAL_LAT, INITIAL_LNG], 15);

        // Tiles OpenStreetMap (gratis, sin API key)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            crossOrigin: true,
        }).addTo(map);

        // Marcador conductor
        driverMarker = L.marker([INITIAL_LAT, INITIAL_LNG], { icon: driverIcon, zIndexOffset: 1000 })
            .bindPopup('<b>{{ addslashes($driverName) }}</b>')
            .addTo(map);

        // Línea de trayecto
        pathLine = L.polyline([], { color: '#FF8C00', weight: 4, opacity: 0.85 }).addTo(map);

        // Marcador origen
        if (ORIGIN_LAT && ORIGIN_LNG) {
            L.marker([ORIGIN_LAT, ORIGIN_LNG], { icon: circleIcon('#22c55e') })
             .bindPopup('<b>Punto de recojo</b>')
             .addTo(map);
        }

        // Marcador destino
        if (DEST_LAT && DEST_LNG) {
            L.marker([DEST_LAT, DEST_LNG], { icon: circleIcon('#FF8C00') })
             .bindPopup('<b>Destino</b>')
             .addTo(map);
        }

        // Historia inicial
        pathCoords.push([INITIAL_LAT, INITIAL_LNG]);
        pathLine.setLatLngs(pathCoords);

        // Ajustar vista para mostrar origen → destino
        if (ORIGIN_LAT && ORIGIN_LNG && DEST_LAT && DEST_LNG) {
            map.fitBounds(
                [[ORIGIN_LAT, ORIGIN_LNG], [DEST_LAT, DEST_LNG]],
                { padding: [40, 40], maxZoom: 16 }
            );
        }
    });

    // Actualiza posición del conductor en tiempo real (llamado desde WebSocket)
    function updateDriverPosition(lat, lng, heading, speed, status) {
        const pos = [lat, lng];
        driverMarker.setLatLng(pos);
        pathCoords.push(pos);
        if (pathCoords.length > 300) pathCoords.shift();
        pathLine.setLatLngs(pathCoords);
        map.panTo(pos);

        pingCount++;
        document.getElementById('statPings').textContent  = pingCount;
        document.getElementById('statSpeed').textContent  = speed ? Math.round(speed) : '—';
        document.getElementById('statUpdate').textContent = new Date().toLocaleTimeString('es-BO', { hour: '2-digit', minute: '2-digit' });
        if (status) {
            document.getElementById('statusText').innerHTML =
                `<i class="fas fa-circle me-1" style="color:#22c55e;font-size:.55rem;"></i>${status.replace(/_/g, ' ')}`;
        }
    }
</script>

{{-- ── Laravel Echo / Reverb (WebSocket en tiempo real) ────────────── --}}
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.16.1/dist/echo.iife.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pusher-js@8.4.0-rc2/dist/web/pusher.js"></script>

<script>
    const echo = new Echo({
        broadcaster:       'reverb',
        key:               '{{ config('broadcasting.connections.reverb.key') }}',
        wsHost:            '{{ config('broadcasting.connections.reverb.options.host') ?? parse_url(config('app.url'), PHP_URL_HOST) }}',
        wsPort:            {{ config('broadcasting.connections.reverb.options.port') ?? 443 }},
        wssPort:           {{ config('broadcasting.connections.reverb.options.port') ?? 443 }},
        forceTLS:          true,
        enabledTransports: ['ws', 'wss'],
        disableStats:      true,
    });

    const TOKEN = '{{ $token }}';

    echo.channel('track.' + TOKEN)
        .listen('.location.updated', (data) => {
            updateDriverPosition(data.lat, data.lng, data.heading, data.speed, data.status);
            document.getElementById('offline-banner').style.display = 'none';
        });

    echo.connector.pusher.connection.bind('disconnected', () => {
        document.getElementById('offline-banner').style.display = 'block';
        document.getElementById('liveChip').innerHTML = '⚠ SIN SEÑAL';
    });
    echo.connector.pusher.connection.bind('connected', () => {
        document.getElementById('offline-banner').style.display = 'none';
        document.getElementById('liveChip').innerHTML =
            '<i class="fas fa-circle me-1" style="font-size:.55rem;color:#22c55e;"></i>EN VIVO';
    });

    function copyLink() {
        navigator.clipboard.writeText('{{ url('/track/' . $token) }}')
            .then(() => {
                const btn = document.querySelector('.share-btn');
                btn.innerHTML = '<i class="fas fa-check me-1"></i>¡Copiado!';
                btn.style.background = '#16a34a';
                setTimeout(() => {
                    btn.innerHTML = '<i class="fas fa-copy me-1"></i>Copiar link';
                    btn.style.background = '';
                }, 2500);
            });
    }
</script>

</body>
</html>

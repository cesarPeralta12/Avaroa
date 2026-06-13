<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Rastrear Pedido — Avaroa</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --orange: #FF8C00;
            --dark:   #0f172a;
            --green:  #22c55e;
            --red:    #ef4444;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            height: 100%;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: var(--dark);
            overflow: hidden;
        }

        /* ── FULL-SCREEN MAP ──────────────────────────────── */
        #map {
            position: fixed;
            inset: 0;
            z-index: 1;
        }

        /* ── TOP BAR ──────────────────────────────────────── */
        .top-bar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 12px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 16px rgba(0,0,0,.5);
        }
        .brand {
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--orange);
            letter-spacing: 1.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .brand-icon {
            width: 32px; height: 32px;
            background: rgba(255,140,0,.15);
            border: 1px solid rgba(255,140,0,.3);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
        }
        .live-chip {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 5px 14px;
            border-radius: 50px;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .5px;
            background: rgba(34,197,94,.12);
            border: 1px solid var(--green);
            color: var(--green);
            transition: all .3s;
        }
        .live-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: var(--green);
            animation: blink 1.5s infinite;
        }
        @keyframes blink {
            0%,100% { opacity: 1; }
            50%      { opacity: .2; }
        }

        /* ── OFFLINE BANNER ───────────────────────────────── */
        #offline-banner {
            display: none;
            position: fixed;
            top: 57px; left: 0; right: 0;
            z-index: 999;
            background: #fef2f2;
            color: #dc2626;
            text-align: center;
            padding: 8px 16px;
            font-size: .8rem;
            font-weight: 600;
            border-bottom: 1px solid #fca5a5;
        }

        /* ── INFO PANEL ── bottom sheet (mobile) / side panel (desktop) ── */
        .info-panel {
            position: fixed;
            bottom: 0; left: 0; right: 0;
            z-index: 500;
            background: white;
            border-radius: 22px 22px 0 0;
            box-shadow: 0 -6px 40px rgba(0,0,0,.22);
            padding: 8px 20px 28px;
            max-height: 45vh;
            overflow-y: auto;
            transition: max-height .3s ease;
        }
        .drag-handle {
            width: 38px; height: 4px;
            background: #e2e8f0;
            border-radius: 4px;
            margin: 6px auto 14px;
        }

        /* ── DRIVER CARD ─────────────────────────────────── */
        .driver-card {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            background: #f8fafc;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            margin-bottom: 14px;
        }
        .driver-avatar {
            width: 50px; height: 50px;
            border-radius: 50%;
            background: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            font-weight: 800;
            overflow: hidden;
            flex-shrink: 0;
            box-shadow: 0 3px 10px rgba(255,140,0,.3);
        }
        .driver-name { font-weight: 700; font-size: .95rem; color: var(--dark); }
        .driver-sub  { font-size: .78rem; color: #64748b; margin-top: 3px; }
        .status-badge {
            margin-left: auto;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: .7rem;
            font-weight: 700;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .status-badge.active   { background: rgba(34,197,94,.1);  color: var(--green); border: 1px solid var(--green); }
        .status-badge.inactive { background: rgba(100,116,139,.1); color: #64748b; border: 1px solid #cbd5e1; }

        /* ── ROUTE ROW ────────────────────────────────────── */
        .route-row {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 12px 14px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            margin-bottom: 14px;
        }
        .route-dots {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 3px;
            flex-shrink: 0;
        }
        .rdot { width: 11px; height: 11px; border-radius: 50%; }
        .rdot-a { background: var(--green); }
        .rdot-b { background: var(--red); }
        .rdot-line { width: 2px; height: 20px; background: #cbd5e1; margin: 3px 0; }
        .route-addr { flex: 1; min-width: 0; }
        .route-label { font-size: .67rem; color: #94a3b8; text-transform: uppercase; letter-spacing: .6px; margin-bottom: 2px; }
        .route-text  { font-size: .83rem; font-weight: 600; color: var(--dark); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

        /* ── STATS ROW ────────────────────────────────────── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-bottom: 14px;
        }
        .stat {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px 6px;
            text-align: center;
        }
        .stat-val { font-size: 1.1rem; font-weight: 800; color: var(--orange); line-height: 1.2; }
        .stat-lbl { font-size: .67rem; color: #94a3b8; margin-top: 3px; text-transform: uppercase; letter-spacing: .4px; }

        /* ── SHARE ────────────────────────────────────────── */
        .share-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .share-url {
            flex: 1;
            font-size: .72rem;
            color: #94a3b8;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 7px 10px;
        }
        .share-btn {
            background: var(--dark);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 7px 14px;
            font-size: .78rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
            transition: all .2s;
        }
        .share-btn:hover { background: #1e293b; transform: translateY(-1px); }

        /* ── DESKTOP — side panel ─────────────────────────── */
        @media (min-width: 768px) {
            body { overflow: auto; }

            #map {
                position: fixed;
                top: 0; bottom: 0; left: 0;
                width: 62%;
                z-index: 1;
            }

            .info-panel {
                position: fixed;
                top: 0; bottom: 0;
                left: 62%; right: 0;
                border-radius: 0;
                max-height: none;
                padding: 78px 28px 28px;
                overflow-y: auto;
                border-left: 3px solid var(--orange);
                display: flex;
                flex-direction: column;
                gap: 0;
            }

            .drag-handle { display: none; }

            .info-spacer { flex: 1; }
        }

        @keyframes popIn {
            0%   { transform: scale(0); opacity: 0; }
            70%  { transform: scale(1.15); }
            100% { transform: scale(1); opacity: 1; }
        }

        /* ── LEAFLET OVERRIDES ────────────────────────────── */
        .leaflet-control-attribution { display: none !important; }
        .leaflet-control-zoom {
            border: none !important;
            box-shadow: 0 2px 12px rgba(0,0,0,.25) !important;
        }
        .leaflet-control-zoom a {
            background: white !important;
            color: var(--dark) !important;
            font-weight: 700 !important;
        }

        /* ── DRIVER ICON ──────────────────────────────────── */
        .drv-wrap {
            width: 48px; height: 48px;
            position: relative;
        }
        .drv-pulse {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: rgba(255,140,0,.3);
            animation: drvPulse 2s infinite;
        }
        @keyframes drvPulse {
            0%   { transform: scale(1);   opacity: 1; }
            100% { transform: scale(2.2); opacity: 0; }
        }
        .drv-inner {
            position: absolute;
            inset: 8px;
            background: var(--orange);
            border-radius: 50%;
            border: 2.5px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 14px rgba(0,0,0,.35);
            transition: transform .5s ease;
        }
        .drv-inner i { color: white; font-size: 13px; }

        /* popup */
        .leaflet-popup-content-wrapper {
            border-radius: 12px !important;
            box-shadow: 0 4px 20px rgba(0,0,0,.2) !important;
        }
        .leaflet-popup-tip { display: none; }
    </style>
</head>
<body>

<div id="map"></div>

{{-- TOP BAR --}}
<div class="top-bar">
    <div class="brand">
        <div class="brand-icon"><i class="fas fa-truck-fast"></i></div>
        AVAROA
    </div>
    <div class="live-chip" id="liveChip">
        <div class="live-dot" id="liveDot"></div>
        <span id="liveText">EN VIVO</span>
    </div>
</div>

{{-- OFFLINE BANNER --}}
<div id="offline-banner">
    <i class="fas fa-wifi-slash me-2"></i>Sin conexión — los datos pueden estar desactualizados
</div>

{{-- INFO PANEL --}}
<div class="info-panel">
    <div class="drag-handle"></div>

    @php
        $driverName    = $trip->driver?->user?->name ?? 'Conductor Avaroa';
        $initial       = strtoupper(substr($driverName, 0, 1));
        $photo         = $trip->driver?->user?->profile_photo;
        $driverVehicle = $trip->driver?->vehicles?->first();

        $statusLabels = [
            'assigned'       => 'Asignado',
            'accepted'       => 'En camino',
            'driver_arrived' => 'Conductor llegó',
            'in_progress'    => 'En progreso',
            'picked_up'      => 'Recogido',
            'completed'      => 'Completado',
            'cancelled'      => 'Cancelado',
        ];
        $activeStatuses = ['assigned', 'accepted', 'driver_arrived', 'in_progress', 'picked_up'];
        $isActive = in_array($trip->status, $activeStatuses);
        $statusLabel = $statusLabels[$trip->status] ?? ucfirst(str_replace('_', ' ', $trip->status));
    @endphp

    {{-- Driver --}}
    <div class="driver-card">
        <div class="driver-avatar">
            @if($photo)
                <img src="{{ \App\Services\FileUploadService::getUrl($photo) }}"
                     style="width:100%;height:100%;object-fit:cover;" alt="">
            @else
                {{ $initial }}
            @endif
        </div>
        <div style="min-width:0;">
            <div class="driver-name">{{ $driverName }}</div>
            <div class="driver-sub">
                <i class="fas fa-car me-1"></i>
                {{ $driverVehicle?->model ?? 'Vehículo asignado' }}
                @if($driverVehicle?->plate_number)
                    &middot; <strong>{{ $driverVehicle->plate_number }}</strong>
                @endif
            </div>
        </div>
        <span class="status-badge {{ $isActive ? 'active' : 'inactive' }}" id="statusBadge">
            {{ $statusLabel }}
        </span>
    </div>

    {{-- Route --}}
    <div class="route-row">
        <div class="route-dots">
            <div class="rdot rdot-a"></div>
            <div class="rdot-line"></div>
            <div class="rdot rdot-b"></div>
        </div>
        <div class="route-addr">
            <div class="route-label">Origen</div>
            <div class="route-text">{{ $trip->origin_address ?? 'Punto de recojo' }}</div>
            <div style="height:10px;"></div>
            <div class="route-label">Destino</div>
            <div class="route-text">{{ $trip->destination_address ?? 'Punto de destino' }}</div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="stats-row">
        <div class="stat">
            <div class="stat-val" id="statSpeed">—</div>
            <div class="stat-lbl">km/h</div>
        </div>
        <div class="stat">
            <div class="stat-val" id="statAgo">—</div>
            <div class="stat-lbl">últ. segs</div>
        </div>
        <div class="stat">
            <div class="stat-val" id="statPings">0</div>
            <div class="stat-lbl">pings</div>
        </div>
    </div>

    {{-- Share --}}
    <div class="share-row">
        <div class="share-url">{{ url('/track/' . $token) }}</div>
        <button class="share-btn" onclick="copyLink()">
            <i class="fas fa-copy" id="shareIcon"></i>
            <span id="shareText">Copiar</span>
        </button>
    </div>

    <div class="info-spacer"></div>
</div>

{{-- Leaflet --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // ── Coordenadas ──────────────────────────────────────────────────────
    const INIT_LAT    = {{ $lastLocation?->lat ?? ($trip->origin_lat  ?? -17.3895) }};
    const INIT_LNG    = {{ $lastLocation?->lng ?? ($trip->origin_lng  ?? -66.1568) }};
    const ORIGIN_LAT  = {{ $trip->origin_lat      ?? 'null' }};
    const ORIGIN_LNG  = {{ $trip->origin_lng      ?? 'null' }};
    const DEST_LAT    = {{ $trip->destination_lat ?? 'null' }};
    const DEST_LNG    = {{ $trip->destination_lng ?? 'null' }};
    const PING_URL    = '{{ route('tracking.ping', $token) }}';
    const SHARE_URL   = '{{ url('/track/' . $token) }}';
    const DRIVER_NAME = '{{ addslashes($driverName) }}';

    let map, driverMarker, pathLine, accuracyCircle;
    let pingCount = 0;
    const pathCoords  = [];
    let lastPingTs    = null;
    let animFrame     = null;
    let lastKnownLat  = null;
    let lastKnownLng  = null;

    // ── SVG Pin factory ──────────────────────────────────────────────────
    function pinIcon(color, label) {
        return L.divIcon({
            className: '',
            html: `<div style="position:relative;width:34px;height:44px;filter:drop-shadow(0 3px 6px rgba(0,0,0,.35))">
                     <svg viewBox="0 0 34 44" xmlns="http://www.w3.org/2000/svg" width="34" height="44">
                       <path d="M17 0C7.61 0 0 7.61 0 17c0 10.5 17 27 17 27S34 27.5 34 17C34 7.61 26.39 0 17 0z" fill="${color}"/>
                       <circle cx="17" cy="17" r="7" fill="white" opacity=".95"/>
                     </svg>
                     <div style="position:absolute;top:10px;left:0;width:34px;text-align:center;font-size:10px;font-weight:800;color:${color};">${label}</div>
                   </div>`,
            iconSize:   [34, 44],
            iconAnchor: [17, 44],
            popupAnchor:[0, -46],
        });
    }

    // ── Driver icon ──────────────────────────────────────────────────────
    const driverIconHtml = `
        <div class="drv-wrap">
            <div class="drv-pulse"></div>
            <div class="drv-inner" id="drvInner">
                <i class="fas fa-truck"></i>
            </div>
        </div>`;

    const driverIcon = L.divIcon({
        className: '',
        html: driverIconHtml,
        iconSize:   [48, 48],
        iconAnchor: [24, 24],
        popupAnchor:[0, -28],
    });

    // ── Init map ─────────────────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', () => {
        map = L.map('map', {
            zoomControl: false,
            attributionControl: false,
        }).setView([INIT_LAT, INIT_LNG], 15);

        // CartoDB Voyager tiles — limpio y moderno, sin API key
        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            maxZoom: 20,
            subdomains: 'abcd',
        }).addTo(map);

        L.control.zoom({ position: 'topright' }).addTo(map);

        // Conductor
        driverMarker = L.marker([INIT_LAT, INIT_LNG], {
            icon: driverIcon,
            zIndexOffset: 1000,
        }).bindPopup(`<b style="font-size:13px">${DRIVER_NAME}</b>`)
          .addTo(map);

        // Trayecto recorrido
        pathLine = L.polyline([], {
            color: '#FF8C00',
            weight: 4,
            opacity: .85,
        }).addTo(map);

        pathCoords.push([INIT_LAT, INIT_LNG]);
        pathLine.setLatLngs(pathCoords);

        // Marcador origen (verde)
        if (ORIGIN_LAT && ORIGIN_LNG) {
            L.marker([ORIGIN_LAT, ORIGIN_LNG], { icon: pinIcon('#22c55e', 'A') })
             .bindPopup(`<div style="min-width:140px"><b style="color:#22c55e">Punto de recojo</b><br>
                         <small style="color:#475569">{{ addslashes($trip->origin_address ?? 'Origen') }}</small></div>`)
             .addTo(map);
        }

        // Marcador destino (rojo)
        if (DEST_LAT && DEST_LNG) {
            L.marker([DEST_LAT, DEST_LNG], { icon: pinIcon('#ef4444', 'B') })
             .bindPopup(`<div style="min-width:140px"><b style="color:#ef4444">Destino</b><br>
                         <small style="color:#475569">{{ addslashes($trip->destination_address ?? 'Destino') }}</small></div>`)
             .addTo(map);
        }

        // Ajustar vista para mostrar A → B
        if (ORIGIN_LAT && ORIGIN_LNG && DEST_LAT && DEST_LNG) {
            map.fitBounds(
                [[ORIGIN_LAT, ORIGIN_LNG], [DEST_LAT, DEST_LNG]],
                { padding: [70, 70], maxZoom: 16 }
            );
        }

        // Primer poll inmediato
        pollLocation();
        setInterval(pollLocation, 4000);
        setInterval(tickLastSeen, 1000);
    });

    // ── Suaviza el movimiento del marcador ───────────────────────────────
    function smoothMoveTo(lat, lng) {
        if (animFrame) { cancelAnimationFrame(animFrame); animFrame = null; }
        const start = driverMarker.getLatLng();
        const t0    = performance.now();
        const dur   = 900;

        function step(t) {
            const p = Math.min((t - t0) / dur, 1);
            const e = 1 - Math.pow(1 - p, 3); // ease-out cúbico
            driverMarker.setLatLng([
                start.lat + (lat - start.lat) * e,
                start.lng + (lng - start.lng) * e,
            ]);
            if (p < 1) animFrame = requestAnimationFrame(step);
            else animFrame = null;
        }
        animFrame = requestAnimationFrame(step);
    }

    // ── Actualiza posición (llamado desde AJAX y/o WebSocket) ────────────
    function updateDriverPosition(lat, lng, heading, speed, status, ts) {
        smoothMoveTo(lat, lng);

        pathCoords.push([lat, lng]);
        if (pathCoords.length > 500) pathCoords.shift();
        pathLine.setLatLngs(pathCoords);

        map.panTo([lat, lng], { animate: true, duration: 1 });

        // Rotar icono del conductor
        if (heading !== null && heading !== undefined) {
            const inner = document.getElementById('drvInner');
            if (inner) inner.style.transform = `rotate(${heading}deg)`;
        }

        pingCount++;
        document.getElementById('statPings').textContent = pingCount;
        document.getElementById('statSpeed').textContent = speed ? Math.round(speed) : '0';

        lastPingTs = ts ? new Date(ts) : new Date();
        tickLastSeen();

        // Status badge
        if (status) {
            const labels = {
                assigned:       'Asignado',
                accepted:       'En camino',
                driver_arrived: 'Conductor llegó',
                in_progress:    'En progreso',
                picked_up:      'Recogido',
                completed:      'Completado',
            };
            const badge = document.getElementById('statusBadge');
            if (badge) {
                badge.textContent = labels[status] || status.replace(/_/g, ' ');
                const active = ['assigned','accepted','driver_arrived','in_progress','picked_up'].includes(status);
                badge.className = 'status-badge ' + (active ? 'active' : 'inactive');
            }
        }
    }

    // ── Contador "hace X seg" ────────────────────────────────────────────
    function tickLastSeen() {
        if (!lastPingTs) return;
        const secs = Math.round((Date.now() - lastPingTs.getTime()) / 1000);
        const el = document.getElementById('statAgo');
        if (el) el.textContent = secs < 60 ? secs : (Math.round(secs / 60) + 'm');
    }

    // ── AJAX polling cada 4 s ────────────────────────────────────────────
    let tripEnded = false;

    async function pollLocation() {
        if (tripEnded) return;
        try {
            const res  = await fetch(PING_URL, { cache: 'no-store' });
            if (!res.ok) { setLive(false); return; }
            const data = await res.json();

            // Viaje finalizado mientras el cliente lo estaba viendo
            if (data.ended) {
                tripEnded = true;
                showTripEndedBanner(data.status);
                return;
            }

            if (data.lat && data.lng) {
                const changed = data.lat !== lastKnownLat || data.lng !== lastKnownLng;
                if (changed) {
                    lastKnownLat = data.lat;
                    lastKnownLng = data.lng;
                    updateDriverPosition(data.lat, data.lng, data.heading, data.speed, data.status, data.ts);
                } else if (data.ts) {
                    lastPingTs = new Date(data.ts);
                }
            }
            setLive(true);
        } catch (_) {
            setLive(false);
        }
    }

    // Banner de viaje finalizado (sin recargar la página)
    function showTripEndedBanner(status) {
        setLive(false);
        const isCompleted = status === 'completed';
        const msg  = isCompleted
            ? '¡Viaje completado! El pedido fue entregado exitosamente.'
            : 'Este viaje ha finalizado y el rastreo ya no está disponible.';
        const icon = isCompleted ? 'fa-circle-check' : 'fa-circle-xmark';
        const bg   = isCompleted ? '#064e3b' : '#450a0a';
        const clr  = isCompleted ? '#6ee7b7' : '#fca5a5';

        // Overlay encima del mapa
        const overlay = document.createElement('div');
        overlay.style.cssText = `
            position:fixed;inset:0;z-index:2000;
            background:rgba(15,23,42,.85);
            display:flex;align-items:center;justify-content:center;
            padding:24px;backdrop-filter:blur(6px);
        `;
        overlay.innerHTML = `
            <div style="background:white;border-radius:22px;overflow:hidden;max-width:380px;width:100%;
                        box-shadow:0 24px 60px rgba(0,0,0,.5);text-align:center;">
                <div style="background:${bg};padding:32px 28px 24px;">
                    <div style="width:72px;height:72px;border-radius:50%;background:rgba(255,255,255,.15);
                                display:flex;align-items:center;justify-content:center;
                                margin:0 auto 16px;font-size:2rem;color:${clr};
                                animation:popIn .5s ease both;">
                        <i class="fas ${icon}"></i>
                    </div>
                    <p style="color:white;font-weight:800;font-size:1.15rem;margin-bottom:6px;">
                        ${isCompleted ? '¡Viaje completado!' : 'Viaje finalizado'}
                    </p>
                    <p style="color:rgba(255,255,255,.65);font-size:.85rem;">${msg}</p>
                </div>
                <div style="padding:20px 24px 24px;">
                    <p style="font-size:.8rem;color:#64748b;line-height:1.6;">
                        El enlace de rastreo solo es válido mientras el viaje está en curso.
                    </p>
                </div>
            </div>`;
        document.body.appendChild(overlay);
    }

    // ── Indicador EN VIVO / SIN SEÑAL ────────────────────────────────────
    function setLive(online) {
        const chip   = document.getElementById('liveChip');
        const dot    = document.getElementById('liveDot');
        const text   = document.getElementById('liveText');
        const banner = document.getElementById('offline-banner');

        if (online) {
            chip.style.cssText  = 'background:rgba(34,197,94,.12);border:1px solid #22c55e;color:#22c55e;display:flex;align-items:center;gap:7px;padding:5px 14px;border-radius:50px;font-size:.75rem;font-weight:700;letter-spacing:.5px;';
            dot.style.background = '#22c55e';
            text.textContent     = 'EN VIVO';
            banner.style.display = 'none';
        } else {
            chip.style.cssText  = 'background:rgba(239,68,68,.12);border:1px solid #ef4444;color:#ef4444;display:flex;align-items:center;gap:7px;padding:5px 14px;border-radius:50px;font-size:.75rem;font-weight:700;letter-spacing:.5px;';
            dot.style.background = '#ef4444';
            dot.style.animation  = 'none';
            text.textContent     = 'SIN SEÑAL';
            banner.style.display = 'block';
        }
    }

    // ── Copiar link ───────────────────────────────────────────────────────
    function copyLink() {
        navigator.clipboard.writeText(SHARE_URL).then(() => {
            const btn  = document.querySelector('.share-btn');
            const icon = document.getElementById('shareIcon');
            const txt  = document.getElementById('shareText');
            btn.style.background = '#16a34a';
            icon.className = 'fas fa-check';
            txt.textContent = '¡Copiado!';
            setTimeout(() => {
                btn.style.background = '';
                icon.className = 'fas fa-copy';
                txt.textContent = 'Copiar';
            }, 2500);
        });
    }
</script>

{{-- Laravel Echo / Reverb — WebSocket como complemento al AJAX polling --}}
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.16.1/dist/echo.iife.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pusher-js@8.4.0-rc2/dist/web/pusher.js"></script>

<script>
    const echo = new Echo({
        broadcaster:       'reverb',
        key:               '{{ config('broadcasting.connections.reverb.key') }}',
        wsHost:            '{{ parse_url(config('app.url'), PHP_URL_HOST) }}',
        wsPort:            443,
        wssPort:           443,
        forceTLS:          true,
        enabledTransports: ['ws', 'wss'],
        disableStats:      true,
    });

    const TOKEN = '{{ $token }}';

    // WebSocket actualiza instantáneamente cuando está disponible
    echo.channel('track.' + TOKEN)
        .listen('.location.updated', (data) => {
            if (data.lat && data.lng) {
                lastKnownLat = data.lat;
                lastKnownLng = data.lng;
                updateDriverPosition(data.lat, data.lng, data.heading, data.speed, data.status, data.timestamp);
            }
        });

    // El AJAX sigue siendo el fallback — no necesitamos cambiar setLive por WS
    echo.connector.pusher.connection.bind('connected', () => {
        // WS conectado — el AJAX polling sigue activo como respaldo
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreo finalizado — Avaroa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --orange: #FF8C00;
            --dark:   #0f172a;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            min-height: 100%;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(160deg, #0f172a 0%, #1e293b 60%, #0f2027 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        /* ── CARD ─────────────────────────────────────────── */
        .card {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 24px 60px rgba(0,0,0,.45);
        }

        /* ── HEADER ───────────────────────────────────────── */
        .card-header {
            padding: 36px 28px 28px;
            text-align: center;
            position: relative;
        }

        /* Completed */
        .card-header.completed {
            background: linear-gradient(135deg, #064e3b 0%, #065f46 50%, #047857 100%);
        }
        /* Cancelled */
        .card-header.cancelled {
            background: linear-gradient(135deg, #450a0a 0%, #7f1d1d 50%, #991b1b 100%);
        }
        /* Invalid / unknown */
        .card-header.invalid {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        }

        .status-icon {
            width: 80px; height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.2rem;
        }
        .completed  .status-icon { background: rgba(255,255,255,.15); color: #6ee7b7; }
        .cancelled  .status-icon { background: rgba(255,255,255,.15); color: #fca5a5; }
        .invalid    .status-icon { background: rgba(255,255,255,.15); color: #94a3b8; }

        .card-header h2 {
            color: white;
            font-size: 1.35rem;
            font-weight: 800;
            margin-bottom: 8px;
        }
        .card-header p {
            color: rgba(255,255,255,.65);
            font-size: .88rem;
            line-height: 1.6;
        }

        /* Checkmark animation */
        @keyframes popIn {
            0%   { transform: scale(0); opacity: 0; }
            70%  { transform: scale(1.15); }
            100% { transform: scale(1); opacity: 1; }
        }
        .status-icon { animation: popIn .5s ease both; }

        /* ── BODY ─────────────────────────────────────────── */
        .card-body {
            padding: 24px 28px 32px;
        }

        /* Driver summary */
        .driver-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            background: #f8fafc;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            margin-bottom: 16px;
        }
        .driver-avatar {
            width: 46px; height: 46px;
            border-radius: 50%;
            background: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            font-weight: 800;
            flex-shrink: 0;
            overflow: hidden;
        }
        .driver-name { font-weight: 700; font-size: .9rem; color: var(--dark); }
        .driver-sub  { font-size: .77rem; color: #64748b; margin-top: 3px; }

        /* Route summary */
        .route-row {
            display: flex;
            gap: 12px;
            padding: 14px 16px;
            background: #f8fafc;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            margin-bottom: 20px;
        }
        .route-dots {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 3px;
            flex-shrink: 0;
        }
        .rdot { width: 10px; height: 10px; border-radius: 50%; }
        .rdot-a    { background: #22c55e; }
        .rdot-b    { background: #ef4444; }
        .rdot-line { width: 2px; height: 18px; background: #cbd5e1; margin: 3px 0; }
        .route-label { font-size: .67rem; color: #94a3b8; text-transform: uppercase; letter-spacing: .6px; margin-bottom: 2px; }
        .route-text  { font-size: .83rem; font-weight: 600; color: var(--dark); }

        /* Info note */
        .info-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 14px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            font-size: .8rem;
            color: #64748b;
            line-height: 1.5;
        }
        .info-note i { color: #94a3b8; margin-top: 2px; flex-shrink: 0; }

        /* ── BRAND FOOTER ─────────────────────────────────── */
        .brand-footer {
            margin-top: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: rgba(255,255,255,.35);
            font-size: .8rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .brand-footer span { color: var(--orange); font-size: .95rem; letter-spacing: 1.5px; }
    </style>
</head>
<body>

@php
    $isCompleted = $reason === 'completed';
    $isCancelled = $reason === 'cancelled';
    $isInvalid   = $reason === 'invalid' || !$trip;

    if ($isCompleted) {
        $headerClass = 'completed';
        $iconClass   = 'fas fa-circle-check';
        $title       = '¡Viaje completado!';
        $subtitle    = 'El pedido fue entregado exitosamente. Este enlace de rastreo ya no está disponible.';
    } elseif ($isCancelled) {
        $headerClass = 'cancelled';
        $iconClass   = 'fas fa-circle-xmark';
        $title       = 'Viaje cancelado';
        $subtitle    = 'Este viaje fue cancelado. El enlace de rastreo ya no está activo.';
    } else {
        $headerClass = 'invalid';
        $iconClass   = 'fas fa-link-slash';
        $title       = 'Enlace no disponible';
        $subtitle    = 'Este enlace de rastreo no está activo o ya expiró.';
    }

    $driverName    = $trip?->driver?->user?->name ?? null;
    $initial       = $driverName ? strtoupper(substr($driverName, 0, 1)) : null;
    $photo         = $trip?->driver?->user?->profile_photo ?? null;
    $driverVehicle = $trip?->driver?->vehicles?->first() ?? null;
@endphp

<div class="card">

    {{-- Header --}}
    <div class="card-header {{ $headerClass }}">
        <div class="status-icon">
            <i class="{{ $iconClass }}"></i>
        </div>
        <h2>{{ $title }}</h2>
        <p>{{ $subtitle }}</p>
    </div>

    {{-- Body --}}
    @if($trip)
    <div class="card-body">

        {{-- Conductor --}}
        @if($driverName)
        <div class="driver-row">
            <div class="driver-avatar">
                @if($photo)
                    <img src="{{ \App\Services\FileUploadService::getUrl($photo) }}"
                         style="width:100%;height:100%;object-fit:cover;" alt="">
                @else
                    {{ $initial }}
                @endif
            </div>
            <div>
                <div class="driver-name">{{ $driverName }}</div>
                <div class="driver-sub">
                    <i class="fas fa-car me-1"></i>
                    {{ $driverVehicle?->model ?? 'Vehículo' }}
                    @if($driverVehicle?->plate_number)
                        &middot; {{ $driverVehicle->plate_number }}
                    @endif
                </div>
            </div>
        </div>
        @endif

        {{-- Ruta --}}
        @if($trip->origin_address || $trip->destination_address)
        <div class="route-row">
            <div class="route-dots">
                <div class="rdot rdot-a"></div>
                <div class="rdot-line"></div>
                <div class="rdot rdot-b"></div>
            </div>
            <div style="flex:1; min-width:0;">
                <div class="route-label">Origen</div>
                <div class="route-text">{{ $trip->origin_address ?? '—' }}</div>
                <div style="height:10px;"></div>
                <div class="route-label">Destino</div>
                <div class="route-text">{{ $trip->destination_address ?? '—' }}</div>
            </div>
        </div>
        @endif

        {{-- Nota --}}
        <div class="info-note">
            <i class="fas fa-circle-info"></i>
            <span>
                @if($isCompleted)
                    El enlace de rastreo solo es válido mientras el viaje está en curso. Una vez entregado, el acceso se desactiva automáticamente.
                @elseif($isCancelled)
                    El viaje fue cancelado y el enlace ya no es válido. Si tienes dudas, contacta con soporte de Avaroa.
                @else
                    Si crees que esto es un error, comunícate con quien compartió este enlace contigo.
                @endif
            </span>
        </div>

    </div>
    @else
    <div class="card-body">
        <div class="info-note">
            <i class="fas fa-circle-info"></i>
            <span>El enlace que ingresaste no corresponde a ningún viaje activo en Avaroa. Verifica que el link sea correcto.</span>
        </div>
    </div>
    @endif

</div>

{{-- Brand --}}
<div class="brand-footer">
    <i class="fas fa-truck-fast" style="color:var(--orange)"></i>
    <span>AVAROA</span>
    <span style="color:rgba(255,255,255,.25); font-weight:400; font-size:.75rem; letter-spacing:0">Delivery</span>
</div>

</body>
</html>

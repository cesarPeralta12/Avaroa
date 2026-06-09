@extends('layout.master')
@section('title', 'Viajes')

@section('css')
<style>
/* ═══ Tokens ════════════════════════════════════════════ */
:root {
    --orange:  #FF8C00;
    --purple:  #5c61f2;
    --radius:  14px;
}

/* ═══ Stats cards ════════════════════════════════════════ */
.trip-stat {
    border-radius: var(--radius);
    padding: 18px 20px;
    color: #fff;
    position: relative;
    overflow: hidden;
}
.trip-stat::after {
    content: '';
    position: absolute;
    right: -16px; top: -16px;
    width: 80px; height: 80px;
    border-radius: 50%;
    background: rgba(255,255,255,.12);
}
.trip-stat .ts-num  { font-size: 2rem; font-weight: 800; line-height: 1; }
.trip-stat .ts-lbl  { font-size: .78rem; opacity: .85; margin-top: 4px; }
.trip-stat .ts-icon { font-size: 1.5rem; margin-bottom: 6px; }

/* ═══ Filter bar ═════════════════════════════════════════ */
.trips-toolbar {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    margin-bottom: 16px;
}
.filter-tabs {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
}
.ftab {
    padding: 6px 14px;
    border-radius: 50px;
    font-size: .8rem;
    font-weight: 600;
    border: 1px solid transparent;
    cursor: pointer;
    transition: all .15s;
    background: transparent;
    white-space: nowrap;
}
.ftab:hover { opacity: .85; }
.ftab.active { color: #fff !important; }
.ftab-all     { border-color: #94a3b8; color: #94a3b8; }
.ftab-all.active   { background: #64748b; }
.ftab-active  { border-color: #f59e0b; color: #f59e0b; }
.ftab-active.active  { background: #f59e0b; }
.ftab-new     { border-color: #5c61f2; color: #5c61f2; }
.ftab-new.active     { background: #5c61f2; }
.ftab-completed { border-color: #22c55e; color: #22c55e; }
.ftab-completed.active { background: #22c55e; }
.ftab-cancelled { border-color: #ef4444; color: #ef4444; }
.ftab-cancelled.active { background: #ef4444; }

.search-box {
    position: relative;
    flex: 1;
    min-width: 180px;
    max-width: 280px;
}
.search-box input {
    width: 100%;
    padding: 7px 14px 7px 34px;
    border-radius: 50px;
    border: 1px solid rgba(255,255,255,.12);
    background: rgba(255,255,255,.06);
    color: inherit;
    font-size: .84rem;
    outline: none;
    transition: border .2s;
}
.search-box input:focus { border-color: var(--purple); }
.search-box .si {
    position: absolute;
    left: 11px; top: 50%;
    transform: translateY(-50%);
    opacity: .45; font-size: .8rem;
}

.svc-filter { display: flex; gap: 6px; }
.svctab {
    padding: 5px 12px;
    border-radius: 50px;
    font-size: .75rem;
    font-weight: 700;
    cursor: pointer;
    border: 1.5px solid transparent;
    transition: all .15s;
    background: transparent;
}
.svctab.active, .svctab:hover { opacity: 1; }
.svctab-all  { border-color: #94a3b8; color: #94a3b8; }
.svctab-all.active  { background: #64748b; color: #fff; }
.svctab-taxi { border-color: #3b82f6; color: #3b82f6; }
.svctab-taxi.active { background: #3b82f6; color: #fff; }
.svctab-del  { border-color: var(--orange); color: var(--orange); }
.svctab-del.active  { background: var(--orange); color: #fff; }
.svctab-cargo{ border-color: #14b8a6; color: #14b8a6; }
.svctab-cargo.active{ background: #14b8a6; color: #fff; }

/* ═══ Table ══════════════════════════════════════════════ */
.trips-table {
    width: 100%;
    border-collapse: collapse;
}
.trips-table thead th {
    font-size: .7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .6px;
    padding: 10px 14px;
    white-space: nowrap;
    border-bottom: 1px solid rgba(255,255,255,.08);
    color: #94a3b8;
    cursor: pointer;
    user-select: none;
}
.trips-table thead th:hover { color: #cbd5e1; }
.trips-table thead th .sort-icon { font-size: .6rem; margin-left: 4px; opacity: .5; }
.trips-table tbody tr {
    border-bottom: 1px solid rgba(255,255,255,.05);
    transition: background .12s;
    position: relative;
}
.trips-table tbody tr:hover { background: rgba(255,255,255,.035); }
.trips-table tbody td { padding: 12px 14px; vertical-align: middle; font-size: .85rem; }

/* Status left-border indicator */
.trips-table tbody tr td:first-child {
    padding-left: 10px;
    border-left: 3px solid transparent;
}
.trips-table tbody tr.s-active  td:first-child { border-color: #f59e0b; }
.trips-table tbody tr.s-new     td:first-child { border-color: #5c61f2; }
.trips-table tbody tr.s-done    td:first-child { border-color: #22c55e; }
.trips-table tbody tr.s-cancel  td:first-child { border-color: #ef4444; }
.trips-table tbody tr.s-other   td:first-child { border-color: #64748b; }

/* ── Status badge ────────────────── */
.sbadge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 3px 10px;
    border-radius: 50px;
    font-size: .72rem;
    font-weight: 700;
    white-space: nowrap;
}
.sb-active   { background: rgba(245,158,11,.15); color: #f59e0b; }
.sb-new      { background: rgba(92,97,242,.15);  color: #818cf8; }
.sb-done     { background: rgba(34,197,94,.15);  color: #4ade80; }
.sb-cancel   { background: rgba(239,68,68,.15);  color: #f87171; }
.sb-other    { background: rgba(100,116,139,.15);color: #94a3b8; }
.sb-dot { width:6px;height:6px;border-radius:50%;display:inline-block; }
.sb-active .sb-dot { background:#f59e0b; }
.sb-new    .sb-dot { background:#818cf8; }
.sb-done   .sb-dot { background:#4ade80; }
.sb-cancel .sb-dot { background:#f87171; }
.sb-other  .sb-dot { background:#94a3b8; }

/* ── Service chip ────────────────── */
.svc-chip {
    display: inline-flex; align-items: center; gap: 4px;
    padding: 3px 10px; border-radius: 50px;
    font-size: .72rem; font-weight: 700;
}
.svc-taxi  { background: rgba(59,130,246,.15); color: #60a5fa; }
.svc-del   { background: rgba(255,140,0,.15);  color: var(--orange); }
.svc-cargo { background: rgba(20,184,166,.15); color: #2dd4bf; }

/* ── Client avatar ───────────────── */
.client-av {
    width: 30px; height: 30px; border-radius: 50%;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: .75rem; font-weight: 700; color: #fff; flex-shrink: 0;
}

/* ── Driver mini ─────────────────── */
.driver-mini {
    display: flex; align-items: center; gap: 8px;
}
.driver-av {
    width: 28px; height: 28px; border-radius: 50%;
    background: linear-gradient(135deg, #5c61f2, #764ba2);
    display: flex; align-items: center; justify-content: center;
    font-size: .7rem; font-weight: 700; color: #fff; flex-shrink: 0;
}
.driver-name { font-weight: 600; font-size: .82rem; line-height: 1.2; }
.driver-plate {
    font-family: monospace; font-size: .7rem;
    background: rgba(255,255,255,.08); padding: 1px 6px; border-radius: 4px;
    color: #94a3b8;
}

/* ── Route preview ───────────────── */
.route-info { font-size: .78rem; line-height: 1.4; }
.route-origin { color: #94a3b8; }
.route-arrow  { color: #475569; font-size: .65rem; }
.route-dest   { color: #cbd5e1; }

/* ── Action buttons ──────────────── */
.btn-track, .btn-del {
    padding: 5px 10px; border-radius: 8px; border: none;
    font-size: .75rem; cursor: pointer; transition: all .15s;
}
.btn-track {
    background: rgba(255,140,0,.15); color: var(--orange);
}
.btn-track:hover { background: rgba(255,140,0,.3); }
.btn-del {
    background: rgba(239,68,68,.12); color: #f87171;
}
.btn-del:hover { background: rgba(239,68,68,.25); }

/* ── Bulk bar ────────────────────── */
.bulk-bar {
    display: none;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    background: rgba(239,68,68,.1);
    border: 1px solid rgba(239,68,68,.3);
    border-radius: 10px;
    margin-bottom: 12px;
}
.bulk-bar.visible { display: flex; }
.bulk-bar .bulk-count { font-size: .85rem; font-weight: 600; color: #f87171; }

/* ── Empty ───────────────────────── */
.empty-row td { text-align: center; padding: 50px; color: #64748b; }

/* ── Pagination ──────────────────── */
.trips-pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 16px;
    font-size: .8rem;
    border-top: 1px solid rgba(255,255,255,.07);
    flex-wrap: wrap;
    gap: 8px;
}
.trips-pagination .page-info { color: #64748b; }
.trips-pagination .page-btns { display: flex; gap: 4px; }
.pbtn {
    padding: 5px 10px; border-radius: 8px; border: 1px solid rgba(255,255,255,.1);
    background: transparent; cursor: pointer; font-size: .78rem;
    transition: all .15s; color: inherit;
}
.pbtn:hover, .pbtn.active { background: var(--purple); border-color: var(--purple); color: #fff; }
.pbtn:disabled { opacity: .35; cursor: default; }
.per-page select {
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 8px;
    padding: 4px 8px;
    font-size: .78rem;
    color: inherit;
    cursor: pointer;
}

/* ── Dark mode overrides ─────────── */
body:not(.dark) .search-box input { background: rgba(0,0,0,.04); border-color: #e2e8f0; color: #1e293b; }
body:not(.dark) .trips-table thead th { color: #64748b; border-color: #e2e8f0; }
body:not(.dark) .trips-table tbody tr { border-color: #f1f5f9; }
body:not(.dark) .trips-table tbody tr:hover { background: #f8fafc; }
body:not(.dark) .driver-plate { background: #f1f5f9; color: #64748b; }
body:not(.dark) .route-origin { color: #64748b; }
body:not(.dark) .route-dest   { color: #1e293b; }
body:not(.dark) .pbtn { border-color: #e2e8f0; color: #475569; }
body:not(.dark) .per-page select { background: #f8fafc; border-color: #e2e8f0; color: #475569; }
body:not(.dark) .trips-pagination { border-color: #e2e8f0; }
body:not(.dark) .ftab-all { border-color: #94a3b8; color: #64748b; }

/* ── Responsive ──────────────────── */
@media (max-width: 768px) {
    .col-hide-sm { display: none; }
}
</style>
@endsection

@section('main_content')
<div class="page-content">
<div class="container-fluid">

    {{-- ── Header ───────────────────────────────────────────── --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-0">Lista de Viajes</h4>
            <small class="text-muted">{{ $stats['total'] }} viajes registrados</small>
        </div>
        <a href="{{ route('trips.create') }}" class="btn btn-success">
            <i class="fas fa-plus me-1"></i> Crear Viaje
        </a>
    </div>

    {{-- ── Alertas ───────────────────────────────────────────── --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show py-2">
            <i class="fas fa-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('fail'))
        <div class="alert alert-danger alert-dismissible fade show py-2">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ── Stats ────────────────────────────────────────────── --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="trip-stat" style="background:linear-gradient(135deg,#5c61f2,#764ba2)">
                <div class="ts-icon">🗂</div>
                <div class="ts-num">{{ $stats['total'] }}</div>
                <div class="ts-lbl">Total Viajes</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="trip-stat" style="background:linear-gradient(135deg,#f59e0b,#d97706)">
                <div class="ts-icon">🔄</div>
                <div class="ts-num">{{ $stats['active'] }}</div>
                <div class="ts-lbl">En Proceso</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="trip-stat" style="background:linear-gradient(135deg,#22c55e,#16a34a)">
                <div class="ts-icon">✅</div>
                <div class="ts-num">{{ $stats['completed'] }}</div>
                <div class="ts-lbl">Completados Hoy</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="trip-stat" style="background:linear-gradient(135deg,#ef4444,#b91c1c)">
                <div class="ts-icon">❌</div>
                <div class="ts-num">{{ $stats['cancelled'] }}</div>
                <div class="ts-lbl">Cancelados Total</div>
            </div>
        </div>
    </div>

    {{-- ── Bulk bar ──────────────────────────────────────────── --}}
    <div class="bulk-bar" id="bulkBar">
        <span class="bulk-count"><span id="bulkCount">0</span> seleccionados</span>
        <button class="btn btn-sm btn-danger bulk-delete-btn" data-url="{{ route('trips.bulk.delete') }}">
            <i class="fas fa-trash me-1"></i>Eliminar seleccionados
        </button>
        <button class="btn btn-sm btn-outline-secondary" onclick="clearSelection()">Cancelar</button>
    </div>

    {{-- ── Tabla card ────────────────────────────────────────── --}}
    <div class="card" style="border-radius:var(--radius);overflow:hidden;">

        {{-- Toolbar --}}
        <div class="px-4 pt-4 pb-2">
            <div class="trips-toolbar">
                {{-- Status tabs --}}
                <div class="filter-tabs">
                    <button class="ftab ftab-all active" data-status="">Todos</button>
                    <button class="ftab ftab-active"     data-status="active">En proceso</button>
                    <button class="ftab ftab-new"        data-status="new">Nuevos</button>
                    <button class="ftab ftab-completed"  data-status="completed">Completados</button>
                    <button class="ftab ftab-cancelled"  data-status="cancelled">Cancelados</button>
                </div>

                {{-- Spacer --}}
                <div class="flex-grow-1 d-none d-md-block"></div>

                {{-- Service filter --}}
                <div class="svc-filter">
                    <button class="svctab svctab-all  active" data-svc="">Todos</button>
                    <button class="svctab svctab-taxi"        data-svc="Taxi">🚕 Taxi</button>
                    <button class="svctab svctab-del"         data-svc="Delivery">📦 Delivery</button>
                    <button class="svctab svctab-cargo"       data-svc="Cargo">🚛 Cargo</button>
                </div>

                {{-- Search --}}
                <div class="search-box">
                    <i class="fas fa-search si"></i>
                    <input type="text" id="tripSearch" placeholder="Buscar ID, cliente...">
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="trips-table" id="tripsTable">
                <thead>
                    <tr>
                        <th style="width:40px;">
                            <input type="checkbox" id="selectAll" style="cursor:pointer;">
                        </th>
                        <th data-col="id">ID <span class="sort-icon">↕</span></th>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th data-col="status">Estado <span class="sort-icon">↕</span></th>
                        <th class="col-hide-sm">Ruta</th>
                        <th class="col-hide-sm" data-col="price">Precio <span class="sort-icon">↕</span></th>
                        <th>Conductor</th>
                        <th data-col="date" class="col-hide-sm">Fecha <span class="sort-icon">↕</span></th>
                        <th style="width:90px;">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tripsBody">
                    @forelse($trips as $trip)
                    @php
                        $status = strtoupper($trip->status ?? '');
                        $activeArr   = ['CONFIRMED','DISPATCHING','ASSIGNED','PICKUP','IN_TRIP'];
                        $newArr      = ['NEW','COLLECTING_DATA','QUOTED','SEARCHING'];
                        $rowClass    = match(true) {
                            in_array($status, $activeArr) => 's-active',
                            in_array($status, $newArr)    => 's-new',
                            $status === 'COMPLETED'       => 's-done',
                            $status === 'CANCELLED'       => 's-cancel',
                            default                       => 's-other',
                        };
                        $badgeClass  = match($rowClass) {
                            's-active' => 'sb-active',
                            's-new'    => 'sb-new',
                            's-done'   => 'sb-done',
                            's-cancel' => 'sb-cancel',
                            default    => 'sb-other',
                        };
                        $statusLabel = match($status) {
                            'NEW'             => 'Nuevo',
                            'COLLECTING_DATA' => 'Recopilando',
                            'QUOTED'          => 'Cotizado',
                            'CONFIRMED'       => 'Confirmado',
                            'DISPATCHING'     => 'Despachando',
                            'ASSIGNED'        => 'Asignado',
                            'PICKUP'          => 'En recojo',
                            'IN_TRIP'         => 'En viaje',
                            'COMPLETED'       => 'Completado',
                            'CANCELLED'       => 'Cancelado',
                            'FAILED'          => 'Fallido',
                            'SEARCHING'       => 'Buscando',
                            default           => $trip->status,
                        };
                        $svcClass = match(strtolower($trip->service_type ?? '')) {
                            'taxi'     => 'svc-taxi',
                            'delivery' => 'svc-del',
                            'cargo'    => 'svc-cargo',
                            default    => 'svc-del',
                        };
                        $svcIcon = match(strtolower($trip->service_type ?? '')) {
                            'taxi'  => '🚕',
                            'cargo' => '🚛',
                            default => '📦',
                        };
                        $driverUser = $trip->driver?->user;
                        $vehicle    = $trip->driver?->vehicles?->first();
                        $avatarColors = ['#5c61f2','#f59e0b','#22c55e','#ef4444','#14b8a6','#ec4899'];
                        $avatarBg = $avatarColors[abs(crc32($trip->customer?->name ?? 'x')) % count($avatarColors)];
                        $originShort = Str::limit($trip->origin_address ?? $trip->origin_url ?? '—', 28);
                        $destShort   = Str::limit($trip->destination_address ?? $trip->destination_url ?? '—', 28);
                        $price = $trip->price ?? $trip->estimated_fare ?? null;
                        $currency = strtoupper($trip->currency ?? 'BOB');
                    @endphp
                    <tr class="{{ $rowClass }}"
                        data-id="{{ $trip->id }}"
                        data-status-group="{{ $rowClass }}"
                        data-svc="{{ strtolower($trip->service_type ?? '') }}"
                        data-search="{{ strtolower($trip->id . ' ' . ($trip->customer?->name ?? '') . ' ' . ($driverUser?->name ?? '')) }}">

                        {{-- Checkbox --}}
                        <td><input type="checkbox" class="row-checkbox" value="{{ $trip->id }}"></td>

                        {{-- ID --}}
                        <td style="font-family:monospace; font-weight:700; font-size:.85rem;">
                            #{{ $trip->id }}
                        </td>

                        {{-- Cliente --}}
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="client-av" style="background:{{ $avatarBg }};">
                                    {{ strtoupper(substr($trip->customer?->name ?? '?', 0, 1)) }}
                                </div>
                                <span style="font-weight:600;font-size:.85rem;">
                                    {{ $trip->customer?->name ?? '—' }}
                                </span>
                            </div>
                        </td>

                        {{-- Servicio --}}
                        <td>
                            <span class="svc-chip {{ $svcClass }}">
                                {{ $svcIcon }} {{ $trip->service_type ?? '—' }}
                            </span>
                        </td>

                        {{-- Estado --}}
                        <td>
                            <span class="sbadge {{ $badgeClass }}">
                                <span class="sb-dot"></span>
                                {{ $statusLabel }}
                            </span>
                        </td>

                        {{-- Ruta --}}
                        <td class="col-hide-sm">
                            <div class="route-info">
                                <div class="route-origin">
                                    <i class="fas fa-circle" style="font-size:.45rem;vertical-align:middle;"></i>
                                    {{ $originShort }}
                                </div>
                                <div class="route-arrow ps-1">↓</div>
                                <div class="route-dest">
                                    <i class="fas fa-map-marker-alt" style="font-size:.65rem;color:var(--orange);"></i>
                                    {{ $destShort }}
                                </div>
                            </div>
                        </td>

                        {{-- Precio --}}
                        <td class="col-hide-sm" style="white-space:nowrap;">
                            @if($price)
                                <span style="font-weight:700; color:var(--orange);">
                                    {{ number_format($price, 2) }}
                                </span>
                                <small style="color:#94a3b8;"> {{ $currency }}</small>
                            @else
                                <span style="color:#64748b;">—</span>
                            @endif
                        </td>

                        {{-- Conductor --}}
                        <td>
                            @if($driverUser)
                                <div class="driver-mini"
                                     style="cursor:pointer;"
                                     data-bs-toggle="modal"
                                     data-bs-target="#driverModal{{ $trip->id }}">
                                    <div class="driver-av">{{ strtoupper(substr($driverUser->name, 0, 1)) }}</div>
                                    <div>
                                        <div class="driver-name">{{ Str::limit($driverUser->name, 18) }}</div>
                                        @if($vehicle)
                                            <span class="driver-plate">{{ $vehicle->plate_number }}</span>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <span style="font-size:.78rem;color:#64748b;font-style:italic;">Sin conductor</span>
                            @endif
                        </td>

                        {{-- Fecha --}}
                        <td class="col-hide-sm" style="color:#94a3b8;font-size:.78rem;white-space:nowrap;">
                            {{ $trip->created_at->format('d/m H:i') }}<br>
                            <small>{{ $trip->created_at->diffForHumans() }}</small>
                        </td>

                        {{-- Acciones --}}
                        <td>
                            <div class="d-flex gap-1">
                                <button class="btn-track" title="Link de rastreo"
                                        onclick="openTrackingLink({{ $trip->id }})">
                                    <i class="fas fa-map-marker-alt"></i>
                                </button>
                                <button class="btn-del btn-delete-ajax" title="Eliminar"
                                        data-url="{{ route('trips.destroy', $trip) }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="empty-row">
                        <td colspan="10">
                            <i class="fas fa-inbox fa-2x mb-2 d-block" style="opacity:.3;"></i>
                            No se encontraron viajes.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination bar --}}
        <div class="trips-pagination">
            <div class="page-info" id="pageInfo">Mostrando 0 registros</div>
            <div class="d-flex align-items-center gap-3">
                <div class="per-page">
                    <select id="perPage" onchange="renderPage(1)">
                        <option value="10">10 por página</option>
                        <option value="25" selected>25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="9999">Todo</option>
                    </select>
                </div>
                <div class="page-btns" id="pageBtns"></div>
            </div>
        </div>
    </div>

</div>
</div>

{{-- ── Driver modals ────────────────────────────────────────── --}}
@foreach($trips as $trip)
@if($trip->driver && $trip->driver->user)
@php
    $dm  = $trip->driver;
    $dmu = $dm->user;
    $dmv = $dm->vehicles->first();
    $dmonline = $dm->is_online ?? false;
@endphp
<div class="modal fade driver-modal" id="driverModal{{ $trip->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border:none;border-radius:20px;overflow:hidden;">
      <div class="modal-header" style="background:linear-gradient(135deg,#5c61f2,#764ba2);border:none;padding:1.5rem 2rem;">
        <h5 class="modal-title text-white fw-bold">
            <i class="fas fa-id-card me-2"></i>Conductor #{{ $trip->id }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter:invert(1);"></button>
      </div>
      <div class="modal-body p-0">
        {{-- Profile --}}
        <div style="background:linear-gradient(135deg,#f5f7fa,#c3cfe2);padding:2rem;text-align:center;">
            <div style="width:90px;height:90px;border-radius:50%;background:linear-gradient(135deg,#5c61f2,#764ba2);display:flex;align-items:center;justify-content:center;color:white;font-size:2.2rem;font-weight:800;border:4px solid white;box-shadow:0 8px 20px rgba(0,0,0,.15);margin:0 auto 1rem;">
                {{ strtoupper(substr($dmu->name, 0, 1)) }}
            </div>
            <h4 style="font-weight:800;color:#1e293b;margin-bottom:.25rem;">{{ $dmu->name }}</h4>
            <small style="color:#64748b;text-transform:uppercase;letter-spacing:.05em;">Conductor</small>
            <div style="display:inline-flex;align-items:center;gap:.5rem;padding:.4rem 1rem;border-radius:50px;margin-top:.75rem;background:{{ $dmonline ? '#c6f6d5' : '#fed7d7' }};color:{{ $dmonline ? '#22543d' : '#742a2a' }};font-size:.8rem;font-weight:600;">
                <span style="width:8px;height:8px;border-radius:50%;background:{{ $dmonline ? '#48bb78' : '#f56565' }};"></span>
                {{ $dmonline ? 'En Línea' : 'Fuera de Línea' }}
            </div>
        </div>
        {{-- Info --}}
        <div style="padding:1.5rem 2rem;">
          <div class="row g-3">
            <div class="col-sm-6">
              <div style="background:#f8fafc;border-radius:12px;padding:1.25rem;">
                <div style="font-size:.7rem;color:#94a3b8;text-transform:uppercase;letter-spacing:.05em;font-weight:700;margin-bottom:.75rem;">
                    <i class="fas fa-address-book me-1 text-primary"></i>Contacto
                </div>
                <div class="mb-2">
                    <div style="font-size:.7rem;color:#94a3b8;">Teléfono</div>
                    <a href="tel:{{ $dmu->phone ?? $dmu->whatsapp_number }}" style="font-weight:600;color:#3182ce;text-decoration:none;font-size:.88rem;">
                        {{ $dmu->phone ?? $dmu->whatsapp_number ?? 'N/A' }}
                    </a>
                </div>
                <div>
                    <div style="font-size:.7rem;color:#94a3b8;">Email</div>
                    <span style="font-weight:600;font-size:.88rem;">{{ $dmu->email ?? 'N/A' }}</span>
                </div>
              </div>
            </div>
            @if($dmv)
            <div class="col-sm-6">
              <div style="background:linear-gradient(135deg,#f0fff4,#c6f6d5);border:2px solid #9ae6b4;border-radius:12px;padding:1.25rem;">
                <div style="font-size:.7rem;color:#38a169;text-transform:uppercase;letter-spacing:.05em;font-weight:700;margin-bottom:.75rem;">
                    <i class="fas fa-car me-1"></i>Vehículo
                </div>
                <div class="mb-2">
                    <div style="font-size:.7rem;color:#38a169;">Tipo</div>
                    <span style="font-weight:600;font-size:.88rem;color:#22543d;">{{ $dmv->type }}</span>
                </div>
                <div>
                    <div style="font-size:.7rem;color:#38a169;">Placa</div>
                    <span style="font-family:monospace;font-weight:800;font-size:1rem;background:#2d3748;color:white;padding:.25rem .75rem;border-radius:6px;letter-spacing:.1em;">
                        {{ $dmv->plate_number }}
                    </span>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
        {{-- Actions --}}
        <div style="display:flex;gap:.75rem;padding:1rem 2rem 1.5rem;flex-wrap:wrap;">
            @if($dmu->whatsapp_number)
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $dmu->whatsapp_number) }}" target="_blank"
               style="flex:1;min-width:120px;padding:.75rem;border-radius:12px;background:#25d366;color:white;text-align:center;font-weight:600;text-decoration:none;font-size:.85rem;">
                <i class="fab fa-whatsapp me-1"></i>WhatsApp
            </a>
            @endif
            <a href="tel:{{ $dmu->phone ?? $dmu->whatsapp_number }}"
               style="flex:1;min-width:120px;padding:.75rem;border-radius:12px;background:#3182ce;color:white;text-align:center;font-weight:600;text-decoration:none;font-size:.85rem;">
                <i class="fas fa-phone me-1"></i>Llamar
            </a>
            <button type="button" onclick="openTrackingLink({{ $trip->id }})" data-bs-dismiss="modal"
               style="flex:1;min-width:120px;padding:.75rem;border-radius:12px;background:#FF8C00;color:white;border:none;font-weight:600;font-size:.85rem;cursor:pointer;">
                <i class="fas fa-map-marker-alt me-1"></i>Rastrear
            </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endforeach
@endsection

@section('js')
<script>
// ══════════════════════════════════════════════════════════
//  Data + state
// ══════════════════════════════════════════════════════════
const allRows   = Array.from(document.querySelectorAll('#tripsBody tr[data-id]'));
let filteredRows = [...allRows];
let currentPage  = 1;
let perPage      = parseInt(document.getElementById('perPage').value);
let sortCol      = 'id';
let sortDir      = 'desc';
let statusFilter = '';
let svcFilter    = '';
let searchVal    = '';

// ══════════════════════════════════════════════════════════
//  Filter + sort
// ══════════════════════════════════════════════════════════
const statusGroupMap = {
    'active'    : 's-active',
    'new'       : 's-new',
    'completed' : 's-done',
    'cancelled' : 's-cancel',
};

function applyFilters() {
    filteredRows = allRows.filter(row => {
        if (statusFilter && row.dataset.statusGroup !== statusGroupMap[statusFilter]) return false;
        if (svcFilter   && row.dataset.svc !== svcFilter) return false;
        if (searchVal   && !row.dataset.search.includes(searchVal)) return false;
        return true;
    });
    // sort
    filteredRows.sort((a, b) => {
        let va, vb;
        if (sortCol === 'id')    { va = parseInt(a.dataset.id);  vb = parseInt(b.dataset.id); }
        else if (sortCol === 'date') { va = a.dataset.id; vb = b.dataset.id; } // id ~ date ordering
        else { va = 0; vb = 0; }
        return sortDir === 'asc' ? va - vb : vb - va;
    });
    renderPage(1);
}

// ══════════════════════════════════════════════════════════
//  Render
// ══════════════════════════════════════════════════════════
function renderPage(page) {
    perPage = parseInt(document.getElementById('perPage').value);
    currentPage = page;
    const tbody = document.getElementById('tripsBody');
    const start = (page - 1) * perPage;
    const end   = start + perPage;
    const pageRows = filteredRows.slice(start, end);

    // hide all, show current slice
    allRows.forEach(r => r.style.display = 'none');
    pageRows.forEach(r => r.style.display = '');

    // info
    const total = filteredRows.length;
    const s = total === 0 ? 0 : start + 1;
    const e = Math.min(end, total);
    document.getElementById('pageInfo').textContent =
        `Mostrando ${s}–${e} de ${total} viajes`;

    // page buttons
    const totalPages = Math.ceil(total / perPage) || 1;
    const btns = document.getElementById('pageBtns');
    btns.innerHTML = '';

    const addBtn = (label, p, disabled = false) => {
        const b = document.createElement('button');
        b.className = 'pbtn' + (p === page ? ' active' : '');
        b.textContent = label;
        b.disabled = disabled;
        if (!disabled) b.onclick = () => renderPage(p);
        btns.appendChild(b);
    };
    addBtn('‹', page - 1, page <= 1);
    const range = 2;
    for (let i = Math.max(1, page - range); i <= Math.min(totalPages, page + range); i++) {
        addBtn(i, i);
    }
    addBtn('›', page + 1, page >= totalPages);
}

// ══════════════════════════════════════════════════════════
//  Event listeners
// ══════════════════════════════════════════════════════════
// Status tabs
document.querySelectorAll('.ftab').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.ftab').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        statusFilter = btn.dataset.status;
        applyFilters();
    });
});
// Service tabs
document.querySelectorAll('.svctab').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.svctab').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        svcFilter = btn.dataset.svc;
        applyFilters();
    });
});
// Search
let searchTimeout;
document.getElementById('tripSearch').addEventListener('input', e => {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        searchVal = e.target.value.toLowerCase().trim();
        applyFilters();
    }, 180);
});

// ══════════════════════════════════════════════════════════
//  Checkboxes + bulk delete
// ══════════════════════════════════════════════════════════
const selectAll = document.getElementById('selectAll');
selectAll.addEventListener('change', () => {
    // only affect visible rows
    const visibleBoxes = Array.from(document.querySelectorAll('#tripsBody tr[data-id]:not([style*="none"]) .row-checkbox'));
    visibleBoxes.forEach(cb => cb.checked = selectAll.checked);
    updateBulkBar();
});
document.getElementById('tripsBody').addEventListener('change', e => {
    if (e.target.classList.contains('row-checkbox')) updateBulkBar();
});
function updateBulkBar() {
    const checked = document.querySelectorAll('.row-checkbox:checked').length;
    const bar = document.getElementById('bulkBar');
    document.getElementById('bulkCount').textContent = checked;
    bar.classList.toggle('visible', checked > 0);
}
function clearSelection() {
    document.querySelectorAll('.row-checkbox').forEach(cb => cb.checked = false);
    selectAll.checked = false;
    updateBulkBar();
}

// Bulk delete
document.querySelector('.bulk-delete-btn')?.addEventListener('click', function() {
    const ids = Array.from(document.querySelectorAll('.row-checkbox:checked')).map(cb => cb.value);
    if (!ids.length) return;
    Swal.fire({
        title: `¿Eliminar ${ids.length} viaje(s)?`,
        text: 'Esta acción no se puede deshacer.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
    }).then(r => {
        if (!r.isConfirmed) return;
        fetch(this.dataset.url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ ids }),
        })
        .then(r => r.json())
        .then(d => {
            if (d.success) {
                ids.forEach(id => {
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    if (row) row.remove();
                });
                allRows.splice(0);
                allRows.push(...Array.from(document.querySelectorAll('#tripsBody tr[data-id]')));
                applyFilters();
                clearSelection();
                Swal.fire({ icon:'success', title:'Eliminados', timer:1500, showConfirmButton:false });
            }
        })
        .catch(() => Swal.fire('Error','No se pudo eliminar','error'));
    });
});

// Delete individual
document.addEventListener('click', e => {
    const btn = e.target.closest('.btn-delete-ajax');
    if (!btn) return;
    Swal.fire({
        title: '¿Eliminar este viaje?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
    }).then(r => {
        if (!r.isConfirmed) return;
        fetch(btn.dataset.url, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
        })
        .then(r => r.json())
        .then(d => {
            if (d.success !== false) {
                const row = btn.closest('tr');
                const idx = allRows.indexOf(row);
                if (idx > -1) allRows.splice(idx, 1);
                row.remove();
                applyFilters();
                Swal.fire({ icon:'success', title:'Eliminado', timer:1200, showConfirmButton:false });
            }
        })
        .catch(() => Swal.fire('Error','No se pudo eliminar','error'));
    });
});

// ══════════════════════════════════════════════════════════
//  Tracking link
// ══════════════════════════════════════════════════════════
function openTrackingLink(tripId) {
    Swal.fire({ title:'Generando link...', allowOutsideClick:false, didOpen:()=>Swal.showLoading() });
    fetch(`/admin/trips/${tripId}/tracking-token`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(r => r.json())
    .then(data => {
        Swal.fire({
            icon: 'success',
            title: '🚚 Link de Rastreo',
            html: `
                <p class="mb-3 text-muted small">Compartí este link con el cliente.</p>
                <div class="input-group">
                    <input type="text" id="trackUrl" class="form-control form-control-sm"
                           value="${data.url}" readonly>
                    <button class="btn btn-sm btn-warning" onclick="copyTrackUrl()">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
                <div class="mt-3">
                    <a href="${data.url}" target="_blank" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-external-link-alt me-1"></i>Abrir mapa
                    </a>
                </div>`,
            confirmButtonText: 'Cerrar',
            confirmButtonColor: '#5c61f2',
        });
    })
    .catch(() => Swal.fire('Error','No se pudo generar el link','error'));
}
function copyTrackUrl() {
    const input = document.getElementById('trackUrl');
    navigator.clipboard.writeText(input.value).then(() => {
        Swal.showValidationMessage?.('¡Copiado!') ?? alert('¡Copiado!');
    });
}

// ══════════════════════════════════════════════════════════
//  Init
// ══════════════════════════════════════════════════════════
applyFilters();
</script>
@endsection

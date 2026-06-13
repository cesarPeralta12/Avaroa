@extends('layout.master')
@section('title', 'Bot de WhatsApp')

@section('css')
<style>
    /* ── HERO ────────────────────────────────────────────────── */
    .wa-hero {
        background: linear-gradient(135deg, #064e3b 0%, #065f46 50%, #047857 100%);
        border-radius: 18px;
        padding: 24px 28px;
        margin-bottom: 24px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }
    .wa-hero h3 { font-weight: 800; margin-bottom: 4px; font-size: 1.3rem; }
    .wa-hero p  { opacity: .7; margin: 0; font-size: .875rem; }
    .wa-hero-icon {
        width: 56px; height: 56px;
        background: rgba(255,255,255,.15);
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem; flex-shrink: 0;
    }
    .live-pill {
        display: inline-flex; align-items: center; gap: 7px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.25);
        padding: 5px 14px; border-radius: 50px;
        font-size: .75rem; font-weight: 700; letter-spacing: .5px;
    }
    .live-dot { width: 7px; height: 7px; border-radius: 50%; background: #86efac; animation: blink 1.5s infinite; }
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.2} }

    /* ── STAT CARDS ──────────────────────────────────────────── */
    .wa-stat {
        border-radius: 16px; padding: 20px 22px; color: white;
        position: relative; overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,.1);
    }
    .wa-stat::after {
        content: ''; position: absolute; right: -16px; top: -16px;
        width: 80px; height: 80px; border-radius: 50%;
        background: rgba(255,255,255,.12);
    }
    .wa-stat .s-icon { font-size: 1.6rem; margin-bottom: 10px; opacity: .9; }
    .wa-stat .s-num  { font-size: 2rem; font-weight: 800; line-height: 1; }
    .wa-stat .s-lbl  { font-size: .8rem; opacity: .8; margin-top: 5px; }
    .s-green  { background: linear-gradient(135deg,#25d366,#128c7e); }
    .s-indigo { background: linear-gradient(135deg,#6366f1,#4f46e5); }
    .s-sky    { background: linear-gradient(135deg,#0ea5e9,#0284c7); }
    .s-red    { background: linear-gradient(135deg,#f43f5e,#be123c); }

    /* ── FILTER CARD ─────────────────────────────────────────── */
    .filter-card {
        background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
        border-radius: 14px; padding: 18px 20px; margin-bottom: 20px; border: none;
    }
    .filter-card .form-control,
    .filter-card .form-select {
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.15);
        color: #fff; border-radius: 10px;
    }
    .filter-card .form-control::placeholder { color: rgba(255,255,255,.4); }
    .filter-card .form-control:focus,
    .filter-card .form-select:focus {
        background: rgba(255,255,255,.12);
        border-color: #25d366;
        box-shadow: 0 0 0 3px rgba(37,211,102,.15);
        color: #fff;
    }
    .filter-card .form-select option { background: #1e293b; color: #fff; }

    /* ── TABLE ───────────────────────────────────────────────── */
    .conv-table thead th {
        background: #f8fafc;
        font-size: .72rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: .06em; color: #64748b;
        border-bottom: 1px solid #e2e8f0; padding: 10px 14px;
    }
    .conv-row { cursor: pointer; transition: background .12s; }
    .conv-row:hover { background: #f8fafc !important; }
    .conv-row.is-escalated { border-left: 3px solid #ef4444 !important; }
    .conv-row.is-new { animation: rowPop .4s ease both; }
    @keyframes rowPop { from{background:#dcfce7} to{background:transparent} }

    /* State badges */
    .sb { font-size: .7rem; font-weight: 700; padding: 3px 9px; border-radius: 50px; white-space: nowrap; }
    .sb-blue   { background:#dbeafe; color:#1e40af; }
    .sb-yellow { background:#fef3c7; color:#92400e; }
    .sb-orange { background:#ffedd5; color:#c2410c; }
    .sb-green  { background:#d1fae5; color:#065f46; }
    .sb-red    { background:#fee2e2; color:#991b1b; }

    .wa-phone { font-family: monospace; font-size: .85rem; color: #25d366; font-weight: 600; }

    .avatar-circle {
        width: 38px; height: 38px; border-radius: 50%;
        background: linear-gradient(135deg,#25d366,#128c7e);
        display: flex; align-items: center; justify-content: center;
        color: white; font-weight: 800; font-size: .9rem; flex-shrink: 0;
    }

    /* ── ACTIVITY TOAST ──────────────────────────────────────── */
    #activityToast {
        display: none; position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%);
        background: #065f46; color: white; padding: 10px 20px; border-radius: 50px;
        font-size: .85rem; font-weight: 600; z-index: 9999;
        box-shadow: 0 8px 30px rgba(0,0,0,.3); cursor: pointer;
        animation: slideUp .3s ease;
    }
    @keyframes slideUp { from{transform:translateX(-50%) translateY(20px);opacity:0} to{transform:translateX(-50%) translateY(0);opacity:1} }
</style>
@endsection

@section('main_content')
<div class="page-content">
<div class="container-fluid">

    {{-- HERO --}}
    <div class="wa-hero">
        <div class="d-flex align-items-center gap-3">
            <div class="wa-hero-icon"><i class="fab fa-whatsapp"></i></div>
            <div>
                <h3>Bot de WhatsApp</h3>
                <p>Conversaciones de clientes en tiempo real</p>
            </div>
        </div>
        <div class="live-pill">
            <div class="live-dot"></div>
            <span id="liveLabel">EN VIVO</span>
        </div>
    </div>

    {{-- STATS --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="wa-stat s-green">
                <div class="s-icon"><i class="fas fa-comments"></i></div>
                <div class="s-num" id="s-total">{{ $stats['total'] }}</div>
                <div class="s-lbl">Total conversaciones</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="wa-stat s-indigo">
                <div class="s-icon"><i class="fas fa-circle-dot"></i></div>
                <div class="s-num" id="s-active">{{ $stats['active'] }}</div>
                <div class="s-lbl">En progreso</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="wa-stat s-sky">
                <div class="s-icon"><i class="fas fa-calendar-day"></i></div>
                <div class="s-num" id="s-today">{{ $stats['today'] }}</div>
                <div class="s-lbl">Iniciadas hoy</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="wa-stat s-red">
                <div class="s-icon"><i class="fas fa-triangle-exclamation"></i></div>
                <div class="s-num" id="s-escalated">{{ $stats['escalated'] }}</div>
                <div class="s-lbl">Requieren atención</div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show rounded-3">
        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- FILTROS --}}
    <div class="filter-card">
        <form method="GET" class="row g-2 align-items-end">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text" style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);color:rgba(255,255,255,.5);">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="search" class="form-control"
                           placeholder="Buscar por nombre o teléfono..."
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <select name="state" class="form-select">
                    <option value="">Todos los estados</option>
                    @foreach(\App\Models\ConversationSession::STATES as $s)
                        <option value="{{ $s }}" {{ request('state') === $s ? 'selected' : '' }}>
                            {{ str_replace('_', ' ', $s) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto d-flex gap-2">
                <button class="btn btn-success btn-sm px-4">
                    <i class="fas fa-filter me-1"></i>Filtrar
                </button>
                @if(request()->hasAny(['search','state']))
                <a href="{{ route('whatsapp.index') }}" class="btn btn-sm" style="background:rgba(255,255,255,.1);color:white;border:1px solid rgba(255,255,255,.2);">
                    <i class="fas fa-times me-1"></i>Limpiar
                </a>
                @endif
            </div>
        </form>
    </div>

    {{-- TABLA --}}
    <div class="card shadow-sm" style="border-radius:16px;border:1px solid #e2e8f0;overflow:hidden;">
        <div class="card-header d-flex align-items-center justify-content-between py-3 px-4"
             style="background:white;border-bottom:1px solid #e2e8f0;">
            <span class="fw-bold" style="font-size:.95rem;">
                <i class="fab fa-whatsapp me-2" style="color:#25d366;"></i>
                Conversaciones
                <span class="badge ms-2" style="background:#f0fdf4;color:#15803d;font-size:.72rem;" id="convCount">
                    {{ $conversations->total() }}
                </span>
            </span>
            <span style="font-size:.75rem;color:#94a3b8;" id="lastUpdate">Actualizado ahora</span>
        </div>
        <div class="table-responsive">
            <table class="table conv-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Cliente</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th>Viaje</th>
                        <th>Último msg</th>
                        <th>Inicio</th>
                        <th class="text-center pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody id="convTableBody">
                    @forelse($conversations as $conv)
                    @include('admin.whatsapp._row', ['conv' => $conv])
                    @empty
                    <tr id="emptyRow">
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fab fa-whatsapp fa-3x mb-3 d-block" style="color:#25d366;opacity:.25;"></i>
                            No hay conversaciones{{ request()->hasAny(['search','state']) ? ' con esos filtros' : ' aún' }}.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($conversations->hasPages())
        <div class="card-footer py-3 px-4" style="background:#f8fafc;border-top:1px solid #e2e8f0;">
            {{ $conversations->links() }}
        </div>
        @endif
    </div>

</div>
</div>

{{-- Toast de nueva actividad --}}
<div id="activityToast" onclick="location.reload()">
    <i class="fas fa-arrow-up me-2"></i><span id="toastText">Nueva actividad — clic para actualizar</span>
</div>

{{-- Delete form (oculto) --}}
<form id="deleteForm" method="POST" style="display:none;">@csrf @method('DELETE')</form>
@endsection

@push('scripts')
<script>
const LIVE_URL    = '{{ route('whatsapp.live-stats') }}';
const CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').content;
const hasFilters  = {{ request()->hasAny(['search','state']) ? 'true' : 'false' }};

// IDs de las conversaciones actualmente en pantalla
let knownIds = new Set({{ json_encode($conversations->pluck('id')->toArray()) }});
let newCount  = 0;

// ── Helpers de badge ───────────────────────────────────────────
function stateBadge(state) {
    const map = {
        START:'sb-blue', ASK_SERVICE:'sb-blue', ASK_PICKUP:'sb-blue',
        ASK_DESTINATION:'sb-blue', CALCULATING_PRICE:'sb-blue',
        SHOW_PRICE:'sb-blue', ASK_INSTRUCTIONS:'sb-blue',
        SEARCHING_DRIVER:'sb-yellow',
        DRIVER_ASSIGNED:'sb-orange', DRIVER_EN_ROUTE:'sb-orange',
        ARRIVED:'sb-orange', IN_PROGRESS:'sb-orange',
        COMPLETED:'sb-green', CANCELLED:'sb-red',
    };
    const cls = map[state] || 'sb-blue';
    return `<span class="sb ${cls}">${state.replace(/_/g,' ')}</span>`;
}

// ── Anima número al cambiar ─────────────────────────────────────
function animateNum(el, to) {
    const from = parseInt(el.textContent) || 0;
    if (from === to) return;
    const step = to > from ? 1 : -1;
    const steps = Math.abs(to - from);
    let i = 0;
    const t = setInterval(() => {
        el.textContent = from + step * (++i);
        if (i >= steps) clearInterval(t);
    }, Math.min(300 / steps, 60));
}

// ── Construye fila HTML desde objeto ───────────────────────────
function buildRow(c) {
    const esc = c.escalated
        ? `<span class="badge ms-1" style="background:#fee2e2;color:#991b1b;font-size:.65rem;">⚠ Atención</span>`
        : '';
    const trip = c.trip_id
        ? `<span style="background:#ede9fe;color:#5c61f2;padding:4px 10px;border-radius:50px;font-size:.72rem;font-weight:600;">#${c.trip_id}</span>`
        : `<span class="text-muted">—</span>`;
    return `
    <tr class="conv-row ${c.escalated ? 'is-escalated' : ''} is-new"
        onclick="window.location='${c.url}'">
      <td class="ps-4">
        <div class="d-flex align-items-center gap-2">
          <div class="avatar-circle">${c.initial}</div>
          <div>
            <div style="font-weight:600;font-size:.88rem;">${c.name}</div>
            ${esc}
          </div>
        </div>
      </td>
      <td><span class="wa-phone">${c.phone}</span></td>
      <td>${stateBadge(c.state)}</td>
      <td>${trip}</td>
      <td><span style="font-size:.8rem;">${c.last_msg}</span></td>
      <td><span style="font-size:.8rem;color:#94a3b8;">${c.started}</span></td>
      <td class="text-center pe-4" onclick="event.stopPropagation()">
        <a href="${c.url}" class="btn btn-sm btn-outline-success me-1" title="Ver chat">
          <i class="fas fa-comments"></i>
        </a>
        <button onclick="deleteConv(${c.id}, event)"
                class="btn btn-sm btn-outline-danger" title="Eliminar">
          <i class="fas fa-trash"></i>
        </button>
      </td>
    </tr>`;
}

// ── Poll principal ──────────────────────────────────────────────
async function pollStats() {
    // Solo actualizar stats si hay filtros activos (no rebuildeamos la tabla)
    try {
        const res  = await fetch(LIVE_URL, { cache: 'no-store' });
        if (!res.ok) return;
        const data = await res.json();

        // Actualizar stats con animación
        animateNum(document.getElementById('s-total'),     data.stats.total);
        animateNum(document.getElementById('s-active'),    data.stats.active);
        animateNum(document.getElementById('s-today'),     data.stats.today);
        animateNum(document.getElementById('s-escalated'), data.stats.escalated);

        // Actualizar timestamp
        const now = new Date();
        document.getElementById('lastUpdate').textContent =
            `Actualizado ${now.getHours()}:${String(now.getMinutes()).padStart(2,'0')}:${String(now.getSeconds()).padStart(2,'0')}`;

        // Si no hay filtros, actualizar tabla
        if (!hasFilters) {
            const tbody = document.getElementById('convTableBody');
            let addedNew = false;

            data.conversations.forEach(c => {
                if (!knownIds.has(c.id)) {
                    knownIds.add(c.id);
                    newCount++;
                    addedNew = true;
                    // Insertar al inicio de la tabla
                    const empty = document.getElementById('emptyRow');
                    if (empty) empty.remove();
                    tbody.insertAdjacentHTML('afterbegin', buildRow(c));
                }
            });

            if (addedNew) {
                document.getElementById('convCount').textContent = data.conversations.length;
                showToast(`${newCount} nueva${newCount > 1 ? 's' : ''} conversación${newCount > 1 ? 'es' : ''}`);
            }

            // Actualizar "último mensaje" en filas existentes
            data.conversations.forEach(c => {
                const row = tbody.querySelector(`tr[data-id="${c.id}"]`);
                if (row) {
                    const lastMsgEl = row.querySelector('.last-msg-time');
                    if (lastMsgEl) lastMsgEl.textContent = c.last_msg;
                }
            });
        }
    } catch (_) { /* silencioso */ }
}

function showToast(text) {
    const t = document.getElementById('activityToast');
    document.getElementById('toastText').textContent = text + ' — clic para actualizar';
    t.style.display = 'flex';
    setTimeout(() => { t.style.display = 'none'; newCount = 0; }, 8000);
}

function deleteConv(id, e) {
    e?.stopPropagation();
    Swal.fire({
        title: '¿Eliminar conversación?',
        text: 'Se eliminarán todos los mensajes.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
    }).then(r => {
        if (!r.isConfirmed) return;
        const form = document.getElementById('deleteForm');
        form.action = `/admin/whatsapp/${id}`;
        form.submit();
    });
}

// Iniciar polling cada 7 segundos
setInterval(pollStats, 7000);
</script>
@endpush

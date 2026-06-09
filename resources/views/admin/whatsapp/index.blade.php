@extends('layout.master')
@section('title', 'Bot de WhatsApp')

@section('css')
<style>
    .wa-stat-card {
        border-radius: 16px;
        padding: 20px 24px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .wa-stat-card::after {
        content: '';
        position: absolute;
        right: -20px;
        top: -20px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255,255,255,0.1);
    }
    .wa-stat-card .stat-icon {
        font-size: 2rem;
        opacity: 0.9;
        margin-bottom: 8px;
    }
    .wa-stat-card .stat-num  { font-size: 2.2rem; font-weight: 800; line-height: 1; }
    .wa-stat-card .stat-lbl  { font-size: .85rem; opacity: .85; margin-top: 4px; }

    .bg-wa-green  { background: linear-gradient(135deg, #25d366 0%, #128c7e 100%); }
    .bg-wa-blue   { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .bg-wa-orange { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .bg-wa-gray   { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }

    .conv-row { cursor: pointer; transition: background .15s; }
    .conv-row:hover { background: var(--light, #f8fafc) !important; }

    /* Estado badges */
    .state-badge {
        font-size: .72rem;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 50px;
        white-space: nowrap;
    }
    .state-START, .state-ASK_SERVICE, .state-ASK_PICKUP,
    .state-ASK_DESTINATION, .state-CALCULATING_PRICE,
    .state-SHOW_PRICE, .state-ASK_INSTRUCTIONS {
        background: #dbeafe; color: #1e40af;
    }
    .state-SEARCHING_DRIVER {
        background: #fef3c7; color: #92400e;
    }
    .state-DRIVER_ASSIGNED, .state-DRIVER_EN_ROUTE,
    .state-ARRIVED, .state-IN_PROGRESS {
        background: #ffedd5; color: #c2410c;
    }
    .state-COMPLETED { background: #d1fae5; color: #065f46; }
    .state-CANCELLED { background: #fee2e2; color: #991b1b; }

    .escalated-badge {
        background: #fee2e2; color: #991b1b;
        font-size: .7rem; font-weight: 700;
        padding: 2px 8px; border-radius: 50px;
    }
    .wa-phone {
        font-family: monospace; font-size: .88rem; color: #25d366; font-weight: 600;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
  <div class="container-fluid">

    {{-- Título --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
      <div>
        <h4 class="fw-bold mb-1">
          <i class="fab fa-whatsapp me-2" style="color:#25d366;"></i>Bot de WhatsApp
        </h4>
        <small class="text-muted">Conversaciones de clientes con el bot</small>
      </div>
      <a href="{{ route('whatsapp.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="fas fa-sync-alt me-1"></i>Actualizar
      </a>
    </div>

    {{-- Stats --}}
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <div class="wa-stat-card bg-wa-green">
          <div class="stat-icon">💬</div>
          <div class="stat-num">{{ $stats['total'] }}</div>
          <div class="stat-lbl">Total conversaciones</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="wa-stat-card bg-wa-blue">
          <div class="stat-icon">🔄</div>
          <div class="stat-num">{{ $stats['active'] }}</div>
          <div class="stat-lbl">En progreso</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="wa-stat-card bg-wa-gray">
          <div class="stat-icon">📅</div>
          <div class="stat-num">{{ $stats['today'] }}</div>
          <div class="stat-lbl">Iniciadas hoy</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="wa-stat-card bg-wa-orange">
          <div class="stat-icon">🚨</div>
          <div class="stat-num">{{ $stats['escalated'] }}</div>
          <div class="stat-lbl">Escaladas a humano</div>
        </div>
      </div>
    </div>

    {{-- Alertas --}}
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show"><i class="fas fa-check me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show"><i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif

    {{-- Filtros --}}
    <div class="card mb-3">
      <div class="card-body py-3">
        <form method="GET" class="row g-2 align-items-end">
          <div class="col-md-4">
            <input type="text" name="search" class="form-control form-control-sm"
                   placeholder="Buscar cliente o teléfono..." value="{{ request('search') }}">
          </div>
          <div class="col-md-3">
            <select name="state" class="form-select form-select-sm">
              <option value="">Todos los estados</option>
              @foreach(\App\Models\ConversationSession::STATES as $s)
                <option value="{{ $s }}" {{ request('state') === $s ? 'selected' : '' }}>
                  {{ str_replace('_', ' ', $s) }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="col-auto">
            <button class="btn btn-sm btn-primary"><i class="fas fa-search me-1"></i>Filtrar</button>
            <a href="{{ route('whatsapp.index') }}" class="btn btn-sm btn-outline-secondary ms-1">Limpiar</a>
          </div>
        </form>
      </div>
    </div>

    {{-- Tabla --}}
    <div class="card">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th class="ps-3">Cliente</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Viaje</th>
                <th>Último mensaje</th>
                <th>Inicio</th>
                <th class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse($conversations as $conv)
              <tr class="conv-row" onclick="window.location='{{ route('whatsapp.show', $conv->id) }}'">
                <td class="ps-3">
                  <div class="d-flex align-items-center gap-2">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#25d366,#128c7e);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:.9rem;flex-shrink:0;">
                      {{ strtoupper(substr($conv->customer?->name ?? '?', 0, 1)) }}
                    </div>
                    <div>
                      <div class="fw-semibold" style="font-size:.9rem;">
                        {{ $conv->customer?->name ?? 'Desconocido' }}
                      </div>
                      @if($conv->escalated_to_human)
                        <span class="escalated-badge">⚠ Requiere atención</span>
                      @endif
                    </div>
                  </div>
                </td>
                <td>
                  <span class="wa-phone">
                    {{ $conv->customer?->whatsapp_number ?? $conv->customer?->phone ?? '—' }}
                  </span>
                </td>
                <td>
                  <span class="state-badge state-{{ $conv->state }}">
                    {{ str_replace('_', ' ', $conv->state) }}
                  </span>
                </td>
                <td>
                  @if($conv->trip_id)
                    <a href="{{ route('trips.index') }}?search={{ $conv->trip_id }}"
                       class="badge bg-purple-light text-purple text-decoration-none"
                       onclick="event.stopPropagation()"
                       style="background:#ede9fe;color:#5c61f2;padding:4px 10px;border-radius:50px;font-size:.75rem;">
                      #{{ $conv->trip_id }}
                    </a>
                  @else
                    <span class="text-muted">—</span>
                  @endif
                </td>
                <td>
                  <span style="font-size:.82rem;">
                    {{ $conv->last_message_at?->diffForHumans() ?? $conv->updated_at->diffForHumans() }}
                  </span>
                </td>
                <td>
                  <span style="font-size:.82rem;" class="text-muted">
                    {{ $conv->created_at->format('d/m H:i') }}
                  </span>
                </td>
                <td class="text-center" onclick="event.stopPropagation()">
                  <a href="{{ route('whatsapp.show', $conv->id) }}"
                     class="btn btn-sm btn-outline-success me-1" title="Ver chat">
                    <i class="fas fa-comments"></i>
                  </a>
                  <button onclick="deleteConv({{ $conv->id }})"
                          class="btn btn-sm btn-outline-danger" title="Eliminar">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center py-5 text-muted">
                  <i class="fab fa-whatsapp fa-3x mb-3 d-block" style="color:#25d366; opacity:.4;"></i>
                  No hay conversaciones{{ request()->hasAny(['search','state']) ? ' con esos filtros' : ' aún' }}.
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      @if($conversations->hasPages())
      <div class="card-footer">
        {{ $conversations->links() }}
      </div>
      @endif
    </div>

  </div>
</div>

{{-- Delete form (oculto) --}}
<form id="deleteForm" method="POST" style="display:none;">
  @csrf @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
function deleteConv(id) {
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
</script>
@endpush

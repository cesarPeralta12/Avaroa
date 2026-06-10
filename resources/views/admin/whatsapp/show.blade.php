@extends('layout.master')
@section('title', 'Chat — ' . ($conversation->customer?->name ?? 'Cliente'))

@section('css')
<style>
    /* ── Layout ────────────────────────────────────────────── */
    .chat-wrapper {
        display: flex;
        gap: 20px;
        height: calc(100vh - 200px);
        min-height: 500px;
    }
    .chat-main   { flex: 1; display: flex; flex-direction: column; min-width: 0; }
    .chat-sidebar { width: 280px; flex-shrink: 0; }

    /* ── Mensajes ──────────────────────────────────────────── */
    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
        background: #f0f4f8;
        border-radius: 16px 16px 0 0;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .msg-row { display: flex; align-items: flex-end; gap: 8px; }
    .msg-row.from-customer { flex-direction: row; }
    .msg-row.from-bot,
    .msg-row.from-admin,
    .msg-row.from-system { flex-direction: row-reverse; }

    .bubble {
        max-width: 70%;
        padding: 10px 14px;
        border-radius: 18px;
        font-size: .88rem;
        line-height: 1.5;
        white-space: pre-wrap;
        word-break: break-word;
        position: relative;
    }
    .from-customer .bubble {
        background: white;
        color: #1e293b;
        border-bottom-left-radius: 4px;
        box-shadow: 0 1px 4px rgba(0,0,0,.08);
    }
    .from-bot .bubble {
        background: #d1fae5;
        color: #065f46;
        border-bottom-right-radius: 4px;
    }
    .from-admin .bubble {
        background: #5c61f2;
        color: white;
        border-bottom-right-radius: 4px;
    }
    .from-system .bubble {
        background: #fef3c7;
        color: #78350f;
        border-bottom-right-radius: 4px;
        font-size: .8rem;
        font-style: italic;
    }
    .msg-avatar {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .7rem;
        font-weight: 700;
        flex-shrink: 0;
    }
    .bubble-time {
        font-size: .65rem;
        opacity: .6;
        margin-top: 4px;
        display: block;
    }

    /* ── Input area ────────────────────────────────────────── */
    .chat-input-area {
        background: white;
        border: 1px solid #e2e8f0;
        border-top: none;
        border-radius: 0 0 16px 16px;
        padding: 14px 16px;
        display: flex;
        gap: 10px;
        align-items: flex-end;
    }
    .chat-input-area textarea {
        flex: 1;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 10px 14px;
        resize: none;
        font-size: .88rem;
        outline: none;
        transition: border .2s;
        max-height: 120px;
    }
    .chat-input-area textarea:focus { border-color: #25d366; }

    /* ── Sidebar ───────────────────────────────────────────── */
    .info-row { display: flex; flex-direction: column; gap: 2px; margin-bottom: 14px; }
    .info-lbl { font-size: .72rem; color: #94a3b8; text-transform: uppercase; letter-spacing: .5px; font-weight: 600; }
    .info-val { font-size: .88rem; font-weight: 600; color: #1e293b; }

    .state-badge {
        font-size: .75rem; font-weight: 700;
        padding: 4px 12px; border-radius: 50px;
        display: inline-block;
    }
    .state-COMPLETED { background: #d1fae5; color: #065f46; }
    .state-CANCELLED { background: #fee2e2; color: #991b1b; }
    .state-SEARCHING_DRIVER { background: #fef3c7; color: #92400e; }
    .state-DRIVER_ASSIGNED,.state-DRIVER_EN_ROUTE,.state-ARRIVED,.state-IN_PROGRESS { background: #ffedd5; color: #c2410c; }
    .state-default { background: #dbeafe; color: #1e40af; }


</style>
@endsection

@section('main_content')
<div class="page-content">
  <div class="container-fluid">

    {{-- Breadcrumb --}}
    <div class="d-flex align-items-center gap-2 mb-3">
      <a href="{{ route('whatsapp.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="fas fa-arrow-left me-1"></i>Conversaciones
      </a>
      <span class="text-muted">/</span>
      <span class="fw-semibold">{{ $conversation->customer?->name ?? 'Cliente desconocido' }}</span>
      @php
        $stateClass = match(true) {
            in_array($conversation->state, ['COMPLETED'])                                                                        => 'state-COMPLETED',
            in_array($conversation->state, ['CANCELLED'])                                                                        => 'state-CANCELLED',
            in_array($conversation->state, ['SEARCHING_DRIVER'])                                                                 => 'state-SEARCHING_DRIVER',
            in_array($conversation->state, ['DRIVER_ASSIGNED','DRIVER_EN_ROUTE','ARRIVED','IN_PROGRESS'])                        => 'state-DRIVER_ASSIGNED',
            default                                                                                                              => 'state-default',
        };
      @endphp
      <span class="state-badge {{ $stateClass }}">{{ str_replace('_', ' ', $conversation->state) }}</span>
      @if($conversation->escalated_to_human)
        <span class="badge" style="background:#fee2e2;color:#991b1b;">⚠ Requiere atención</span>
      @endif
    </div>

    {{-- Alertas --}}
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show py-2"><i class="fas fa-check me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show py-2">{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif

    <div class="chat-wrapper">

      {{-- ── CHAT PRINCIPAL ──────────────────────────────── --}}
      <div class="chat-main card" style="border-radius:16px; overflow:hidden; border:1px solid #e2e8f0;">

        {{-- Header del chat --}}
        <div class="d-flex align-items-center gap-3 px-4 py-3"
             style="background:linear-gradient(135deg,#25d366,#128c7e); color:white;">
          <div style="width:42px;height:42px;border-radius:50%;background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:1.1rem;">
            {{ strtoupper(substr($conversation->customer?->name ?? '?', 0, 1)) }}
          </div>
          <div>
            <div class="fw-bold">{{ $conversation->customer?->name ?? 'Cliente desconocido' }}</div>
            <div style="font-size:.8rem;opacity:.85;">
              <i class="fab fa-whatsapp me-1"></i>
              {{ $conversation->customer?->whatsapp_number ?? $conversation->customer?->phone ?? 'Sin número' }}
            </div>
          </div>
          <div class="ms-auto d-flex gap-2">
            <button onclick="toggleEscalate({{ $conversation->id }})"
                    class="btn btn-sm"
                    style="background:rgba(255,255,255,.2);color:white;border:1px solid rgba(255,255,255,.4);"
                    id="escalateBtn"
                    title="{{ $conversation->escalated_to_human ? 'Quitar alerta' : 'Marcar como requiere atención' }}">
              <i class="fas fa-{{ $conversation->escalated_to_human ? 'bell-slash' : 'bell' }} me-1"></i>
              {{ $conversation->escalated_to_human ? 'Quitar alerta' : 'Alertar' }}
            </button>
          </div>
        </div>

        {{-- Mensajes --}}
        <div class="chat-messages" id="chatMessages">
          @forelse($conversation->messages as $msg)
            @php
              $rowClass = match($msg->sender_type) {
                'customer' => 'from-customer',
                'admin'    => 'from-admin',
                'system'   => 'from-system',
                default    => 'from-bot',
              };
              $avatarBg = match($msg->sender_type) {
                'customer' => '#64748b',
                'admin'    => '#5c61f2',
                'system'   => '#f59e0b',
                default    => '#25d366',
              };
              $avatarIcon = match($msg->sender_type) {
                'customer' => '👤',
                'admin'    => '🛡',
                'system'   => '⚙',
                default    => '🤖',
              };
            @endphp
            <div class="msg-row {{ $rowClass }}">
              <div class="msg-avatar" style="background:{{ $avatarBg }};">
                {{ $avatarIcon }}
              </div>
              <div>
                <div class="bubble">{{ $msg->content }}</div>
                <span class="bubble-time" style="text-align: {{ $rowClass === 'from-customer' ? 'left' : 'right' }}">
                  {{ $msg->created_at->format('d/m H:i') }}
                  @if($msg->sender_type === 'admin') · Admin @endif
                  @if($msg->status === 'read') <i class="fas fa-check-double" style="color:#25d366;"></i> @endif
                </span>
              </div>
            </div>
          @empty
            <div class="text-center text-muted my-auto py-5">
              <i class="fab fa-whatsapp fa-3x mb-3 d-block" style="color:#25d366;opacity:.3;"></i>
              No hay mensajes registrados en esta conversación.
            </div>
          @endforelse
        </div>

        {{-- Input manual --}}
        <form action="{{ route('whatsapp.send', $conversation->id) }}" method="POST" class="chat-input-area">
          @csrf
          <textarea name="message" rows="1" placeholder="Escribe un mensaje manual para enviar por WhatsApp..."
                    onInput="this.style.height='auto';this.style.height=this.scrollHeight+'px'"
                    required></textarea>
          <button type="submit" class="btn btn-success"
                  style="border-radius:12px; padding:10px 20px; white-space:nowrap;">
            <i class="fab fa-whatsapp me-1"></i>Enviar
          </button>
        </form>

      </div>

      {{-- ── SIDEBAR INFO ────────────────────────────────── --}}
      <div class="chat-sidebar d-none d-lg-block">

        {{-- Info del cliente --}}
        <div class="card mb-3" style="border-radius:16px;">
          <div class="card-body">
            <h6 class="fw-bold mb-3"><i class="fas fa-user me-2 text-muted"></i>Cliente</h6>
            <div class="info-row">
              <span class="info-lbl">Nombre</span>
              <span class="info-val">{{ $conversation->customer?->name ?? '—' }}</span>
            </div>
            <div class="info-row">
              <span class="info-lbl">WhatsApp</span>
              <span class="info-val" style="color:#25d366;">
                {{ $conversation->customer?->whatsapp_number ?? '—' }}
              </span>
            </div>
            <div class="info-row">
              <span class="info-lbl">Idioma</span>
              <span class="info-val">{{ strtoupper($conversation->language ?? 'ES') }}</span>
            </div>
            @if($conversation->customer)
            <a href="{{ route('edit_user', $conversation->customer->id) }}"
               class="btn btn-sm btn-outline-secondary w-100 mt-2">
              <i class="fas fa-external-link-alt me-1"></i>Ver perfil
            </a>
            @endif
          </div>
        </div>

        {{-- Info de la conversación --}}
        <div class="card mb-3" style="border-radius:16px;">
          <div class="card-body">
            <h6 class="fw-bold mb-3"><i class="fas fa-info-circle me-2 text-muted"></i>Conversación</h6>
            <div class="info-row">
              <span class="info-lbl">Estado bot</span>
              <span class="state-badge {{ $stateClass }}">{{ str_replace('_', ' ', $conversation->state) }}</span>
            </div>
            <div class="info-row mt-2">
              <span class="info-lbl">Iniciada</span>
              <span class="info-val">{{ $conversation->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="info-row">
              <span class="info-lbl">Último mensaje</span>
              <span class="info-val">{{ $conversation->last_message_at?->diffForHumans() ?? '—' }}</span>
            </div>
            <div class="info-row">
              <span class="info-lbl">Mensajes</span>
              <span class="info-val">{{ $conversation->messages->count() }}</span>
            </div>
          </div>
        </div>

        {{-- Viaje asociado --}}
        @if($conversation->trip)
        <div class="card mb-3" style="border-radius:16px;">
          <div class="card-body">
            <h6 class="fw-bold mb-3"><i class="fas fa-map-marker-alt me-2 text-muted"></i>Viaje asociado</h6>
            <div class="info-row">
              <span class="info-lbl">ID</span>
              <span class="info-val">#{{ $conversation->trip->id }}</span>
            </div>
            <div class="info-row">
              <span class="info-lbl">Estado</span>
              <span class="info-val">{{ ucfirst($conversation->trip->status) }}</span>
            </div>
            <div class="info-row">
              <span class="info-lbl">Origen</span>
              <span class="info-val" style="font-size:.8rem;">
                @php $_o = $conversation->trip->origin_address ?? $conversation->trip->origin_url ?? '—'; @endphp
                {{ mb_strlen($_o) > 42 ? mb_substr($_o, 0, 39) . '…' : $_o }}
              </span>
            </div>
            <a href="{{ route('trips.index') }}" class="btn btn-sm btn-outline-primary w-100 mt-2">
              <i class="fas fa-external-link-alt me-1"></i>Ver viaje
            </a>
          </div>
        </div>
        @endif

        {{-- Acciones --}}
        <div class="card" style="border-radius:16px;">
          <div class="card-body">
            <h6 class="fw-bold mb-3"><i class="fas fa-cog me-2 text-muted"></i>Acciones</h6>
            <button onclick="toggleEscalate({{ $conversation->id }})"
                    class="btn btn-sm btn-outline-warning w-100 mb-2" id="escalateBtnSide">
              <i class="fas fa-{{ $conversation->escalated_to_human ? 'bell-slash' : 'bell' }} me-1"></i>
              {{ $conversation->escalated_to_human ? 'Quitar alerta' : 'Marcar: necesita atención' }}
            </button>
            <button onclick="deleteConv({{ $conversation->id }})"
                    class="btn btn-sm btn-outline-danger w-100">
              <i class="fas fa-trash me-1"></i>Eliminar conversación
            </button>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

{{-- Delete form --}}
<form id="deleteForm" method="POST" style="display:none;">
  @csrf @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Scroll al final del chat
    const chatEl = document.getElementById('chatMessages');
    if (chatEl) chatEl.scrollTop = chatEl.scrollHeight;

    // Enter para enviar (Shift+Enter = nueva línea)
    const textarea = document.querySelector('textarea[name="message"]');
    if (textarea) {
        textarea.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                this.closest('form').submit();
            }
        });
    }
});

// Toggle escalate via AJAX
function toggleEscalate(id) {
    const csrf = document.querySelector('meta[name="csrf-token"]').content;
    fetch(`/admin/whatsapp/${id}/toggle-escalate`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf, 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            const esc = data.escalated;
            ['escalateBtn', 'escalateBtnSide'].forEach(btnId => {
                const btn = document.getElementById(btnId);
                if (btn) btn.innerHTML = `<i class="fas fa-${esc ? 'bell-slash' : 'bell'} me-1"></i>${esc ? 'Quitar alerta' : 'Marcar: necesita atención'}`;
            });
        }
    })
    .catch(err => console.error('Toggle escalate error:', err));
}

function deleteConv(id) {
    Swal.fire({
        title: '¿Eliminar conversación?',
        text: 'Se eliminarán todos los mensajes. No se puede deshacer.',
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

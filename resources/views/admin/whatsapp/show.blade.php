@extends('layout.master')
@section('title', 'Chat — ' . ($conversation->customer?->name ?? 'Cliente'))

@section('css')
<style>
    /* ── LAYOUT ─────────────────────────────────────────────── */
    .chat-layout {
        display: flex;
        gap: 20px;
        height: calc(100vh - 185px);
        min-height: 520px;
    }
    .chat-col   { flex: 1; display: flex; flex-direction: column; min-width: 0; }
    .side-col   { width: 270px; flex-shrink: 0; display: flex; flex-direction: column; gap: 14px; overflow-y: auto; }

    /* ── CHAT CARD ───────────────────────────────────────────── */
    .chat-card {
        flex: 1; display: flex; flex-direction: column;
        border-radius: 18px; overflow: hidden;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0,0,0,.07);
    }

    /* ── CHAT HEADER ─────────────────────────────────────────── */
    .chat-head {
        background: linear-gradient(135deg, #064e3b 0%, #128c7e 100%);
        padding: 14px 20px;
        display: flex; align-items: center; gap: 12px;
        flex-shrink: 0;
    }
    .chat-head-avatar {
        width: 44px; height: 44px; border-radius: 50%;
        background: rgba(255,255,255,.22);
        display: flex; align-items: center; justify-content: center;
        font-weight: 800; font-size: 1.1rem; color: white; flex-shrink: 0;
        overflow: hidden;
    }
    .chat-head-name  { font-weight: 700; color: white; font-size: .98rem; }
    .chat-head-phone { font-size: .78rem; color: rgba(255,255,255,.75); margin-top: 1px; }
    .chat-head-status {
        display: flex; align-items: center; gap: 5px;
        font-size: .72rem; color: #86efac; font-weight: 600;
    }
    .status-dot { width: 6px; height: 6px; border-radius: 50%; background: #86efac; animation: blink 2s infinite; }
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.25} }

    /* ── MESSAGES AREA ───────────────────────────────────────── */
    .chat-messages {
        flex: 1; overflow-y: auto;
        padding: 20px 18px;
        display: flex; flex-direction: column; gap: 6px;
        /* WhatsApp-style subtle background */
        background: #efeae2 url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4c9b8' fill-opacity='0.3'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    /* Fecha separador */
    .date-sep {
        text-align: center; margin: 10px 0 6px;
        font-size: .72rem; color: #64748b;
    }
    .date-sep span {
        background: rgba(255,255,255,.75); backdrop-filter: blur(4px);
        padding: 3px 12px; border-radius: 50px;
        font-weight: 600; letter-spacing: .3px;
    }

    /* Filas de mensajes */
    .msg-row { display: flex; align-items: flex-end; gap: 7px; max-width: 100%; }
    .msg-row.out { flex-direction: row-reverse; }

    .msg-avatar {
        width: 28px; height: 28px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: .68rem; font-weight: 700; flex-shrink: 0;
    }

    /* Burbuja */
    .bubble {
        max-width: 68%;
        padding: 9px 13px 6px;
        border-radius: 12px;
        font-size: .875rem;
        line-height: 1.55;
        white-space: pre-wrap;
        word-break: break-word;
        position: relative;
        box-shadow: 0 1px 3px rgba(0,0,0,.1);
    }
    .bubble-customer { background: white; color: #1e293b; border-bottom-left-radius: 3px; }
    .bubble-bot      { background: #d9fdd3; color: #1a3a2a; border-bottom-right-radius: 3px; }
    .bubble-admin    { background: #3b4fd4; color: white; border-bottom-right-radius: 3px; }
    .bubble-system   { background: #fff8e1; color: #78350f; border-bottom-right-radius: 3px; font-style: italic; font-size: .82rem; }

    .bubble-meta {
        display: flex; align-items: center; justify-content: flex-end; gap: 4px;
        margin-top: 3px; font-size: .65rem; opacity: .65;
    }
    .bubble-customer .bubble-meta { justify-content: flex-start; }

    /* Animación entrada de nuevo mensaje */
    @keyframes msgIn { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }
    .msg-new { animation: msgIn .25s ease both; }

    /* ── INPUT ───────────────────────────────────────────────── */
    .chat-input-bar {
        background: white; padding: 12px 14px;
        display: flex; align-items: flex-end; gap: 10px;
        border-top: 1px solid #e2e8f0; flex-shrink: 0;
    }
    .chat-input-bar textarea {
        flex: 1; border: 1.5px solid #e2e8f0;
        border-radius: 24px; padding: 10px 16px;
        resize: none; font-size: .875rem;
        max-height: 110px; outline: none;
        transition: border .2s; line-height: 1.4;
        background: #f8fafc;
    }
    .chat-input-bar textarea:focus { border-color: #25d366; background: white; box-shadow: 0 0 0 3px rgba(37,211,102,.1); }
    .chat-input-bar .char-count { font-size: .68rem; color: #94a3b8; text-align: right; margin-bottom: 4px; }
    .btn-send {
        width: 44px; height: 44px; border-radius: 50%;
        background: #25d366; border: none; color: white;
        display: flex; align-items: center; justify-content: center;
        font-size: 1rem; flex-shrink: 0;
        transition: all .2s; cursor: pointer;
    }
    .btn-send:hover { background: #16a34a; transform: scale(1.08); }
    .btn-send:disabled { background: #cbd5e1; cursor: not-allowed; transform: none; }

    /* Sending indicator */
    .sending-dot {
        display: none; align-items: center; gap: 4px;
        font-size: .78rem; color: #94a3b8; padding: 0 8px;
    }
    .sending-dot.visible { display: flex; }
    .dot-pulse { width: 6px; height: 6px; border-radius: 50%; background: #94a3b8; animation: dotPulse 1.2s ease infinite; }
    .dot-pulse:nth-child(2) { animation-delay: .2s; }
    .dot-pulse:nth-child(3) { animation-delay: .4s; }
    @keyframes dotPulse { 0%,80%,100%{transform:scale(.6)} 40%{transform:scale(1)} }

    /* ── SIDEBAR ─────────────────────────────────────────────── */
    .side-card {
        background: white; border-radius: 16px;
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }
    .side-card-header {
        padding: 12px 16px;
        border-bottom: 1px solid #f1f5f9;
        font-size: .8rem; font-weight: 700;
        color: #475569; text-transform: uppercase; letter-spacing: .05em;
        display: flex; align-items: center; gap: 7px;
    }
    .side-card-body { padding: 14px 16px; }
    .info-row { margin-bottom: 12px; }
    .info-lbl { font-size: .7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: .5px; font-weight: 600; margin-bottom: 2px; }
    .info-val { font-size: .875rem; font-weight: 600; color: #1e293b; }

    .sb { font-size: .72rem; font-weight: 700; padding: 3px 10px; border-radius: 50px; }
    .sb-blue   { background:#dbeafe; color:#1e40af; }
    .sb-yellow { background:#fef3c7; color:#92400e; }
    .sb-orange { background:#ffedd5; color:#c2410c; }
    .sb-green  { background:#d1fae5; color:#065f46; }
    .sb-red    { background:#fee2e2; color:#991b1b; }

    /* ── NEW MSG TOAST ───────────────────────────────────────── */
    #newMsgToast {
        display: none; position: absolute;
        bottom: 76px; left: 50%; transform: translateX(-50%);
        background: #065f46; color: white;
        padding: 7px 18px; border-radius: 50px;
        font-size: .8rem; font-weight: 600; z-index: 100;
        cursor: pointer; box-shadow: 0 4px 16px rgba(0,0,0,.25);
        animation: slideUp .25s ease;
        white-space: nowrap;
    }
    @keyframes slideUp { from{opacity:0;transform:translateX(-50%) translateY(6px)} to{opacity:1;transform:translateX(-50%) translateY(0)} }

    @media (max-width: 991px) {
        .chat-layout { flex-direction: column; height: auto; }
        .side-col { width: 100%; overflow: visible; }
        .chat-col { height: 70vh; }
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
<div class="container-fluid">

    {{-- Breadcrumb --}}
    <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
        <a href="{{ route('whatsapp.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Conversaciones
        </a>
        <span class="text-muted">/</span>
        <span class="fw-semibold">{{ $conversation->customer?->name ?? 'Cliente desconocido' }}</span>
        @php
            $stateClass = match(true) {
                $conversation->state === 'COMPLETED'   => 'sb-green',
                $conversation->state === 'CANCELLED'   => 'sb-red',
                $conversation->state === 'SEARCHING_DRIVER' => 'sb-yellow',
                in_array($conversation->state, ['DRIVER_ASSIGNED','DRIVER_EN_ROUTE','ARRIVED','IN_PROGRESS']) => 'sb-orange',
                default => 'sb-blue',
            };
        @endphp
        <span class="sb {{ $stateClass }}" id="stateBadge">
            {{ str_replace('_', ' ', $conversation->state) }}
        </span>
        @if($conversation->escalated_to_human)
            <span class="badge" style="background:#fee2e2;color:#991b1b;" id="escalateBadge">
                ⚠ Requiere atención
            </span>
        @endif
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show py-2 rounded-3">
        <i class="fas fa-check me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="chat-layout">

        {{-- ── COLUMNA CHAT ───────────────────────────────────── --}}
        <div class="chat-col">
            <div class="chat-card">

                {{-- Header --}}
                <div class="chat-head">
                    <div class="chat-head-avatar">
                        @php $photo = $conversation->customer?->profile_photo; @endphp
                        @if($photo)
                            <img src="{{ \App\Services\FileUploadService::getUrl($photo) }}"
                                 style="width:100%;height:100%;object-fit:cover;" alt="">
                        @else
                            {{ strtoupper(substr($conversation->customer?->name ?? '?', 0, 1)) }}
                        @endif
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div class="chat-head-name">{{ $conversation->customer?->name ?? 'Cliente desconocido' }}</div>
                        <div class="chat-head-phone">
                            <i class="fab fa-whatsapp me-1"></i>
                            {{ $conversation->customer?->whatsapp_number ?? $conversation->customer?->phone ?? 'Sin número' }}
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="chat-head-status">
                            <div class="status-dot" id="liveStatusDot"></div>
                            <span id="liveStatusText">En línea</span>
                        </div>
                        <button id="escalateBtn"
                                onclick="toggleEscalate({{ $conversation->id }})"
                                class="btn btn-sm"
                                style="background:rgba(255,255,255,.18);color:white;border:1px solid rgba(255,255,255,.35);"
                                title="{{ $conversation->escalated_to_human ? 'Quitar alerta' : 'Marcar como requiere atención' }}">
                            <i class="fas fa-{{ $conversation->escalated_to_human ? 'bell-slash' : 'bell' }} me-1"></i>
                            <span id="escalateBtnText">{{ $conversation->escalated_to_human ? 'Quitar alerta' : 'Alertar' }}</span>
                        </button>
                    </div>
                </div>

                {{-- Mensajes --}}
                <div class="chat-messages" id="chatMessages">
                    @forelse($conversation->messages as $msg)
                        @php
                            $isOut = in_array($msg->sender_type, ['bot','system','admin']);
                            $bubbleCls = match($msg->sender_type) {
                                'customer' => 'bubble-customer',
                                'admin'    => 'bubble-admin',
                                'system'   => 'bubble-system',
                                default    => 'bubble-bot',
                            };
                            $avatarBg = match($msg->sender_type) {
                                'customer' => '#64748b',
                                'admin'    => '#3b4fd4',
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
                        <div class="msg-row {{ $isOut ? 'out' : '' }}" data-msg-id="{{ $msg->id }}">
                            <div class="msg-avatar" style="background:{{ $avatarBg }};">{{ $avatarIcon }}</div>
                            <div>
                                <div class="bubble {{ $bubbleCls }}">{{ $msg->content }}
                                    <div class="bubble-meta">
                                        <span>{{ $msg->created_at->format('H:i') }}</span>
                                        @if($msg->sender_type === 'admin')
                                            @if($msg->status === 'read')
                                                <i class="fas fa-check-double" style="color:#86efac;"></i>
                                            @else
                                                <i class="fas fa-check" style="opacity:.6;"></i>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted my-auto py-5">
                            <i class="fab fa-whatsapp fa-3x mb-3 d-block" style="color:#25d366;opacity:.25;"></i>
                            No hay mensajes registrados.
                        </div>
                    @endforelse
                </div>

                {{-- Toast nuevo mensaje --}}
                <div id="newMsgToast" onclick="scrollToBottom(); this.style.display='none';">
                    <i class="fas fa-arrow-down me-2"></i><span id="toastText">Nuevo mensaje</span>
                </div>

                {{-- Input --}}
                <div class="chat-input-bar">
                    <div style="flex:1;display:flex;flex-direction:column;">
                        <textarea id="msgInput" rows="1"
                                  placeholder="Escribe un mensaje para enviar por WhatsApp..."
                                  maxlength="2000"
                                  oninput="onInput(this)"></textarea>
                        <div class="char-count"><span id="charCount">0</span>/2000</div>
                    </div>
                    <div class="sending-dot" id="sendingDot">
                        <div class="dot-pulse"></div><div class="dot-pulse"></div><div class="dot-pulse"></div>
                    </div>
                    <button class="btn-send" id="sendBtn" onclick="sendMessage()" disabled>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>

            </div>
        </div>

        {{-- ── SIDEBAR ─────────────────────────────────────────── --}}
        <div class="side-col d-none d-lg-flex">

            {{-- Cliente --}}
            <div class="side-card">
                <div class="side-card-header">
                    <i class="fas fa-user" style="color:#25d366;"></i> Cliente
                </div>
                <div class="side-card-body">
                    <div class="info-row">
                        <div class="info-lbl">Nombre</div>
                        <div class="info-val">{{ $conversation->customer?->name ?? '—' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-lbl">WhatsApp</div>
                        <div class="info-val" style="color:#25d366;font-family:monospace;">
                            {{ $conversation->customer?->whatsapp_number ?? '—' }}
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-lbl">Idioma</div>
                        <div class="info-val">{{ strtoupper($conversation->language ?? 'ES') }}</div>
                    </div>
                    @if($conversation->customer)
                    <a href="{{ route('edit_user', $conversation->customer->id) }}"
                       class="btn btn-sm btn-outline-secondary w-100 mt-1">
                        <i class="fas fa-external-link-alt me-1"></i>Ver perfil
                    </a>
                    @endif
                </div>
            </div>

            {{-- Conversación --}}
            <div class="side-card">
                <div class="side-card-header">
                    <i class="fas fa-info-circle" style="color:#6366f1;"></i> Conversación
                </div>
                <div class="side-card-body">
                    <div class="info-row">
                        <div class="info-lbl">Estado bot</div>
                        <span class="sb {{ $stateClass }}" id="sideStateBadge">
                            {{ str_replace('_', ' ', $conversation->state) }}
                        </span>
                    </div>
                    <div class="info-row mt-2">
                        <div class="info-lbl">Iniciada</div>
                        <div class="info-val">{{ $conversation->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-lbl">Último mensaje</div>
                        <div class="info-val" id="sideLastMsg">
                            {{ $conversation->last_message_at?->diffForHumans() ?? '—' }}
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-lbl">Mensajes</div>
                        <div class="info-val" id="sideMsgCount">{{ $conversation->messages->count() }}</div>
                    </div>
                </div>
            </div>

            {{-- Viaje --}}
            @if($conversation->trip)
            <div class="side-card">
                <div class="side-card-header">
                    <i class="fas fa-route" style="color:#f59e0b;"></i> Viaje asociado
                </div>
                <div class="side-card-body">
                    <div class="info-row">
                        <div class="info-lbl">ID</div>
                        <div class="info-val">#{{ $conversation->trip->id }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-lbl">Estado</div>
                        <div class="info-val">{{ ucfirst($conversation->trip->status) }}</div>
                    </div>
                    @if($conversation->trip->origin_address)
                    <div class="info-row">
                        <div class="info-lbl">Origen</div>
                        <div class="info-val" style="font-size:.8rem;">
                            {{ Str::limit($conversation->trip->origin_address, 45) }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            {{-- Acciones --}}
            <div class="side-card">
                <div class="side-card-header">
                    <i class="fas fa-sliders" style="color:#64748b;"></i> Acciones
                </div>
                <div class="side-card-body d-flex flex-column gap-2">
                    <button onclick="toggleEscalate({{ $conversation->id }})"
                            class="btn btn-sm btn-outline-warning w-100" id="escalateBtnSide">
                        <i class="fas fa-{{ $conversation->escalated_to_human ? 'bell-slash' : 'bell' }} me-1"></i>
                        <span id="escalateBtnSideText">{{ $conversation->escalated_to_human ? 'Quitar alerta' : 'Marcar: necesita atención' }}</span>
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

<form id="deleteForm" method="POST" style="display:none;">@csrf @method('DELETE')</form>
@endsection

@push('scripts')
<script>
const CONV_ID     = {{ $conversation->id }};
const SEND_URL    = '{{ route('whatsapp.send', $conversation->id) }}';
const POLL_URL    = '{{ route('whatsapp.live-messages', $conversation->id) }}';
const ESC_URL     = '{{ route('whatsapp.toggle-escalate', $conversation->id) }}';
const CSRF        = document.querySelector('meta[name="csrf-token"]').content;

// Último ID de mensaje conocido
let lastMsgId = {{ $conversation->messages->max('id') ?? 0 }};
let totalMsgs = {{ $conversation->messages->count() }};
let isPolling  = true;
let atBottom   = true;

const chatEl   = document.getElementById('chatMessages');
const inputEl  = document.getElementById('msgInput');
const sendBtn  = document.getElementById('sendBtn');
const charEl   = document.getElementById('charCount');

// ── Scroll ───────────────────────────────────────────────────
function scrollToBottom(smooth = true) {
    chatEl.scrollTo({ top: chatEl.scrollHeight, behavior: smooth ? 'smooth' : 'instant' });
}

chatEl.addEventListener('scroll', () => {
    atBottom = chatEl.scrollTop + chatEl.clientHeight >= chatEl.scrollHeight - 60;
    if (atBottom) document.getElementById('newMsgToast').style.display = 'none';
});

// ── Input ────────────────────────────────────────────────────
function onInput(el) {
    el.style.height = 'auto';
    el.style.height = Math.min(el.scrollHeight, 110) + 'px';
    const len = el.value.length;
    charEl.textContent = len;
    sendBtn.disabled = len === 0;
}

inputEl.addEventListener('keydown', e => {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        if (!sendBtn.disabled) sendMessage();
    }
});

// ── Burbuja HTML ─────────────────────────────────────────────
function bubbleHTML(msg, isNew) {
    const isOut = ['bot','system','admin'].includes(msg.sender_type);
    const cls   = { customer:'bubble-customer', admin:'bubble-admin', system:'bubble-system', bot:'bubble-bot' }[msg.sender_type] || 'bubble-bot';
    const bg    = { customer:'#64748b', admin:'#3b4fd4', system:'#f59e0b', bot:'#25d366' }[msg.sender_type] || '#25d366';
    const icon  = { customer:'👤', admin:'🛡', system:'⚙', bot:'🤖' }[msg.sender_type] || '🤖';
    const check = msg.sender_type === 'admin'
        ? (msg.status === 'read'
            ? '<i class="fas fa-check-double" style="color:#86efac;"></i>'
            : '<i class="fas fa-check" style="opacity:.6;"></i>')
        : '';

    return `
    <div class="msg-row ${isOut ? 'out' : ''} ${isNew ? 'msg-new' : ''}" data-msg-id="${msg.id}">
        <div class="msg-avatar" style="background:${bg};">${icon}</div>
        <div>
            <div class="bubble ${cls}">${escapeHtml(msg.content)}
                <div class="bubble-meta">
                    <span>${msg.time}</span>${check}
                </div>
            </div>
        </div>
    </div>`;
}

function escapeHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

// ── Enviar mensaje (AJAX) ────────────────────────────────────
async function sendMessage() {
    const text = inputEl.value.trim();
    if (!text) return;

    sendBtn.disabled = true;
    document.getElementById('sendingDot').classList.add('visible');

    try {
        const res = await fetch(SEND_URL, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': CSRF,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ message: text }),
        });
        const data = await res.json();

        if (data.success) {
            inputEl.value = '';
            inputEl.style.height = 'auto';
            charEl.textContent   = '0';
            lastMsgId = data.msg.id;
            totalMsgs++;
            chatEl.insertAdjacentHTML('beforeend', bubbleHTML(data.msg, true));
            scrollToBottom();
            updateSideCounts();
        } else {
            showError(data.error || 'No se pudo enviar el mensaje.');
        }
    } catch (_) {
        showError('Error de red. Intenta de nuevo.');
    } finally {
        sendBtn.disabled = inputEl.value.trim().length === 0;
        document.getElementById('sendingDot').classList.remove('visible');
    }
}

function showError(msg) {
    const el = document.createElement('div');
    el.className = 'alert alert-danger py-2 mx-3 mt-2 rounded-3';
    el.style.fontSize = '.85rem';
    el.innerHTML = `<i class="fas fa-exclamation-circle me-2"></i>${msg}`;
    document.querySelector('.chat-input-bar').before(el);
    setTimeout(() => el.remove(), 5000);
}

// ── Polling de mensajes nuevos ───────────────────────────────
async function pollMessages() {
    if (!isPolling) return;
    try {
        const res  = await fetch(`${POLL_URL}?since=${lastMsgId}`, { cache: 'no-store' });
        if (!res.ok) return;
        const data = await res.json();

        // Mensajes nuevos
        if (data.messages.length > 0) {
            data.messages.forEach(msg => {
                if (msg.id > lastMsgId) {
                    chatEl.insertAdjacentHTML('beforeend', bubbleHTML(msg, true));
                    lastMsgId = msg.id;
                    totalMsgs++;
                }
            });

            if (atBottom) {
                scrollToBottom();
            } else {
                const cnt = data.messages.length;
                const toast = document.getElementById('newMsgToast');
                document.getElementById('toastText').textContent =
                    `${cnt} mensaje${cnt > 1 ? 's' : ''} nuevo${cnt > 1 ? 's' : ''}`;
                toast.style.display = 'flex';
            }
            updateSideCounts();
        }

        // Estado de la conversación
        if (data.state) updateStateBadge(data.state);

    } catch (_) { /* silencioso */ }
}

function updateSideCounts() {
    const el = document.getElementById('sideMsgCount');
    if (el) el.textContent = totalMsgs;
    const lastMsg = document.getElementById('sideLastMsg');
    if (lastMsg) lastMsg.textContent = 'ahora mismo';
}

// ── Estado badge ─────────────────────────────────────────────
function updateStateBadge(state) {
    const map = {
        COMPLETED:'sb-green', CANCELLED:'sb-red',
        SEARCHING_DRIVER:'sb-yellow',
        DRIVER_ASSIGNED:'sb-orange', DRIVER_EN_ROUTE:'sb-orange',
        ARRIVED:'sb-orange', IN_PROGRESS:'sb-orange',
    };
    const cls = map[state] || 'sb-blue';
    const text = state.replace(/_/g, ' ');
    ['stateBadge','sideStateBadge'].forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;
        el.className = `sb ${cls}`;
        el.textContent = text;
    });
}

// ── Toggle escalate ──────────────────────────────────────────
function toggleEscalate(id) {
    fetch(ESC_URL, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': CSRF, 'Content-Type': 'application/json', 'Accept': 'application/json' },
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) return;
        const esc = data.escalated;
        const icon = esc ? 'bell-slash' : 'bell';
        document.getElementById('escalateBtnText').textContent = esc ? 'Quitar alerta' : 'Alertar';
        document.getElementById('escalateBtn').querySelector('i').className = `fas fa-${icon} me-1`;
        const side = document.getElementById('escalateBtnSide');
        if (side) {
            document.getElementById('escalateBtnSideText').textContent = esc ? 'Quitar alerta' : 'Marcar: necesita atención';
            side.querySelector('i').className = `fas fa-${icon} me-1`;
        }
        const badge = document.getElementById('escalateBadge');
        if (badge) badge.style.display = esc ? '' : 'none';
    });
}

// ── Eliminar ─────────────────────────────────────────────────
function deleteConv(id) {
    Swal.fire({
        title: '¿Eliminar conversación?',
        text: 'Se eliminarán todos los mensajes.',
        icon: 'warning', showCancelButton: true,
        confirmButtonColor: '#ef4444', cancelButtonColor: '#64748b',
        confirmButtonText: 'Sí, eliminar', cancelButtonText: 'Cancelar',
    }).then(r => {
        if (!r.isConfirmed) return;
        document.getElementById('deleteForm').action = `/admin/whatsapp/${id}`;
        document.getElementById('deleteForm').submit();
    });
}

// ── Init ─────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    scrollToBottom(false);
    setInterval(pollMessages, 3000);
});
</script>
@endpush

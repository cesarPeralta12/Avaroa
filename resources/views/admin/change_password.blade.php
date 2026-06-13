@extends('layout.master')

@section('title', 'Cambiar Contraseña')

@section('css')
<style>
    .password-page {
        min-height: calc(100vh - 120px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px 16px;
    }
    .password-card {
        width: 100%;
        max-width: 480px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,.12);
        overflow: hidden;
    }
    .password-card-header {
        background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
        padding: 32px 36px 28px;
        text-align: center;
        color: #fff;
    }
    .password-card-header .lock-icon {
        width: 64px;
        height: 64px;
        background: rgba(255,255,255,.15);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-size: 1.8rem;
    }
    .password-card-header h4 {
        font-weight: 700;
        margin-bottom: 6px;
        font-size: 1.3rem;
    }
    .password-card-header p {
        opacity: .7;
        font-size: .85rem;
        margin: 0;
    }
    .password-card-body {
        padding: 32px 36px;
    }
    .field-label {
        font-size: .75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: #64748b;
        margin-bottom: 8px;
    }
    .input-password-wrap {
        position: relative;
    }
    .input-password-wrap .form-control {
        padding-right: 44px;
        border-radius: 10px;
        border: 1.5px solid #e2e8f0;
        transition: border-color .2s, box-shadow .2s;
    }
    .input-password-wrap .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,.15);
    }
    .input-password-wrap .toggle-eye {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        cursor: pointer;
        font-size: .95rem;
        transition: color .2s;
        background: none;
        border: none;
        padding: 0;
    }
    .input-password-wrap .toggle-eye:hover { color: #6366f1; }

    .divider-hint {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 20px 0;
        color: #94a3b8;
        font-size: .75rem;
    }
    .divider-hint::before,
    .divider-hint::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e2e8f0;
    }

    .btn-update-password {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 13px;
        border-radius: 12px;
        font-size: 1rem;
        width: 100%;
        transition: all .25s;
    }
    .btn-update-password:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99,102,241,.4);
    }
    .btn-update-password:active { transform: translateY(0); }

    .strength-bar {
        height: 4px;
        border-radius: 4px;
        background: #e2e8f0;
        margin-top: 8px;
        overflow: hidden;
    }
    .strength-fill {
        height: 100%;
        border-radius: 4px;
        transition: width .3s, background .3s;
        width: 0%;
    }
    .strength-label {
        font-size: .72rem;
        margin-top: 4px;
        color: #94a3b8;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="password-page">
        <div class="password-card">

            {{-- Header --}}
            <div class="password-card-header">
                <div class="lock-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h4>Cambiar contraseña</h4>
                <p>Ingresa tu contraseña actual y elige una nueva segura.</p>
            </div>

            {{-- Body --}}
            <div class="password-card-body">

                @if(session('success'))
                <div class="alert alert-success d-flex align-items-center gap-2 rounded-3 mb-4" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                @if(session('fail'))
                <div class="alert alert-danger d-flex align-items-center gap-2 rounded-3 mb-4" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('fail') }}</span>
                </div>
                @endif

                <form action="{{ route('update_password') }}" method="POST" id="pwdForm">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user_session->id }}">

                    {{-- Contraseña actual --}}
                    <div class="mb-4">
                        <div class="field-label">Contraseña actual</div>
                        <div class="input-password-wrap">
                            <input type="password" name="old_password" id="old_password"
                                class="form-control @error('old_password') is-invalid @enderror"
                                placeholder="Tu contraseña actual" autocomplete="current-password">
                            <button type="button" class="toggle-eye" onclick="toggleField('old_password', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('old_password')
                            <div class="text-danger mt-1" style="font-size:.8rem"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="divider-hint">Nueva contraseña</div>

                    {{-- Nueva contraseña --}}
                    <div class="mb-3">
                        <div class="field-label">Nueva contraseña</div>
                        <div class="input-password-wrap">
                            <input type="password" name="new_password" id="new_password"
                                class="form-control @error('new_password') is-invalid @enderror"
                                placeholder="Mínimo 6 caracteres" autocomplete="new-password"
                                oninput="updateStrength(this.value)">
                            <button type="button" class="toggle-eye" onclick="toggleField('new_password', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                        <div class="strength-label" id="strengthLabel">Ingresa una contraseña</div>
                        @error('new_password')
                            <div class="text-danger mt-1" style="font-size:.8rem"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirmar --}}
                    <div class="mb-4">
                        <div class="field-label">Confirmar nueva contraseña</div>
                        <div class="input-password-wrap">
                            <input type="password" name="confirm_password" id="confirm_password"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                placeholder="Repite la nueva contraseña" autocomplete="new-password">
                            <button type="button" class="toggle-eye" onclick="toggleField('confirm_password', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('confirm_password')
                            <div class="text-danger mt-1" style="font-size:.8rem"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-update-password">
                        <i class="fas fa-save me-2"></i>Actualizar contraseña
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleField(id, btn) {
    const input = document.getElementById(id);
    const icon  = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

function updateStrength(val) {
    const fill  = document.getElementById('strengthFill');
    const label = document.getElementById('strengthLabel');
    let score = 0;
    if (val.length >= 6)  score++;
    if (val.length >= 10) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;

    const levels = [
        { w: '0%',   color: '#e2e8f0', text: 'Ingresa una contraseña' },
        { w: '20%',  color: '#ef4444', text: 'Muy débil' },
        { w: '40%',  color: '#f97316', text: 'Débil' },
        { w: '60%',  color: '#eab308', text: 'Regular' },
        { w: '80%',  color: '#22c55e', text: 'Buena' },
        { w: '100%', color: '#10b981', text: 'Muy segura' },
    ];
    const lvl = val.length === 0 ? 0 : Math.min(score, 5);
    fill.style.width      = levels[lvl].w;
    fill.style.background = levels[lvl].color;
    label.textContent     = levels[lvl].text;
    label.style.color     = levels[lvl].color === '#e2e8f0' ? '#94a3b8' : levels[lvl].color;
}
</script>
@endpush

@extends('layout.master')
@section('title', 'Editar Perfil')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #f0f2f5;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .profile-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Main Card */
    .profile-card {
        background: var(--av-card-bg, #ffffff);
        border-radius: 24px;
        border: 1px solid var(--av-border, rgba(0,0,0,0.07));
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .profile-card:hover {
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
    }

    /* Header */
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px 30px;
        text-align: center;
        position: relative;
    }

    .profile-header h3 {
        color: white;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .profile-header p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 14px;
    }

    /* Avatar Section */
    .avatar-section {
        margin-top: -50px;
        position: relative;
        z-index: 2;
        text-align: center;
        padding-bottom: 20px;
    }

    .avatar-wrapper {
        position: relative;
        width: 120px;
        height: 120px;
        margin: 0 auto;
        cursor: pointer;
    }

    .avatar-wrapper img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        transition: all 0.3s;
    }

    .avatar-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s;
        border: 4px solid white;
    }

    .avatar-overlay i {
        color: white;
        font-size: 32px;
    }

    .avatar-wrapper:hover .avatar-overlay {
        opacity: 1;
    }

    .avatar-wrapper:hover img {
        transform: scale(1.05);
    }

    .avatar-hint {
        font-size: 12px;
        color: #6c757d;
        margin-top: 10px;
    }

    /* Form Body */
    .profile-body {
        padding: 20px 40px 40px;
        background: var(--av-card-bg, #ffffff);
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 24px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--av-text, #2d3748);
        font-size: 14px;
    }

    .form-label i {
        margin-right: 8px;
        color: #667eea;
    }

    .input-group {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid var(--av-border, #e2e8f0);
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.2s;
        background: var(--av-surface, #f8fafc);
        color: var(--av-text, #1a1d23);
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        background: var(--av-card-bg, white);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
        color: var(--av-text, #1a1d23);
    }

    /* Alerts */
    .alert {
        padding: 14px 18px;
        border-radius: 12px;
        margin-bottom: 24px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: #e8f5e9;
        border-left: 4px solid #4caf50;
        color: #2e7d32;
    }

    .alert-danger {
        background: #ffebee;
        border-left: 4px solid #f44336;
        color: #c62828;
    }

    /* Divider */
    .divider {
        margin: 32px 0 24px;
        position: relative;
        text-align: center;
    }

    .divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(to right, transparent, var(--av-border, #e2e8f0), transparent);
    }

    .divider span {
        background: var(--av-card-bg, white);
        padding: 0 16px;
        position: relative;
        color: var(--av-text-muted, #a0aec0);
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Password Strength */
    .password-strength {
        margin-top: 8px;
    }

    .strength-bar-container {
        height: 4px;
        background: #e2e8f0;
        border-radius: 2px;
        overflow: hidden;
        margin-bottom: 6px;
    }

    .strength-bar {
        height: 100%;
        width: 0;
        transition: width 0.3s;
    }

    .strength-text {
        font-size: 11px;
        margin-top: 4px;
    }

    .match-status {
        font-size: 12px;
        margin-top: 6px;
    }

    /* Error Messages */
    .error-message {
        color: #f44336;
        font-size: 12px;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Buttons */
    .btn-update {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 16px;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.35);
    }

    .btn-update:active {
        transform: translateY(0);
    }

    .btn-update:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    /* Row Layout */
    .row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    /* Responsive */
    @media (max-width: 640px) {
        .profile-body {
            padding: 20px;
        }
        
        .row {
            grid-template-columns: 1fr;
            gap: 0;
        }
    }
</style>
@endsection

@section('main_content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <h3>Editar Perfil</h3>
            <p>Mantén tu información actualizada</p>
        </div>

        <!-- ✅ MOVE AVATAR INSIDE FORM -->
    <div class="avatar-section">
        <label class="avatar-wrapper">
            <input type="file" name="profile_photo" id="profilePhoto"
                   accept="image/png, image/jpeg, image/jpg"
                   onchange="previewImage(this)" style="display: none;">

            @if(!empty($user_session->profile_photo) && file_exists(public_path('profile_photo/' . $user_session->profile_photo)))
                <img src="{{ asset('profile_photo/' . $user_session->profile_photo) }}" id="imagePreview">
            @else
                <img src="{{ asset('images/profile photo.png') }}" id="imagePreview">
            @endif

            <div class="avatar-overlay">
                <i class="fas fa-camera"></i>
            </div>
        </label>
    </div>

        <div class="profile-body">
            <form action="{{ route('update_profile') }}" method="post" enctype="multipart/form-data" id="profileForm">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_session->id }}">

                <!-- Alert Messages -->
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle" style="font-size: 18px;"></i>
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle" style="font-size: 18px;"></i>
                        {{ Session::get('fail') }}
                    </div>
                @endif

                <div class="row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user"></i> Nombre Completo
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" 
                                   value="{{ old('name', $user_session->name) }}" 
                                   placeholder="Tu nombre completo">
                        </div>
                        @error('name')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i> Correo Electrónico
                        </label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" 
                                   value="{{ old('email', $user_session->email) }}" 
                                   placeholder="ejemplo@correo.com">
                        </div>
                        @error('email')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="divider">
                    <span>Seguridad</span>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i> Nueva Contraseña
                        </label>
                        <input type="password" class="form-control" name="password" 
                               id="password" placeholder="Ingrese nueva contraseña"
                               onkeyup="checkStrength(this.value)">
                        <div class="password-strength">
                            <div class="strength-bar-container">
                                <div class="strength-bar" id="strengthBar"></div>
                            </div>
                            <div class="strength-text" id="strengthText"></div>
                        </div>
                        @error('password')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-check-circle"></i> Confirmar Contraseña
                        </label>
                        <input type="password" class="form-control" name="password_confirmation" 
                               id="passwordConfirmation" placeholder="Confirme su contraseña"
                               onkeyup="checkMatch()">
                        <div class="match-status" id="matchMessage"></div>
                    </div>
                </div>

                <button type="submit" class="btn-update" id="submitBtn">
                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                    Actualizar Perfil
                </button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Image preview
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const file = input.files[0];

    if (!file) return;

    if (file.size > 2 * 1024 * 1024) {
        Swal.fire('Error', 'Máximo 2MB permitido', 'error');
        input.value = '';
        return;
    }

    const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!validTypes.includes(file.type)) {
        Swal.fire('Error', 'Solo PNG/JPG permitido', 'error');
        input.value = '';
        return;
    }

    const reader = new FileReader();
    reader.onload = e => preview.src = e.target.result;
    reader.readAsDataURL(file);
}

// AJAX Submit
document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let form = this;
    let formData = new FormData(form);
    let btn = document.getElementById('submitBtn');

    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Guardando...';

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        btn.disabled = false;
        btn.innerHTML = 'Actualizar Perfil';

        if (data.status) {
            Swal.fire({
                icon: 'success',
                title: 'Perfil actualizado',
                text: data.message,
                confirmButtonColor: '#667eea'
            }).then(() => {
                location.reload(); // refresh to show new image
            });

        } else {
            let errorText = '';

            if (data.errors) {
                Object.values(data.errors).forEach(err => {
                    errorText += err[0] + '<br>';
                });
            } else {
                errorText = data.message;
            }

            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: errorText
            });
        }
    })
    .catch(() => {
        btn.disabled = false;
        btn.innerHTML = 'Actualizar Perfil';

        Swal.fire('Error', 'Server error', 'error');
    });
});
</script>
@endsection


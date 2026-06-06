@extends('layout.master')
@section('title')
    Agregar Inspector
@endsection

@section('main_content')
<div class="container" style="margin-top: 50px">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/save_user') }}" method="post">
                @csrf

                {{-- Success and Error Messages --}}
                @if (session()->has('success'))
                    <div class="alert alert-success" style="background-color: green;">
                        <p style="color: #fff;">{{ session()->get('success') }}</p>
                    </div>
                @endif
                @if (session()->has('fail'))
                    <div class="alert alert-danger" style="background-color: red;">
                        <p style="color: #fff;">{{ session()->get('fail') }}</p>
                    </div>
                @endif

                {{-- NOMBRE & APELLIDO --}}
                <div class="row mb-3 pt-3 ps-3">
                    <div class="col-md-12 mb-3">
                        <label for="nombre" class="form-label text-secondary">Nombre</label>
                        <input type="text"
                               class="form-control @error('first_name') is-invalid @enderror"
                               name="first_name"
                               id="nombre"
                               placeholder="Nombre"
                               value="{{ old('first_name') }}"
                               aria-label="Nombre">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                {{-- EMAIL --}}
                <div class="row mb-3 ps-3">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label text-secondary">Email</label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               id="email"
                               placeholder="ejemplo@gmail.com"
                               value="{{ old('email') }}"
                               aria-label="Email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="celular" class="form-label text-secondary">Número de WhatsApp</label>
                        <input type="text"
                               class="form-control @error('mobile_number') is-invalid @enderror"
                               name="mobile_number"
                               id="celular"
                               placeholder="+591"
                               value="{{ old('mobile_number') }}"
                               aria-label="Celular">
                        @error('mobile_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                {{-- CONTRASEÑA --}}
                <div class="row mb-3 ps-3">
                    <div class="col-md-6 mb-3">
                        <label for="contrasena" class="form-label text-secondary">Contraseña</label>
                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="contrasena"
                               placeholder="xxxxxxxxxxxxx"
                               aria-label="Contraseña">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="confirmContrasena" class="form-label text-secondary">Repetir Contraseña</label>
                        <input type="password"
                               name="confirm_password"
                               class="form-control @error('confirm_password') is-invalid @enderror"
                               id="confirmContrasena"
                               placeholder="xxxxxxxxxxxxx"
                               aria-label="Repetir contraseña">
                        @error('confirm_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- ACTIVO --}}
                <div class="col-sm-6 mb-3 ps-3">
                    <label class="col-form-label text-secondary">Activo</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                               type="radio"
                               id="statusYes"
                               name="status"
                               value="1"
                               {{ old('status', 1) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="statusYes">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                               type="radio"
                               id="statusNo"
                               name="status"
                               value="0"
                               {{ old('status') == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="statusNo">No</label>
                    </div>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- SUBMIT --}}
                <div class="d-grid mb-3 ps-3">
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

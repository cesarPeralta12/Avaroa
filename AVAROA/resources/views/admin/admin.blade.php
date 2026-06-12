@extends('others.others_layout.master')

@section('title')
Inicio de Sesión de Administrador
@endsection

@section('others_content')
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
    @endphp
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card" style="background: #10101C;">
                    <div>

                        <div class="login-main" style="background: #10101C;">
                            <form class="theme-form" action="{{ url('admin/log') }}" method="post">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <p class="text-dark">{{ session::get('success') }}</p>
                                    </div>
                                @endif
                                @if (Session::has('fail'))
                                    <div class="alert alert-danger">
                                        <p class="text-dark">{{ session::get('fail') }}</p>
                                    </div>
                                @endif

                                @csrf
                                <div class="col-md-12 text-center">
                                    <a href="{{ url('/') }}">
                                        <img
                                            src="<?php echo '/' . $general_setting['app_logo'] ?? ''; ?>"
                                            width="200px"
                                            height="200px"
                                            alt="Footer Payment Image">
                                    </a>
                                </div>


                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" name="email" placeholder="Test@gmail.com">
                                    <p class="text-danger" style="color: red">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input
                                            class="form-control"
                                            type="password"
                                            name="password"
                                            placeholder="*********"
                                            id="password"
                                        >
                                        <div class="show-hide" onclick="togglePassword()">
                                            <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                        </div>
                                        <p class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <a class="link pull-right" style="position: sticky;margin-bottom:15px" href="{{ route('forget_password') }}">Forgot password?</a>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                    </div>
                                </div>

                                <script>
                                    function togglePassword() {
                                        const passwordInput = document.getElementById("password");
                                        const toggleIcon = document.getElementById("togglePasswordIcon");
                                        const isPasswordHidden = passwordInput.type === "password";

                                        if (isPasswordHidden) {
                                            passwordInput.type = "text";
                                            toggleIcon.classList.remove("fa-eye");
                                            toggleIcon.classList.add("fa-eye-slash");
                                        } else {
                                            passwordInput.type = "password";
                                            toggleIcon.classList.remove("fa-eye-slash");
                                            toggleIcon.classList.add("fa-eye");
                                        }
                                    }
                                </script>




                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


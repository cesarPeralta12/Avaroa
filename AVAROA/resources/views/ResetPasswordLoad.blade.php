@extends('others.others_layout.master')

@section('title')
Reset Your Password
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

                        <div class="login-main">
                            <form class="theme-form" action="{{ url('ResetPassword') }}" method="post">
                                @csrf
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <p>{{ session::get('success') }}</p>
                                    </div>
                                @endif
                                @if (Session::has('fail'))
                                    <div class="alert alert-danger">
                                        <p>{{ session::get('fail') }}</p>
                                    </div>
                                @endif
                                <input type="hidden" name="email" value="{{$email}}">

                                <div class="col-md-12 text-center">
                                    <a href="{{ url('/') }}">
                                        <img
                                            src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>"
                                            width="200px"
                                            height="200px"
                                            alt="Footer Payment Image">
                                    </a>
                                </div>
                                <h6 class="mt-4 text-center">Create Your Password</h6>


                                <script>
                                    function togglePassword(inputId, iconId) {
                                        const passwordInput = document.getElementById(inputId);
                                        const toggleIcon = document.getElementById(iconId);
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

                                <div class="form-group">
                                    <label class="col-form-label">New Password</label>
                                    <div class="form-input position-relative">
                                        <input
                                            class="form-control"
                                            type="password"
                                            name="new_password"
                                            placeholder="*********"
                                            id="newPassword"
                                        >
                                        <div class="show-hide" onclick="togglePassword('newPassword', 'toggleNewPasswordIcon')">
                                            <i class="fa fa-eye" id="toggleNewPasswordIcon"></i>
                                        </div>
                                        <p class="text-danger">
                                            @error('new_password')
                                                {{ $message }}
                                            @enderror
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Retype Password</label>
                                    <div class="form-input position-relative">
                                        <input
                                            class="form-control"
                                            type="password"
                                            name="confirm_password"
                                            placeholder="*********"
                                            id="confirmPassword"
                                        >
                                        <div class="show-hide" onclick="togglePassword('confirmPassword', 'toggleConfirmPasswordIcon')">
                                            <i class="fa fa-eye" id="toggleConfirmPasswordIcon"></i>
                                        </div>
                                        <p class="text-danger">
                                            @error('confirm_password')
                                                {{ $message }}
                                            @enderror
                                        </p>
                                    </div>
                                </div>



                                <div class="form-group mb-0">

                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('others_script')
    @endsection

@extends('others.others_layout.master')

@section('title')
Recuperar contraseña
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
                            <form class="theme-form" action="{{ url('sendResetPasswordLink') }}" method="post">
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
                                            src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>"
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

                                <div class="form-group mb-0">

                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Forgot password</button>
                                    </div>
                                    <p class="mt-4 mb-0 text-center">Already have an password?<a class="ms-2" href="{{ url('admin/login') }}">Sign in</a></p>
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

@extends('master')

@section('title', 'Sign In - F Standard')

@section('content')
<style>
    :root {
        --primary: #f89c10;
        --primary-dark: #e07a00;
        --gradient: linear-gradient(135deg, #f89c10 0%, #ff9f1c 100%);
        --light: #fff8e1;
    }

    .auth-container {
        min-height: 100vh;
        background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%);
        display: flex;
        align-items: center;
        padding: 40px 0;
    }

    .auth-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(248, 156, 16, 0.15);
        max-width: 520px;
        margin: 0 auto;
    }

    .auth-header {
        background: var(--gradient);
        color: white;
        padding: 40px 30px;
        text-align: center;
    }

    .auth-header h3 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .auth-body { padding: 40px 35px; }

    .step { display: none; animation: fadeIn 0.6s ease-in-out; }
    .step.active { display: block; }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-control {
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 1.05rem;
        border: 2px solid #e0e0e0;
        transition: all 0.3s;
    }
    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(248, 156, 16, 0.15);
    }

    .btn-primary {
        background: var(--gradient);
        border: none;
        border-radius: 50px;
        padding: 14px 30px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s;
    }
    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(248,156,16,0.4);
    }

    .otp-input {
        width: 50px !important;
        height: 60px;
        text-align: center;
        font-size: 1.6rem;
        font-weight: bold;
        border-radius: 12px;
        border: 2px solid #e0e0e0;
    }
    .otp-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(248, 156, 16, 0.2);
    }

    .progress-steps {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }
    .step-indicator {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e0e0e0;
        color: #999;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin: 0 10px;
        transition: all 0.4s;
    }
    .step-indicator.active {
        background: var(--gradient);
        color: white;
        transform: scale(1.15);
    }
    .step-indicator.completed {
        background: var(--primary);
        color: white;
    }

    .resend-link {
        color: var(--primary);
        font-weight: 600;
        text-decoration: underline;
    }
</style>

<section class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="auth-card">
                    <div class="auth-header">
                        <h3>Sign In to Your Account</h3>
                        <p>Join thousands of successful traders with F Standard</p>
                    </div>

                    <div class="auth-body pt-4">
                        <div class="progress-steps">
                            <div class="step-indicator active" data-step="1">1</div>
                            <div class="step-indicator" data-step="2">2</div>
                        </div>

                        <form id="loginForm">
                            <!-- Step 1: Mobile Number -->
                            <div class="step active" id="step1">
                                <h4 class="text-center mb-4">Enter Your Mobile Number</h4>
                                <p class="text-center text-muted mb-4">We will send you a one-time verification code</p>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Mobile Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">+91</span>
                                        <input type="text" name="mobile" class="form-control border-start-0 ps-0"
                                               placeholder="Enter 10-digit number" maxlength="10"
                                               inputmode="numeric" autocomplete="off">
                                    </div>
                                    <small class="text-muted d-block mt-2">
                                        Test with: <strong>9876543210</strong> → Real OTP will be sent
                                    </small>
                                </div>

                                <button type="button" class="btn btn-primary w-100 btn-lg" id="sendOtpBtn">
                                    Send OTP
                                </button>
                            </div>

                            <!-- Step 2: Verify OTP -->
                            <div class="step" id="step2">
                                <h4 class="text-center mb-3">Enter Verification Code</h4>
                                <p class="text-center text-muted mb-4">
                                    We sent a 6-digit code to <strong id="maskedMobile"></strong>
                                </p>

                                <div class="d-flex justify-content-center gap-3 mb-4">
                                    <input type="text" class="otp-input" maxlength="1">
                                    <input type="text" class="otp-input" maxlength="1">
                                    <input type="text" class="otp-input" maxlength="1">
                                    <input type="text" class="otp-input" maxlength="1">
                                    <input type="text" class="otp-input" maxlength="1">
                                    <input type="text" class="otp-input" maxlength="1">
                                </div>

                                <div class="text-center mb-4">
                                    <span class="text-muted">Didn't receive code?</span>
                                    <a href="#" class="resend-link ms-1" id="resendOtp">Resend OTP</a>
                                    <span id="timer" class="ms-2 text-primary fw-bold"></span>
                                </div>

                                <button type="button" class="btn btn-primary w-100 btn-lg" id="verifyOtpBtn">
                                    Verify & Sign In
                                </button>
                            </div>
                        </form>

                        <hr class="my-4">
                        <p class="text-center mb-0">
                            Don't have an account?
                            <a href="{{ url('signup') }}" class="fw-bold text-primary">Create one here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script>
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$(document).ready(function() {
    toastr.options = {
        positionClass: "toast-top-right",
        timeOut: 5000,
        progressBar: true
    };

    let mobileNumber = '';
    let otpTimer;

    function updateStep(step) {
        $('.step-indicator').removeClass('active completed');
        for (let i = 1; i <= step; i++) {
            $(`.step-indicator[data-step="${i}"]`).addClass(i === step ? 'active' : 'completed');
        }
    }

    // Auto-move between OTP boxes
    $('.otp-input').on('input', function() {
        if (this.value.length === 1) {
            $(this).next('.otp-input').focus();
        }
        if (this.value === '' && event.inputType === 'deleteContentBackward') {
            $(this).prev('.otp-input').focus();
        }
    });

    // Send OTP
    $('#sendOtpBtn').on('click', function() {
        const mobile = $('input[name="mobile"]').val().trim();

        if (!/^\d{10}$/.test(mobile)) {
            toastr.error('Please enter a valid 10-digit mobile number');
            return;
        }

        const $btn = $(this).prop('disabled', true)
            .html('<span class="spinner-border spinner-border-sm"></span> Sending...');

        $.post("/send-login-otp", { mobile: mobile })
            .done(function(res) {
                if (res.success) {
                    mobileNumber = mobile;
                    $('#maskedMobile').text('+91 ' + mobile.replace(/(\d{3})(\d{3})(\d{4})/, '$1***$3'));
                    $('.step').removeClass('active');
                    $('#step2').addClass('active');
                    updateStep(2);
                    startTimer(60);
                    toastr.success(res.message || 'OTP sent successfully!');
                } else {
                    toastr.error(res.message || 'Failed to send OTP');
                }
            })
            .fail(() => toastr.error('Network error. Try again.'))
            .always(() => $btn.prop('disabled', false).html('Send OTP'));
    });

    // Resend
    $('#resendOtp').on('click', function(e) {
        e.preventDefault();
        $('#sendOtpBtn').click();
    });

    function startTimer(seconds) {
        clearInterval(otpTimer);
        const update = () => {
            if (seconds <= 0) {
                clearInterval(otpTimer);
                $('#timer').text('');
                return;
            }
            $('#timer').text(`(${seconds}s)`);
            seconds--;
        };
        update();
        otpTimer = setInterval(update, 1000);
    }

    // Verify OTP
    $('#verifyOtpBtn').on('click', function() {
        const otp = $('.otp-input').map((i, el) => el.value).get().join('');

        if (otp.length !== 6 || !/^\d+$/.test(otp)) {
            toastr.error('Please enter valid 6-digit OTP');
            return;
        }

        $.post("/verify-login-otp", { mobile: mobileNumber, otp: otp })
            .done(function(res) {
                if (res.success) {
                    toastr.success('Login successful! Redirecting...');
                    setTimeout(() => {
                        window.location.href = res.redirect || '/overview';
                    }, 1200);
                } else {
                    toastr.error(res.message || 'Invalid OTP');
                }
            })
            .fail(() => toastr.error('Server error'));
    });

    // Optional: Auto-read OTP from SMS on Android (future-proof)
    window.receiveOtp = function(otp) {
        if (/^\d{6}$/.test(otp)) {
            $('.otp-input').each((i, el) => $(el).val(otp[i]));
            toastr.success('OTP auto-filled!');
            $('#verifyOtpBtn').click();
        }
    };
});
</script>
@endsection

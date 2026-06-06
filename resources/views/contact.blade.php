@extends('master')

@section('title', __('Contact'))

@section('content')
<!-- Make sure your master layout includes the <head> and loads Bootstrap; meta csrf included below to be safe -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    :root { --primary: #f89c10; --dark: #1e293b; --light: #f8fafc; }
    body { background: #f8fafc; }
    .pages-hero { background: var(--primary); padding: 60px 0; text-align: center; color: #fff; border-bottom-left-radius: 18px; border-bottom-right-radius: 18px; }
    .pages-hero h1 { font-size: 42px; font-weight: 700; }
    .contact-wrapper { padding: 40px 0; }
    .cw-box { background: #fff; padding: 30px; text-align: center; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); transition: .3s; }
    .cw-box:hover { transform: translateY(-5px); box-shadow: 0 6px 24px rgba(0,0,0,0.12); }
    .cw-icon { font-size: 45px; color: var(--primary); margin-bottom: 15px; }
    .custom-form, .message-form { border-radius: 12px; border: 1px solid #ddd; padding: 12px 15px; font-size: 15px; }
    .custom-form:focus, .message-form:focus { border-color: var(--primary); box-shadow: 0 0 5px rgba(248,156,16,0.4); }
    .btn-primary-custom { background: var(--primary); color: #fff; padding: 12px 25px; border-radius: 30px; font-weight: 600; border: none; transition: .3s; }
    .btn-primary-custom:hover { background: #d8850e; }
</style>

<!-- HERO -->
<div class="pages-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We’re here to assist you</p>
    </div>
</div>

<section>
    <!-- CONTACT BOXES -->
    <div class="contact-wrapper mb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="cw-box">
                        <div class="cw-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <p class="fw-bold">837 Castle Hill Ave, Bronx NY 33195</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="cw-box">
                        <div class="cw-icon"><i class="fa-solid fa-phone"></i></div>
                        <p class="fw-bold"><a href="tel:7188253320">+1 718-825-3320</a></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="cw-box">
                        <div class="cw-icon"><i class="fa-solid fa-envelope"></i></div>
                        <p class="fw-bold"><a href="mailto:info@industric.com">info@industric.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">Send Us a Message</h3>
                    <p>Feel free to reach out for any queries, support, or business assistance.</p>
                </div>

                <!-- IMPORTANT: id must match the JS selector below -->
                <form id="contact-form" method="POST" action="{{ url('contact_send') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <input type="text" name="name" id="name" class="form-control custom-form" placeholder="Your Name *" required>
                        </div>

                        <div class="col-sm-6">
                            <input type="email" name="email" id="email" class="form-control custom-form" placeholder="Email Address *" required>
                        </div>

                        <div class="col-sm-12">
                            <input type="tel" name="phone" id="phone" class="form-control custom-form" placeholder="Phone">
                        </div>

                        <div class="col-sm-12">
                            <textarea name="message" id="message" class="form-control message-form" rows="6" placeholder="Your Message *" required></textarea>
                        </div>

                        <div class="col-sm-12 text-center mt-3">
                            <button type="submit" class="btn-primary-custom" id="submitBtn">Send Message</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</section>

<!-- SCRIPTS: jQuery first, then SweetAlert, then our AJAX -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    // Set X-CSRF-TOKEN header for all AJAX requests
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // Bind to the correct form id
    $("#contact-form").on("submit", function (e) {
        e.preventDefault();

        let $btn = $("#submitBtn");
        $btn.prop("disabled", true).text("Sending...");

        // Use FormData so file uploads (if any) can be added later
        let formElement = this;
        let formData = new FormData(formElement);

        $.ajax({
            url: $(formElement).attr('action'),
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,

            success: function (res) {
                // Expect JSON { status: 'success', message: '...' }
                if (res.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Message Sent!',
                        text: res.message || 'Your message has been sent successfully.',
                        confirmButtonColor: '#f89c10'
                    });
                    formElement.reset();
                } else {
                    // fallback
                    Swal.fire({
                        icon: 'info',
                        title: 'Notice',
                        text: res.message || 'Response received.',
                        confirmButtonColor: '#f89c10'
                    });
                }
                $btn.prop("disabled", false).text("Send Message");
            },

            error: function (xhr) {
                $btn.prop("disabled", false).text("Send Message");

                if (xhr.status === 422) {
                    // Validation errors - show first error or all combined
                    let errors = xhr.responseJSON && xhr.responseJSON.errors ? xhr.responseJSON.errors : null;
                    let messages = [];
                    if (errors) {
                        Object.keys(errors).forEach(function (k) {
                            messages.push(errors[k].join(' '));
                        });
                    }
                    Swal.fire({
                        icon: 'warning',
                        title: 'Validation Error',
                        html: (messages.length ? messages.join('<br>') : 'Please check your input.'),
                        confirmButtonColor: '#f89c10'
                    });
                } else {
                    // Generic error
                    let msg = 'Unable to send your message. Please try again later.';
                    if (xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: msg,
                        confirmButtonColor: '#f89c10'
                    });
                }
            }
        });
    });
});
</script>

@endsection

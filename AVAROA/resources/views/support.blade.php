@extends('user-master')
@section('title', 'Support')

@section('content')
<h2 class="mb-4 text-white fw-bold">Get Support</h2>
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card p-4">
            <h5 class="text-white mb-4">Send us a message</h5>
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="Subject">
                </div>
                <div class="mb-3">
                    <textarea class="form-control bg-dark border-secondary text-white" rows="6" placeholder="Your message..."></textarea>
                </div>
                <button class="btn btn-primary-custom px-4 py-2">Send Message</button>
            </form>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card p-4">
            <h6 class="text-white">Email</h6><p class="text-muted">support@yourdomain.com</p>
            <h6 class="text-white">Live Chat</h6><p class="text-muted">Available 24/7</p>
            <h6 class="text-white">Telegram</h6><p class="text-muted">@your_support</p>
        </div>
    </div>
</div>
@endsection

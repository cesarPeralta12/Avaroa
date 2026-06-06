@extends('master')

@section('title', __('FAQ'))

<style>
    :root {
        --primary: #7c3aed;
        --primary-dark: #6d28d9;
        --primary-light: #8b5cf6;
        --secondary: #f59e0b;
        --accent: #10b981;
        --dark: #1e293b;
        --light: #f8fafc;
        --gradient: linear-gradient(135deg, #7c3aed 0%, #4f46e5 100%);
    }

    .faq-hero {
        background: radial-gradient(circle at 20% 80%, rgba(124,58,237,0.08) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(245,158,11,0.05) 0%, transparent 50%),
                    linear-gradient(135deg, rgba(124,58,237,0.03) 0%, rgba(79,70,229,0.03) 100%);
        padding: 100px 0 60px;
        text-align: center;
    }

    .section-title {
        font-weight: 900;
        font-size: 3rem;
        background: linear-gradient(135deg, #1e293b 0%, #7c3aed 50%, #f59e0b 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        position: relative;
        margin-bottom: 1rem;
    }

    .section-title::after {
        content: '';
        width: 90px;
        height: 4px;
        background: var(--gradient);
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: #64748b;
        max-width: 650px;
        margin: 0 auto;
    }

    /* FAQ Cards */
    .faq-card {
        background: white;
        border-radius: 20px;
        padding: 0;
        margin-bottom: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border: 1px solid #f1f5f9;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-header {
        padding: 22px 25px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark);
    }

    .faq-body {
        padding: 0 25px;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
        background: white;
    }

    .faq-card.active .faq-body {
        padding: 0 25px 25px;
        max-height: 1000px;
    }

    .faq-content {
        margin-top: 18px;
        color: #475569;
        line-height: 1.7;
    }

    .faq-icon {
        transition: 0.3s;
        color: var(--primary);
    }

    .faq-card.active .faq-icon {
        transform: rotate(180deg);
        color: var(--secondary);
    }

    /* Contact Box */
    .cta-section {
        background: var(--gradient);
        padding: 70px 30px;
        border-radius: 26px;
        margin: 70px auto;
        text-align: center;
        color: white;
        box-shadow: 0 25px 50px rgba(124,58,237,0.25);
    }

    .btn-light {
        background: white;
        color: var(--primary);
        padding: 14px 32px;
        border-radius: 14px;
        font-weight: 700;
        border: none;
        font-size: 1.1rem;
    }
</style>

@section('content')

<section class="faq-hero">
    <div class="container">
        <h1 class="section-title">Frequently Asked Questions</h1>
        <p class="hero-subtitle">
            Get answers to the most commonly asked questions about our funded trader program.
        </p>
    </div>
</section>

<section class="faq-section py-5">
    <div class="container">

        @forelse($faq as $item)
        <div class="faq-card">
            <div class="faq-header" onclick="toggleFaq(this)">
                {{ $item->question }}
                <i class="fas fa-chevron-down faq-icon"></i>
            </div>

            <div class="faq-body">
                <div class="faq-content">{!! nl2br(e($item->answer)) !!}</div>
            </div>
        </div>
        @empty

        <div class="text-center py-5">
            <h3>No FAQs Available</h3>
            <p>We're updating our FAQ section.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Contact Support</a>
        </div>

        @endforelse

        <!-- Contact CTA -->
        <div class="cta-section">
            <h2>Still Have Questions?</h2>
            <p>Our support team is here 24/7 to help you.</p>
            <a href="{{ route('contact') }}" class="btn btn-light">
                Contact Support Team
            </a>
        </div>

    </div>
</section>

@endsection

@section('scripts')
<script>
    function toggleFaq(header) {
        const card = header.parentElement;
        const isOpen = card.classList.contains('active');

        document.querySelectorAll('.faq-card').forEach(c => c.classList.remove('active'));

        if (!isOpen) card.classList.add('active');
    }
</script>
@endsection

<!DOCTYPE html>
<html lang="en-US" class="no-js">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
        $category = getCategory();
        $adminNotifications = userNotifications();
    @endphp
    <title> {{ $general_setting['app_name'] ?? '' }} || @yield('title') </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset($general_setting['app_fav_icon'] ?? '') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset($general_setting['app_fav_icon'] ?? '') }}" type="image/x-icon">

    <!-- Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* ===== MAIN STYLES ===== */
        body {
            font-family: "Georgia", serif;
            background-color: #f8fafc;
            color: #334155;
            overflow-x: hidden;
        }

        .navbar-custom {
            background: #f89c10;
            padding: 14px 0;
        }

        .hero-section {
            padding: 110px 0 140px 0;
            background: linear-gradient(to right, white, #fff4e6);
        }

        .hero-title {
            font-size: 52px;
            font-weight: 700;
            line-height: 1.2;
        }

        .hero-title span {
            color: #f89c10;
        }

        .hero-text {
            max-width: 540px;
            font-size: 16px;
            color: #555;
            margin-top: 18px;
        }

        .btn-orange {
            background: #f89c10;
            color: #fff;
            padding: 12px 26px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .btn-orange:hover {
            background: #e68a00;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(246, 156, 16, 0.4);
        }

        .btn-outline-orange {
            border: 2px solid #f89c10;
            padding: 12px 26px;
            border-radius: 10px;
            font-weight: 600;
            color: #f89c10;
            font-size: 15px;
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-orange:hover {
            background: #f89c10;
            color: white;
            transform: translateY(-2px);
        }

        .feature-box {
            background: #fff;
            border-radius: 18px;
            padding: 32px 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.12);
        }

        .feature-title {
            color: #f89c10;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .feature-text {
            color: #444;
            font-size: 14px;
            margin-top: 6px;
        }

        /* ===== COLOR VARIABLES ===== */
        :root {
            --primary: #ff8c00;
            --primary-dark: #e67e00;
            --primary-light: #ffb347;
            --secondary: #10b981;
            --secondary-dark: #059669;
            --accent: #ff8c00;
            --accent-dark: #e67e00;
            --dark: #1e293b;
            --darker: #0f172a;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --danger: #ef4444;
            --warning: #f59e0b;
            --success: #10b981;
        }

        /* ===== CUSTOM SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }

        /* ===== INFINITY SYMBOL ===== */
        .infinity-symbol {
            font-family: Arial, sans-serif;
            font-weight: 900;
            color: var(--primary);
        }

        /* ===== HERO BACKGROUND ===== */
        .hero-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            position: relative;
            overflow: hidden;
            padding: 100px 0;
        }

        .hero-bg::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.05"><polygon points="1000,100 1000,0 0,100"/></svg>');
            background-size: cover;
        }

        /* ===== METRIC CARDS ===== */
        .metric-card {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            border-radius: 16px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .metric-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        /* ===== PLAN CARDS ===== */
        .plan-card {
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            transition: all 0.3s;
            overflow: hidden;
            position: relative;
        }

        .plan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .plan-card.popular {
            border: 2px solid var(--primary);
            position: relative;
            transform: scale(1.05);
        }

        .popular-badge {
            position: absolute;
            top: -10px;
            right: 20px;
            background: var(--primary);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }

        /* ===== PAYMENT MARQUEE ===== */
        .payment-marquee {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            padding: 20px 0;
        }

        .payment-marquee:before,
        .payment-marquee:after {
            content: "";
            position: absolute;
            top: 0;
            width: 100px;
            height: 100%;
            z-index: 2;
        }

        .payment-marquee:before {
            left: 0;
            background: linear-gradient(to right, rgba(248, 250, 252, 1) 0%, rgba(248, 250, 252, 0) 100%);
        }

        .payment-marquee:after {
            right: 0;
            background: linear-gradient(to left, rgba(248, 250, 252, 1) 0%, rgba(248, 250, 252, 0) 100%);
        }

        /* ===== BADGES ===== */
        .stats-badge {
            background: var(--secondary);
            color: white;
            font-size: 0.8rem;
            padding: 5px 12px;
            border-radius: 20px;
        }

        .award-badge {
            background: var(--warning);
            color: #000;
            font-size: 0.8rem;
            padding: 5px 12px;
            border-radius: 20px;
        }

        /* ===== FEATURE ICONS ===== */
        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            background: rgba(255, 140, 0, 0.1);
            color: var(--primary);
            font-size: 2rem;
            transition: all 0.3s;
        }

        .feature-card:hover .feature-icon {
            background: var(--primary);
            color: white;
            transform: rotateY(180deg);
        }

        /* ===== TESTIMONIAL CARDS ===== */
        .testimonial-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin: 15px;
            height: 100%;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .testimonial-card::before {
            content: "" ";
 position: absolute;
            top: 10px;
            left: 20px;
            font-size: 80px;
            color: var(--primary-light);
            opacity: 0.1;
            font-family: Georgia, serif;
            line-height: 1;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        .testimonial-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 3px solid var(--primary);
            transition: all 0.3s;
        }

        .testimonial-card:hover .testimonial-avatar {
            border-color: var(--accent);
            transform: scale(1.1);
        }

        /* ===== NAVIGATION ===== */
        .nav-link {
            font-weight: 500;
            position: relative;
            color: var(--dark);
            transition: color 0.3s;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary);
            transition: width 0.3s;
        }

        .nav-link:hover:after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 140, 0, 0.4);
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 140, 0, 0.3);
        }

        /* ===== SECTION TITLES ===== */
        .section-title {
            position: relative;
            margin-bottom: 50px;
            text-align: center;
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* ===== STATS NUMBERS ===== */
        .stats-number {
            font-size: 3rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        /* ===== AI ASSISTANT BUTTON ===== */
        .ai-assistant-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            color: white;
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.4);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .ai-assistant-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(255, 140, 0, 0.5);
        }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--darker);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%2310182a" opacity="0.5"><polygon points="0,0 1000,100 1000,0"/></svg>');
            background-size: cover;
        }

        .footer a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: white;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            margin-right: 10px;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            background: var(--primary);
            transform: translateY(-5px);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
        }

        /* ===== ANIMATIONS ===== */
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* ===== FEATURE CARDS ===== */
        .feature-card {
            transition: all 0.3s;
            border-radius: 16px;
            overflow: hidden;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        /* ===== DASHBOARD CARDS ===== */
        .dashboard-card {
            border-radius: 16px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: none;
            transition: all 0.3s;
            overflow: hidden;
        }

        .dashboard-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        /* ===== GRADIENT TEXT ===== */
        .gradient-text {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ===== PROGRESS BARS ===== */
        .progress {
            height: 10px;
            border-radius: 10px;
            background-color: var(--gray-light);
        }

        .progress-bar {
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 10px;
        }

        /* ===== GLOW EFFECT ===== */
        .glow {
            box-shadow: 0 0 20px rgba(255, 140, 0, 0.3);
        }

        .count-up {
            font-weight: 700;
        }

        /* ===== PAGE CONTENT STYLES ===== */
        .page-content {
            display: none;
        }

        .page-content.active {
            display: block;
        }

        /* ===== LOGIN/SIGNUP FORM STYLES ===== */
        .auth-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 0;
        }

        .auth-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
        }

        .auth-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .auth-body {
            padding: 30px;
            background: white;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid var(--gray-light);
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(255, 140, 0, 0.25);
        }

        /* ===== BLOG STYLES ===== */
        .blog-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            height: 100%;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .blog-card-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .blog-card-body {
            padding: 20px;
        }

        .blog-meta {
            font-size: 0.9rem;
            color: var(--gray);
        }

        /* ===== FAQ STYLES ===== */
        .faq-card {
            border-radius: 16px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .faq-header {
            background: white;
            padding: 20px;
            border-bottom: 1px solid var(--gray-light);
            cursor: pointer;
            transition: all 0.3s;
        }

        .faq-header:hover {
            background: rgba(255, 140, 0, 0.05);
        }

        .faq-body {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s;
        }

        .faq-body.show {
            padding: 20px;
            max-height: 500px;
        }

        /* ===== CONTACT FORM STYLES ===== */
        .contact-info-card {
            border-radius: 16px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            height: 100%;
            background: white;
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 140, 0, 0.1);
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* ===== AFFILIATE STYLES ===== */
        .affiliate-step {
            position: relative;
            padding: 30px;
            border-radius: 16px;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            height: 100%;
        }

        .affiliate-step:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .step-number {
            position: absolute;
            top: -15px;
            left: 20px;
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .affiliate-tier {
            border-radius: 16px;
            padding: 30px;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .affiliate-tier:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .tier-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .checkmark {
            color: var(--success);
            margin-right: 10px;
        }

        /* ===== GLOBE BACKGROUND ===== */
        .globe-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 16px;
            padding: 50px 30px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* ===== TRADING DASHBOARD STYLES ===== */
        .trading-metric {
            text-align: center;
            padding: 20px;
            border-radius: 16px;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        .trading-metric:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .metric-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .metric-label {
            font-size: 0.9rem;
            color: var(--gray);
        }

        .chart-container {
            height: 300px;
            width: 100%;
        }

        /* ===== EVENTS & COMPETITIONS STYLES ===== */
        .event-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            height: 100%;
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .event-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--primary);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .event-card-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .event-card-body {
            padding: 20px;
        }

        .competition-prize {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        /* ===== FUNDING CARD STYLES ===== */
        .fund-card {
            background: #fff;
            border-radius: 18px;
            padding: 35px 30px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.05);
            position: relative;
            transition: 0.3s;
            cursor: pointer;
            height: 100%;
        }

        .fund-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .fund-card.active {
            border: 2px solid #f89c10;
            transform: scale(1.02);
        }

        .fund-big-bg {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 90px;
            font-weight: 700;
            color: rgba(0, 0, 0, 0.03);
            user-select: none;
        }

        .line {
            width: 60px;
            height: 2px;
            background: #f89c10;
            margin: 8px 0 15px 0;
        }

        .btn-black {
            background: #000;
            border: none;
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-black:hover {
            background: #333;
            transform: translateY(-2px);
        }

        .fund-list p {
            margin-bottom: 8px;
            font-size: 14px;
        }

        /* ===== BLOG DETAIL STYLES ===== */
        .blog-detail-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .blog-content h2 {
            color: var(--dark);
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .blog-content p {
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .share-buttons .btn {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== RESPONSIVE STYLES ===== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 36px;
            }

            .hero-section {
                padding: 80px 0 100px 0;
            }

            .fund-card {
                margin-bottom: 20px;
            }

            .section-title {
                font-size: 2rem;
            }

            .stats-number {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 28px;
            }

            .btn-orange,
            .btn-outline-orange {
                width: 100%;
                margin-bottom: 10px;
            }

            .feature-box {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
    @endphp

    <!-- ================================ -->
    <!-- ✔ PRELOADER FIXED -->
    <!-- ================================ -->
    <div id="preloader"
        style="
        position: fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        z-index:9999;
        background-color:#ffffff;
        background-image: url('{{ asset($general_setting['app_preloader'] ?? 'uploads/setting/default.png') }}');
        background-repeat:no-repeat;
        background-position:center;

    ">
    </div>

    <script>
        $(window).on("load", function() {
            $("#preloader").fadeOut(1000);
        });
    </script>


    <!-- LOADER -->
    <!-- NAVBAR -->
   <nav class="navbar navbar-expand-lg"
    style="background:rgba(255,255,255,0.65); backdrop-filter:blur(12px); border-bottom:1px solid rgba(255,255,255,0.4); padding:12px 0; transition:all .3s ease; box-shadow:0 4px 20px rgba(0,0,0,0.05);">

    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}"
           style="font-size:1.5rem; font-weight:700; color:var(--primary); transition:.3s;">
            <img src="{{ '/' . ($general_setting['app_logo'] ?? '') }}" width="90" height="90" class="me-2" alt="">

        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
            style="border:none;">
            <span class="navbar-toggler-icon" style="filter:brightness(0);"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <ul class="navbar-nav align-items-center mb-2 mb-lg-0">

                @php
                $links = [
                    '/'        => 'Inicio',
                    'service'  => 'Servicios',
                    'about'    => 'Nosotros',
                    'blog'     => 'Blog',
                    'faq'      => 'FAQ',
                    'contact'  => 'Contacto',
                ];
                @endphp

                @foreach ($links as $url => $label)
                    <li class="nav-item px-1">
                        <a class="nav-link"
                            href="{{ url($url) }}"
                            style="
                                font-weight:500;
                                position:relative;
                                color:var(--dark);
                                padding:8px 12px;
                                border-radius:6px;
                                transition:0.3s;
                            "
                            onmouseover="this.style.color='var(--primary)'; this.style.background='rgba(124,58,237,0.08)'"
                            onmouseout="this.style.color='var(--dark)'; this.style.background='transparent'">
                            {{ $label }}
                        </a>
                    </li>
                @endforeach

                @if (!empty($user_session))
                    <li class="nav-item px-2">
                        <a class="btn rounded-pill px-4 py-2"
                           href="{{ url('dashboard') }}"
                           style="background:var(--primary);color:white;border:none;font-weight:600;transition:0.3s;box-shadow:0px 4px 10px rgba(255,140,0,0.3);"
                           onmouseover="this.style.background='var(--primary-dark)';this.style.transform='translateY(-3px)'"
                           onmouseout="this.style.background='var(--primary)';this.style.transform='translateY(0)'">
                            Mi Cuenta
                        </a>
                    </li>
                @else
                    <li class="nav-item px-1">
                        <a class="nav-link" href="{{ url('Userlogin') }}"
                           style="font-weight:500;color:var(--dark);padding:8px 12px;border-radius:6px;transition:0.3s;">
                            Iniciar Sesión
                        </a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="btn rounded-pill px-4 py-2"
                           href="https://wa.me/59169160031?text=Hola,%20quiero%20pedir%20un%20servicio%20Avaroa"
                           target="_blank"
                           style="background:var(--primary);color:white;border:none;font-weight:600;transition:0.3s;box-shadow:0px 4px 10px rgba(255,140,0,0.3);">
                            <i class="fab fa-whatsapp me-1"></i> Pedir Ahora
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>



    <!-- CONTENT START -->
    @yield('content')
    <!-- CONTENT END -->
    <!-- FOOTER START -->
    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4 class="fw-bold mb-3">
                        <img src="{{ asset($general_setting['app_logo'] ?? '') }}" alt="Avaroa" width="120" height="60" style="object-fit:contain;">
                    </h4>
                    <p class="text-white opacity-75">Servicio rápido y de calidad en delivery, taxi y carga en Bolivia. Conectamos a conductores y clientes en tiempo real.</p>
                    <div class="social-icons mt-4">
                        <a href="https://wa.me/59169160031" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="fw-bold mb-3">Empresa</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('about') }}">Nosotros</a></li>
                        <li class="mb-2"><a href="{{ url('blog') }}">Blog</a></li>
                        <li class="mb-2"><a href="{{ url('contact') }}">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="fw-bold mb-3">Servicios</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('service') }}">Delivery</a></li>
                        <li class="mb-2"><a href="{{ url('service') }}">Taxi</a></li>
                        <li class="mb-2"><a href="{{ url('service') }}">Carga Pesada</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="fw-bold mb-3">Soporte</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('faq') }}">Preguntas Frecuentes</a></li>
                        <li class="mb-2"><a href="{{ url('contact') }}">Contáctanos</a></li>
                        <li class="mb-2"><a href="{{ url('support') }}">Tickets</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="fw-bold mb-3">Legal</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('privacy') }}" class="text-white">Privacidad</a></li>
                        <li class="mb-2"><a href="{{ url('genTerm') }}" class="text-white">Términos</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} Avaroa. Todos los derechos reservados. Bolivia.</p>
                </div>

            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery Script -->
    <script>
        $(document).ready(function() {
            // Page Navigation
            $('a[data-page]').on('click', function(e) {
                e.preventDefault();
                const targetPage = $(this).data('page');

                // Hide all page content
                $('.page-content').removeClass('active').hide();

                // Show the target page
                if (targetPage === 'home') {
                    // Show all home sections
                    $('.page-content[id^="home"]').addClass('active').show();
                } else {
                    $('#' + targetPage).addClass('active').show();
                }

                // Close mobile menu if open
                if ($('#navMenu').hasClass('show')) {
                    $('.navbar-toggler').click();
                }

                // Scroll to top
                $('html, body').animate({
                    scrollTop: 0
                }, 300);
            });

            // FAQ Accordion Functionality
            $('.faq-header').on('click', function() {
                const $body = $(this).next('.faq-body');
                const isActive = $body.hasClass('show');

                // Close all FAQ items
                $('.faq-body').removeClass('show');

                // If the clicked item wasn't active, open it
                if (!isActive) {
                    $body.addClass('show');
                }
            });

            // Funding Card Selection
            $('.fund-card').on('click', function() {
                // Remove active class from all cards
                $('.fund-card').removeClass('active');

                // Add active class to clicked card
                $(this).addClass('active');
            });

            // Form Submission
            $('#signup-form').on('submit', function(e) {
                e.preventDefault();
                alert('Thank you for signing up! We will contact you shortly.');
                $(this).trigger('reset');
            });

            // Button animations
            $('.btn-orange, .btn-outline-orange, .btn-primary, .btn-black').on('mouseenter', function() {
                $(this).addClass('pulse');
            }).on('mouseleave', function() {
                $(this).removeClass('pulse');
            });

            // Feature box animations
            $('.feature-box').on('mouseenter', function() {
                $(this).addClass('floating-element');
            }).on('mouseleave', function() {
                $(this).removeClass('floating-element');
            });

            // Initialize payment marquee animation
            function animateMarquee() {
                $('.payment-marquee').each(function() {
                    const $marquee = $(this);
                    const $content = $marquee.children().first();
                    const contentWidth = $content.outerWidth();
                    const containerWidth = $marquee.width();

                    if (contentWidth > containerWidth) {
                        const animationDuration = (contentWidth / 50) * 1000; // Adjust speed as needed

                        $content.css({
                            'animation': `marquee ${animationDuration}ms linear infinite`
                        });
                    }
                });
            }

            // Add keyframe animation for marquee
            $('<style>')
                .prop('type', 'text/css')
                .html(`
          @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
          }
        `)
                .appendTo('head');

            // Initialize on load and window resize
            $(window).on('load resize', animateMarquee);

            // Counter animation for stats
            $('.stats-number').each(function() {
                const $this = $(this);
                const countTo = $this.attr('data-count');

                if (countTo) {
                    $({
                        countNum: 0
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }
                    });
                }
            });

            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();

            // Smooth scrolling for anchor links
            $('a[href^="#"]').on('click', function(e) {
                e.preventDefault();
                const target = $(this.getAttribute('href'));
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                }
            });
        });
    </script>
</body>

</html>

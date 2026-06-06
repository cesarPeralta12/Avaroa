@extends('master')
@section('title')
{{ __('Home') }}
@endsection
@section('content')
<!-- HERO SECTION -->
  <section class="hero-section page-content active" id="home">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="hero-title">
            Trade Our Capital.<br>
            <span>Keep Your Profits.</span>
          </h1>

          <p class="hero-text">
            FStandard is India's first institutional-grade dual-asset proprietary trading firm,
            empowering disciplined traders with the capital they need to succeed.
          </p>

          <div class="mt-4">
            <button class="btn-orange me-3">Start Evaluation</button>
            <button class="btn-outline-orange">View Rules</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section class="page-content active" id="home-features" style="background:#f8f8f8; padding:70px 0;">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3 col-sm-6">
          <div class="feature-box">
            <div class="feature-title">6% Trailing Drawdown</div>
            <div class="feature-text">Your safety net for consistent growth.</div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="feature-box">
            <div class="feature-title">70% Profit Share</div>
            <div class="feature-text">You keep the majority of your earnings.</div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="feature-box">
            <div class="feature-title">Dual-Asset Coverage</div>
            <div class="feature-text">Trade FX, Crypto, and Indices.</div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="feature-box">
            <div class="feature-title">20-Day Payouts</div>
            <div class="feature-text">Regular access to your profits.</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JOURNEY TO FUNDING SECTION -->
  <section class="py-5 page-content active" id="home-journey" style="background:white; padding-top:90px !important;">
    <div class="container text-center">
      <h2 style="font-size:42px; font-weight:700; font-family:Georgia;">
        Your Journey to Funding
      </h2>

      <p class="mt-2" style="font-size:16px; color:#555;">
        A simple, transparent, and fair process designed for serious traders.
      </p>

      <div class="row mt-5 pt-3 justify-content-center">
        <!-- Step 1 -->
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="rounded-circle mx-auto mb-3"
               style="width:55px; height:55px; background:#f89c10; color:white;
                      display:flex; align-items:center; justify-content:center;
                      font-weight:700; font-size:20px;">
            1
          </div>
          <h5 style="font-weight:700;">Choose Your Evaluation</h5>
          <p style="font-size:14px; color:#555;">
            Select a plan that matches your trading style and capital goals. Start your
            journey with a clear path.
          </p>
        </div>

        <!-- Step 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="rounded-circle mx-auto mb-3"
               style="width:55px; height:55px; background:#f89c10; color:white;
                      display:flex; align-items:center; justify-content:center;
                      font-weight:700; font-size:20px;">
            2
          </div>
          <h5 style="font-weight:700;">Trade with Discipline</h5>
          <p style="font-size:14px; color:#555;">
            Meet the profit targets while respecting our straightforward risk
            management rules. Consistency is key.
          </p>
        </div>

        <!-- Step 3 -->
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="rounded-circle mx-auto mb-3"
               style="width:55px; height:55px; background:#f89c10; color:white;
                      display:flex; align-items:center; justify-content:center;
                      font-weight:700; font-size:20px;">
            3
          </div>
          <h5 style="font-weight:700;">Get Funded & Withdraw</h5>
          <p style="font-size:14px; color:#555;">
            Successfully pass the evaluation to trade our capital. Withdraw your 70%
            profit share every 20 trading days.
          </p>
        </div>
      </div>
    </div>
  </section>
<!-- FUNDING PLANS SECTION -->
<section class="py-5" style="background:#f3f3f3; min-height:100vh;">
    <div class="container py-4">
        <h2 class="text-center mb-5 section-title" style="font-size: 3rem; font-weight: 800; color:#222;">
            Funding Plans
        </h2>

        <div class="row gy-4 justify-content-center">
            @forelse($plans as $plan)
                <div class="col-lg-3 col-md-6">
                    <div class="fund-card {{ $loop->first ? 'active' : '' }}">
                        <!-- Big Background Text -->
                        <div class="fund-big-bg">{{ $plan->title }}</div>

                        <div class="text-center position-relative" style="z-index:1;">
                            <h2 style="font-weight:700; font-size:2.8rem; color:#222;">{{ $plan->title }}</h2>
                            <div class="line"></div>
                            <p style="font-style:italic; margin-top:-5px; color:#f89c10;">Funding</p>

                            <p style="font-size:13px; letter-spacing:1px; font-weight:600; color:#333;">
                                CAPITAL: {{ $plan->capital_formatted }}
                            </p>
                            <hr style="border-color:#eee; margin:20px 0;">

                            <h3 style="font-weight:700; font-size:2.2rem; color:#222;">
                                {{ $plan->fee_formatted }}
                            </h3>
                            <small style="color:#777; display:block; margin-bottom:20px;">One-time assessment fee</small>

                            <div class="fund-list">
                                <p><strong>Profit Target</strong>
                                    <span class="float-end text-success">{{ $plan->profit_target }}</span>
                                </p>
                                <p><strong>Max Loss</strong>
                                    <span class="float-end text-danger">{{ $plan->max_loss }}</span>
                                </p>
                                <p><strong>Drawdown Type</strong>
                                    <span class="float-end">{{ $plan->drawdown_type }}</span>
                                </p>
                                <p><strong>Payout Cycle</strong>
                                    <span class="float-end">{{ $plan->payout_cycle }}</span>
                                </p>
                                <p><strong>News Trading</strong>
                                    <span class="float-end {{ $plan->news_trading ? 'text-success' : 'text-danger' }}">
                                        {{ $plan->news_trading ? 'Allowed' : 'Not Allowed' }}
                                    </span>
                                </p>
                                <p><strong>Weekend Holding</strong>
                                    <span class="float-end {{ $plan->weekend_holding ? 'text-success' : 'text-danger' }}">
                                        {{ $plan->weekend_holding ? 'Allowed' : 'Not Allowed' }}
                                    </span>
                                </p>
                            </div>

                            <!-- Start Evaluation Button -->
                            @if (!empty($user_session))
                                <form action="{{ route('purchase.plan', $plan->id) }}"  class="mt-4">
                                    @csrf
                                    <button type="submit" class="btn-orange">
                                        Start Evaluation
                                    </button>
                                </form>
                            @else
                                <a href="{{ url('Userlogin') }}" class="btn-orange d-block text-center text-decoration-none">
                                    Start Evaluation
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-muted">No funding plans available at the moment.</h4>
                </div>
            @endforelse
        </div>
    </div>
</section>
<style>
 /* ==========================================================
   SECTION & CARD STYLES (Clean & Modern Dark Theme)
   ========================================================== */
.app-section {
    background: #0b0b1e; /* Deep dark navy */
    padding: 100px 0;
    overflow: hidden;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

.download-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 30px;
    padding: 40px;
    backdrop-filter: blur(10px);
    transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.download-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(255, 255, 255, 0.2);
}

.download-btn {
    display: inline-flex;
    align-items: center;
    gap: 15px;
    background: #4ade80; /* Brighter CTA button */
    color: #0b0b1e !important;
    padding: 12px 30px;
    border-radius: 12px;
    font-weight: 700;
    text-decoration: none;
    transition: 0.3s;
    margin-top: 25px;
}

.download-btn:hover {
    background: #3ac06a;
    transform: scale(1.02);
}

/* ==========================================================
   REALISTIC DEVICE COMMON STYLES
   ========================================================== */
.device-container {
    width: 280px;
    height: 560px;
    margin: 0 auto;
    position: relative;
    z-index: 10;
}

.device-frame {
    width: 100%;
    height: 100%;
    position: relative;
    border-radius: 48px;
    padding: 12px;
    box-shadow:
        0 30px 60px -10px rgba(0,0,0,0.6),
        inset 0 0 0 2px rgba(255,255,255,0.2);
    transition: transform 0.5s ease;
}

.device-screen {
    width: 100%;
    height: 100%;
    background: #000;
    border-radius: 36px;
    overflow: hidden;
    position: relative;
    box-shadow: inset 0 0 20px rgba(0,0,0,0.8);
}

/* Glass Reflection Layer (Crucial for Realism) */
.device-reflection {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        135deg,
        rgba(255,255,255,0.15) 0%,
        rgba(255,255,255,0.05) 25%,
        transparent 50%
    );
    z-index: 50;
    pointer-events: none;
    border-radius: 36px;
}

/* --- iPhone 17 Specifics (Titanium) --- */
.iphone-17 .device-frame {
    background: #2b2b2b;
    background: linear-gradient(110deg, #3a3a3a 0%, #5e5e5e 20%, #2b2b2b 40%, #1f1f1f 100%);
    box-shadow:
        0 40px 80px -20px rgba(0,0,0,0.8),
        inset -5px -5px 15px rgba(0,0,0,0.8),
        inset 2px 2px 10px rgba(255,255,255,0.3);
    border-radius: 54px;
    padding: 10px;
}

.iphone-17 .device-screen { border-radius: 44px; }
.iphone-island { position: absolute; top: 15px; left: 50%; transform: translateX(-50%); width: 96px; height: 28px; background: #000; border-radius: 20px; z-index: 60; box-shadow: 0 0 2px rgba(255,255,255,0.1); }
.iphone-island::after { content: ''; position: absolute; right: 8px; top: 50%; transform: translateY(-50%); width: 12px; height: 12px; background: radial-gradient(circle at 30% 30%, #333, #000); border-radius: 50%; box-shadow: inset 0 0 2px rgba(255,255,255,0.2); }
.iphone-btn { position: absolute; background: #2b2b2b; border-radius: 4px; box-shadow: inset -1px 0 2px rgba(0,0,0,0.5); }
.btn-vol-up { left: -3px; top: 120px; width: 3px; height: 40px; }
.btn-vol-down { left: -3px; top: 170px; width: 3px; height: 40px; }
.btn-power { right: -3px; top: 140px; width: 3px; height: 60px; }

/* --- Pixel 10 Specifics (Ceramic Slate) --- */
.pixel-10 .device-frame {
    background: #25282e;
    box-shadow:
        0 40px 80px -20px rgba(0,0,0,0.8),
        inset 0 0 0 1px #444,
        inset 0 0 20px rgba(0,0,0,1);
    border-radius: 40px;
    padding: 14px;
}

.pixel-10 .device-screen { border-radius: 28px; }
.pixel-cam { position: absolute; top: 18px; left: 50%; transform: translateX(-50%); width: 16px; height: 16px; background: #000; border-radius: 50%; z-index: 60; box-shadow: inset 0 0 4px rgba(50,50,50,0.8); border: 1px solid rgba(0,0,0,0.5); }
.pixel-cam::after { content: ''; position: absolute; top: 4px; left: 4px; width: 4px; height: 4px; background: rgba(255,255,255,0.1); border-radius: 50%; }
.pixel-btn { position: absolute; background: #3a3a3a; border-radius: 2px; right: -3px; box-shadow: inset 1px 0 2px rgba(0,0,0,0.5); }
.btn-pixel-power { top: 110px; width: 3px; height: 35px; }
.btn-pixel-vol { top: 160px; width: 3px; height: 60px; }

/* ==========================================================
   APP INTERFACE (Localized to Indian Market)
   ========================================================== */
.app-ui {
    height: 100%;
    width: 100%;
    background: radial-gradient(circle at 100% 0%, #1e1e40 0%, #0D0D24 50%, #000000 100%);
    color: white;
    display: flex;
    flex-direction: column;
    padding: 50px 15px 20px;
    font-family: inherit;
}

/* UI Utility Classes */
.ui-card { background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.05); border-radius: 20px; padding: 15px; margin-bottom: 15px; }
.ui-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
.ui-avatar { width: 36px; height: 36px; background: #333; border-radius: 50%; border: 2px solid #555; display: flex; align-items: center; justify-content: center;}
.balance-label { font-size: 13px; color: #a0a0b0; text-transform: uppercase; letter-spacing: 1px; }
.balance-amount { font-size: 32px; font-weight: 700; letter-spacing: -1px; margin: 5px 0; }
.balance-change { font-size: 13px; color: #4ade80; background: rgba(74, 222, 128, 0.1); padding: 4px 8px; border-radius: 6px; display: inline-block; }
.text-red { color: #ef4444; background: rgba(239, 68, 68, 0.1); padding: 4px 8px; border-radius: 6px; display: inline-block; }
.action-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 25px; }
.action-item { display: flex; flex-direction: column; align-items: center; gap: 8px; }
.action-icon { width: 48px; height: 48px; border-radius: 16px; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; font-size: 20px; transition: 0.2s; font-weight: bold;}
.action-text { font-size: 11px; color: #ccc; }
.market-list { flex-grow: 1; overflow: hidden; }
.market-row { display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.05); }
.coin-icon { width: 32px; height: 32px; border-radius: 50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:12px; text-shadow:0 1px 2px rgba(0,0,0,0.3); color:#fff;}
.bottom-nav { margin-top: auto; background: rgba(20, 20, 35, 0.9); border-radius: 25px; padding: 15px; display: flex; justify-content: space-between; backdrop-filter: blur(10px); }
</style>

<section class="app-section">
    <div class="container">

        <div class="text-center mb-5">
            <h2 style="color:white; font-size:42px; font-weight:800; letter-spacing: -1px;">
                Trade Indian Markets. Seamlessly.
            </h2>
            <p style="color:#b9c0d4; font-size:18px; max-width:600px; margin: 15px auto;">
                Execute trades on NSE/BSE and manage your F&O portfolio with our secure, lightning-fast mobile application.
            </p>
        </div>

        <div class="row align-items-center">

            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="device-container iphone-17">
                    <div class="iphone-btn btn-vol-up"></div>
                    <div class="iphone-btn btn-vol-down"></div>
                    <div class="iphone-btn btn-power"></div>

                    <div class="device-frame">
                        <div class="device-screen">

                            <div class="device-reflection"></div>

                            <div class="iphone-island"></div>

                            <div class="app-ui">
                                <div class="ui-header">
                                    <div style="font-weight:700;">10:34 AM IST</div>
                                    <div class="ui-avatar" style="font-size:18px;">🔔</div>
                                </div>

                                <div class="ui-card">
                                    <div class="balance-label">Total Portfolio Value</div>
                                    <div class="balance-amount">₹ 7,55,120.45</div>
                                    <div class="balance-change">▲ +₹ 9,450 (1.26%)</div>
                                </div>

                                <div class="action-grid">
                                    <div class="action-item">
                                        <div class="action-icon" style="background:#4ade80; color:#000;">B</div>
                                        <div class="action-text">Buy Equity</div>
                                    </div>
                                    <div class="action-item">
                                        <div class="action-icon" style="background:#ef4444; color:#fff;">S</div>
                                        <div class="action-text">Sell F&O</div>
                                    </div>
                                    <div class="action-item">
                                        <div class="action-icon">🪙</div>
                                        <div class="action-text">IPO/SGB</div>
                                    </div>
                                    <div class="action-item">
                                        <div class="action-icon">💳</div>
                                        <div class="action-text">Funds</div>
                                    </div>
                                </div>

                                <div class="market-list">
                                    <div style="font-size:14px; font-weight:600; margin-bottom:10px; color:#ccc;">Major Indices (Live)</div>

                                    <div class="market-row">
                                        <div style="display:flex; gap:10px; align-items:center;">
                                            <div class="coin-icon" style="background:#007bff; font-size:14px;">N50</div>
                                            <div>
                                                <div style="font-weight:600;">Nifty 50</div>
                                                <div style="font-size:11px; color:#888;">NSE</div>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <div style="font-weight:600;">22,145.80</div>
                                            <div class="balance-change">+0.95%</div>
                                        </div>
                                    </div>

                                    <div class="market-row">
                                        <div style="display:flex; gap:10px; align-items:center;">
                                            <div class="coin-icon" style="background:#ff6600; font-size:14px;">S30</div>
                                            <div>
                                                <div style="font-weight:600;">Sensex</div>
                                                <div style="font-size:11px; color:#888;">BSE</div>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <div style="font-weight:600;">72,890.15</div>
                                            <div class="text-red">-0.12%</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bottom-nav">
                                    <span>🏠</span>
                                    <span style="color:#4ade80">📈</span>
                                    <span>🔔</span>
                                    <span>👤</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <h4 style="color:white; font-weight:600;">iOS App</h4>
                    <p style="color:#888; font-size:14px;">Optimized for iPhone with face-ID security.</p>
                    <a href="#" class="download-btn">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/67/App_Store_%28iOS%29.svg" width="20" alt="Apple">
                        Download on the App Store
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="device-container pixel-10">
                    <div class="pixel-btn btn-pixel-power"></div>
                    <div class="pixel-btn btn-pixel-vol"></div>

                    <div class="device-frame">
                        <div class="device-screen">
                            <div class="device-reflection" style="opacity:0.6;"></div>
                            <div class="pixel-cam"></div>

                            <div class="app-ui" style="background: #121212;">

                                <div class="ui-header">
                                    <div style="font-weight:700; color:#fff;">Top Losers Today</div>
                                    <div class="ui-avatar"></div>
                                </div>

                                <div style="height:120px; background:linear-gradient(180deg, rgba(239, 68, 68, 0.1), transparent); border-bottom:1px solid rgba(239, 68, 68, 0.3); position:relative; margin-bottom:20px;">
                                    <svg width="100%" height="100%" viewBox="0 0 200 100" preserveAspectRatio="none">
                                        <path d="M0,40 C50,40 50,80 100,80 C150,80 150,20 200,60" stroke="#ef4444" stroke-width="2" fill="none" />
                                    </svg>
                                    <div style="position:absolute; top:10px; left:10px; font-size:24px; font-weight:bold;">-0.85%</div>
                                </div>

                                <div class="market-list">
                                    <div style="font-size:14px; font-weight:600; margin-bottom:10px; color:#ccc;">F&O Watchlist</div>

                                    <div class="market-row">
                                        <div style="display:flex; gap:10px; align-items:center;">
                                            <div class="coin-icon" style="background:#007bff; font-weight:bold; font-size:12px;">RIL</div>
                                            <div>
                                                <div style="font-weight:600;">Reliance Ind.</div>
                                                <div style="font-size:11px; color:#888;">FUT @ ₹2905</div>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <div style="font-weight:600; color:#ef4444;">2,905.50</div>
                                            <div style="font-size:11px;" class="text-red">-0.45%</div>
                                        </div>
                                    </div>

                                    <div class="market-row">
                                        <div style="display:flex; gap:10px; align-items:center;">
                                            <div class="coin-icon" style="background:#4ade80; color:#000; font-weight:bold; font-size:12px;">TCS</div>
                                            <div>
                                                <div style="font-weight:600;">TCS</div>
                                                <div style="font-size:11px; color:#888;">FUT @ ₹3920</div>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <div style="font-weight:600; color:#4ade80;">3,920.80</div>
                                            <div style="font-size:11px;" class="balance-change">+1.98%</div>
                                        </div>
                                    </div>

                                </div>

                                <div style="position:absolute; bottom:20px; right:20px; width:56px; height:56px; background:#4ade80; border-radius:16px; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 15px rgba(74,222,128,0.4); color:#000; font-size:24px;">
                                    ₹
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <h4 style="color:white; font-weight:600;">Android App</h4>
                    <p style="color:#888; font-size:14px;">High-speed access to NSE/BSE on Google Play.</p>
                    <a href="#" class="download-btn">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d7/Android_robot.svg" width="20" alt="Android">
                        Download on Google Play
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

  <!-- Testimonials -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-5 section-title">What Our Clients Say</h2>

        <div class="row">
            @foreach($testimonials as $t)
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">

                        <!-- Avatar -->
                        <img src="{{ asset($t->client_image_url) }}"
                             alt="{{ $t->client_name }}"
                             class="testimonial-avatar">

                        <h5 class="text-center fw-bold">{{ $t->client_name }}</h5>
                        <p class="text-muted text-center">{{ $t->client_role }}</p>

                        <!-- Stars -->
                        <div class="text-warning text-center mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                        <p class="text-center">"{{ $t->content }}"</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ============================
     ICONS AROUND THE WORLD SECTION
============================== -->
<section class="py-5" style="background:#0f0b28; color:white;">
    <div class="container">

        <!-- Section Title -->
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="font-size:2.2rem;">Our Celebrity Endorsements</h2>
            <p class="text-white-50 mt-2">Trusted by influential voices across industries</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row g-4">

                    @foreach($endorsements as $star)
                        <div class="col-md-4">
                            <div class="video-card card border-0 rounded-4"
                                 style="background:#1c153e; box-shadow:0 10px 25px rgba(0,0,0,0.55); transition:0.3s;">

                                <div class="position-relative">
                                    <img src="{{ $star->image
                                        ? asset($star->image)
                                        : 'https://via.placeholder.com/400x300/1a1a2e/ffffff?text='.urlencode($star->name) }}"
                                         class="card-img-top rounded-4"
                                         style="height:200px; object-fit:cover;">

                                    <!-- Play Button -->
                                    <button class="btn play-btn position-absolute top-50 start-50 translate-middle rounded-circle openVideo"
                                            data-bs-toggle="modal" data-bs-target="#videoModal"
                                            data-video="https://www.youtube.com/embed/{{ $star->youtube_id }}"
                                            style="background:#00aefc; width:70px; height:70px; font-size:22px; border:4px solid rgba(255,255,255,0.4);">
                                        <i class="fa-solid fa-play text-white"></i>
                                    </button>
                                </div>

                                <!-- Card Text -->
                                <div class="card-body text-center text-white">
                                    <p class="fw-semibold">“{{ $star->quote }}”</p>
                                    <p class="text-white-50 mb-0">
                                        {{ $star->name }} • <span class="fw-light">{{ $star->role }}</span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white">Celebrity Endorsement</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe id="videoPlayer" src="" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    // open video
    document.querySelectorAll('.openVideo').forEach(btn => {
        btn.addEventListener('click', function () {
            let videoUrl = this.getAttribute('data-video') + '?autoplay=1';
            document.getElementById('videoPlayer').src = videoUrl;
        });
    });

    // stop video when modal closed
    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('videoPlayer').src = "";
    });

});
</script>


@endsection

<?php

namespace App\Http\Controllers;


use App\Mail\SendMailreset;

use App\Models\BankDetails;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;

use App\Models\Category;

use App\Models\CelebrityEndorsement;
use App\Models\City;
use App\Models\Comment;

use App\Models\Country;

use App\Models\FundingPlan;
use App\Models\News;

use App\Models\Notification;
use App\Models\Order;
use App\Models\Page;
use App\Models\PasswordReset;

use App\Models\PlanPurchase;
use App\Models\Reaction;
use App\Models\Sales;
use App\Models\SupportTicketQuestion;
use App\Models\Testimonial;
use App\Models\TradeLog;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\NewUserRegisteredNotification;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\UserRegisteredNotification;
use App\Notifications\VerifyEmailNotification;
use App\Traits\SendNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;



function getIp()
{
    $ip = null;
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
    } else {
        if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
    }
    return $ip;
}

class UserController extends Controller
{
    use SendNotification;



    public function home()
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $testimonials = Testimonial::all();
        $plans = FundingPlan::orderBy('sort_order')->get();
        $endorsements = CelebrityEndorsement::orderBy('sort_order')
            ->orderByDesc('id')
            ->get();
        $sliders = Banner::all()->map(function ($slider) {
            // Split every 4 words into a new line
            $words = explode(' ', $slider->title1);
            $chunks = array_chunk($words, 4); // Adjust 4 for the desired number of words per line
            $slider->title1 = implode('<br>', array_map(fn($chunk) => implode(' ', $chunk), $chunks));
            return $slider;
        });

        return view('index', compact('user_session', 'sliders', 'testimonials', 'plans', 'endorsements'));
    }

    public function membership()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        return view('membership', compact('user_session'));
    }
    public function faqs()
    {

        $faq = SupportTicketQuestion::all();
        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        return view('faq', compact('user_session', 'faq'));
    }

    public function vacancy()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        return view('vacancy', compact('user_session'));
    }
    public function about()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();
        return view('about', compact('user_session', 'pages'));
    }
    public function faq()
    {


        $user_session    = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();
        return view('faq', compact('user_session', 'pages'));
    }
    public function challenges()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();
        return view('challenges', compact('user_session', 'pages'));
    }
    public function Userlogin()
    {
        $pages = Page::all();
        return view('login', compact('pages'));
    }
    public function admin()
    {
        return view('admin.admin');
    }
    public function signup(Request $request)
    {
        // Get all keys from the request
        $keys = array_keys($request->all());

        // Check if the keys array is not empty before accessing the first key
        $refer = !empty($keys) ? $keys[0] : null;
        // dd($refer);
        // Fetch the necessary data
        $pages = Page::all();
        $countries = Country::all();
        $cities = City::all();

        // Pass the $refer value to the view
        return view('register', compact('pages', 'countries', 'cities', 'refer'));
    }

    // STEP 1: SEND REAL OTP VIA FAST2SMS (WORKS 100% – NO DLT NEEDED)
    public function sendOtp(Request $request)
    {
        $request->validate(['mobile' => 'required|digits:10']);

        $mobile = $request->mobile;

        // Prevent already registered users
        if (User::where('whatsapp_number', '91' . $mobile)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'This mobile number is already registered.'
            ]);
        }

        // Generate real OTP
        $otp = rand(100000, 999999);
        Cache::put("reg_otp_{$mobile}", $otp, now()->addMinutes(10));

        // THIS IS THE ONLY CODE THAT WORKS IN 2025 (Same as your working login)
        $response = Http::withHeaders([
            'authorization' => env('FAST2SMS_API_KEY'),
            // Or use env('FAST2SMS_API_KEY') if you moved it to .env
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->asForm()->post('https://www.fast2sms.com/dev/bulkV2', [
            'sender_id' => 'FSTSMS',                                    // Must be this
            'message'   => "Your F Standard verification code is {$otp}. Valid for 10 minutes.",
            'language'  => 'english',                                   // lowercase
            'route'     => 'q',                                         // Quick route = no DLT
            'numbers'   => $mobile,
            'flash'     => '0'
        ]);

        $result = $response->json();

        // FULL LOGGING (check storage/logs/laravel.log)
        Log::info('Fast2SMS Registration OTP Response', $result);

        if ($response->successful() && ($result['return'] ?? false) === true) {
            Log::info("REGISTRATION OTP SENT → {$mobile} | OTP: {$otp}");

            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully! Check your phone.'
            ]);
        }

        $errorMsg = $result['message'] ?? 'Unknown error';
        Log::error("Fast2SMS Registration Failed", ['error' => $errorMsg, 'full' => $result]);

        return response()->json([
            'success' => false,
            'message' => "SMS failed: {$errorMsg}"
        ]);
    }

    // STEP 2: VERIFY OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
            'otp'    => 'required|digits:6'
        ]);

        $mobile = $request->mobile;
        $otp    = $request->otp;

        $storedOtp = Cache::get("reg_otp_{$mobile}");

        if ($storedOtp && $storedOtp == $otp) {
            Cache::forget("reg_otp_{$mobile}");
            Cache::put("mobile_verified_{$mobile}", true, now()->addHours(2));

            return response()->json([
                'success' => true,
                'message' => 'Mobile number verified!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid or expired OTP'
        ]);
    }

    // REGISTRATION
    public function registration(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:100',

            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|confirmed',
            'mobile'     => 'required'
        ]);

        $mobile = $request->mobile;

        if ($mobile !== '9876543210') {
            return response()->json(['success' => false, 'message' => 'Demo only allows 9876543210']);
        }

        if (!Cache::get("mobile_verified_{$mobile}")) {
            return response()->json(['success' => false, 'message' => 'Please verify mobile first']);
        }
        // dd($request->all());
        $user = User::create([
            'account_type'   => 'user',
            'refer' => $request->refer,
            'referral_code' => strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10)),
            'name'           => $request->name,
            'email'          => $request->email,
            'whatsapp_number'  => '91' . $mobile,
            'password'       => Hash::make($request->password),
            'ip_address'     => $request->ip(),
            'status'         => 1,

        ]);
        // Clean up
        Cache::forget("mobile_verified_{$mobile}");
        if ($user) {
            Cache::forget("mobile_verified_{$mobile}");
            auth()->login($user);
            Session::put('LoggedIn', $user->id);
            // Send email verification notification
            $user->notify(new VerifyEmailNotification($user));
            // Fire the UserRegistered event
            // event(new UserRegistered($user));
            $text = 'A new user has registered on the platform.';
            $target_url = route('users');
            $this->sendForApi($text, 1, $target_url, $user->id, $user->id);
            return response()->json([
                'success' => true,
                'message' => 'Account created successfully!',
                'redirect' => url('/overview')
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Failed'], 500);
    }
    // STEP 1: Send OTP
    public function sendLoginOtp(Request $request)
    {
        $request->validate(['mobile' => 'required|digits:10']);

        $mobile = $request->mobile;
        $fullMobile = '91' . $mobile;

        $user = User::where('whatsapp_number', $fullMobile)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'This mobile number is not registered.'
            ]);
        }

        $otp = rand(100000, 999999);
        Cache::put("login_otp_{$mobile}", $otp, now()->addMinutes(10));

        // FIXED: POST request + required params for 'q' route
        $response = Http::withHeaders([
            'authorization' => env('FAST2SMS_API_KEY'),
            'Content-Type' => 'application/x-www-form-urlencoded',  // Key for form data
        ])->asForm()->post('https://www.fast2sms.com/dev/bulkV2', [
            'sender_id'    => 'FSTSMS',      // Required: Default sender ID
            'message'      => "Your F Standard login OTP is {$otp}. Valid for 10 minutes.",
            'language'     => 'english',     // Required
            'route'        => 'q',           // Quick SMS (no DLT needed)
            'numbers'      => $mobile,       // 10-digit number
            'flash'        => '0'
        ]);

        $result = $response->json();

        // Log FULL response for debugging (check storage/logs/laravel.log)
        Log::info('Fast2SMS Full Response', $result);

        // Success: Check 'return' and no error
        if ($response->successful() && isset($result['return']) && $result['return'] === true) {
            Log::info("OTP Sent! Mobile: {$mobile}, OTP: {$otp}");

            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully! Check your phone.'
            ]);
        }

        // Detailed error logging
        $errorMsg = $result['message'] ?? 'Unknown Fast2SMS error';
        Log::error("Fast2SMS Failed", ['response' => $result, 'error' => $errorMsg]);

        return response()->json([
            'success' => false,
            'message' => "SMS failed: {$errorMsg}. Try again in 1 min or check balance."
        ]);
    }

    // STEP 2: Verify OTP & Login
    public function verifyLoginOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
            'otp'    => 'required|digits:6'
        ]);

        $mobile = $request->mobile;
        $otp    = $request->otp;

        $storedOtp = Cache::get("login_otp_{$mobile}");

        // Verify OTP
        if (!$storedOtp || $storedOtp != $otp) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP'
            ]);
        }

        // Find user again
        $user = User::where('whatsapp_number', '91' . $mobile)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ]);
        }

        // Clear OTP after use
        Cache::forget("login_otp_{$mobile}");

        // Update user status
        $user->update([
            'is_online' => 1,
            'last_seen' => Carbon::now('UTC')
        ]);

        // Your custom session login (matches your existing system)
        Session::put('LoggedIn', $user->id);
        Session::put('user_session', $user);

        // Optional: Use Laravel's auth if needed
        // auth()->login($user);

        return response()->json([
            'success' => true,
            'message' => 'Login successful!',
            'redirect' => url('/overview')
        ]);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                // dd($user);
                // if ($user->email_verified_at === null) {
                //     return back()->with('fail', 'Your account is not verified. Please verify your email.');
                // }

                $user->update(['is_online' => 1, 'last_seen' => Carbon::now('UTC')]);
                $request->session()->put('LoggedIn', $user->id);
                $user_session = User::where('id', Session::get('LoggedIn'))->first();
                $request->session()->put('user_session', $user);
                $userId = Session::get('LoggedIn');

                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'Email is not registered');
        }
    }


    function userNotifications()
    {
        $notifications = Notification::where('user_type', 2)
            ->where('is_seen', 'no')
            ->orderByDesc('created_at')
            ->paginate(5);
        return response()->json($notifications);
    }

    public function term()
    {

        $pages = Page::all();
        $user_session = User::where('id', Session::get('LoggedIn'))->first();



        // Pass the order ID to the success view for triggering the PDF download
        return view('term', compact('user_session',  'pages'));
    }


    private function authenticatedUser()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('/login')->with('fail', 'You must be logged in first.');
        }

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        if (!$user_session) {
            Session::forget('LoggedIn');
            return redirect('/login')->with('fail', 'Session expired. Please login again.');
        }

        return $user_session;
    }

    // 1. Dashboard / Overview
    public function overview()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('login')->with('fail', 'Please login first.');
        }

        $user_session = User::find(Session::get('LoggedIn'));

        // Get active challenge with proper relationship
        $challenge = $user_session->challenges()
            ->with(['planPurchase.plan', 'planPurchase' => function ($query) {
                $query->where('status', 'approved');
            }])
            ->where('status', 'active')
            ->latest()
            ->first();

        // If no active challenge, check for approved plan purchases
        if (!$challenge) {
            $approvedPlanPurchase = $user_session->planPurchases()
                ->where('status', 'approved')
                ->latest()
                ->first();

            if ($approvedPlanPurchase) {
                // Try to find any challenge (including inactive) for this plan
                $challenge = $user_session->challenges()
                    ->where('plan_id', $approvedPlanPurchase->funding_plan_id)
                    ->latest()
                    ->first();
            }
        }

        // Calculate metrics with proper filtering
        $openOrders = Order::where('user_id', $user_session->id)
            ->where('status', 0)
            ->where('challenge_id', $challenge->id ?? null)
            ->count();

        $completedTrades = TradeLog::where('user_id', $user_session->id)
            ->whereNotNull('exit_time')
            ->where('challenge_id', $challenge->id ?? null)
            ->count();

        $canceledOrders = Order::where('user_id', $user_session->id)
            ->where('status', 9)
            ->where('challenge_id', $challenge->id ?? null)
            ->count();

        $totalPnL = TradeLog::where('user_id', $user_session->id)
            ->whereNotNull('exit_time')
            ->where('challenge_id', $challenge->id ?? null)
            ->sum('profit_loss');

        // Get recent data
        $recentOrders = Order::where('user_id', $user_session->id)
            ->where('challenge_id', $challenge->id ?? null)
            ->latest()
            ->limit(5)
            ->get();

        $recentTrades = TradeLog::where('user_id', $user_session->id)
            ->whereNotNull('exit_time')
            ->where('challenge_id', $challenge->id ?? null)
            ->latest('exit_time')
            ->limit(5)
            ->get();

        // Calculate challenge progress if exists
        $challengeProgress = null;
        if ($challenge) {
            $challengeProgress = [
                'profit_target_percent' => $challenge->profit_target_percent ?? 8,
                'current_profit_percent' => $challenge->total_profit > 0
                    ? ($challenge->total_profit / $challenge->start_balance) * 100
                    : 0,
                'progress_percent' => min(
                    100,
                    ($challenge->total_profit / ($challenge->start_balance * ($challenge->profit_target_percent / 100))) * 100
                ),
                'days_remaining' => max(0, ($challenge->max_trading_days ?? 30) - $challenge->trading_days_elapsed),
                'daily_drawdown_percent' => $challenge->current_daily_loss_percent ?? 0,
                'overall_drawdown_percent' => $challenge->current_overall_loss_percent ?? 0,
            ];
        }

        return view('overview', [
            'user_session'      => $user_session,
            'challenge'         => $challenge,
            'challengeProgress' => $challengeProgress,
            'openOrders'        => $openOrders,
            'completedTrades'   => $completedTrades,
            'canceledOrders'    => $canceledOrders,
            'totalPnL'          => $totalPnL,
            'recentOrders'      => $recentOrders,
            'recentTrades'      => $recentTrades,
            'hasActivePlan'     => $user_session->planPurchases()->where('status', 'approved')->exists(),
        ]);
    }

    // 2. Manage Orders
    public function orders()
    {
        $user_session = $this->authenticatedUser();
        if ($user_session instanceof \Illuminate\Http\RedirectResponse) return $user_session;
        $orders = Order::where('user_id', $user_session->id)
            ->with('challenge')
            ->orderby('created_at', 'desc')->get();
        return view('orders', compact('user_session', 'orders'));
    }

    // 3. Trade History
    public function tradeHistory()
    {
        $user_session = $this->authenticatedUser();
        if ($user_session instanceof \Illuminate\Http\RedirectResponse) return $user_session;
        $trades = TradeLog::where('user_id', $user_session->id)
            ->whereNotNull('exit_time')
            ->latest('exit_time')
            ->get();

        $totalTrades = $trades->count();
        $winningTrades = $trades->where('profit_loss', '>', 0)->count();
        $winRate = $totalTrades > 0 ? round(($winningTrades / $totalTrades) * 100, 1) : 0;
        $netProfit = $trades->sum('profit_loss');
        $avgHolding = $totalTrades > 0
            ? gmdate('H\hi', (int)$trades->avg('holding_seconds'))
            : '00h 00m';
        return view('trade-history', compact(
            'user_session',
            'trades',
            'winRate',
            'totalTrades',
            'netProfit',
            'avgHolding'
        ));
    }

    // 4. Deposit History
    public function depositHistory()
    {
        $user_session = $this->authenticatedUser();
        if ($user_session instanceof \Illuminate\Http\RedirectResponse) return $user_session;

        // Fix: Use 'user_id' instead of 'id'
        $purchases = PlanPurchase::with(['plan', 'approver'])
            ->where('user_id', $user_session->id)
            ->latest()
            ->get();
        // dd($purchases);
        return view('deposit-history', compact('user_session', 'purchases'));
    }

    // 5. Withdraw History
    public function withdrawHistory()
{
    $user_session = $this->authenticatedUser();
    if ($user_session instanceof \Illuminate\Http\RedirectResponse) return $user_session;

    $withdrawals = Withdrawal::where('user_id', $user_session->id)
    ->latest()
    ->paginate(50);

    // Get active challenge for balance display
    $challenge = $user_session->challenges()->where('status', 'active')->latest()->first();
    $availableBalance = $challenge ? $challenge->current_balance : 0;

    return view('withdraw-history', compact('user_session', 'withdrawals', 'challenge', 'availableBalance'));
}



    public function storeRequest(Request $request)
    {


        $request->validate([
            'amount' => 'required|numeric|min:100',
            'bank_name' => 'required|string',
            'account_holder' => 'required|string',
            'account_number' => 'required|string',
            'ifsc_code' => 'required|string',
        ]);
        $user_session = $this->authenticatedUser();
        if ($user_session instanceof \Illuminate\Http\RedirectResponse) return $user_session;
        $challenge = $user_session->challenges()->where('status', 'active')->latest()->first();
        if (!$challenge || $request->amount > $challenge->current_balance) {
            return back()->with('fail', 'Amount exceeds available balance.');
        }

        $charge = $request->amount * 0.02; // 2% fee
        $finalAmount = $request->amount - $charge;

        Withdrawal::create([
            'user_id' => $user_session->id,
            'challenge_id' => $challenge->id,
            'trx'            => 'WD-' . strtoupper(Str::random(10)), // ✅ FIX
            'amount' => $request->amount,
            'charge' => $charge,
            'final_amount' => $finalAmount,
            'bank_name' => $request->bank_name,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'ifsc_code' => $request->ifsc_code,
            'status' => Withdrawal::STATUS_PENDING,
        ]);

        return redirect()->route('withdraw.history')->with('success', 'Withdrawal request submitted.');
    }

    // 6. KYC


    // 7. My Affiliation (Referrals)
    public function affiliation()
    {
        $user_session = $this->authenticatedUser();
        if ($user_session instanceof \Illuminate\Http\RedirectResponse) return $user_session;

        return view('affiliation', compact('user_session'));
    }

    // 8. Calculator
    public function calculator()
    {
        $user_session = $this->authenticatedUser();
        if ($user_session instanceof \Illuminate\Http\RedirectResponse) return $user_session;

        return view('calculator', compact('user_session'));
    }

    // 9. Transaction History
    public function transactions()
    {
        $user_session = $this->authenticatedUser();
        if ($user_session instanceof \Illuminate\Http\RedirectResponse) return $user_session;

        return view('transactions', compact('user_session'));
    }

    // 10. Get Support
    public function support()
    {
        $user_session = $this->authenticatedUser();
        if ($user_session instanceof \Illuminate\Http\RedirectResponse) return $user_session;

        return view('support', compact('user_session'));
    }


    public function verification()
    {
        if (Session::has('LoggedIn')) {

            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();


            return view('verification', compact('user_session',   'pages'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function blog_detail($slug) // <-- Laravel auto-injects the {slug} from route
    {
        // Find the blog by slug
        $blog_detail = Blog::where('slug', $slug)->firstOrFail();

        // Load comments with replies in one query (efficient + includes replies)
        $blogComments = BlogComment::with('user', 'blogCommentReplies.user')
            ->where('blog_id', $blog_detail->id)
            ->where('status', 1)
            ->whereNull('parent_id')
            ->latest()
            ->get();

        // Count active comments (main + replies)
        $commentCount = BlogComment::where('blog_id', $blog_detail->id)
            ->where('status', 1)
            ->count();

        $latest_posts = Blog::where('id', '!=', $blog_detail->id)
            ->latest()
            ->take(6)
            ->get();
        $categories = BlogCategory::whereHas('blogs', function ($q) {
            $q->where('status', 1);
        })
            ->with([
                'blogs' => function ($q) {
                    $q->where('status', 1)
                        ->latest(); // removed limit(6)
                }
            ])
            ->orderBy('name')
            ->get();
        $user_session = auth()->check() ? auth()->user() : null;
        // OR if you use session: User::find(Session::get('LoggedIn'))

        return view('blog_detail', compact(
            'blog_detail',
            'blogComments',
            'commentCount',
            'latest_posts',
            'categories',
            'user_session'
        ));
    }




    public function addpaymentmethod(Request $request)
    {
        // Retrieve the user ID from the session
        $userId = session('LoggedIn');

        if (!$userId) {
            return back()->with('fail', 'Session expired. Please log in again.');
        }

        // Fetch the user and associated data
        $user_session = User::find($userId);
        $qrcode = BankDetails::orderby('id', 'desc')->first();
        $pages = Page::all();

        return view('addpaymentmethod', compact('user_session', 'pages', 'qrcode'));
    }

    public function ayuda(Request $request)
    {
        $query = $request->get('query'); // Capture the search query

        $supportQuestions = SupportTicketQuestion::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('question', 'like', '%' . $query . '%')
                ->orWhere('answer', 'like', '%' . $query . '%');
        })->paginate(9); // Adjust number of items per page


        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $pages = Page::all();

        return view('ayuda', compact('user_session', 'pages', 'supportQuestions', 'query'));
    }


    public function sendResetPasswordLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('fail', 'Email address not found.');
        }
        $token = Str::random(40);


        $datetime = Carbon::now()->format('Y-m-d H:i:s');

        $token = PasswordReset::updateOrCreate(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => $datetime
            ]
        );

        // Send the password reset notification
        $user->notify(new ResetPasswordNotification($token));

        return back()->with('success', 'Enlace para restablecer la contraseña enviado correctamente.');
    }


    public function dashboard()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            // dd($sales);
            $pages = Page::all();

            return view('overview', compact('user_session', 'pages'));
        } else {
            // Redirect to the login page if the user is not logged in
            return redirect()->route('Userlogin'); // or use 'login' if you have a named route for login
        }
    }
    public function welcome()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $pages = Page::all();

            return view('welcome', compact('user_session', 'pages'));
        } else {
            // Redirect to the login page if the user is not logged in
            return redirect()->route('Userlogin'); // or use 'login' if you have a named route for login
        }
    }

    public function blogs(Request $request)
    {
        $query        = $request->get('query');
        $categorySlug = $request->get('category');

        /**
         * ---------------------------------------------
         * 1. MAIN BLOG LIST (paginated + search + filter)
         * ---------------------------------------------
         */
        $blogsQuery = Blog::query()
            ->when($query, function ($q) use ($query) {
                $q->where(function ($sq) use ($query) {
                    $sq->where('title', 'like', "%{$query}%")
                        ->orWhere('short_description', 'like', "%{$query}%")
                        ->orWhere('details', 'like', "%{$query}%");
                });
            })
            ->when($categorySlug, function ($q) use ($categorySlug) {
                $q->whereHas('category', function ($sq) use ($categorySlug) {
                    $sq->where('slug', $categorySlug);
                });
            })
            ->where('status', 1)
            ->latest();

        $blogs = (clone $blogsQuery)
            ->paginate($categorySlug ? 12 : 9)
            ->withQueryString();

        /**
         * ---------------------------------------------
         * 2. Latest posts (sidebar)
         * ---------------------------------------------
         */
        $latest_posts = Blog::where('status', 1)
            ->latest()
            ->take(6)
            ->get();

        /**
         * ---------------------------------------------
         * 3. ALL blogs per category (NO LIMIT)
         * Only categories that have blogs will show
         * ---------------------------------------------
         */
        $categories = BlogCategory::whereHas('blogs', function ($q) {
            $q->where('status', 1);
        })
            ->with([
                'blogs' => function ($q) {
                    $q->where('status', 1)
                        ->latest(); // removed limit(6)
                }
            ])
            ->orderBy('name')
            ->get();

        /**
         * ---------------------------------------------
         * 4. Current category for page header
         * ---------------------------------------------
         */
        $currentCategory = $categorySlug
            ? BlogCategory::where('slug', $categorySlug)->first()
            : null;

        return view('blog', compact(
            'blogs',
            'latest_posts',
            'categories',
            'currentCategory',
            'query'
        ));
    }


    public function newsDetails(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $news = News::findOrFail($request->id);
            $comments = Comment::where('news_id', $request->id)->latest()->get();
            $reactions = Reaction::where('news_id', $request->id)->pluck('count', 'type');
            $latest_posts = News::latest()->take(3)->get();
            $user_session = User::find(Session::get('LoggedIn'));

            return view('newsDetails', compact('user_session', 'news', 'latest_posts', 'comments', 'reactions'));
        } else {
            return redirect('Userlogin')->with('fail', 'Tienes que iniciar sesión primero');
        }
    }

    public function Reactionstore(Request $request)
    {
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'type' => 'required|in:cool,bad,lol,sad'
        ]);

        $reaction = Reaction::firstOrCreate([
            'news_id' => $request->news_id,
            'type' => $request->type,
        ]);

        $reaction->increment('count');

        return response()->json(['success' => true, 'count' => $reaction->count]);
    }

    public function Commentstore(Request $request)
    {
        // // Validate the request
        // $request->validate([
        //     'news_id' => 'required|exists:news,id',
        //     'author' => 'required|string|max:255',
        //     'email' => 'required|email',
        //     'comment' => 'required|string',
        //     'privacy_policy' => 'accepted' // Ensure this field is validated
        // ]);
        // Get the logged-in user's ID from the session
        $user_id = Session::get('LoggedIn');
        // Create the comment
        $comment = Comment::create([
            'news_id' => $request->news_id,
            'user_id' => $user_id,
            'author' => $request->author,
            'email' => $request->email,
            'comment' => $request->comment
        ]);

        // Return the created comment as JSON
        return response()->json([
            'message' => 'Comentario enviado con éxito.',
            'comment' => $comment
        ]);
    }
    public function trading(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $query = $request->get('query');
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $latest_posts = News::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%')->orWhere('author', 'like', '%' . $query . '%');
            })->orderBy('id', 'DESC')->paginate(9);

            return view('trading.dashboard', compact('user_session', 'latest_posts'));
        } else {
            return Redirect('Userlogin')->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function news_category($slug)
    {
        $news = DB::table('blogs')
            ->join('blog_categories', 'blogs.blog_category_id', '=', 'blog_categories.id')
            ->where('blog_categories.slug', $slug)
            ->select('blogs.*')
            ->get();

        // dd($news);
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $title = $slug;
        $data['blogComments'] = BlogComment::active();
        $blogComments = $data['blogComments']->whereNull('parent_id')->get();
        $pages = Page::all();
        $latest_posts = Blog::orderBy('id', 'DESC')->paginate(3);

        return view('news_category', compact('user_session', 'latest_posts', 'title', 'news', 'pages', 'blogComments'));
    }
    public function blogCommentStore(Request $request)
    {
        $comment = new BlogComment();
        $comment->blog_id = $request->blog_id;
        $comment->user_id = $request->user_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->status = 1;

        if ($comment->save()) {
            // Retrieve updated comments for the specific blog
            $blogComments = BlogComment::active()
                ->where('blog_id', $request->blog_id)
                ->whereNull('parent_id')
                ->get();

            return response()->json([
                'success' => true,

            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function blogCommentReplyStore(Request $request)
    {
        // dd($request->all());
        if ($request->user_id && $request->reply_comment) {
            $comment = new BlogComment();
            $comment->blog_id = $request->blog_id;
            $comment->user_id = $request->user_id;

            $comment->comment = $request->reply_comment;
            $comment->status = 1;
            $comment->parent_id = $request->parent_id;
            $comment->save();

            return response()->json([
                'success' => true,
                'message' => 'Comment successfully added.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store comment.',
            ]);
        }
    }

    public function searchBlogList(Request $request)
    {
        $data['blogs'] = Blog::active()->where('title', 'like', "%{$request->title}%")->get();


        return view('frontend.blog.render-search-blog-list', $data);
    }


    public function service()
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();


        return view('service', compact('user_session', 'pages'));
    }
    public function contact()
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();


        return view('contact', compact('user_session', 'pages'));
    }


    public function book(Request $request)
    {
        if (Session::has('LoggedIn')) {
            // Get the currently logged-in user
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            // Fetch users with their children (for multi-level marketing)
            $users = User::with('children')->where('refer', $user_session->id)->get();  // Get users referred by the logged-in user

            return view('book', compact('user_session', 'users'));
        } else {
            return Redirect('Userlogin')->with('fail', 'Tienes que iniciar sesión primero');
        }
    }













    public function change_password(Request $request)
    {

        $data = array();
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', '=', Session::get('LoggedIn'))->first();
        }
        $pages = Page::all();
        return view('change_password', compact('user_session', 'pages'));
    }
    public function update_password(Request $request)
    {


        $request->validate([
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        # Update the new Password
        $data = User::find($request->user_id);
        $data->password = ($request->new_password);
        $data->save();

        return back()->with('success', 'Successfully Updated');
    }



    public function logout(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $data = User::find(Session::get('LoggedIn'));
            if ($data) {
                $data->update(['is_online' => 0, 'last_seen' => Carbon::now('America/La_Paz')]);
            }

            Session::forget('LoggedIn');
            Session::forget('user_session');
            $request->session()->invalidate();
            return redirect('/');
        }

        return redirect('/'); // In case session is not set
    }


    public function edit_profile()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $pages = Page::all();
            return view('edit_profile', compact('user_session', 'pages'));
        }
    }
    public function update_profile(Request $request)
    {
        // dd($request->all());
        try {
            $user = User::find($request->user_id);

            if ($request->hasFile('profile_photo')) {
                $profilePhoto = $request->file('profile_photo');
                $imageName = time() . '_' . $profilePhoto->getClientOriginalName();
                $profilePhoto->move(public_path('profile_photo'), $imageName);

                // Elimina la foto anterior si existe y guarda la nueva
                if ($user->profile_photo && file_exists(public_path('profile_photo/' . $user->profile_photo))) {
                    unlink(public_path('profile_photo/' . $user->profile_photo));
                }
                $user->profile_photo = $imageName;
            }

            $user->name = $request->name;
            $user->about = $request->bio;
            $user->username = $request->username;
            $user->mobile_number = "591" . $request->mobile_number;
            $user->email = $request->email;
            $user->facebook = $request->facebook ?? $user->facebook;
            $user->instagram = $request->instagram ?? $user->instagram;
            $user->linkedin = $request->linkedin ?? $user->linkedin;
            $user->twitter = $request->twitter ?? $user->twitter;

            if ($user->save()) {
                return redirect()->back()->with('success', 'Perfil actualizado con éxito');
            } else {
                return redirect()->back()->with('fail', 'Error al actualizar el perfil');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Error: ' . $e->getMessage());
        }
    }





    public function forget_password()
    {
        $pages = Page::all();
        return view('forget_password', compact('pages'));
    }
    public function forget_mail(Request $request)
    {
        try {
            $customer = User::where('email', $request->email)->get();

            if (count($customer) > 0) {

                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain . '/ResetPasswordLoad?token=' . $token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = "Password Reset";
                $data['body'] = "Please click on below link to reset your password.";
                $data['auth'] = "SkyForecastingTeam";

                Mail::to($request->email)->send(
                    new SendMailreset(
                        $token,
                        $request->email,
                        $data
                    )
                );


                $datetime = Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $datetime
                    ]
                );
                return redirect('forget_password')->with('success', 'Please check your mail to reset your password');
                // return response()->json(['success' => true, 'msg' => 'Please check your mail to reset your password.']);
            } else {
                return redirect('forget_password')->with('fail', 'User not found');
                // return response()->json(['fail' => false, 'msg' => 'User not found']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function ResetPasswordLoad(Request $request)
    {

        $resetData =  PasswordReset::where('token', $request->token)->get();
        if (isset($request->token) && count($resetData) > 0) {
            $customer = User::where('email', $resetData[0]['email'])->get();
            $pages = Page::all();
            return view('ResetPasswordLoad', ['customer' => $customer], compact('pages'));
        }
    }



    public function ResetPassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'new_password' => ['required', 'string', 'min:8', 'max:30'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);

        // Retrieve the user by email
        $data = User::where('email', $request->email)->first();

        // Check if user exists
        if (!$data) {
            return redirect()->back()->with('fail', 'User not found.');
        }

        // Hash and save the new password
        $data->password = bcrypt($request->new_password);
        $data->custom_password = $request->new_password; // If you need plain text storage
        $data->update();

        // Delete the password reset entry
        PasswordReset::where('email', $data->email)->delete();
        if ($data->is_super_admin == 1) {
            // Redirigir a la página de inicio de sesión del administrador
            return redirect()->to('admin/login'); // O usar 'http://127.0.0.1:8000/admin/login' si es necesario
        } else {
            // Redirigir a la página de inicio de sesión del usuario con un mensaje de éxito
            return redirect('Userlogin')->with('success', 'Contraseña restablecida con éxito.');
        }
    }
}

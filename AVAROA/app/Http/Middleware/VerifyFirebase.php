<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\FirebaseHelper;
use Kreait\Firebase\Exception\Auth\InvalidToken;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VerifyFirebase
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['error' => 'Unauthorized: No token provided'], 401);
        }

        try {
            $verifiedIdToken = FirebaseHelper::auth()->verifyIdToken($token);
            $uid = $verifiedIdToken->claims()->get('sub');

            $user = User::firstOrCreate(
                ['uid' => $uid],
                ['email' => $verifiedIdToken->claims()->get('email') ?? null]
            );

            // Attach uid and firebaseUser to request
            $request->attributes->set('uid', $uid);
            $request->attributes->set('firebaseUser', $verifiedIdToken);

            Auth::login($user);
            return $next($request);
        } catch (InvalidToken $e) {
            Log::error('Invalid Firebase token: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid token: ' . $e->getMessage()], 401);
        } catch (\Exception $e) {
            Log::error('Authentication error: ' . $e->getMessage());
            return response()->json(['error' => 'Authentication error: ' . $e->getMessage()], 500);
        }
    }
}

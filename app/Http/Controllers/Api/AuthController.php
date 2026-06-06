<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Google\Client as GoogleClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{



public function googleRegister(Request $request)
{
    try {
        $request->validate([
            'id_token' => 'required|string',
            'whatsapp_number' => 'nullable|string|max:20',
        ]);

        // Verify Google ID token
        $idToken = $request->id_token;
        $client = new GoogleClient();
        $client->setClientId('67662782473-8e4bpd8mu3a9md92o597ppsm82iqp2jf.apps.googleusercontent.com');
        $payload = $client->verifyIdToken($idToken);

        if (!$payload) {
            Log::error('Invalid Google ID token', ['id_token' => $idToken]);
            return response()->json(['message' => 'Invalid Google ID token'], 401);
        }

        $googleId = $payload['sub'];
        $email = $payload['email'];
        $name = $payload['name'];

        // Check if user already exists
        $user = User::where('email', $email)->first();
        if ($user) {
            Log::info('User already exists, logging in', ['email' => $email]);
            return $this->googleLogin($request); // Reuse googleLogin logic
        }

        // Create new user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make(uniqid()), // Generate a random password
            'whatsapp_number' => $request->whatsapp_number,
            'google_id' => $googleId,
        ]);

        if (!$user) {
            Log::error('Failed to create user', $request->all());
            return response()->json(['message' => 'Failed to create user'], 500);
        }

        // Generate token
        if (!\Schema::hasTable('personal_access_tokens')) {
            Log::error('personal_access_tokens table not found');
            return response()->json(['message' => 'Token table not found'], 500);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        Log::info('Token created for user ID: ' . $user->id, ['token' => $token]);

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    } catch (\Exception $e) {
        Log::error('Google registration error', ['error' => $e->getMessage()]);
        return response()->json(['message' => 'Google registration failed', 'error' => $e->getMessage()], 500);
    }
}

public function googleLogin(Request $request)
    {
        try {
            $request->validate([
                'id_token' => 'required|string',
                'whatsapp_number' => 'nullable|string|max:20',
            ]);

            // Verify Google ID token
            $idToken = $request->id_token;
            $client = new GoogleClient();
            $client->setClientId(env('GOOGLE_CLIENT_ID')); // Use .env
            $payload = $client->verifyIdToken($idToken);

            if (!$payload) {
                Log::error('Invalid Google ID token', ['id_token' => $idToken]);
                return response()->json(['message' => 'Invalid Google ID token'], 401);
            }

            $email = $payload['email'];
            $name = $payload['name'] ?? 'Google User';
            $googleId = $payload['sub'];

            // Find or create user
            $user = User::where('email', $email)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt('google_' . $googleId),
                    'whatsapp_number' => $request->whatsapp_number ?? '',
                    'google_id' => $googleId,
                ]);
                Log::info('New user created', ['email' => $email]);
            } else {
                $user->update([
                    'whatsapp_number' => $request->whatsapp_number ?? $user->whatsapp_number,
                    'google_id' => $googleId,
                ]);
                Log::info('User updated', ['email' => $email, 'whatsapp_number' => $request->whatsapp_number]);
            }

            // Log the user in
            Auth::login($user);

            // Generate token
            if (!\Schema::hasTable('personal_access_tokens')) {
                Log::error('personal_access_tokens table not found');
                return response()->json(['message' => 'Token table not found'], 500);
            }

            $token = $user->createToken('auth_token')->plainTextToken;
            Log::info('Token created for user ID: ' . $user->id, ['token' => $token]);

            return response()->json([
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'whatsapp_number' => $user->whatsapp_number,
                ],
                'token' => $token,
            ], 200);
        } catch (ValidationException $e) {
            Log::error('Google login validation error', ['errors' => $e->errors()]);
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Google login error', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Google login failed', 'error' => $e->getMessage()], 500);
        }
    }
   public function register(Request $request)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'whatsapp_number' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'whatsapp_number' => $request->whatsapp_number,
        ]);

        if (!$user) {
            Log::error('Failed to create user', $request->all());
            return response()->json(['message' => 'Failed to create user'], 500);
        }

        try {
            if (!\Schema::hasTable('personal_access_tokens')) {
                Log::error('personal_access_tokens table not found');
                return response()->json(['message' => 'Token table not found'], 500);
            }

            $token = $user->createToken('auth_token')->plainTextToken;
            Log::info('Token created for user ID: ' . $user->id, ['token' => $token]);
        } catch (\Exception $e) {
            Log::error('Token creation failed for user ID: ' . $user->id, ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Token creation failed', 'error' => $e->getMessage()], 500);
        }

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    } catch (\Exception $e) {
        Log::error('Registration error', ['error' => $e->getMessage()]);
        return response()->json(['message' => 'Registration failed', 'error' => $e->getMessage()], 500);
    }
}

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            if (!Auth::attempt($request->only('email', 'password'))) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            $user = Auth::user();
            if (!$user) {
                Log::error('Authenticated user not found');
                return response()->json(['message' => 'User not found'], 401);
            }

            try {
                // Verify Sanctum table exists
                if (!\Schema::hasTable('personal_access_tokens')) {
                    Log::error('personal_access_tokens table not found');
                    return response()->json(['message' => 'Token table not found'], 500);
                }

                $token = $user->createToken('auth_token')->plainTextToken;
                Log::info('Token created for user ID: ' . $user->id, ['token' => $token]);
            } catch (\Exception $e) {
                Log::error('Token creation failed for user ID: ' . $user->id, ['error' => $e->getMessage()]);
                return response()->json(['message' => 'Token creation failed', 'error' => $e->getMessage()], 500);
            }

            return response()->json([
                'user' => $user,
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            Log::error('Login error', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Login failed', 'error' => $e->getMessage()], 500);
        }
    }
// Get authenticated user profile
   public function getProfile(Request $request)
{
    $user = $request->user();

    return response()->json([
        'name' => $user->name,
        'email' => $user->email,
        'phone' => $user->whatsapp_number, // Changed from phone to whatsapp_number
        'profile_image' => $user->profile_image_url ?? null, // Add if you have profile images
    ]);
}

public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp_number' => $request->phone, // Make sure this matches your DB column
        ]);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->whatsapp_number,
            ]
        ]);
    }
    public function logout(Request $request)
    {
        try {
            $user = Auth::guard('sanctum')->user();
            if (!$user) {
                Log::warning('No authenticated user found for logout');
                return response()->json(['message' => 'Unauthenticated'], 401);
            }

            // Revoke the current token
            $request->user()->currentAccessToken()->delete();
            Log::info('User logged out', ['user_id' => $user->id]);

            return response()->json(['message' => 'Logged out successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Logout error', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Logout failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function testToken(Request $request)
    {
        try {
            $user = User::first();
            if (!$user) {
                Log::warning('No users found for test token');
                return response()->json(['message' => 'No users found'], 404);
            }

            if (!\Schema::hasTable('personal_access_tokens')) {
                Log::error('personal_access_tokens table not found');
                return response()->json(['message' => 'Token table not found'], 500);
            }

            $token = $user->createToken('test_token')->plainTextToken;
            Log::info('Test token created for user ID: ' . $user->id, ['token' => $token]);
            return response()->json(['token' => $token]);
        } catch (\Exception $e) {
            Log::error('Test token creation failed', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Token creation failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function user(Request $request)
    {
        try {
            $user = $request->user();
            if (!$user) {
                return response()->json(['message' => 'User not authenticated'], 401);
            }
            return response()->json($user);
        } catch (\Exception $e) {
            Log::error('User fetch error', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Failed to fetch user', 'error' => $e->getMessage()], 500);
        }
    }
}

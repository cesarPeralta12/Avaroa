<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Fetch reviews for a specific worker, including client name.
     *
     * @param string $workerId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWorkerReviews($workerUid)
{
    Log::info('Fetching client-to-worker reviews for worker', ['worker_uid' => $workerUid]);
    try {
        // Map users.uid to users.id
        $user = DB::table('users')->select('id')->where('uid', $workerUid)->first();
        if (!$user) {
            Log::warning('No user found for worker_uid', ['worker_uid' => $workerUid]);
            return response()->json([
                'status' => 'error',
                'message' => 'No user found for provided worker UID',
            ], 404);
        }
        $workerId = $user->id;

        // Fetch reviews
        $reviews = Review::with(['client:id,name'])
            ->select(
                'reviews.id',
                'reviews.service_request_id',
                'reviews.worker_id',
                'reviews.client_id',
                'reviews.rating',
                'reviews.comment',
                'reviews.created_at',
                'reviews.updated_at',
                'service_requests.category',
                'service_requests.subcategory',
                'service_requests.date as service_date'
            )
            ->join('service_requests', 'reviews.service_request_id', '=', 'service_requests.id')
            ->where('reviews.worker_id', $workerId)
            ->where('reviews.review_type', 'client_to_worker')
            ->orderBy('reviews.created_at', 'desc')
            ->get()
            ->map(function ($review) {
                return [
                    'id' => $review->id,
                    'service_request_id' => $review->service_request_id,
                    'worker_id' => $review->worker_id,
                    'client_id' => $review->client_id,
                    'client_name' => $review->client ? $review->client->name : 'Usuario Desconocido',
                    'rating' => $review->rating,
                    'comment' => $review->comment,
                    'created_at' => $review->created_at->toIso8601String(),
                    'updated_at' => $review->updated_at->toIso8601String(),
                    'service_category' => $review->category,
                    'service_subcategory' => $review->subcategory,
                    'service_date' => $review->service_date,
                ];
            });

        return response()->json([
            'status' => 'success',
            'data' => $reviews->isEmpty() ? [] : $reviews->toArray(),
        ], 200);
    } catch (\Exception $e) {
        Log::error('Failed to fetch reviews for worker', [
            'worker_uid' => $workerUid,
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to fetch reviews: ' . $e->getMessage(),
        ], 500);
    }
}
public function getByWorker($workerId)
{
    Log::info('Fetching client-to-worker reviews and profile for worker', ['worker_id' => $workerId]);
    try {
        // Map users.id to users.uid for chambeador_profiles
        $user = DB::table('users')->select('uid')->where('id', $workerId)->first();
        if (!$user) {
            Log::warning('No user found for worker_id', ['worker_id' => $workerId]);
            $uid = $workerId; // Fallback to workerId if no user found
        } else {
            $uid = $user->uid;
        }

        // Fetch reviews using worker_id (maps to users.id)
        $reviews = Review::with(['client:id,name'])
            ->select(
                'reviews.id',
                'reviews.service_request_id',
                'reviews.worker_id',
                'reviews.client_id',
                'reviews.rating',
                'reviews.comment',
                'reviews.created_at',
                'reviews.updated_at',
                'service_requests.category',
                'service_requests.subcategory',
                'service_requests.date'
            )
            ->join('service_requests', 'reviews.service_request_id', '=', 'service_requests.id')
            ->where('reviews.worker_id', $workerId)
            ->where('reviews.review_type', 'client_to_worker')
            ->orderBy('reviews.created_at', 'desc')
            ->get()
            ->map(function ($review) {
                return [
                    'id' => $review->id,
                    'service_request_id' => $review->service_request_id,
                    'worker_id' => $review->worker_id,
                    'client_id' => $review->client_id,
                    'client_name' => $review->client ? $review->client->name : 'Usuario Desconocido',
                    'rating' => $review->rating,
                    'comment' => $review->comment,
                    'created_at' => $review->created_at->toIso8601String(),
                    'updated_at' => $review->updated_at->toIso8601String(),
                    'service_category' => $review->category,
                    'service_subcategory' => $review->subcategory,
                    'service_date' => $review->date,
                ];
            });

        // Fetch worker profile using uid
        $profile = DB::table('chambeador_profiles')
            ->select(
                'name',
                'profile_image',
                'about_me',
                'skills',
                'category',
                'subcategories'
            )
            ->where('uid', $uid)
            ->first();

        // Log query details for debugging
        Log::debug('Profile query executed', [
            'worker_id' => $workerId,
            'uid' => $uid,
            'profile_found' => $profile !== null,
            'profile_data' => $profile ? (array) $profile : null,
        ]);

        // Provide default profile data if none exists
        $profileData = $profile ? [
            'name' => $profile->name ?? 'Unknown Worker',
            'profile_image' => $profile->profile_image ? asset('storage/' . $profile->profile_image) : null,
            'about_me' => $profile->about_me ?? 'No bio available',
            'skills' => $profile->skills ? json_decode($profile->skills, true) : [],
            'category' => $profile->category ?? 'No category available',
            'subcategories' => $profile->subcategories ? json_decode($profile->subcategories, true) : [],
        ] : [
            'name' => 'Unknown Worker',
            'profile_image' => null,
            'about_me' => 'No bio available',
            'skills' => [],
            'category' => 'No category available',
            'subcategories' => [],
        ];

        return response()->json([
            'status' => 'success',
            'data' => [
                'reviews' => $reviews,
                'profile' => $profileData,
            ],
        ], 200);
    } catch (\Exception $e) {
        Log::error('Failed to fetch reviews or profile for worker', [
            'worker_id' => $workerId,
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to fetch reviews or profile: ' . $e->getMessage(),
        ], 500);
    }
}

    /**
     * Store a new review (supports client-to-worker and worker-to-client reviews).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
{
    Log::info('Store review request received', ['data' => $request->all()]);

    // Validate request
    $validator = Validator::make($request->all(), [
        'service_request_id' => 'required|exists:service_requests,id',
        // worker_id can be Firebase UID or numeric ID
        'worker_id' => 'nullable|string',
        'client_id' => 'required|exists:users,id',
        'rating' => 'required|numeric|between:0,5',
        'comment' => 'nullable|string|max:1000',
        'review_type' => 'required|in:client_to_worker,worker_to_client',
    ]);

    if ($validator->fails()) {
        Log::error('Validation failed for review', ['errors' => $validator->errors()->toArray()]);
        return response()->json([
            'status' => 'error',
            'message' => $validator->errors(),
        ], 422);
    }

    // Get authenticated user
    $user = Auth::user();
    if (!$user) {
        Log::error('No authenticated user found');
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized: No authenticated user',
        ], 401);
    }

    // Find service request
    $serviceRequest = ServiceRequest::find($request->service_request_id);
    if (!$serviceRequest) {
        Log::error('Service request not found', ['service_request_id' => $request->service_request_id]);
        return response()->json([
            'status' => 'error',
            'message' => 'Service request not found',
        ], 404);
    }

    $reviewType = $request->review_type;

    // 🔹 Ensure worker_id is numeric (map Firebase UID -> user.id)
    $workerId = $request->worker_id;
    if ($workerId && !is_numeric($workerId)) {
        $worker = User::where('uid', $workerId)->first();
        if ($worker) {
            $workerId = $worker->id;
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Trabajador no encontrado',
            ], 404);
        }
    }

    // Check for existing review to prevent duplicates
    $existingReview = Review::where('service_request_id', $request->service_request_id)
        ->where('worker_id', $workerId)
        ->where('client_id', $request->client_id)
        ->where('review_type', $reviewType)
        ->first();

    if ($existingReview) {
        Log::warning('Duplicate review attempt', [
            'service_request_id' => $request->service_request_id,
            'worker_id' => $workerId,
            'client_id' => $request->client_id,
            'review_type' => $reviewType,
        ]);
        return response()->json([
            'status' => 'error',
            'message' => 'A review for this service request and user already exists',
        ], 409);
    }

    // Create review
    try {
        $review = Review::create([
            'service_request_id' => $request->service_request_id,
            'worker_id' => $workerId,
            'client_id' => $request->client_id,
            'rating' => $request->rating,
            'comment' => $request->comment ?? 'No comment provided',
            'review_type' => $reviewType,
        ]);

        $review->load('client:id,name', 'worker:id,name');

        // Update the rating of the reviewed user
        if ($reviewType === 'client_to_worker') {
            $reviewedUser = User::find($workerId);
            if ($reviewedUser) {
                $reviewedUser->rating = Review::where('worker_id', $reviewedUser->id)
                    ->where('review_type', 'client_to_worker')
                    ->avg('rating');
                $reviewedUser->save();
                Log::info('Updated worker rating', [
                    'worker_id' => $reviewedUser->id,
                    'new_rating' => $reviewedUser->rating,
                ]);
            }
        } elseif ($reviewType === 'worker_to_client') {
            $reviewedUser = User::find($request->client_id);
            if ($reviewedUser) {
                $reviewedUser->rating = Review::where('client_id', $reviewedUser->id)
                    ->where('review_type', 'worker_to_client')
                    ->avg('rating');
                $reviewedUser->save();
                Log::info('Updated client rating', [
                    'client_id' => $reviewedUser->id,
                    'new_rating' => $reviewedUser->rating,
                ]);
            }
        }

        Log::info('Review created successfully', ['review_id' => $review->id]);
        return response()->json([
            'status' => 'success',
            'message' => 'Review created successfully',
            'data' => $review,
        ], 201);
    } catch (\Exception $e) {
        Log::error('Failed to create review', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to create review: ' . $e->getMessage(),
        ], 500);
    }
}


    /**
     * Fetch reviews for a specific client.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        Log::info('Fetching reviews for client', ['client_id' => $request->query('client_id')]);
        try {
            $reviews = Review::with(['client', 'worker'])
                ->where('client_id', $request->query('client_id'))
                ->get()
                ->map(function ($review) {
                    return [
                        'id' => $review->id,
                        'client_name' => $review->client->name ?? 'Usuario Desconocido',
                        'rating' => $review->rating,
                        'time_ago' => $review->created_at->diffForHumans(),
                        'comment' => $review->comment,
                    ];
                });

            return response()->json([
                'status' => 'success',
                'data' => $reviews,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Failed to fetch client reviews', [
                'client_id' => $request->query('client_id'),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch reviews: ' . $e->getMessage(),
            ], 500);
        }
    }
}

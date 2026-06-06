<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FirebaseHelper;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Contract;
use App\Models\Proposal;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Factory;

class ChatController extends Controller
{
    protected $firestore;
    protected $firebaseAuth;

    public function __construct()
    {
        $this->middleware('throttle:60,1')->only('sendMessage');
        try {
            $firebase = (new Factory)
                ->withServiceAccount(public_path('firebase_credentials.json'))
                ->withDatabaseUri('https://clientchambeaapp-aa95d.firebaseio.com');
            $this->firestore = $firebase->createFirestore()->database();
            $this->firebaseAuth = FirebaseHelper::auth();
            Log::info('Firestore initialized successfully');
        } catch (\Exception $e) {
            Log::error('Failed to initialize Firestore', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            $this->firestore = null;
        }
    }

    public function initializeChat(Request $request)
    {
        if (!$this->firestore) {
            Log::error('Firestore not initialized for initializeChat');
            return response()->json([
                'status' => 'error',
                'message' => 'Firestore service unavailable',
            ], 500);
        }

        // Validate request with detailed error logging
        $validator = Validator::make($request->all(), [
            'request_id' => 'required|integer|exists:service_requests,id',
            'worker_id' => 'required|string|exists:users,uid',
            // 'account_type' => 'required|string|in:Client,Chambeador',
            'client_id' => 'required|string|exists:users,uid',
        ]);

        if ($validator->fails()) {
            Log::error('Chat initialization validation failed', [
                'input' => $request->all(),
                'errors' => $validator->errors()->toArray(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = Auth::user();
        if (!$user || !$user->uid) {
            Log::warning('Unauthorized access to initializeChat', [
                'user_id' => Auth::id(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized or missing Firebase UID',
            ], 401);
        }

        // if ($user->account_type !== $request->account_type) {
        //     Log::warning('Invalid account type for user', [
        //         'user_id' => $user->id,
        //         'account_type' => $user->account_type,
        //         'requested_account_type' => $request->account_type,
        //     ]);
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Invalid account type for user',
        //     ], 403);
        // }

        $client = User::where('uid', $request->client_id)->first();
        // if (!$client || $client->account_type !== 'Client') {
        //     Log::warning('Client not found or not a Client', [
        //         'client_id' => $request->client_id,
        //     ]);
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Client not found or not a Client',
        //     ], 404);
        // }

        $worker = User::where('uid', $request->worker_id)->first();
        // if (!$worker || $worker->account_type !== 'Chambeador') {
        //     Log::warning('Worker not found or not a Chambeador', [
        //         'worker_id' => $request->worker_id,
        //     ]);
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Worker not found or not a Chambeador',
        //     ], 404);
        // }

        $serviceRequest = ServiceRequest::find($request->request_id);
        if ($request->account_type === 'Client' && $serviceRequest->created_by !== $user->id) {
            Log::warning('Client not authorized for this request', [
                'request_id' => $request->request_id,
                'user_id' => $user->id,
                'created_by' => $serviceRequest->created_by,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Client not authorized for this request',
            ], 403);
        }

        // Generate consistent chat_id
        $chatId = "chat_{$request->request_id}_{$client->uid}_{$worker->uid}";

        Log::info('Initializing chat', [
            'chat_id' => $chatId,
            'request_id' => $request->request_id,
            'client_uid' => $client->uid,
            'worker_uid' => $worker->uid,
            'user_account_type' => $user->account_type,
        ]);

        // Check for existing chat in MySQL
        $existingChat = Chat::where('request_id', $request->request_id)
            ->where('client_id', $client->id)
            ->where('worker_id', $worker->id)
            ->first();

        if ($existingChat) {
            Log::info('Chat already exists in MySQL', [
                'chat_id' => $existingChat->chat_id,
                'request_id' => $request->request_id,
                'client_id' => $client->id,
                'worker_id' => $worker->id,
            ]);
            // Verify Firestore chat exists
            $chatRef = $this->firestore->collection('chats')->document($chatId);
            if (!$chatRef->snapshot()->exists()) {
                Log::warning('Chat exists in MySQL but not in Firestore, recreating', [
                    'chat_id' => $chatId,
                ]);
                $chatRef->set([
                    'request_id' => (int) $request->request_id,
                    'client_id' => $client->uid,
                    'worker_id' => $worker->uid,
                    'client_account_type' => 'Client',
                    'worker_account_type' => 'Chambeador',
                    'created_at' => now()->toIso8601String(),
                    'updated_at' => now()->toIso8601String(),
                ]);
            }
            return response()->json([
                'status' => 'success',
                'data' => [
                    'chat_id' => $existingChat->chat_id,
                    'client_id' => $client->uid,
                    'worker_id' => $worker->uid,
                    'request_id' => $existingChat->request_id,
                    'message' => 'Chat already initialized',
                ],
            ], 200);
        }

        // Check for existing chat in Firestore
        $chatRef = $this->firestore->collection('chats')->document($chatId);
        if ($chatRef->snapshot()->exists()) {
            Log::info('Chat already exists in Firestore but not in MySQL, creating in MySQL', [
                'chat_id' => $chatId,
                'request_id' => $request->request_id,
            ]);
            Chat::create([
                'request_id' => $request->request_id,
                'client_id' => $client->id,
                'worker_id' => $worker->id,
                'chat_id' => $chatId,
                'client_account_type' => 'Client',
                'worker_account_type' => 'Chambeador',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return response()->json([
                'status' => 'success',
                'data' => [
                    'chat_id' => $chatId,
                    'client_id' => $client->uid,
                    'worker_id' => $worker->uid,
                    'request_id' => $request->request_id,
                    'message' => 'Chat already initialized in Firestore',
                ],
            ], 200);
        }

        // Skip proposal validation if a contract exists
        $hasContract = Contract::where('service_request_id', $request->request_id)
            ->where('worker_id', $worker->id)
            ->where('client_id', $client->id)
            ->exists();

        if (!$hasContract && $request->account_type === 'Client') {
            $hasProposal = Proposal::where('service_request_id', $request->request_id)
                ->where('worker_id', $worker->id)
                ->whereIn('status', ['pending', 'accepted'])
                ->exists();

            if (!$hasProposal) {
                Log::warning('No proposal found for worker and request', [
                    'request_id' => $request->request_id,
                    'worker_id' => $worker->id,
                ]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Worker has not submitted a proposal for this request',
                ], 403);
            }
        }

        try {
            // Create chat in Firestore
            $chatRef->set([
                'request_id' => (int) $request->request_id,
                'client_id' => $client->uid,
                'worker_id' => $worker->uid,
                'client_account_type' => 'Client',
                'worker_account_type' => 'Chambeador',
                'created_at' => now()->toIso8601String(),
                'updated_at' => now()->toIso8601String(),
            ]);

            // Create chat in MySQL
            Chat::create([
                'request_id' => $request->request_id,
                'client_id' => $client->id,
                'worker_id' => $worker->id,
                'chat_id' => $chatId,
                'client_account_type' => 'Client',
                'worker_account_type' => 'Chambeador',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Log::info('Chat initialized', [
                'chat_id' => $chatId,
                'request_id' => $request->request_id,
                'client_id' => $client->id,
                'worker_id' => $worker->id,
            ]);

            return response()->json([
                'status' => 'success',
                'data' => [
                    'chat_id' => $chatId,
                    'client_id' => $client->uid,
                    'worker_id' => $worker->uid,
                    'request_id' => $request->request_id,
                    'message' => 'Chat initialized',
                ],
            ], 200);
        } catch (\Exception $e) {
            Log::error('Failed to initialize chat', [
                'chat_id' => $chatId,
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to initialize chat',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function sendMessage(Request $request)
    {
        if (!$this->firestore) {
            Log::error('Firestore not initialized for sendMessage');
            return response()->json([
                'status' => 'error',
                'message' => 'Firestore service unavailable',
            ], 500);
        }

        $request->validate([
            'chat_id' => 'required|string',
            'message' => 'required|string|max:1000',
            // 'account_type' => 'required|string|in:Client,Chambeador',
            'is_image' => 'sometimes|boolean',
        ]);

        $user = Auth::user();
        if (!$user || !$user->uid) {
            Log::warning('Unauthorized access to sendMessage', [
                'user_id' => Auth::id(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized or missing Firebase UID',
            ], 401);
        }

        // if ($user->account_type !== $request->account_type) {
        //     Log::warning('Invalid account type for sendMessage', [
        //         'user_id' => $user->id,
        //         'account_type' => $user->account_type,
        //         'requested_account_type' => $request->account_type,
        //     ]);
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Invalid account type for user',
        //     ], 403);
        // }

        $chatRef = $this->firestore->collection('chats')->document($request->chat_id);
        $chatSnapshot = $chatRef->snapshot();
        if (!$chatSnapshot->exists()) {
            Log::warning('Chat not found', [
                'chat_id' => $request->chat_id,
                'user_id' => $user->id,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Chat not found',
            ], 404);
        }

        $chatData = $chatSnapshot->data();
        if (($user->uid !== $chatData['client_id'] || $chatData['client_account_type'] !== 'Client') &&
            ($user->uid !== $chatData['worker_id'] || $chatData['worker_account_type'] !== 'Chambeador')) {
            Log::warning('Unauthorized to send message', [
                'chat_id' => $request->chat_id,
                'user_id' => $user->id,
                'user_account_type' => $user->account_type,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized to send message in this chat',
            ], 403);
        }

        // Ensure chat exists in MySQL chats table
        try {
            $existingChat = Chat::where('chat_id', $request->chat_id)->first();
            if (!$existingChat) {
                $client = User::where('uid', $chatData['client_id'])->first();
                $worker = User::where('uid', $chatData['worker_id'])->first();
                if (!$client || !$worker) {
                    Log::warning('Client or worker not found in users table', [
                        'chat_id' => $request->chat_id,
                        'client_id' => $chatData['client_id'],
                        'worker_id' => $chatData['worker_id'],
                    ]);
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Client or worker not found',
                    ], 404);
                }

                Chat::create([
                    'request_id' => (int) $chatData['request_id'],
                    'client_id' => $client->id,
                    'worker_id' => $worker->id,
                    'chat_id' => $request->chat_id,
                    'client_account_type' => 'Client',
                    'worker_account_type' => 'Chambeador',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                Log::info('Chat created in MySQL during sendMessage', [
                    'chat_id' => $request->chat_id,
                    'request_id' => $chatData['request_id'],
                    'client_id' => $client->id,
                    'worker_id' => $worker->id,
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Failed to create or update chat in MySQL', [
                'chat_id' => $request->chat_id,
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to ensure chat in database',
                'error' => $e->getMessage(),
            ], 500);
        }

        try {
            $messageData = [
                'sender_id' => (string) $user->uid,
                'message' => (string) $request->message,
                'timestamp' => now()->toIso8601String(),
                'read' => false,
                'sender_account_type' => (string) $user->account_type,
                'is_image' => $request->has('is_image') ? (bool) $request->is_image : false,
            ];

            Log::info('Preparing to send message', [
                'chat_id' => $request->chat_id,
                'user_id' => $user->id,
                'message_data' => $messageData,
            ]);

            $messageRef = $chatRef->collection('messages')->newDocument();
            $messageRef->set($messageData);

            $chatRef->update([
                ['path' => 'updated_at', 'value' => now()->toIso8601String()]
            ]);

            Chat::where('chat_id', $request->chat_id)->update(['updated_at' => now()]);

            $recipientId = $chatData['client_id'] === $user->uid ? $chatData['worker_id'] : $chatData['client_id'];
            $recipient = User::where('uid', $recipientId)->first();
            if ($recipient && $recipient->fcm_token) {
                $message = \Kreait\Firebase\Messaging\CloudMessage::withTarget('token', $recipient->fcm_token)
                    ->withNotification([
                        'title' => 'New Message',
                        'body' => substr($request->message, 0, 100),
                    ])
                    ->withData([
                        'type' => 'new_message',
                        'chat_id' => $request->chat_id,
                        'request_id' => (string) $chatData['request_id'],
                        'worker_id' => (string) $chatData['worker_id'],
                        'sender_account_type' => $user->account_type,
                        'is_image' => (string) ($request->has('is_image') ? $request->is_image : false),
                    ]);

                FirebaseHelper::messaging()->send($message);

                Log::info('Message sent and notification dispatched', [
                    'chat_id' => $request->chat_id,
                    'message_id' => $messageRef->id(),
                    'sender_id' => $user->id,
                    'recipient_id' => $recipient->id,
                    'sender_account_type' => $user->account_type,
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Message sent',
                'message_id' => $messageRef->id(),
            ], 200);
        } catch (\Exception $e) {
            Log::error('Failed to send message', [
                'chat_id' => $request->chat_id,
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send message',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getMessages(Request $request)
    {
        if (!$this->firestore) {
            Log::error('Firestore not initialized for getMessages');
            return response()->json([
                'status' => 'error',
                'message' => 'Firestore service unavailable',
            ], 500);
        }

        $request->validate([
            'chat_id' => 'required|string',
        ]);

        $user = Auth::user();
        if (!$user || !$user->uid) {
            Log::warning('Unauthorized access to getMessages', [
                'user_id' => Auth::id(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized or missing Firebase UID',
            ], 401);
        }

        $chatRef = $this->firestore->collection('chats')->document($request->chat_id);
        $chatSnapshot = $chatRef->snapshot();
        if (!$chatSnapshot->exists()) {
            Log::warning('Chat not found', [
                'chat_id' => $request->chat_id,
                'user_id' => $user->id,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Chat not found',
            ], 404);
        }

        $chatData = $chatSnapshot->data();
        if (($user->uid !== $chatData['client_id'] || $chatData['client_account_type'] !== 'Client') &&
            ($user->uid !== $chatData['worker_id'] || $chatData['worker_account_type'] !== 'Chambeador')) {
            Log::warning('Unauthorized to view chat', [
                'chat_id' => $request->chat_id,
                'user_id' => $user->id,
                'user_account_type' => $user->account_type,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized to view this chat',
            ], 403);
        }

        try {
            $messages = $chatRef->collection('messages')
                ->orderBy('timestamp', 'asc')
                ->documents()
                ->rows();

            $messageData = array_map(function ($doc) {
                return array_merge(['id' => $doc->id()], $doc->data());
            }, $messages);

            return response()->json([
                'status' => 'success',
                'data' => $messageData,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Failed to retrieve messages', [
                'chat_id' => $request->chat_id,
                'user_id' => $user->id,
                'user_account_type' => $user->account_type,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve messages',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function markMessageAsRead(Request $request)
    {
        if (!$this->firestore) {
            Log::error('Firestore not initialized for markMessageAsRead');
            return response()->json([
                'status' => 'error',
                'message' => 'Firestore service unavailable',
            ], 500);
        }

        $request->validate([
            'chat_id' => 'required|string',
            'message_id' => 'required|string',
        ]);

        $user = Auth::user();
        if (!$user || !$user->uid) {
            Log::warning('Unauthorized access to markMessageAsRead', [
                'user_id' => Auth::id(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized or missing Firebase UID',
            ], 401);
        }

        $chatRef = $this->firestore->collection('chats')->document($request->chat_id);
        $chatSnapshot = $chatRef->snapshot();
        if (!$chatSnapshot->exists()) {
            Log::warning('Chat not found', [
                'chat_id' => $request->chat_id,
                'user_id' => $user->id,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Chat not found',
            ], 404);
        }

        $chatData = $chatSnapshot->data();
        if (($user->uid !== $chatData['client_id'] || $chatData['client_account_type'] !== 'Client') &&
            ($user->uid !== $chatData['worker_id'] || $chatData['worker_account_type'] !== 'Chambeador')) {
            Log::warning('Unauthorized to mark message as read', [
                'chat_id' => $request->chat_id,
                'message_id' => $request->message_id,
                'user_id' => $user->id,
                'user_account_type' => $user->account_type,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized to mark message as read',
            ], 403);
        }

        $messageRef = $chatRef->collection('messages')->document($request->message_id);
        $messageSnapshot = $messageRef->snapshot();
        if (!$messageSnapshot->exists()) {
            Log::warning('Message not found', [
                'chat_id' => $request->chat_id,
                'message_id' => $request->message_id,
                'user_id' => $user->id,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Message not found',
            ], 404);
        }

        try {
            $messageRef->update([
                'read' => true,
            ]);

            Log::info('Message marked as read', [
                'chat_id' => $request->chat_id,
                'message_id' => $request->message_id,
                'user_id' => $user->id,
                'user_account_type' => $user->account_type,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Message marked as read',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Failed to mark message as read', [
                'chat_id' => $request->chat_id,
                'message_id' => $request->message_id,
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to mark message as read',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getChats(Request $request)
    {
        $user = Auth::user();
        if (!$user || !$user->uid) {
            Log::warning('Unauthorized access to getChats', [
                'user_id' => Auth::id(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized or missing Firebase UID',
            ], 401);
        }

        try {
            $chats = Chat::where(function ($query) use ($user) {
                $query->where('client_id', $user->id)
                      ->where('client_account_type', 'Client');
            })->orWhere(function ($query) use ($user) {
                $query->where('worker_id', $user->id)
                      ->where('worker_account_type', 'Chambeador');
            })->get();

            $chatData = $chats->map(function ($chat) {
                $worker = User::find($chat->worker_id);
                $client = User::find($chat->client_id);
                return [
                    'chat_id' => $chat->chat_id,
                    'request_id' => $chat->request_id,
                    'client_id' => $client ? $client->uid : $chat->client_id,
                    'worker_id' => $worker ? $worker->uid : $chat->worker_id,
                    'worker_name' => $worker ? $worker->name : 'Unknown',
                    'client_name' => $client ? $client->name : 'Unknown',
                    'client_account_type' => $chat->client_account_type,
                    'worker_account_type' => $chat->worker_account_type,
                    'last_message' => $this->getLastMessage($chat->chat_id),
                    'updated_at' => $chat->updated_at->toIso8601String(),
                ];
            });

            Log::info('Chats retrieved for user', [
                'user_id' => $user->id,
                'user_uid' => $user->uid,
                'chats' => $chatData->toArray(),
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $chatData,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Failed to retrieve chats', [
                'user_id' => $user->id,
                'user_account_type' => $user->account_type,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve chats',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    protected function getLastMessage($chatId)
    {
        if (!$this->firestore) {
            Log::error('Firestore not initialized for getLastMessage', [
                'chat_id' => $chatId,
            ]);
            return 'Firestore unavailable';
        }

        try {
            $messages = $this->firestore->collection('chats')
                ->document($chatId)
                ->collection('messages')
                ->orderBy('timestamp', 'desc')
                ->limit(1)
                ->documents()
                ->rows();

            return !empty($messages) ? $messages[0]->data()['message'] ?? 'No messages' : 'No messages';
        } catch (\Exception $e) {
            Log::error('Failed to retrieve last message', [
                'chat_id' => $chatId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return 'No messages';
        }
    }
}
?>

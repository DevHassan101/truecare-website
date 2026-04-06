<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Models\Message;
use App\Services\QuickBloxService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConversationController extends Controller
{

    public function registerQuickBlox(Request $request, QuickBloxService $qb)
    {
        $user = $qb->createUser('dummy', 'dummyPassword', 'dummyName');
        return response()->json($user);
    }

    public function sendMessge(Request $request)
    {
        try {
            $message = Message::create([
                'conversation_id' => $request->conversationId,
                'receiver_id' => $request->receiverId,
                'message' => $request->msg
            ]);

            try {
                event(new MessageEvent($message));
            } catch (\Throwable $th) {
                Log::error("Pusher failed: " . $th->getMessage());
            }

            return response()->json([
                'error' => false,
                'message' => 'message send successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getMessages(Request $request)
    {
        try {
            $messages = Message::where('conversation_id', $request->conversationId)->get();
            return response()->json([
                'error' => false,
                'messages' => $messages
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ]);
        }
    }
}

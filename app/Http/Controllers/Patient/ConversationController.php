<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index($conversation)
    {
        $conversation = Conversation::where('uid', $conversation)->firstOrFail();
        return view('patient.pages.conversation.index', compact('conversation'));
    }

    public function get(Request $request)
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

    public function addReview(Request $request, Appointment $appointment)
    {
        if (!$appointment) {
            abort(404, 'Appointment not found.');
        }

        $validated = $request->validate([
            'stars' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string|max:500',
            'recomnded' => 'required',
        ]);

        $validated['status'] = "completed";

        $appointment->update($validated);

        // dd($appointment);

        return redirect()->route('patient.appointment.show', ['appointment' => $appointment])
            ->with('success', 'Appointment has been Completed Successfully');
    }
}

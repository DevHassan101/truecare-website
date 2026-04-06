<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index($conversation) {
        $conversation = Conversation::where('uid', $conversation)->firstOrFail();
        return view('doctor.pages.conversation.index', compact('conversation'));
    }
}

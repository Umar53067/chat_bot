<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request, Chat $chat)
    {
        $this->authorize('view', $chat);

        $message = Message::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        
        $botResponse = "This is a static response from the bot.";

        Message::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'content' => $botResponse,
            'is_bot' => true,
        ]);

        return redirect()->route('chats.show', $chat);
    }
}


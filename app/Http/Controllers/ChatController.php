<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Auth::user()->chats ?? [];
        return view('chats.index', compact('chats'));
    }

    public function store(Request $request)
    {
        $chat = Chat::create(['user_id' => Auth::id()]);
        return redirect()->route('chats.show', $chat);
    }

    public function show(Chat $chat)
    {
        $this->authorize('view', $chat);
        $messages = $chat->messages()->with('user')->get();
        return view('chats.show', compact('chat', 'messages'));
    }
}

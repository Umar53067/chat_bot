<!-- resources/views/chats/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Your Chats</h1>
                    @if ($chats && !$chats->isEmpty())
                        <!-- Display existing chats -->
                        <a href="{{ route('chats.store') }}" class="btn btn-primary">New Chat</a>
                        <ul>
                            @foreach ($chats as $chat)
                                <li><a href="{{ route('chats.show', $chat) }}">Chat #{{ $chat->id }}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <!-- No chats found message and form -->
                        <p>No chats found. Start a new chat:</p>
                        <form action="{{ route('chats.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent text-white rounded-md">Start New Chat</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

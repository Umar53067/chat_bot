<!-- resources/views/chats/show.blade.php -->
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
                    <h1>Chat #{{ $chat->id }}</h1>
                    <ul>
                        @foreach ($messages as $message)
                            <li>{{ $message->user->name }}: {{ $message->content }} @if ($message->is_bot) (Bot) @endif</li>
                        @endforeach
                    </ul>
                    <form action="{{ route('messages.store', $chat) }}" method="POST">
                        @csrf
                        <textarea name="content" rows="3" required></textarea>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent text-white rounded-md">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

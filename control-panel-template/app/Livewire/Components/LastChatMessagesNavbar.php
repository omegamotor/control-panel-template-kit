<?php

namespace App\Livewire\Components;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LastChatMessagesNavbar extends Component
{

    public $messages;
    public $notReadedCount = 0;

    public function mount(){
        $this->notReadedCount = ChatMessage::select('author_id', DB::raw('MAX(created_at) as last_message_time'))
        ->where('receiver_id', Auth::id())
        ->where('is_readed', false)
        ->groupBy('author_id')
        ->orderBy('last_message_time', 'desc')
        ->take(3)
        ->get()
        ->map(function ($record) {
            return ChatMessage::where('author_id', $record->author_id)
                ->where('receiver_id', Auth::id())
                ->where('is_readed', false)
                ->orderBy('created_at', 'desc')
                ->first();
        })->count();
    }

    public function render()
    {
        $this->messages = ChatMessage::select('author_id', DB::raw('MAX(created_at) as last_message_time'))
            ->where('receiver_id', Auth::id())
            ->where('is_readed', false)
            ->groupBy('author_id')
            ->orderBy('last_message_time', 'desc')
            ->take(3)
            ->get()
            ->map(function ($record) {
                return ChatMessage::where('author_id', $record->author_id)
                    ->where('receiver_id', Auth::id())
                    ->where('is_readed', false)
                    ->orderBy('created_at', 'desc')
                    ->first();
            });


        return view('livewire.components.last-chat-messages-navbar');
    }
}

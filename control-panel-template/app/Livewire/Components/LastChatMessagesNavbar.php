<?php

namespace App\Livewire\Components;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\On;

class LastChatMessagesNavbar extends Component
{
    public $messages;
    public $notReadedCount = 0;

    public function render()
    {
        $this->loadData();
        return view('livewire.components.last-chat-messages-navbar');
    }

    #[On('load-messages')]
    public function loadData(){
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

        $this->notReadedCount = $this->messages->count();
    }
}

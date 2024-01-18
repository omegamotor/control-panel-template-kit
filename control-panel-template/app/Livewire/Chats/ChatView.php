<?php

namespace App\Livewire\Chats;

use App\Events\ChatPusherBroadcast;
use App\Models\ChatMessage;
use App\Models\User;
use Livewire\Component;
use App\Traits\FilterTrait;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class ChatView extends Component
{
    // use FilterTrait;

    public User|Null $activeUser;
    public $messages = [];
    public $previousMessageAuthorId = 0;
    // public $nextMessage = null;

    public $newMessage = '';

    public function render()
    {
        return view('livewire.chats.chat-view',[
            'users' => User::where('id', '!=', Auth::id())->get()
        ]);
    }

    public function setActiveUserTo(User $user){
        $this->activeUser = $user;
        $this->loadMessages();
    }

    public function sendMessage(){
        if($this->newMessage){
            ChatMessage::create([
                'author_id' => Auth::id(),
                'receiver_id' => $this->activeUser->id,
                'message' => $this->newMessage,
            ]);

            event(new ChatPusherBroadcast(Auth::user()->name, $this->activeUser->id, $this->newMessage));

            $this->loadMessages();
            $this->reset('newMessage');
        }
    }

    public function loadMessages(){
        $userId = $this->activeUser->id; // Assuming $user is the user instance you're comparing with
        $currentUserId = Auth::id();

        $this->messages = ChatMessage::where(function($query) use ($currentUserId, $userId) {
            $query->where('author_id', $currentUserId)
                  ->where('receiver_id', $userId);
        })
        ->orWhere(function($query) use ($currentUserId, $userId) {
            $query->where('author_id', $userId)
                  ->where('receiver_id', $currentUserId);
        })->orderBy('created_at', 'asc')
        ->get();

        $this->dispatch('go-to-last-messages');
    }
}
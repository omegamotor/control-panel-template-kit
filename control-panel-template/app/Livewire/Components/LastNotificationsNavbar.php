<?php

namespace App\Livewire\Components;

use App\Models\CustomNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LastNotificationsNavbar extends Component
{
    public $notifications;
    public $notReadedCount = 0;

    public function mount(){
        $this->notReadedCount = $this->notifications = CustomNotification::where('user_id', Auth::user()->id)
        ->where('is_readed', false)
        ->count();
    }

    public function render()
    {
        $this->notifications = CustomNotification::where('user_id', Auth::user()->id)
        ->where('is_readed', false)
        ->orderBy('created_at', 'DESC')
        ->get()
        ->take(3);

        return view('livewire.components.last-notifications-navbar');
    }
}

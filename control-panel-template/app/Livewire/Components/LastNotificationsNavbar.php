<?php

namespace App\Livewire\Components;

use App\Models\CustomNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class LastNotificationsNavbar extends Component
{
    public $notifications;
    public $notReadedCount = 0;

    public function render()
    {
        $this->loadData();
        return view('livewire.components.last-notifications-navbar');
    }

    #[On('load-alerts')]
    public function loadData(){
        $this->notifications = CustomNotification::where('user_id', Auth::user()->id)
            ->where('is_readed', false)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take(3);

        $this->notReadedCount = CustomNotification::where('user_id', Auth::user()->id)
            ->where('is_readed', false)
            ->count();
    }
}

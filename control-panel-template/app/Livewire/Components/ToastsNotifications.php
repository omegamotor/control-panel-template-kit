<?php

namespace App\Livewire\Components;

use App\Traits\PusherEnvTrait;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ToastsNotifications extends Component
{
    use PusherEnvTrait;

    public $userId;

    public function mount()
    {
        $this->userId = Auth::id();
    }

    public function render()
    {
        return view('livewire.components.toasts-notifications');
    }
}

<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ToastsNotifications extends Component
{
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

<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Enums\NotificationType;

class AlertIcon extends Component
{
    public $bgColor;
    public $icon;

    public function mount($type){
        // $this->bgColor = match ($type) {
        //     NotificationType::SUCCESS => 'bg-success',
        //     NotificationType::INFO => 'bg-primary',
        //     NotificationType::WARNING => 'bg-warning',
        //     NotificationType::DANGER => 'bg-danger',
        //     NotificationType::ERROR => 'bg-danger',
        //     default => 'bg-secondary'
        // };

        // $this->icon = match ($type) {
        //     NotificationType::SUCCESS => 'fa-solid fa-circle-check',
        //     NotificationType::INFO => 'fa-solid fa-circle-info',
        //     NotificationType::WARNING => 'fa-solid fa-triangle-exclamation',
        //     NotificationType::DANGER => 'fa-solid fa-triangle-exclamation',
        //     NotificationType::ERROR => 'fa-solid fa-triangle-exclamation',
        //     default => 'fa-regular fa-circle-question'
        // };

        $this->bgColor = match ($type) {
            'SUCCESS' => 'bg-success',
            'INFO' => 'bg-primary',
            'WARNING' => 'bg-warning',
            'DANGER' => 'bg-danger',
            'ERROR' => 'bg-danger',
            default => 'bg-secondary'
        };

        $this->icon = match ($type) {
            'SUCCESS' => 'fa-solid fa-circle-check',
            'INFO' => 'fa-solid fa-circle-info',
            'WARNING' => 'fa-solid fa-triangle-exclamation',
            'DANGER' => 'fa-solid fa-triangle-exclamation',
            'ERROR' => 'fa-solid fa-triangle-exclamation',
            default => 'fa-regular fa-circle-question'
        };
    }

    public function render()
    {
        return view('livewire.components.alert-icon');
    }
}

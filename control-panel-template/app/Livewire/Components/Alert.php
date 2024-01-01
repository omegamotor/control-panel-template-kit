<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Alert extends Component
{
    public $message = "Użytkownik zosał dodany!";
    public $classType = "success";
    public $type = "";
    public $icon = "fa-check";

    // ClassTypes
    // primary
    // success
    // danger

    // Types
    // Info -> primary
    // Sukces -> success
    // Błąd -> danger

    // Icons
    // danger -> fa-triangle-exclamation
    // success -> fa-check
    // primary -> fa-circle-info

    protected $listeners = ['alertMessage' => 'handleAlertMessage'];

    public function handleAlertMessage($message, $type)
    {
        $this->message = $message;
        $this->type = $type;

        if ($type == "Info") {
            $this->classType = "primary";
            $this->icon = "fa-circle-info";
        } elseif ($type == "Sukces") {
            $this->classType = "success";
            $this->icon = "fa-check";
        } elseif ($type == "Błąd") {
            $this->classType = "danger";
            $this->icon = "fa-triangle-exclamation";
        }

    }

    public function render()
    {
        return view('livewire.components.alert');
    }
}

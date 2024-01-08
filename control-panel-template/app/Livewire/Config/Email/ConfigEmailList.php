<?php

namespace App\Livewire\Config\Email;

use App\Models\AppConfigurationEmail;
use Livewire\Component;

class ConfigEmailList extends Component
{
    public $configurationDone;
    public $mailer;
    public $host;
    public $port;
    public $username;
    public $password;
    public $encryption;
    public $fromAddress;
    public $fromName;
    public $activeSending = true;

    public $sendTo = "test@gmail.com";

    public $conf;

    public function mount(){
        $this->conf = AppConfigurationEmail::first();
    }

    public function render()
    {
        return view('livewire.config.email.config-email-list');
    }

    public function UpdatedActiveSending(){
        $this->conf->active_sending = $this->activeSending;
        $this->conf->save();
    }
}

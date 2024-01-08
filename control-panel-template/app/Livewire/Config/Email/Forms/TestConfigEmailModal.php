<?php

namespace App\Livewire\Config\Email\Forms;

use App\Mail\TestEmail;
use App\Models\AppConfigurationEmail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Attributes\Validate;

class TestConfigEmailModal extends Component
{
    #[Validate('required|email|', 'Email')]
    public $email;

    public function sendTestEmail(){
        $validatedData = $this->validate();

        $email = $validatedData['email'];
        $mailConfig = AppConfigurationEmail::first();

        if($mailConfig && $mailConfig->active_sending){
            Mail::to($email)->send(new TestEmail());
        }

        session()->flash('alert-type', 'SUCCESS');
        session()->flash('message', 'Testowa wiadomość została wysłana na podany email. Proszę się upewnić, że wiadomość dotarła!');

        return redirect()->route('config.email');
    }

    public function cancel()
    {
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.config.email.forms.test-config-email-modal');
    }
}

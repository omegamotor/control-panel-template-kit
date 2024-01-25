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

        $shouldSendEmail = AppConfigurationEmail::first()->active_sending;

        if($shouldSendEmail){
            Mail::to($email)->send(new TestEmail());
            $type = 'SUCCESS';
            $message = 'Testowa wiadomość została wysłana na podany email. Proszę się upewnić, że wiadomość dotarła!';
        }else{
            $type = 'ERROR';
            $message = 'Testowa wiadomość nie została wysłana. Proszę się upewnić, że wysyłanie jest włączone, a mailing skonfigurowany!';
        }

        session()->flash('alert-type', $type);
        session()->flash('message', $message);

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

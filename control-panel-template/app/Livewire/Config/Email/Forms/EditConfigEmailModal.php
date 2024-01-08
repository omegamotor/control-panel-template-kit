<?php

namespace App\Livewire\Config\Email\Forms;

use App\Models\AppConfigurationEmail;
use Livewire\Component;
use Livewire\Attributes\Validate;

class EditConfigEmailModal extends Component
{
    public $mailer;
    public $host;
    public $port;
    public $username;
    public $password;
    public $encryption;
    public $fromAddress;
    public $fromName;

    public $conf;

    public function rules()
    {
        return [
            'mailer' => ['required','string'],
            'host' => ['required','string'],
            'port' => ['required','int'],
            'username' => ['required','string'],
            'password' => ['required','string'],
            'encryption' => ['required','string'],
            'fromAddress' => ['required','string'],
            'fromName' => ['required','string'],
        ];
    }

    public function render()
    {
        return view('livewire.config.email.forms.edit-config-email-modal');
    }

    public function mount(){
        $this->conf = AppConfigurationEmail::first();
        $this->mailer = $this->conf->mailer;
        $this->host = $this->conf->host;
        $this->port = $this->conf->port;
        $this->username = $this->conf->username;
        $this->password = $this->conf->password;
        $this->encryption = $this->conf->encryption;
        $this->fromAddress = $this->conf->from_address;
        $this->fromName = $this->conf->from_name;
    }

    public function editMailConfig()
    {
        $validatedData = $this->validate();

        $this->conf->mailer = $validatedData['mailer'];
        $this->conf->host = $validatedData['host'];
        $this->conf->port = $validatedData['port'];
        $this->conf->username = $validatedData['username'];
        $this->conf->password = $validatedData['password'];
        $this->conf->encryption = $validatedData['encryption'];
        $this->conf->from_address = $validatedData['fromAddress'];
        $this->conf->from_name = $validatedData['fromName'];
        $this->conf->configuration_done = true;
        $this->conf->save();

        $message = "Configuracja mailingu została zaktualizowana!";

        session()->flash('alert-type', 'SUCCESS');
        session()->flash('message', $message);

        return redirect()->route('config.email');
    }

    public function cancel()
    {
        $this->reset(
            'mailer',
            'host',
            'port',
            'username',
            'password',
            'encryption',
            'fromAddress',
            'fromName'
        );
    }
}

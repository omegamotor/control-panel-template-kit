<?php

namespace App\Livewire\Config\Pusher\Forms;

use App\Models\AppConfigurationPusher;
use Livewire\Component;

class EditConfigPusherModal extends Component
{
    public $appId;
    public $appKey;
    public $appSecret;
    public $host;
    public $port;
    public $scheme;
    public $appCluster;

    public $conf;

    public function rules()
    {
        return [
            'appId' => ['required','string'],
            'appKey' => ['required','string'],
            'appSecret' => ['required','string'],
            'host' => ['string'],
            'port' => ['required','int'],
            'scheme' => ['required','string'],
            'appCluster' => ['required','string'],
        ];
    }

    public function render()
    {
        return view('livewire.config.pusher.forms.edit-config-pusher-modal');
    }

    public function mount(){
        $this->conf = AppConfigurationPusher::first();
        $this->appId = $this->conf->app_id;
        $this->appKey = $this->conf->app_key;
        $this->appSecret = $this->conf->app_secret;
        $this->host = $this->conf->host;
        $this->port = $this->conf->port;
        $this->scheme = $this->conf->scheme;
        $this->appCluster = $this->conf->app_cluster;
    }

    public function editPusherConfig()
    {
        $validatedData = $this->validate();

        $this->conf->app_id = $validatedData['appId'];
        $this->conf->app_key = $validatedData['appKey'];
        $this->conf->app_secret = $validatedData['appSecret'];
        $this->conf->host = $validatedData['host'];
        $this->conf->port = $validatedData['port'];
        $this->conf->scheme = $validatedData['scheme'];
        $this->conf->app_cluster = $validatedData['appCluster'];
        $this->conf->configuration_done = true;
        $this->conf->save();

        $env = [
            'PUSHER_APP_ID' => '"' . $this->conf->app_id . '"',
            'PUSHER_APP_KEY' => '"' . $this->conf->app_key . '"',
            'PUSHER_APP_SECRET' => '"' . $this->conf->app_secret . '"',
            'PUSHER_HOST' => '"' . $this->conf->host . '"',
            'PUSHER_PORT' => '"' . $this->conf->port . '"',
            'PUSHER_SCHEME' => '"' . $this->conf->scheme . '"',
            'PUSHER_APP_CLUSTER' => '"' . $this->conf->app_cluster . '"',
        ];

        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        foreach ($env as $key => $value) {
            // Check if the environment variable already exists in the .env file
            if (str_contains($str, $key)) {
                // Replace the existing environment variable value
                $str = preg_replace(
                    '/^' . preg_quote($key) . '=.*/m',
                    $key . '=' . $value,
                    $str
                );
            } else {
                // Append the new environment variable to the end of the .env file
                $str .= "\n" . $key . '=' . $value;
            }
            // Set the environment variable in the current PHP process
            putenv($key . '=' . $value);
        }

        file_put_contents($envFile, $str);

        $message = "Configuracja pushera została zaktualizowana!";

        session()->flash('alert-type', 'SUCCESS');
        session()->flash('message', $message);

        return redirect()->route('config.pusher');
    }

    public function cancel()
    {
        $this->reset(
            'appId',
            'appKey',
            'appSecret',
            'host',
            'port',
            'scheme',
            'appCluster',
        );
    }
}

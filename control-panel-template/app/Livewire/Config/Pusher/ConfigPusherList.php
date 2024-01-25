<?php

namespace App\Livewire\Config\Pusher;

use App\Events\PusherBroadcast;
use Livewire\Component;
use App\Models\AppConfigurationPusher;
use App\Models\CustomNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ConfigPusherList extends Component
{
    public $configurationDone;
    public $appID;
    public $appKey;
    public $appSecret;
    public $appScheme;
    public $appCluster;

    public $conf;

    public function mount(){
        $this->conf = AppConfigurationPusher::first();
    }

    public function render()
    {
        return view('livewire.config.pusher.config-pusher-list');
    }

    public function sendTestNotification(){
        $authorId = Auth::user()->id;
        $users = User::all();

        $title = 'Testowe powiadomienie';
        $message = 'Testowa wiadomość';
        $type = 'INFO';

        foreach ($users as $user) {
            CustomNotification::create([
                'title' => $title,
                'message' => $message,
                'type' => $type,
                'user_id' => $user->id,
                'author_id' => $authorId,
            ]);
        }

        try {
            event(new PusherBroadcast($title, $message, $type));
        } catch (\Throwable $th) {
            //throw $th;
            $type = 'ERROR';
            $message = 'Powiadomienie nie zostanie poprawnie wysłane! Pusher jest żle skonfigurowany!';
            session()->flash('alert-type', $type);
            session()->flash('message', $message);

            return redirect()->route('config.pusher');
        }

    }
}

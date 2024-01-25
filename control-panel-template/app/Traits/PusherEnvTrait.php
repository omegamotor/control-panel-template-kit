<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait PusherEnvTrait
{
    public $pusherAppId;
    public $pusherAppKey;
    public $pusherAppSecret;
    public $pusherHost;
    public $pusherPort;
    public $pusherScheme;
    public $pusherAppCluster;

    public function mountPusherEnvTrait(){
        $this->pusherAppId = env('PUSHER_APP_ID');
        $this->pusherAppKey = env('PUSHER_APP_KEY');
        $this->pusherAppSecret = env('PUSHER_APP_SECRET');
        $this->pusherHost = env('PUSHER_HOST');
        $this->pusherPort = env('PUSHER_PORT');
        $this->pusherScheme = env('PUSHER_SCHEME');
        $this->pusherAppCluster = env('PUSHER_APP_CLUSTER');

    }
}

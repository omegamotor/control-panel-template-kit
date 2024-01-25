<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConfigurationPusher extends Model
{
    use HasFactory;

    protected $fillable = [
        'configuration_done',
        'app_id',
        'app_key',
        'app_secret',
        'host',
        'port',
        'scheme',
        'app_cluster',
    ];
}

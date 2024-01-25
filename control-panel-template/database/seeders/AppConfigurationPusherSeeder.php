<?php

namespace Database\Seeders;

use App\Models\AppConfigurationPusher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppConfigurationPusherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppConfigurationPusher::create([
            'app_id'=> '',
            'app_key'=> '',
            'app_secret'=> '',
            'host'=> '',
            'port'=> '',
            'app_cluster'=> '',
            'scheme'=> '',
        ]);
    }
}

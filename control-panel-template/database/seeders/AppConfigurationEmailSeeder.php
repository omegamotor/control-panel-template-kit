<?php

namespace Database\Seeders;

use App\Models\AppConfigurationEmail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppConfigurationEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppConfigurationEmail::create([
            'active_sending' => false,
            'configuration_done' => false,
            'mailer'=> 'smtp',
            'host'=> 'smtp.gmail.com',
            'port'=> '465',
            'username'=> '',
            'password'=> '',
            'encryption'=> 'tls',
            'from_address'=> '',
            'from_name'=> '',
        ]);
    }
}

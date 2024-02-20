<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email'=> 'omegamotor1997@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Dorota',
            'email'=> 'dorota@gmail.com',
            'password' => Hash::make('Dorota123'),
        ]);

        for ($i=0; $i <= 3; $i++) {
            User::create([
                'name' => 'user_' . $i,
                'email'=> 'user_' . $i . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }

    }
}

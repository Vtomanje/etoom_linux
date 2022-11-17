<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;


class UserSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tomas Elias',
            'last_name' => 'Vegas',
            'email' => 'etoomonline@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            /* 'phone_number' => '+17865312938', */
            'remember_token' => Str::random(10),
        ])->assignRole('admin');

        User::create([
            'name' => 'Felipe',
            'last_name' => 'Muñoz',            
            'email' => 'felipe@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            /* 'phone_number' => '633401094', */
            'remember_token' => Str::random(10),
        ])->assignRole('client');

        User::create([
            'name' => 'Maria',
            'last_name' => 'Prada',            
            'email' => 'maria@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            /* 'phone_number' => '633401094', */
            'remember_token' => Str::random(10),
        ])->assignRole('client');

        User::create([
            'name' => 'Fabio',
            'last_name' => 'Restrepo',            
            'email' => 'fabio@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            /* 'phone_number' => '633401094', */
            'remember_token' => Str::random(10),
        ])->assignRole('client');

        User::create([
            'name' => 'Pablo',
            'last_name' => 'Puertas',            
            'email' => 'pablo@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            /* 'phone_number' => '633401094', */
            'remember_token' => Str::random(10),
        ])->assignRole('client');

        User::create([
            'name' => 'Angelica',
            'last_name' => 'Fuentes',            
            'email' => 'angelica@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            /* 'phone_number' => '633401094', */
            'remember_token' => Str::random(10),
        ])->assignRole('client');
    }
}


<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fernando', 
            'email' => 'Fer@gmail.com',
            'password' => bcrypt('123'),
            'fondo' => 'img/fondoPerfil.jpg',
            'photo' => 'img/Usuario.jpg'
        ]);

        User::create([
            'name' => 'Daniela Cortez',
            'email' => 'Daniela@gmail.com',
            'password' => bcrypt('123'),
            'fondo' => 'img/fondoPerfil.jpg',
            'photo' => 'img/Usuario.jpg'
        ]);
    
    }
}

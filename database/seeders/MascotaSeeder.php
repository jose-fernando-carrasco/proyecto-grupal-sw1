<?php

namespace Database\Seeders;

use App\Models\Raza;
use App\Models\Mascota;
use Illuminate\Database\Seeder;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Raza::create([
            'nombre'=> 'Dalmata'
        ]);
        Raza::create([
            'nombre'=> 'Boxer'
        ]);
        Mascota::create([
            'nombre'    => 'Toby Choqui',
            'raza'      => 'dalmata',
            'raza_id'      => 1,
            'color'     => 'blanco con negro',
            'edad'      => 4,
            'pedigree'  => true,
            'duenho_id' => 1 // Fernando
        ]);

        Mascota::create([
            'nombre'    => 'Danger',
            'raza'      => 'boxer',
            'raza_id'      => 2,
            'color'     => 'cafe con blanco',
            'edad'      => 2,
            'pedigree'  => true,
            'duenho_id' => 2 // Fernando
        ]);
    }
}

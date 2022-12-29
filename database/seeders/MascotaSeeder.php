<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mascota;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mascota::create([
            'nombre'    => 'Toby Choqui',
            'color'     => 'blanco con negro',
            'edad'      => 4, //años
            'pedigree'  => true,
            'duenho_id' => 1, // Fernando
            'raza_id' => 1 //Dalmata
        ]);

        Mascota::create([
            'nombre'    => 'Danger',
            'color'     => 'cafe con blanco',
            'edad'      => 2,//años
            'pedigree'  => true,
            'duenho_id' => 2, // Daniela
            'raza_id' => 2 // Boxer
        ]);
    }
}

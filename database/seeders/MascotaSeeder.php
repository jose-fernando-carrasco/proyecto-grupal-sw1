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
            'color'     => 'blanco con negro',
            'imagen'     => 'https://cdn.wamiz.fr/cdn-cgi/image/format=auto,quality=80,width=400,height=400,fit=cover/animal/breed/pictures/61ceddb5ecedf226632820.jpg',
            'edad'      => 4, //años
            'pedigree'  => true,
            'duenho_id' => 1, // Fernando
            'raza_id' => 1 //Dalmata
        ]);

        Mascota::create([
            'nombre'    => 'Danger',
            'color'     => 'cafe con blanco',
            'imagen'    => 'https://misanimales.com/wp-content/uploads/2021/11/perro-boxer-fondo-blanco.jpg',
            'edad'      => 2,//años
            'pedigree'  => true,
            'duenho_id' => 2, // Daniela
            'raza_id' => 2 // Boxer
        ]);

        Mascota::create([
            'nombre'    => 'Medusa',
            'color'     => 'blanco',
            'edad'      => 2,//años
            'pedigree'  => true,
            'raza_id' => 2 // Boxer
        ]);
    }
}

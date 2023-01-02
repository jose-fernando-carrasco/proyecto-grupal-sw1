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
            'imagen'     => 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/golden-retriever-royalty-free-image-506756303-1560962726.jpg?crop=0.672xw:1.00xh;0.166xw,0&resize=640:*',
            'edad'      => 4, //años
            'pedigree'  => true,
            'duenho_id' => 1, // Fernando
            'raza_id' => 1 //Dalmata
        ]);

        Mascota::create([
            'nombre'    => 'Danger',
            'color'     => 'cafe con blanco',
            'imagen'    => 'https://media-cldnry.s-nbcnews.com/image/upload/rockcms/2022-08/220805-border-collie-play-mn-1100-82d2f1.jpg',
            'edad'      => 2,//años
            'pedigree'  => true,
            'duenho_id' => 2, // Daniela
            'raza_id' => 2 // Boxer
        ]);
    }
}

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
            'raza'      => 'dalmata',
            'color'     => 'blanco con negro',
            'edad'      => 4,
            'pedigree'  => true,
            'duenho_id' => 1 // Fernando
        ]);
    }
}

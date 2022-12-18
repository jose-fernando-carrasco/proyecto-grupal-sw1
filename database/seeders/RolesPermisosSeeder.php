<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permisosMascotas = [Permission::create(['name' => 'editar mascota']),
                            Permission::create(['name' => 'crear mascota']),
                            // Permission::create([ 'name' => 'editar mascota ']),
                            Permission::create([ 'name' => 'eliminar mascota'])
                            ];

        $user = Role::create([ 'name' => 'cliente' ])->syncPermissions($permisosMascotas);

    }
}

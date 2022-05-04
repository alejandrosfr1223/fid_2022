<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $rolAdministrador = Role::create(['name' => 'Administrador']);
        $rolProduccion = Role::create(['name' => 'Produccion']);
        $rolCliente = Role::create(['name' => 'Cliente']);

        /*
        Ejemplo para permisos en un crud
        Permission::create(['name' => 'crud.agclientes.index'])->syncRoles($rolAdministrador, $rolGenealogista, $rolCliente);
        Permission::create(['name' => 'crud.agclientes.create'])->syncRoles($rolAdministrador, $rolGenealogista, $rolCliente);
        Permission::create(['name' => 'crud.agclientes.edit'])->syncRoles($rolAdministrador, $rolGenealogista, $rolCliente);
        Permission::create(['name' => 'crud.agclientes.destroy'])->syncRoles($rolAdministrador);
        */
    }
}

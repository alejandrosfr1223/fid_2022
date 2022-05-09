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

        // Permisos CRUD users
        Permission::create(['name' => 'admin.crud.users.index'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.users.create'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.users.edit'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.users.destroy'])->syncRoles($rolAdministrador);

        // Permisos CRUD rols
        Permission::create(['name' => 'admin.crud.rols.index'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.rols.create'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.rols.edit'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.rols.destroy'])->syncRoles($rolAdministrador);

        // Permisos CRUD permissions
        Permission::create(['name' => 'admin.crud.permissions.index'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.permissions.create'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.permissions.edit'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.permissions.destroy'])->syncRoles($rolAdministrador);

        // Permisos CRUD books
        Permission::create(['name' => 'admin.crud.books.index'])->syncRoles($rolAdministrador, $rolProduccion);
        Permission::create(['name' => 'admin.crud.books.create'])->syncRoles($rolAdministrador, $rolProduccion);
        Permission::create(['name' => 'admin.crud.books.edit'])->syncRoles($rolAdministrador, $rolProduccion);
        Permission::create(['name' => 'admin.crud.books.destroy'])->syncRoles($rolAdministrador);
    }
}

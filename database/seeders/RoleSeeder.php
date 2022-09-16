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
        $rolOperador = Role::create(['name' => 'Operador']);
        $rolCliente = Role::create(['name' => 'Cliente']);

        // Permisos CRUD users
        Permission::create(['name' => 'admin.crud.users.index'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.users.create'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.users.edit'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.users.destroy'])->syncRoles($rolAdministrador);

        // Permisos CRUD rols
        Permission::create(['name' => 'admin.crud.roles.index'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.roles.create'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.roles.edit'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.roles.destroy'])->syncRoles($rolAdministrador);

        // Permisos CRUD permissions
        Permission::create(['name' => 'admin.crud.permissions.index'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.permissions.create'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.permissions.edit'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'admin.crud.permissions.destroy'])->syncRoles($rolAdministrador);

        // Permisos CRUD books
        Permission::create(['name' => 'admin.crud.books.index'])->syncRoles($rolAdministrador, $rolOperador);
        Permission::create(['name' => 'admin.crud.books.create'])->syncRoles($rolAdministrador, $rolOperador);
        Permission::create(['name' => 'admin.crud.books.edit'])->syncRoles($rolAdministrador, $rolOperador);
        Permission::create(['name' => 'admin.crud.books.destroy'])->syncRoles($rolAdministrador);

        Permission::create(['name' => 'admin.crud.cursos.index'])->syncRoles($rolAdministrador, $rolOperador);
        Permission::create(['name' => 'admin.crud.cursos.create'])->syncRoles($rolAdministrador, $rolOperador);
        Permission::create(['name' => 'admin.crud.cursos.edit'])->syncRoles($rolAdministrador, $rolOperador);
        Permission::create(['name' => 'admin.crud.cursos.destroy'])->syncRoles($rolAdministrador);
    }
}

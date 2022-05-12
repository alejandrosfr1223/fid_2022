<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'Pedro Bazó',
            'email' => 'bazo.pedro@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Alejandro Díaz',
            'email' => 'sistemasccs@sefarvzla.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Prueba Operador',
            'email' => 'operador@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ])->assignRole('Operador');

        User::create([
            'name' => 'Prueba cliente',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ])->assignRole('Cliente');

        User::create([
            'name' => 'Prueba Sin Rol',
            'email' => 'sinrol@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        User::factory(99)->create();
    }
}

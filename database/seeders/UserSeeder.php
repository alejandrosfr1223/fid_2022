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
            'name' => 'Pedro',
            'lastname' => 'Bazó',
            'phonenumber' => '+584261234567',
            'country_iso2' => 'VE',
            'email' => 'bazo.pedro@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Alejandro',
            'lastname' => 'Díaz',
            'phonenumber' => '+584265104892',
            'country_iso2' => 'VE',
            'email' => 'sistemasccs@sefarvzla.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Prueba',
            'lastname' => 'Operador',
            'phonenumber' => '+584261234567',
            'country_iso2' => 'VE',
            'email' => 'operador@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ])->assignRole('Operador');

        User::create([
            'name' => 'Prueba',
            'lastname' => 'cliente',
            'phonenumber' => '+584261234567',
            'country_iso2' => 'VE',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ])->assignRole('Cliente');

        User::create([
            'name' => 'Prueba',
            'lastname' => 'Sin Rol',
            'phonenumber' => '+584261234567',
            'country_iso2' => 'VE',
            'email' => 'sinrol@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
    }
}

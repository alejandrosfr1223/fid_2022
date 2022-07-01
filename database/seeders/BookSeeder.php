<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'titulo' => 'Trilogía sobre los primeros pobladores de Tunja',
            'autor' => 'Dra. Magdalena Corradine',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["EditorialBV"]'
        ]);

        Book::create([
            'titulo' => 'Obra ampliada sobre los llenerenses que pasaron a América',
            'autor' => 'Luis Garraín Villa',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["EditorialBV"]'
        ]);

        Book::create([
            'titulo' => 'Médicos coloniales venezolanos',
            'autor' => 'Dr. Manuel Hernández González',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["EditorialBV"]'
        ]);

        Book::create([
            'titulo' => 'Familiares y funcionarios del Santo Oficio en Venezuela',
            'autor' => 'Dr. Emanuel Amodio',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["EditorialBV"]'
        ]);

        Book::create([
            'titulo' => 'Contenido práctico-teórico del Derecho Genealogista',
            'autor' => 'Dr. Crisanto Bello',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["EditorialBV"]'
        ]);
    }
}

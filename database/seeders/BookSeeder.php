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

        Book::create([
            'titulo' => 'La inquisición en Venezuela, siglos XVI-XIX',
            'autor' => 'Emanuele Amodio',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["InvestigacionFID"]',
            'notas' => 'Investigación documental y bibliográfica sobre la inquisición en Venezuela, tanto la diocesana como del Santo Oficio de la Inquisición (siglos XVI-XIX), desde una perspectiva histórica y antropológica, a cargo del antropólogo e historiador Emanuele Amodio.'
        ]);

        Book::create([
            'titulo' => 'Bibliografía general sobre la diáspora judía, siglos XVI-XIX',
            'autor' => 'Emanuele Amodio',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["InvestigacionFID"]',
            'notas' => 'Elaboración de una bibliografía general sobre la diáspora judía, con particular referencia a América Latina durante los siglos XVI-XIX. Contempla la elaboración de un listado general y de uno específico para cada país latinoamericano, a cargo del antropólogo e historiador Emanuele Amodio.'
        ]);

        Book::create([
            'titulo' => 'Índice analítico de la Sección Matrimoniales del Archivo Arquidiocesano de Caracas',
            'autor' => 'René García Jaspe',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["InvestigacionFID"]',
            'notas' => 'Realización de un índice analítico de la Sección Matrimoniales del Archivo Arquidiocesano de Caracas (dispensas, poderes, expedientes de soltería, etc.) del período 1900 a 1927, a cargo del historiador René García Jaspe, miembro de número del Instituto Venezolano de Genealogía.'
        ]);

        Book::create([
            'titulo' => 'Integral de la obra del hermano Nectario María (1888-1896)',
            'autor' => 'Maribel Espinoza',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["InvestigacionFID"]',
            'notas' => 'Hermano de la orden de San Juan Bautista de La Salle, educador, historiador, cartógrafo, arqueólogo, paleontólogo y geógrafo. Llega a Barquisimeto para impartir docencia en el colegio La Salle en 1913. Su amor hacia Venezuela se hace evidente en su legado como docente y como investigador en las diversas áreas en las que se desempeñó. La compilación de su inmensa obra está a cargo de Maribel Espinoza.'
        ]);


    }
}

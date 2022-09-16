<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
            'titulo' => 'Congreso de historia, en conjunto con el Centro de Investigaciones históricas y el Doctorado en Historia de la Universidad Católica Andrés Bello (UCAB)',
            'ponente' => 'Dra. Magdalena Corradine',
            'notas' => 'Congreso de historia, en conjunto con el Centro de Investigaciones históricas y el Doctorado en Historia de la Universidad Católica Andrés Bello (UCAB)',
            'descripcion' => 'Primera sesión: Fuentes para el estudio de las sociedades hispanoamericanas.<br>1. Presentación del evento.<br>2. El Archivo General de Indias.<br>3. El Archivo General de la Nación de Venezuela.<br>4. El Archivo Arquidiocesano de Caracas.<br>5. El Archivo Arquidiocesano de Mérida.<br>6. Un gran Archivo de México o Lima.<br><br>Segunda sesión: Rasgos esenciales de las sociedades hispanoamericanas.<br>1. El Marco legal.<br>2. El marco geográfico.<br>3. La nobleza de la sangre.<br>4. La limpieza de la sangre.<br>5. Los flujos migratorios.<br>6. Rasgos básicos de los viajeros hacia Hispanoamérica.<br><br>Tercera sesión: La familia en Hispanoamérica colonial.<br>1. Las normas del Concilio de Trento.<br>2. La familia en Hispanoamérica colonial.<br>3.La legislación sobre control de las familias.<br>4. Las dispensas matrimoniales.<br>5. Resumen de clausura.',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true',
            'clasific' => '["Congreso"]',
            'disponib'=> '["Disponible"]',
        ]);
    }
}

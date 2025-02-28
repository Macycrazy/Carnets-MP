<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cargos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Cargos
        DB::table('Charge')->insert([
            ['name' => 'GERENTE'],
            ['name' => 'MESONERO'],
            [ 'name' => 'PRESIDENTE' ],
            [ 'name' => 'ASISTENTE ADMINISTRATIVO' ],
            [ 'name' => 'TECNICO' ],
            [ 'name' => 'ASISTENTE EJECUTIVO' ],
            [ 'name' => 'CHOFER' ],
            [ 'name' => 'SUPERVISOR AUXILIAR' ],
            [ 'name' => 'CHEF' ],
            [ 'name' => 'COCINERO' ],
            [ 'name' => 'VICEPRESIDENTE' ],
            [ 'name' => 'GERENTE GENERAL' ],
            [ 'name' => 'AUDITOR INTERNO' ],
            [ 'name' => 'CONSULTOR JURIDICO' ],
            [ 'name' => 'CONSULTORA JURIDICA' ],
            [ 'name' => 'GERENTE DE AREA' ],
            [ 'name' => 'GERENTE DE LINEA' ],
            [ 'name' => 'COORDINADOR' ],
            [ 'name' => 'PROFESIONAL' ],
            [ 'name' => 'OBRERO' ],
            [ 'name' => 'PERSONAL MEDICO' ],
            [ 'name' => 'OFICIAL DE SEGURIDAD' ],
            [ 'name' => 'ESCOLTA' ],
            [ 'name' => 'SUPERVISOR DE SEGURIDAD' ],
            [ 'name' => 'AUXILIAR DE SERVICIO' ],
            [ 'name' => 'ENFERMERA' ],
            [ 'name' => 'ENFERMERO' ],
            [ 'name' => 'MEDICO' ],
            [ 'name' => 'JEFE DE SERVICIO' ],
            [ 'name' => 'ASESOR' ],
            [ 'name' => 'VISITANTE' ]
        ]);
        
    }
}

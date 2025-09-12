<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
 use Carbon\Carbon;

class departamentos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Departamentos
        $departmentNames = [
             'PRESIDENCIA',
            'AUDITORÍA INTERNA',
            'GERENCIA GENERAL',
            'GERENCIA GENERAL DE REGULACIÓN, USO Y SEGUIMIENTO DE LA MARCA PAÍS',
            'CONSULTORÍA JURÍDICA',
            'GERENCIA GENERAL DE PROMOCIÓN Y POSICIONAMIENTO DE LA MARCA PAÍS',
            'GERENCIA DE GESTIÓN HUMANA',
            'GERENCIA DE GESTIÓN ADMINISTRATIVA',
            'GERENCIA DE PLANIFICACIÓN Y PRESUPUESTO',
            'GERENCIA GESTIÓN COMUNICACIONAL',
        ];

        $dataToInsert = array_map(function ($departmentName) {
            return [
                'name' => $departmentName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }, $departmentNames);

        // Asegúrate de usar el nombre de tabla correcto (minúsculas, plural por convención)
        DB::table('Department')->insert($dataToInsert);

        $this->command->info('Seeder de Departamentos hecho.');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
  use Carbon\Carbon;

class cargos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Cargos
     

$uniqueCharges = [
    'ASESOR',
    'ASISTENTE EJECUTIVO',
    'AUDITOR INTERNO',
    'BACHILLER',
    'BACHILLER III NIVEL VII',
    'CONSULTOR JURIDICO',
    'COORDINADOR',
    'GERENTE',
    'GERENTE GENERAL',
    'OBRERO CERTIFICADO',
    'OBRERO GENERAL',
    'OBRERO SUPERVISOR',
    'PASANTE',
    'PRESIDENTE',
    'PROFESIONAL',
    'TECNICO',
];

$dataToInsert = array_map(function ($chargeName) {
    return [
        'name' => $chargeName,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
}, $uniqueCharges);

DB::table('Charge')->insert($dataToInsert);
        
    }
}

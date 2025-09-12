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
            'PRESIDENTE',
            'REALIZADOR AUDIOVISUAL',
            'ASISTENTE EJECUTIVO',
            'PERIODISTA',
            'ASISTENTE ADMINISTRATIVO',
            'HP',
            'AUDITOR INTERNO',
            'ANALISTA',
            'GERENTE GENERAL',
            'GERENTE',
            'ABOGADO',
            'CHOFER',
            'PRODUCTOR',
            'DISEÑADOR',
        ];
$dataToInsert = array_map(function ($chargeName) {
    return [
        'name' => $chargeName,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
}, $uniqueCharges);

DB::table('Charge')->insert($dataToInsert);
          $this->command->info('Seeder de cargos Hecho.');
    }
}

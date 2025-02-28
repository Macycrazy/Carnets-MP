<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class status extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        // Estados (activos/inactivos) - Renombrar para evitar confusión
        DB::table('Status')->insert([ // Usar plural 'statuses'
            ['name' => 'Activo'],
            ['name' => 'Inactivo'],
        ]);
    }
}

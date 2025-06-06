<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class estados extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Estados
        DB::table('State')->insert([
            ['name' => 'Amazonas'],
            ['name' => 'Anzoátegui'],
            [ 'name' => 'Apure' ],
            [ 'name' => 'Aragua' ],
            [ 'name' => 'Barinas' ],
            [ 'name' => 'Bolívar' ],
            [ 'name' => 'Carabobo' ],
            [ 'name' => 'Cojedes' ],
            [ 'name' => 'Delta Amacuro' ],
            [ 'name' => 'Falcón' ],
            [ 'name' => 'Guárico' ],
            [ 'name' => 'Lara' ],
            [ 'name' => 'Mérida' ],
            [ 'name' => 'Miranda' ],
            [ 'name' => 'Monagas' ],
            [ 'name' => 'Nueva Esparta' ],
            [ 'name' => 'Portuguesa' ],
            [ 'name' => 'Sucre' ],
            [ 'name' => 'Táchira' ],
            [ 'name' => 'Trujillo' ],
            [ 'name' => 'Vargas' ],
            [ 'name' => 'Yaracuy' ],
            [ 'name' => 'Zulia' ],
            [ 'name' => 'Distrito Capital' ],
          //  [ 'name' => 'Dependencias Federales' ]
        ]);
          $this->command->info('Seeder de estados Hecho.');
    }
}

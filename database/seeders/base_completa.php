<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class base_completa extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      

      
        // Niveles de acceso
        DB::table('Access_levels')->insert([
            ['name' => 'Acceso Total'],
            ['name' => 'Alto Nivel'],
            [ 'name' => 'Area Privada' ],
            [ 'name' => 'PB / Sótano' ],
            [ 'name' => 'Piso 1' ],
            [ 'name' => 'Piso 2' ],
            [ 'name' => 'Piso 3' ],
            [ 'name' => 'Piso 4' ],
            [ 'name' => 'Piso 5' ],
            [ 'name' => 'Piso 6' ],
            [ 'name' => 'Piso 7' ],
            [ 'name' => 'Piso 8' ],
            [ 'name' => 'Piso 9' ],
           // [ 'name' => '' ]
        ]);
/*
        // Estados civiles
        DB::table('Civil_statuses')->insert([
            ['name' => 'Soltero(a)'],
            ['name' => 'Casado(a)'],
            [ 'name' => 'Area Privada' ],
            [ 'name' => 'Divorciado(a)' ],
            [ 'name' => 'Concubino(a)' ],
            [ 'name' => 'Viudo(a)' ]
        ]);
*/
    
/*
        // Géneros
        DB::table('Genders')->insert([
            ['name' => 'Masculino'],
            ['name' => 'Femenino'],
        ]);
/*
        // Colores de cabello
        DB::table('Hair_colors')->insert([
            ['name' => 'Negro'],
            ['name' => 'Canoso'],
            [ 'name' => 'Castaño claro' ],
            [ 'name' => 'Castaño obscuro' ],
            [ 'name' => 'Rubio' ],
            [ 'name' => 'Rojo' ],
            [ 'name' => 'Teñido' ],
        ]);
/*
        // Colores de piel
        DB::table('Skin_colors')->insert([
            ['name' => 'Blanca'],
            ['name' => 'Negra'],
            ['name' => 'Morena'],
        ]);
*/
      

/*
        // Texturas
        DB::table('Textures')->insert([
            ['name' => 'Delgada'],
            ['name' => 'Mediana'],
            ['name' => 'Gruesa'],
        ]);
/*
        // Tipos de creación
        DB::table('Type_creations')->insert([
            ['name' => 'Ingreso'],
            ['name' => 'Renovación'],
            ['name' => 'Extravío'],
        ]);
*/
        // Carnets
      /*  DB::table('Carnets')->insert([
            [
                'name' => 'John',
                'lastname' => 'Doe',
                'card_code' => 'ABC123',
                'expiration' => '2025-12-31', // Formato YYYY-MM-DD
                'note' => 'This is a note.',
                'cedule' => 'V-12345678',
                'address' => '123 Main St',
                'cellpone' => '0412-1234567', // Corregir nombre de columna
                'id_department' => 1, // Usar IDs numéricos
                'id_charge' => 1,
                'id_status' => 1,
                'id_access_levels' => 1,
                //'gender_id' => 1,
                //'hair_color_id' => 1,
                'id_state' => 1,
                //'municipality_id' => 'Libertador', // Si no tienes la tabla municipalities, guarda el nombre
               // 'parish_id' => 'El Paraíso', // Si no tienes la tabla parishes, guarda el nombre
               // 'skin_color_id' => 1,
               // 'civil_status_id' => 1,
                'created_at' => '2023-01-01',
                'updated_at' => '2024-01-01',
            ]
        ]);
        */
    }
}
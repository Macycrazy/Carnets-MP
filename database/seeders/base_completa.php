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
        DB::table('Carnets')->insert([
            'name' => 'MIGUEL A.',
            'lastname' => 'CARDENAS Y.',
            'identifier' => 'V',
            'card_code' => '100038',
            'expiration' => '2026-01-01 00:00:00', // Fecha tal cual la proporcionaste
            'note' => '',
            // 'foranity' => 'V', // Este campo no estaba en tu migración original, lo he comentado.
                               // Si existe en tu base de datos, descomenta y ajústalo.
            'cedule' => '28443995',
            'address' => 'CIIP',
            'cellpone' => '04242994267',
            'id_department' => 1,
            'id_charge' => 4,
            'id_status' => 1,
            'id_access_levels' => 1,
            'id_state' => 14,
            // Las fechas created_at y updated_at se gestionan por useCurrent() y onUpdate('current_timestamp') en la migración
            // Si quieres forzar los valores específicos que diste, puedes incluirlos:
            // 'created_at' => '2025-05-23 19:32:45',
            // 'updated_at' => '2025-05-23 16:14:44',
            // Pero lo más común es dejar que la BD los genere si tienes useCurrent().
        ]);
  $this->command->info('Seeder de La base completa Hecho.');
    }
}
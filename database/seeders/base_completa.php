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
    'name' => 'DANIELLA D.',
    'lastname' => 'CABELLO C.',
    'identifier' => 'V',
    'card_code' => '100039',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '23434318',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 1,
    'id_charge' => 1,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'EDWARD E.',
    'lastname' => 'LUNAR M.',
    'identifier' => 'V',
    'card_code' => '100040',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '26250567',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 1,
    'id_charge' => 2,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'YANERIT V.',
    'lastname' => 'GALLARDO R.',
    'identifier' => 'V',
    'card_code' => '100041',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '23638218',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 1,
    'id_charge' => 3,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'RICARDO A.',
    'lastname' => 'LICETT P.',
    'identifier' => 'V',
    'card_code' => '100042',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '24334057',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 1,
    'id_charge' => 4,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'MARIA I.',
    'lastname' => 'HERNÁNDEZ G.',
    'identifier' => 'V',
    'card_code' => '100043',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '5144498',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 1,
    'id_charge' => 5,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ALEXIS F.',
    'lastname' => 'MADRÍZ Y.',
    'identifier' => 'V',
    'card_code' => '100044',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '19089326',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 1,
    'id_charge' => 6,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'NINOSKA A.',
    'lastname' => 'RODRÍGUEZ R.',
    'identifier' => 'V',
    'card_code' => '100045',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '13749483',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 2,
    'id_charge' => 7,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'DAYANA DEL C.',
    'lastname' => 'LARA C.',
    'identifier' => 'V',
    'card_code' => '100046',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '15904007',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 2,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'DAYANNIS DEL V.',
    'lastname' => 'ALVÁREZ M.',
    'identifier' => 'V',
    'card_code' => '100047',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '24875802',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 2,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'NADIA G.',
    'lastname' => 'MIGNOGNA T.',
    'identifier' => 'V',
    'card_code' => '100048',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '15122535',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 3,
    'id_charge' => 9,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'LUZZEY A.',
    'lastname' => 'PARILLI A.',
    'identifier' => 'V',
    'card_code' => '100049',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '31098244',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 3,
    'id_charge' => 3,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ELSA',
    'lastname' => 'SIVIRA R.',
    'identifier' => 'V',
    'card_code' => '100050',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '6206756',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 3,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ROSANNA R.',
    'lastname' => 'SALAZAR R.',
    'identifier' => 'V',
    'card_code' => '100051',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '10518146',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 4,
    'id_charge' => 10,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'EDIGNORELIA',
    'lastname' => 'VALBUENA M.',
    'identifier' => 'V',
    'card_code' => '100052',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '6331555',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 4,
    'id_charge' => 3,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'JOELI V.',
    'lastname' => 'MARTÍNEZ W.',
    'identifier' => 'V',
    'card_code' => '100053',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '17444949',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 4,
    'id_charge' => 3,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ANTONIO J. G.',
    'lastname' => 'RAMOS M.',
    'identifier' => 'V',
    'card_code' => '100054',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '16984599',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 5,
    'id_charge' => 11,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ZOILA T.',
    'lastname' => 'PEREIRA P.',
    'identifier' => 'V',
    'card_code' => '100055',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '7015359',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 6,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ALEXIS M.',
    'lastname' => 'VELÁSQUEZ C.',
    'identifier' => 'V',
    'card_code' => '100056',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '26483229',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 6,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'KAREN L.',
    'lastname' => 'MONSALVE C.',
    'identifier' => 'V',
    'card_code' => '100057',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '26678625',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 6,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'LIANA',
    'lastname' => 'GÁMEZ V.',
    'identifier' => 'V',
    'card_code' => '100058',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '9061799',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 7,
    'id_charge' => 10,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'YANNELY Y.',
    'lastname' => 'DOMINGUEZ S.',
    'identifier' => 'V',
    'card_code' => '100059',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '22280258',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 7,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'DARWIN N.',
    'lastname' => 'ZUARCE R.',
    'identifier' => 'V',
    'card_code' => '100060',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '18599103',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 7,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'XIOMARA J.',
    'lastname' => 'CEREZO P.',
    'identifier' => 'V',
    'card_code' => '100061',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '6433086',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 8,
    'id_charge' => 10,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'OMAR R.',
    'lastname' => 'GARCIA',
    'identifier' => 'V',
    'card_code' => '100062',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '6355900',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 8,
    'id_charge' => 12,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'LOURDES B.',
    'lastname' => 'MORO R.',
    'identifier' => 'V',
    'card_code' => '100063',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '6106349',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 8,
    'id_charge' => 6,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'WILLIAMS A.',
    'lastname' => 'MENONES M.',
    'identifier' => 'V',
    'card_code' => '100064',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '9417564',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 8,
    'id_charge' => 12,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'MARITZA B.',
    'lastname' => 'NADALES R.',
    'identifier' => 'V',
    'card_code' => '100065',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '10180191',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 8,
    'id_charge' => 5,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ERICH N.',
    'lastname' => 'ESCALANTE DE D.',
    'identifier' => 'V',
    'card_code' => '100066',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '11568526',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 8,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ALDIS Y.',
    'lastname' => 'RAGA R.',
    'identifier' => 'V',
    'card_code' => '100067',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '12950523',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 8,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'AIMARA A.',
    'lastname' => 'MARTÍNEZ C.',
    'identifier' => 'V',
    'card_code' => '100068',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '17100904',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 8,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'TANA V.',
    'lastname' => 'VÁSQUEZ R.',
    'identifier' => 'V',
    'card_code' => '100069',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '30841888',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 8,
    'id_charge' => 5,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'YARUMI Y.',
    'lastname' => 'TARAZÓN B.',
    'identifier' => 'V',
    'card_code' => '100070',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '25258372',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 9,
    'id_charge' => 10,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'MANUEL A.',
    'lastname' => 'REYES R.',
    'identifier' => 'V',
    'card_code' => '100071',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '11414043',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 9,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'YANETH M.',
    'lastname' => 'DUARTE DE O.',
    'identifier' => 'V',
    'card_code' => '100072',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '11482202',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 9,
    'id_charge' => 8,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'JUDELYS D.',
    'lastname' => 'ROMERO E.',
    'identifier' => 'V',
    'card_code' => '100073',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '23196269',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 10,
    'id_charge' => 10,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ADRIANA C.',
    'lastname' => 'SÁNCHEZ',
    'identifier' => 'V',
    'card_code' => '100074',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '18836773',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 10,
    'id_charge' => 13,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'IVETTE A.',
    'lastname' => 'DOMINGUEZ G.',
    'identifier' => 'V',
    'card_code' => '100075',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '19581923',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 10,
    'id_charge' => 4,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'ENDER J.',
    'lastname' => 'COBARRUBIA G.',
    'identifier' => 'V',
    'card_code' => '100076',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '22624847',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 10,
    'id_charge' => 14,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'PATRICIA C.',
    'lastname' => 'MIRANDA V.',
    'identifier' => 'V',
    'card_code' => '100077',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '22770392',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 10,
    'id_charge' => 14,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'GABRIEL E.',
    'lastname' => 'VASQUEZ M.',
    'identifier' => 'V',
    'card_code' => '100078',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '25369557',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 10,
    'id_charge' => 2,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);

DB::table('Carnets')->insert([
    'name' => 'VINCENT O.',
    'lastname' => 'OROPEZA P.',
    'identifier' => 'V',
    'card_code' => '100079',
    'expiration' => '2026-01-01 00:00:00',
    'note' => '',
    'cedule' => '26901321',
    'address' => 'CIIP',
    'cellpone' => '04242994267',
    'id_department' => 10,
    'id_charge' => 2,
    'id_status' => 1,
    'id_access_levels' => 1,
    'id_state' => 14,
]);
  $this->command->info('Seeder de La base completa Hecho.');
    }
}
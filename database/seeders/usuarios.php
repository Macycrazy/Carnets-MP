<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('userEntity')->insert([
            [
                'name' => 'Miguel Cardenas', // Separar nombre y apellido
                'email' => 'miguelangelcardenasyepez@gmail.com',
                'isActive' => true,
                'rol' => 'admin', // Usar string en lugar de la constante
                'password' => Hash::make('M@cY2002__2002'), // Usar Hash::make()
            ],
            [
                'name' => 'Ellis Martinez', // Separar nombre y apellido
                'email' => 'e.martinez@ciip.com.ve',
                'isActive' => true,    
                'rol' => 'admin', // Usar string en lugar de la constante            
                'password' => Hash::make('Ciip2024.'), // Usar Hash::make()
            ],
            [
                'name' => 'daniel quintero', // Separar nombre y apellido
                'email' => 'danielquinteroac33@gmail.com',
                'isActive' => true,
                'rol' => 'admin', // Usar string en lugar de la constante
                'password' => Hash::make('123456'), // Usar Hash::make()
            ],
            [
                'name' => 'SUPER USUARIO CIIP', // Separar nombre y apellido
                'email' => 'ciip2024@gmail.com',
                'isActive' => true,
                'rol' => 'admin', // Usar string en lugar de la constante
                'password' => Hash::make('Ciip2024.'), // Usar Hash::make()
            ],
            
             [
                'name' => 'Tony Leon',
                'email' => 't.leon@ciip.com.ve',
                'isActive' => true,
                'rol' => 'user',
                'password' => Hash::make('T.l30n00'),
            ],
             [
                'name' => 'LOISBETH CORVOS',
                'email' => 'l.corvos@ciip.com.ve',
                'isActive' => true,
                'rol' => 'user',
                'password' => Hash::make('L.c0rv0s51'),
            ],
            [
                'name' => 'ALFREDO CARRERA',
                'email' => 'a.carrera@ciip.com.ve',
                'isActive' => true,
                'rol' => 'user',
                'password' => Hash::make('4.C4rr3r418'),
            ],
        ]);

    }
}

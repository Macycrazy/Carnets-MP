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
                'name' => 'SUPER USUARIO CIIP', // Separar nombre y apellido
                'email' => 'ciip2024@gmail.com',
                'isActive' => true,
                'rol' => 'admin', // Usar string en lugar de la constante
                'password' => Hash::make('Ciip2024.'), // Usar Hash::make()
            ],
            
             [
                'name' => 'Marca Pais',
                'email' => 'marcapais@email.com.ve',
                'isActive' => true,
                'rol' => 'user',
                'password' => Hash::make('mp123456.'),
            ],
             
        ]);
        $this->command->info('Seeder de usuarios Hecho.');
    }
}

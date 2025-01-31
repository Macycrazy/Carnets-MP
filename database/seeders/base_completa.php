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
        // Cargos
        DB::table('Charge')->insert([
            ['name' => 'GERENTE'],
            ['name' => 'MESONERO'],
            [ 'name' => 'PRESIDENTE' ],
            [ 'name' => 'ASISTENTE ADMINISTRATIVO' ],
            [ 'name' => 'TECNICO' ],
            [ 'name' => 'ASISTENTE EJECUTIVO' ],
            [ 'name' => 'CHOFER' ],
            [ 'name' => 'SUPERVISOR AUXILIAR' ],
            [ 'name' => 'CHEF' ],
            [ 'name' => 'COCINERO' ],
            [ 'name' => 'VICEPRESIDENTE' ],
            [ 'name' => 'GERENTE GENERAL' ],
            [ 'name' => 'AUDITOR INTERNO' ],
            [ 'name' => 'CONSULTOR JURIDICO' ],
            [ 'name' => 'CONSULTORA JURIDICA' ],
            [ 'name' => 'GERENTE DE AREA' ],
            [ 'name' => 'GERENTE DE LINEA' ],
            [ 'name' => 'COORDINADOR' ],
            [ 'name' => 'PROFESIONAL' ],
            [ 'name' => 'OBRERO' ],
            [ 'name' => 'PERSONAL MEDICO' ],
            [ 'name' => 'OFICIAL DE SEGURIDAD' ],
            [ 'name' => 'ESCOLTA' ],
            [ 'name' => 'SUPERVISOR DE SEGURIDAD' ],
            [ 'name' => 'AUXILIAR DE SERVICIO' ],
            [ 'name' => 'ENFERMERA' ],
            [ 'name' => 'ENFERMERO' ],
            [ 'name' => 'MEDICO' ],
            [ 'name' => 'JEFE DE SERVICIO' ],
            [ 'name' => 'ASESOR' ],
            [ 'name' => 'VISITANTE' ]
        ]);

        // Usuarios
        DB::table('users')->insert([
            [
                'first_name' => 'Miguel', // Separar nombre y apellido
                'last_name' => 'Cardenas',
                'email' => 'miguelangelcardenasyepez@gmail.com',
                'password' => Hash::make('M@cY2002__2002'), // Usar Hash::make()
                'role' => 'admin', // Usar string en lugar de la constante
            ],
            [
                'first_name' => 'Ellis', // Separar nombre y apellido
                'last_name' => 'Martinez',
                'email' => 'e.martinez@ciip.com.ve',
                'password' => Hash::make('Ciip2024.'), // Usar Hash::make()
                'role' => 'admin', // Usar string en lugar de la constante
            ],
            [
                'first_name' => 'daniel', // Separar nombre y apellido
                'last_name' => 'quintero',
                'email' => 'danielquinteroac32@gmail.com',
                'password' => Hash::make('123456'), // Usar Hash::make()
                'role' => 'admin', // Usar string en lugar de la constante
            ],
            [
                'first_name' => 'SUPER', // Separar nombre y apellido
                'last_name' => 'USUARIO CIIP',
                'email' => 'ciip2024@gmail.com',
                'password' => Hash::make('Ciip2024.'), // Usar Hash::make()
                'role' => 'admin', // Usar string en lugar de la constante
            ],
            
             [
                'first_name' => 'Tony',
                'last_name' => 'Leon', // Apellido opcional
                'email' => 't.leon@ciip.com.ve',
                'password' => Hash::make('T.l30n00'),
                'role' => 'user',
            ],
             [
                'first_name' => 'LOISBETH',
                'last_name' => 'CORVOS', // Apellido opcional
                'email' => 'l.corvos@ciip.com.ve',
                'password' => Hash::make('L.c0rv0s51'),
                'role' => 'user',
            ],
            [
                'first_name' => 'ALFREDO',
                'last_name' => 'CARRERA', // Apellido opcional
                'email' => 'a.carrera@ciip.com.ve',
                'password' => Hash::make('4.C4rr3r418'),
                'role' => 'user',
            ],
        ]);

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
        // Departamentos
        DB::table('Department')->insert([
            ['name' => 'Auditoría Interna'],
            ['name' => 'Gerencia de Control Posterior'],
            [ 'name' => 'Gerencia de Determinación de Responsabilidad Administrativa' ],
            [ 'name' => 'Presidencia' ],
            [ 'name' => 'Vicepresidencia' ],
            [ 'name' => 'Gerencia General del Despacho' ],
            [ 'name' => 'Consultoría Jurídica' ],
            [ 'name' => 'Gerencia de Seguimiento y Control Operativo' ],
            [ 'name' => 'Gerencia de Planeación Estratégica' ],
            [ 'name' => 'Gerencia de Asesoría Legal' ],
            [ 'name' => 'Gerencia de Contrataciones' ],
            [ 'name' => 'Gerencia de Litigios' ],
            [ 'name' => 'Gerencia General de Planificación y Presupuesto' ],
            [ 'name' => 'Coordinación de Promoción de Inversiones' ],
            [ 'name' => 'Gerencia General de Tecnología de la Información y Comunicación' ],
            [ 'name' => 'Gerencia de Planificación y  Estudios Económicos' ],
            [ 'name' => 'Gerencia de Gestión Organizacional y Procesos' ],
            [ 'name' => 'Gerencia de Presupuesto ' ],
            [ 'name' => 'Gerencia de Sistemas de Información y Base de Datos' ],
            [ 'name' => 'Gerencia de Infraestructura Tecnológica ' ],
            [ 'name' => 'Gerencia de Telecomunicaciones y Soporte Integral' ],
            [ 'name' => 'Gerencia General de Gestión Humana' ],
            [ 'name' => 'Gerencia General de Gestión Administrativa' ],
            [ 'name' => 'Asesoría Legal' ],
            [ 'name' => 'Gerencia de Compras y Suministros' ],
            [ 'name' => 'Gerencia de Servicios Integrados' ],
            [ 'name' => 'Gerencia de Ingreso, Clasificación y Egreso del Talento Humano ' ],
            [ 'name' => 'Gerencia de Procesos Técnicos y Nominales de Gestión Humana' ],
            [ 'name' => 'Gerencia de Desarrollo y Bienestar Socioeconómico' ],
            [ 'name' => 'Gerencia de Bienes Públicos' ],
            [ 'name' => 'Gerencia de Contabilidad' ],
            [ 'name' => 'Gerencia de Finanzas y Tesorería' ],
            [ 'name' => 'Gerencia General de Gestión Comunicacional' ],
            [ 'name' => 'Gerencia de Gestión de Información y Contenidos' ],
            [ 'name' => 'Gerencia de Medios Audiovisuales' ],
            [ 'name' => 'Gerencia de Protocolo y Relaciones Interinstitucionales' ],
            [ 'name' => 'Gerencia General de Seguridad Integral' ],
            [ 'name' => 'Gerencia de Seguridad Física y Patrimonial' ],
            [ 'name' => 'Gerencia de Monitoreo y Control' ],
            [ 'name' => 'Gerencia General del Observatorio Venezolano Antibloqueo ' ],
            [ 'name' => 'Gerencia de Monitoreo, Investigación y Sistematización de las MCU' ],
            [ 'name' => 'Gerencia de Análisis y Estudios Económicos' ],
            [ 'name' => 'Gerencia de Información y Tecnologías Digitales' ],
            [ 'name' => 'Coordinación de Registro, Monitoreo y Sistematización de las MCU' ],
            [ 'name' => 'Coordinación de Estadística' ],
            [ 'name' => 'Coordinación de Seguimiento de Activos' ],
            [ 'name' => 'Coordinación Análisis Económico' ],
            [ 'name' => 'Gerencia de Información y Tecnologías Digitales' ],
            [ 'name' => 'Coordinación de Gestión del Conocimiento y Sociabilización' ],
            [ 'name' => 'Coordinación de Transformación Digital' ],
            [ 'name' => 'Gerencia General de Proyectos de Inversión y Activos' ],
            [ 'name' => 'Gerencia de Registro de Proyectos de Inversión y Activos' ],
            [ 'name' => 'Coordinación de Registro y Control de Proyectos y Activos' ],
            [ 'name' => 'Gerencia de Factibilidad y Evaluación de Proyectos' ],
            [ 'name' => 'Coordinación de Evaluación y Factibilidad de Proyectos' ],
            [ 'name' => 'Banco de Proyectos de Inversión y Activos' ],
            [ 'name' => 'Coordinación de Clasificación y Resguardo de Proyectos y Activos' ],
            [ 'name' => 'Gerencia General de Promoción de Inversiones' ],
            [ 'name' => 'Gerencia de Atención al Inversionista' ],
            [ 'name' => 'Coordinación  de Atención al Inversionista' ],
            [ 'name' => 'Coordinación de Valoración y Control' ],
            [ 'name' => 'Gerencia de Articulación Sectorial de Inversiones' ],
            [ 'name' => 'Coordinación  de Enlace Sectorial' ],
            [ 'name' => 'Coordinación de Articulación e Inspección de Activos' ],
            [ 'name' => 'Gerencia de Modelos Asociativos' ],
            [ 'name' => 'Coordinación de Estudios Socio-Productivo' ],
            [ 'name' => 'Coordinación  de Modelos y Esquemas de Negocio' ],
            [ 'name' => 'Servicio Medico' ],
            [ 'name' => 'Instituto de Estudios Económicos y Tecnológicos' ],
            [ 'name' => 'Coordinación de Monitoreo y Registro de las MCU' ],
            [ 'name' => 'Coordinación de Estudios Económicos' ],
            [ 'name' => 'Coordinación de Análisis Estadísticos' ],
            [ 'name' => 'Coordinación de Gestión del Conocimiento' ],
            //[ 'name' => '' ]
        ]);
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

        // Estados (activos/inactivos) - Renombrar para evitar confusión
        DB::table('Status')->insert([ // Usar plural 'statuses'
            ['name' => 'Activo'],
            ['name' => 'Inactivo'],
        ]);
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
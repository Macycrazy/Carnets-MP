<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class departamentos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Departamentos
        DB::table('Department')->insert([
            [ 'name' => 'Auditoría Laboral'],
            [ 'name' => 'Gerencia de Control Posterior'],
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
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
 use Carbon\Carbon;

class departamentos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Departamentos
        $departmentNames = [
            'ASESORÍA LABORAL',
            'AUDITORÍA INTERNA',
            'CONSULTORÍA JURÍDICA',
            'COORDINACIÓN DE ANÁLISIS ESTADÍSTICOS',
            'COORDINACIÓN DE ATENCIÓN AL INVERSIONISTA',
            'COORDINACIÓN DE CLASIFICACIÓN Y RESGUARDO DE PROYECTOS Y ACTIVOS',
            'COORDINACIÓN DE ENLACE SECTORIAL',
            'COORDINACIÓN DE ESTUDIOS ECONÓMICOS',
            'COORDINACIÓN DE EVALUACIÓN Y FACTIBILIDAD DE PROYECTOS',
            'COORDINACIÓN DE GESTIÓN DEL CONOCIMIENTO',
            'COORDINACIÓN DE INVESTIGACIÓN Y SISTEMATIZACIÓN DE LAS MCU',
            'COORDINACIÓN DE MONITOREO Y REGISTRO DE LAS MCU',
            'COORDINACIÓN DE PROMOCIÓN DE INVERSIONES',
            'COORDINACIÓN DE REGISTRO Y CONTROL DE PROYECTOS Y ACTIVOS',
            'COORDINACIÓN DE SEGUIMIENTO DE ACTIVOS',
            'COORDINACIÓN DE SEGUIMIENTO DE GESTIÓN OPERATIVA INTEGRAL',
            'COORDINACIÓN DE TECNOLOGÍAS DIGITALES',
            'GERENCIA DE ANÁLISIS Y ESTUDIOS ECONÓMICOS',
            'GERENCIA DE ARTICULACIÓN SECTORIAL DE INVERSIONES',
            'GERENCIA DE ASESORÍA LEGAL',
            'GERENCIA DE ATENCIÓN AL INVERSIONISTA',
            'GERENCIA DE BIENES PÚBLICOS',
            'GERENCIA DE COMPRAS Y SUMINISTROS',
            'GERENCIA DE CONTABILIDAD',
            'GERENCIA DE CONTRATACIONES',
            'GERENCIA DE CONTROL POSTERIOR',
            'GERENCIA DE DESARROLLO Y BIENESTAR SOCIOECONÓMICO',
            'GERENCIA DE FACTIBILIDAD Y EVALUACIÓN DE PROYECTOS',
            'GERENCIA DE FINANZAS Y TESORERÍA',
            'GERENCIA DE GESTIÓN DE INFORMACIÓN Y CONTENIDOS',
            'GERENCIA DE GESTIÓN ORGANIZACIONAL Y PROCESOS',
            'GERENCIA DE INFORMACIÓN Y TECNOLOGÍAS DIGITALES',
            'GERENCIA DE INFRAESTRUCTURA TECNOLÓGICA',
            'GERENCIA DE INGRESO, CLASIFICACIÓN Y EGRESO DEL TALENTO HUMANO',
            'GERENCIA DE LITIGIOS',
            'GERENCIA DE MEDIOS AUDIOVISUALES',
            'GERENCIA DE MODELOS ASOCIATIVOS',
            'GERENCIA DE MONITOREO Y CONTROL',
            'GERENCIA DE PLANIFICACIÓN Y ESTUDIOS ECONÓMICOS',
            'GERENCIA DE PRESUPUESTO',
            'GERENCIA DE PROCESOS TÉCNICOS Y NOMINALES DE GESTIÓN HUMANA',
            'GERENCIA DE PROTOCOLO Y RELACIONES INTERINSTITUCIONALES',
            'GERENCIA DE SEGURIDAD FÍSICA Y PATRIMONIAL',
            'GERENCIA DE SERVICIOS INTEGRADOS',
            'GERENCIA DE SISTEMAS DE INFORMACIÓN Y BASE DE DATOS',
            'GERENCIA DE TELECOMUNICACIONES Y SOPORTE INTEGRAL',
            'GERENCIA GENERAL DE GESTIÓN ADMINISTRATIVA',
            'GERENCIA GENERAL DE GESTIÓN COMUNICACIONAL',
            'GERENCIA GENERAL DE GESTIÓN HUMANA',
            'GERENCIA GENERAL DE PLANIFICACIÓN Y PRESUPUESTO',
            'GERENCIA GENERAL DE PROMOCIÓN DE INVERSIONES',
            'GERENCIA GENERAL DE TECNOLOGÍA DE LA INFORMACIÓN Y COMUNICACIÓN',
            'GERENCIA GENERAL DEL DESPACHO',
            'GERENCIA GENERAL DEL OBSERVATORIO VENEZOLANO ANTIBLOQUEO',
            'INSTITUTO DE ESTUDIOS ECONÓMICOS Y TECNOLÓGICOS',
            'PRESIDENCIA',
            'SERVICIO MÉDICO',
        ];

        $dataToInsert = array_map(function ($departmentName) {
            return [
                'name' => $departmentName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }, $departmentNames);

        // Asegúrate de usar el nombre de tabla correcto (minúsculas, plural por convención)
        DB::table('Department')->insert($dataToInsert);

        $this->command->info('Seeder de Departamentos completado.');
    }
}

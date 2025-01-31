<?php

namespace App\Exports; 

use App\Models\carnets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Carbon\Carbon;


class UserExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    public function collection()
    {
        $a= db::table('Carnets')
        ->join(

            'Department',
            'Department.id',
            '=',
            'Carnets.id_department'
        )
        ->join(

            'Charge',
            'Charge.id',
            '=',
            'Carnets.id_charge'
        )
        ->join(

            'Access_levels',
            'Access_levels.id',
            '=',
            'Carnets.id_access_levels'
        )
            ->select(
            'Carnets.name',
            'Carnets.lastname',
            'Carnets.cedule',
            'Carnets.card_code',
            'Carnets.address',
            'Carnets.cellpone',
            'Carnets.expiration',
            'Carnets.note as note',
            'Department.name as department',
            'Charge.name as charge',
            'Access_levels.name as access'
        )->get();
        
       
        
        return $a;
    }
    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido',
            'Cédula',
            'Código de Carnet',
            'Dirección',
            'Teléfono',
            'Expiración',
            'Nota',
            'Departamento',
            'Cargo',
            'Nivel de Acceso'
        ];
    }
     public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Formato para la columna D (Fecha de Creación)
        ];
    }

}
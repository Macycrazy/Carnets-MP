<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class MensajesExport implements FromCollection
{
    public function collection()
    {
        return DB::table('mensajes')->get();
    }
}
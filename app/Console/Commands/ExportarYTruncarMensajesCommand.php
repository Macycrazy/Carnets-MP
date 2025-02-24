<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MensajesExport; // Crea esta clase (ver paso 3)
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExportarYTruncarMensajesCommand extends Command
{
    protected $signature = 'mensajes:export-y-truncar'; // Nombre del comando
    protected $description = 'Exporta mensajes a Excel y trunca la tabla';

    public function handle()
    {
        $fecha_actual = Carbon::now();
        if ($fecha_actual->day == 30) {
            // Exportar a Excel
            Excel::store(new MensajesExport, 'mensajes_' . date('Y-m-d') . '.xlsx', 'local'); // Guarda en storage/app

            // Truncar la tabla
            DB::table('mensajes')->truncate();

            $this->info('Mensajes exportados y tabla truncada correctamente.'); // Mensaje en consola
        }
    }
}
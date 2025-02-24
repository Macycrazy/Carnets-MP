<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MensajesExport; // Crea esta clase (ver paso 4)
use Illuminate\Support\Facades\DB;

class ExportarYTruncarMensajes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // Exportar a Excel
        Excel::store(new MensajesExport, 'mensajes_' . date('Y-m-d') . '.xlsx', 'local'); // Guarda en storage/app

        // Truncar la tabla
        DB::table('mensajes')->truncate();
    }
}
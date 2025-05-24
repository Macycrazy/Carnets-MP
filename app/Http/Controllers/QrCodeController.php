<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; 

use App\Models\datos;
use App\Models\trabajadores;
use App\Models\carnets;
use App\Models\department;
use App\Models\charge;
class QrCodeController extends Controller
{

    public function guardar(request $request)
    {

//dd($request->document);
        $carnets=db::table('Carnets')->get();

       
        foreach ($carnets as $carnet) {
           
     //  dd($carnet->cedule);
            $codigoEncriptado = md5($carnet->cedule); // Esto es solo un ejemplo, no es seguro para producción
//dd($codigoEncriptado);
        $qrCodeContentUrl = url('/trabajador_' . $codigoEncriptado);
      

        
        $directory = 'qrcodes';
        $fileName = 'QR_cedula_' . Str::slug($carnet->cedule) . '.png';
        $fullPathForStorage = public_path('QR/' . $fileName);

    
        Storage::disk('public')->makeDirectory($directory);

$logoRelativePath = '/Logo.png'; 

  $logoAbsolutePath = '/public'.$logoRelativePath;
//return '<img src="'.$logoRelativePath .'">';
//  dd( $logoAbsolutePath);
  

         // El archivo del logo existe, procede a generar el QR con el logo
           QrCode::format('png') // Crucial: PNG o JPEG
                  ->size(300)
                  ->merge($logoAbsolutePath, .5) // Usamos la ruta absoluta verificada
                  ->generate($qrCodeContentUrl, $fullPathForStorage);



        $dato = datos::create([
            //dd( $codigoEncriptado),
            'cedula' => $carnet->cedule,
            'codigo' => $codigoEncriptado,
            'qr_code_path' => $fileName,
            
        ]);

     }


          return redirect()->back()->with('success', 'Dato y QR guardados exitosamente.');
    }

    public function showQrCode()
    {
   

        $datos=DB::table('datos')->get();
      

        return view('qr-code-display', compact('datos'));
    }

    public function trabajadores($trabajador)
    {       

        $dato = datos::where('codigo', $trabajador)
        ->join('Carnets','Carnets.cedule','=','datos.cedula')
        ->join('Department','Department.id','=','Carnets.id_department')
        ->join('Charge','Charge.id','=','Carnets.id_charge')
        ->select('datos.*',
            
            'Charge.name as cargo',
            'Department.name as departamento',
            'Carnets.name as nombre',
            'lastname as apellido',
            'datos.cedula as cedula',

            'identifier as nacionalidad',
            'Carnets.id_status as status')
        ->first();
//dd($dato);
    if( $dato->status==1)
    {
        return view('trabajador', compact('dato'));
    }
        
    
    else
    {
       return view('fallo');
    }

        }

    // Ejemplo para descargar un QR
    public function downloadQrCode()
    {
        return response()->streamDownload(function () {
            echo QrCode::size(300)
                        ->format('png') // Puedes elegir otros formatos como 'svg'
                        ->generate('Contenido para descargar');
        }, 'mi-qr-code.png', [
            'Content-Type' => 'image/png',
        ]);
    }
}
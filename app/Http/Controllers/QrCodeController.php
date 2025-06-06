<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Auth;

use App\Models\datos;
use App\Models\trabajadores;
use App\Models\carnets;
use App\Models\department;
use App\Models\charge;
class QrCodeController extends Controller
{

    public function guardar(request $request)
    {


        $carnets=db::table('Carnets')->where('cedule','=',$request->cedula)->first();

         if ($carnets==null) 
        {
            
          return back()->with('danger', 'El empleado no se encuentra en el sistema');
    
}
     
           
     //  dd($carnet->cedule);
            $codigoEncriptado = md5($carnets->cedule); // Esto es solo un ejemplo, no es seguro para producción
//dd($codigoEncriptado);
        $qrCodeContentUrl = url('/trabajador_' . $codigoEncriptado);
      

        
        $directory = 'qrcodes';
        $fileName = 'QR_cedula_' . Str::slug($carnets->cedule) . '.png';
        $fullPathForStorage = public_path('QR/' . $fileName);



        if (File::exists(public_path('QR/' . $fileName))) 
        {
          return back()->with('warning', 'Qr ya creado');
    
}
    
        Storage::disk('public')->makeDirectory($directory);

$logoRelativePath = '/Logo.png'; 

  $logoAbsolutePath = '/public'.$logoRelativePath;
//return '<img src="'.$logoRelativePath .'">';
//  dd( $logoAbsolutePath);
  

         // El archivo del logo existe, procede a generar el QR con el logo
           QrCode::format('png') // Crucial: PNG o JPEG
                  ->size(300)
                  ->generate($qrCodeContentUrl, $fullPathForStorage);



        $dato = datos::create([
            //dd( $codigoEncriptado),
            'cedula' => $carnets->cedule,
            'codigo' => $codigoEncriptado,
            'qr_code_path' => $fileName,
            
        ]);

    


          return back()->with('success', 'Dato y QR guardados exitosamente.');
    }

    public function showQrCode()
    {
   if( Auth::user())
   {
       if( Auth::user()->rol == 'admin')
       {
  

        $datos=DB::table('datos')->paginate(10);
      

        return view('qr-code-display', compact('datos'));
        }
    }
    else
    {
        return view('index');
    }
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


  public function trabajadoresqr($trabajador)
    {       

        $dato = datos::where('cedula', $trabajador)
        ->join('Carnets','Carnets.cedule','=','datos.cedula')
        ->join('Department','Department.id','=','Carnets.id_department')
        ->join('Charge','Charge.id','=','Carnets.id_charge')
        ->select('datos.*',
            
            'Charge.name as cargo',
               'Carnets.card_code as card_code',
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
        return view('ejecucion_carnet', compact('dato'));
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



       public function guardarmasivo()
    {


        $carnets=db::table('Carnets')->get();

       
        foreach ($carnets as $carnet) {
            
   
        $codigoEncriptado = md5($carnet->cedule); 

        $qrCodeContentUrl = url('/trabajador_' . $codigoEncriptado);
      

        
        $directory = 'qrcodes';

        $fileName = 'QR_cedula_' . Str::slug($carnet->cedule) . '.png';

        $fullPathForStorage = public_path('QR/' . $fileName);

    
        Storage::disk('public')->makeDirectory($directory);

        $logoRelativePath = '/Logo.png'; 

        $logoAbsolutePath = '/public'.$logoRelativePath;

  

      
           QrCode::format('png')
                  ->size(300)
                
                  ->generate($qrCodeContentUrl, $fullPathForStorage);

                   $datos=db::table('datos')->where('cedula','=',$carnet->cedule)->first();

        if($datos == null)
        {

        $dato = datos::create([
        
            'cedula' => $carnet->cedule,

            'codigo' => $codigoEncriptado,

            'qr_code_path' => $fileName,
            
        ]);
        }
        else
        {
            
        }

     }

     /*
    $lastCardCode = carnets::orderBy('id', 'asc')->value('card_code');

if ($lastCardCode !== null) {
    // Remove leading zeros and convert to integer
    $currentNumber = 0;
} else {
    // If no existing card_code, start from 0
    $currentNumber = 0;
}

$in = carnets::select('*')->orderBy('id', 'asc')->get();

foreach ($in as $a) {
    $currentNumber++; // Increment the integer

    // Format the number back to an 8-digit string with leading zeros
    $formattedCardCode = str_pad($currentNumber, 8, '0', STR_PAD_LEFT);

    //dd($formattedCardCode); // For debugging, you'll see "00000001", "00000002", etc.

    $a->update(['card_code' => $formattedCardCode]);
}
*/
          return redirect()->back()->with('success', 'Carnets Generados de forma exitosa');
    }
}
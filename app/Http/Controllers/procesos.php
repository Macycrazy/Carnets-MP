<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use ZipArchive;
use RecursiveIteratorIterator; 
use RecursiveDirectoryIterator; 
use App\Exports\UserExport; 
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


use Intervention\Image\Laravel\Facades\Image;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\carnets;
use App\Models\charge;
use App\Models\department;
use App\Models\access_levels;
use App\Models\states;
use App\Models\status;
use App\Models\User;
use App\Models\logs;
use App\Models\mensajes;

class procesos extends Controller 
{


    public function mensajes()
    {

        $usuarios=user::all()->where('rol','!=','admin');
$user_id=Auth::user();



$messages = mensajes::where(function ($query) use ($user_id) {
            $query->where('emisor', auth()->id())
                  ->where('receptor', $user_id->id);
        })->orWhere(function ($query) use ($user_id) {
            $query->where('emisor', $user_id->id)
                  ->where('receptor', auth()->id());
        })->get();

        return view('mensajes', compact('messages', 'user_id','usuarios'));
    

    }

     public function send(Request $request)
    {
$a=intval(Auth::user()->id);

   $message = new mensajes();

        $message->emisor = $a;
        $message->receptor = $request->receiver_id;
        $message->contenido = $request->message;
        $message->save();

        return response()->json(['message' => 'Mensaje enviado']);
    }





//////////////////////////////// VISTA DE EDICION /////////////////////////////////

    public function editar($id)
    {
        $editar= db::table('Carnets')
         ->select('*', DB::raw('DATE(expiration) as expiration'))
       
        ->where('card_code','=',$id)->first();

  
 

    $data=$this->datos();

    $a = $data->a;
    
    $carnets = $data->carnets;
    
    $cargos = $data->cargos;
    
    $departamentos = $data->departamentos;
    
    $niveles = $data->niveles;
    
    $estados = $data->estados;

    $status = $data->status;

  

         $this->logs('Vista de edicion de carnet_'.$id,'Editar');    
    
        return view('editar',[
        'carnets' => $carnets,
        'status'=>$status,
        'cargos' => $cargos,
        'departamentos' => $departamentos,
        'niveles' => $niveles,
        'estados' => $estados,
        'a' => $a,
        'editar'=>$editar
            ]);
        
    }

//////////////////////////////// VISTA DE EDICION /////////////////////////////////

//////////////////////////////// ACTUALIZACION DEL CARNET /////////////////////////////////

    public function actualizar(request $request,$id)
    {

         $carnet = carnets::select('*')->where('card_code','=',$id)->first();
        

           $request->validate([
        'archivo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480'
    ]);
  
    if($request->hasFile('archivo')){

       
      //dd();
        $avatarName =request()->document.'.'.request()->archivo->getClientOriginalExtension();

        $archivo=request()->archivo;

        $image = image::read($archivo)
        ->scale(width: 800);
     
       $image->save(public_path('imgs/usuarios/'.$avatarName));
       
        $avatarPath = $avatarName;
       
    }
  
     
    
    
       $valores = new carnets;


    $valores->name=strtoupper($request->name);
   

    $valores->lastname=strtoupper($request->surname);


    $valores->address=strtoupper($request->adress);

    $carnet->update(['address' => $valores->address]);

    $valores->expiration=$request->date;

    $carnet->update(['expiration' => $valores->expiration]);

    $valores->cedule=$request->document;

    $carnet->update(['cedule' => $valores->cedule]);

    $valores->cellpone=$request->phone;

    $carnet->update(['cellpone' => $valores->cellpone]);

    $valores->card_code=$request->code;

   // $carnet->update(['card_code' => $valores->card_code]);

    $valores->note=strtoupper($request->comment);

    $carnet->update(['note' => $valores->note]);

    $valores->id_department=$request->department;

    $carnet->update(['id_department' => $valores->id_department]);

    $valores->id_status=1;

    $valores->id_charge=$request->charge;

    $carnet->update(['id_charge' => $valores->id_charge]);

    $valores->id_access_levels=$request->access;

    $carnet->update(['id_access_levels' => $valores->id_access_levels]);

    $valores->id_state=$request->statesment;

    $carnet->update(['id_state' => $valores->id_state]);

    $valores->id_status=$request->status;

    $carnet->update(['id_status' => $valores->id_status]);





        $name=$valores->name;

        $lastname=$valores->lastname;

        $partesNombre = explode(' ', $name);


$nombreFormateado = $partesNombre[0] . ' '; 

$ultimaParte = end($partesNombre); 
$nombreFormateado .= Str::substr($ultimaParte, 0, 1) . '.'; 



$partesApellido = explode(' ', $lastname);

if (count($partesApellido) >= 2) 
{

    $partesApellido[1] = Str::substr($partesApellido[1], 0, 1) . '.';

}

$apellidoFormateado = implode(' ', $partesApellido);

 $valores->name=$nombreFormateado ;

 $carnet->update(['name' => $valores->name]);

    $valores->lastname=$apellidoFormateado;

$carnet->update(['lastname' => $valores->lastname]);


       $this->logs('Actualizar Carnet '.$id,'Actualizar');

  return redirect()->route('index')->with('success', 'Usuario Editado');

    }

//////////////////////////////// ACTUALIZACION DEL CARNET /////////////////////////////////
  
//////////////////////////////// CODIGO DE EL ARCHIVO EXCEL /////////////////////////////////

    public function export() 
{

$excel=Excel::download(new UserExport, 'Carnets a fecha de '.today()->format('d-m-Y').'.xlsx');
   $this->logs('Descarga de excel','Export');

    return $excel;
}

//////////////////////////////// CODIGO DE EL ARCHIVO EXCEL /////////////////////////////////

//////////////////////////////// LLAMADO DE DATOS DEL REGISTRO / ACTUALIZACION /////////////////////////////////

public function datos(){

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
        ->join(

            'Status',
            'Status.id',
            '=',
            'Carnets.id_status'
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
            'Status.name as id_status',
            'Department.name as department',
            'Charge.name as charge',
            'Access_levels.name as access',
            'Carnets.created_at'
        )
           
            ->get();
       
      
      $carnets=carnets::all();
      
      $cargos=charge::orderBy('name', 'asc')->get();
      
      $departamentos=department::orderBy('name', 'asc')->get();
      
      $niveles=access_levels::orderBy('name', 'asc')->get();
      
      $estados=states::orderBy('name', 'asc')->get();

      $status=status::orderBy('name', 'asc')->get();

    return (object) 
    [
    'a' => $a,

    'carnets' => $carnets,

    'cargos' => $cargos,

    'departamentos' => $departamentos,

    'niveles' => $niveles,

    'estados' => $estados,

    'status' => $status,

    ];
}

//////////////////////////////// LLAMADO DE DATOS DEL REGISTRO / ACTUALIZACION /////////////////////////////////




    //////////////////////////////// CODIGO PARA DESCARGAR EN ZIP /////////////////////////////////

      public function descargar()
    {

    $source = public_path('imgs/usuarios');

    $destination = public_path('descargas/Imagenes.zip');

    if (!is_dir(public_path('descargas'))) 
    {

        mkdir(public_path('descargas'), 0755, true);

    }

    if ($this->createZip($source, $destination)) 
    {
           $this->logs('Descarga Exitosa','Descargar');
        return response()->download($destination);

    } 
    else 
    {
          $this->logs('Eror al descargar ZIP','Descarga');

        return response()->json(['error' => 'Error al comprimir los archivos']);

    }
        
    }

    //////////////////////////////// CODIGO PARA DESCARGAR EN ZIP /////////////////////////////////

    ///////////////////////////////// CODIGO PARA DESCARGAR IMAGENES //////////////////////

    public function descargar_imagen($nombreImagen)
{
    $rutaImagen = public_path('imgs/usuarios/' . $nombreImagen);


    if (file_exists($rutaImagen)) {
        $this->logs('Descarga Exitosa', 'Descargar');
        return response()->download($rutaImagen);
    } else {
        $this->logs('Error al descargar imagen', 'Descarga');
        return back()->with('alert','No Tiene Foto');
    }
}

   ///////////////////////////////// CODIGO PARA DESCARGAR IMAGENES //////////////////////


//////////////////////////////// CODIGO DE EL ARCHIVO ZIP /////////////////////////////////

   function createZip($source, $destination) {

      if (!file_exists($source)) 
    {

        return false;

    }

    $zip = new ZipArchive();

    if ($zip->open($destination, ZipArchive::CREATE) !== true)
    {

        return false;

    }

    $source = realpath($source);

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

    foreach ($iterator as $file) 
    {

        if ($iterator->isDot()) 
        {

            continue; 

        }

       
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) 
        {

            continue;

        }

    
        $relativePath = substr($file, strlen($source) + 1);

        $zip->addFile($file, $relativePath);

    }

       $this->logs('Creacion del zip','CreateZIP');

    return $zip->close();
}

    //////////////////////////////// CODIGO DE EL ARCHIVO ZIP /////////////////////////////////

    //////////////////////////////// REGISTRO DE CARNETS /////////////////////////////////

    public function registrar(request $request)
    {

     

      $carnet = carnets::select('*')->where('card_code','=',$request->code)->first();

      $cedula = carnets::select('*')->where('cedule','=',$request->document)->first();
      if($carnet)
      {
        return back()
 ->with('alert','Codigo de Carnet Ya Existente');
      }
      else if($cedula)
      {
        return back()
 ->with('alert','Este usuario Ya esta Registrado, Cedula: '.$cedula->cedule);
      }
  else
      {
       $request->validate([
        'archivo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480'
    ]);
  
    if($request->hasFile('archivo'))
    {

            $avatarName =request()->document.'.'.request()->archivo->getClientOriginalExtension();

        $archivo=request()->archivo;

        $image = image::read($archivo)
        ->scale(width: 800);
     
       $image->save(public_path('imgs/usuarios/'.$avatarName));
       
        $avatarPath = $avatarName;
       
    }
  
       
         $valores = new carnets;
        
        $valores->name=strtoupper($request->name);
        
        $valores->lastname=strtoupper($request->surname);
        
        $valores->address=strtoupper($request->adress);
        
        $valores->expiration=$request->date;
        
        $valores->cedule=$request->document;
        
        $valores->cellpone=$request->phone;
        
        $valores->card_code=$request->code;
        
        $valores->note=strtoupper($request->comment);
        
        $valores->id_department=$request->department;
        
        $valores->id_status=1;
        
        $valores->id_charge=$request->charge;
        
        $valores->id_access_levels=$request->access;
        
        $valores->id_state=$request->statesment;


        $name=$valores->name;

        $lastname=$valores->lastname;

        $partesNombre = explode(' ', $name);

if (count($partesNombre) >= 2) 
{

    $partesNombre[1] = Str::substr($partesNombre[1], 0, 1) . '.';

}

$nombreFormateado = implode(' ', $partesNombre);

$partesApellido = explode(' ', $lastname);

if (count($partesApellido) >= 2) 
{

    $partesApellido[1] = Str::substr($partesApellido[1], 0, 1) . '.';

}

    $apellidoFormateado = implode(' ', $partesApellido);

    $valores->name=$nombreFormateado ;

    $valores->lastname=$apellidoFormateado;

 $valores->save();

  $this->logs('Registro del Carnet '.$valores->cedule,'Registrar');

 return back()
 ->with('success','Carnet Creado');
        }
    }


//////////////////////////////// REGISTRO DE CARNETS /////////////////////////////////



//////////////////////////////// INDEX /////////////////////////////////
     public function index()
    {

    $data=$this->datos();

    $a = $data->a;
    
    $carnets = $data->carnets;
    
    $cargos = $data->cargos;
    
    $departamentos = $data->departamentos;
    
    $niveles = $data->niveles;
    
    $estados = $data->estados;

    $status = $data->status;



    $in=DB::table('Carnets')
    ->select('*')
    
    ->orderBy('id', 'desc')
    ->orderBy('card_code', 'desc')
    ->first();
    $in->card_code=$in->card_code+1;

       $this->logs('Redirecion a la Vista index','Index');

      //dd($in);
    return view('index', 
    [
        'carnets' => $carnets,

        'cargos' => $cargos,

        'departamentos' => $departamentos,

        'niveles' => $niveles,

        'estados' => $estados,

        'status' => $status,

        'a' => $a,

        'in' => $in,
    ]
    );
    }

//////////////////////////////// INDEX /////////////////////////////////


//////////////////////////////// LOGIN  /////////////////////////////////

     public function Login(Request $request)
    {

        $emailIngresado = $request->email; 

        $usuario = User::where('email', $emailIngresado)->first();

    if ($usuario) 
{ 
    $contrasenaIngresada = $request->password; 

    $contrasenaAlmacenada = $usuario->password;

    if (Hash::check($contrasenaIngresada, $contrasenaAlmacenada)) 
    {

        Auth::login($usuario);
       
         $this->logs('Inicio de sesion Exitoso','Login');

        return back()->with('success','Bienvenido');

    } 
    else 
    {
      

       $this->logs('Inicio de sesion Fallido','Login');
        return back()->with('alert','Contraseña incorrecta'); 
    }
} 
else 
{
   $this->logs('Usuario No Encontrado','Login');
     return back()->with('alert','Usuario No Encontrado'); 
}

       
    }


//////////////////////////////// LOGIN  /////////////////////////////////

//////////////////////////////// LOG OUT  /////////////////////////////////
      public function logout()
{
       $this->logs('Cerrar Sesion','Logout');

        Auth::logout();

        return redirect()->route('index')->with('alert','Vuelva Pronto');
        
}


//////////////////////////////// LOG OUT  /////////////////////////////////


//////////////////////////////// LOGS  /////////////////////////////////

    public function logs($accion, $controlador)
{

        $log = new logs;

        $log->ip = request()->ip();

    
            if (Auth::check()) 

                {

                    $user = Auth::user();

                    $log->usuario = $user->id; 
                } 
            else 

                {

                    $log->usuario = 0; 

                }

        
        $log->accion = $accion;
        
        $log->controlador = $controlador;
        
        $log->save();

}


//////////////////////////////// LOGS  /////////////////////////////////

////////////////////////////////ACTIVIDADES TABLA /////////////////////

public function actividades()
{

    $actividades = DB::table('logs')
        ->join(
            'userEntity as users', 
            'users.id', '=', 'logs.usuario'
              )
        ->select(
            'logs.accion',
            'logs.controlador',
            'logs.ip',
            'users.name AS usuario',
            DB::raw('max(logs.created_at) as created_at')
                )
        ->orderBy('created_at', 'DESC')
        ->groupBy('logs.accion', 'logs.controlador', 'logs.ip', 'users.name')
        ->get();

       

    return DataTables::of($actividades) 
    
    ->toJson();

}

////////////////////////////////ACTIVIDADES TABLA /////////////////////


}

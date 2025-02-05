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


use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\carnets;
use App\Models\charge;
use App\Models\department;
use App\Models\access_levels;
use App\Models\states;
use App\Models\User;


class procesos extends Controller 
{
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

           
    
        return view('editar',[
        'carnets' => $carnets,
        'cargos' => $cargos,
        'departamentos' => $departamentos,
        'niveles' => $niveles,
        'estados' => $estados,
        'a' => $a,
        'editar'=>$editar
            ]);
        
    }

    public function actualizar(request $request,$id)
    {

         $carnet = carnets::select('*')->where('card_code','=',$id)->first();
        

           $request->validate([
        'archivo' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
    ]);
  
    if($request->hasFile('archivo')){

       
        // Store the uploaded file
        $avatarName =request()->document.'.'.request()->archivo->getClientOriginalExtension();

        $request->archivo->move('imgs/usuarios', $avatarName);
         //dd( $request->archivo->storeAs('public/imgs/usuarios', $avatarName));
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
    $carnet->update(['card_code' => $valores->card_code]);

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



        $name=$valores->name;
        $lastname=$valores->lastname;

        $partesNombre = explode(' ', $name);


$nombreFormateado = $partesNombre[0] . ' '; // Primera parte

$ultimaParte = end($partesNombre); // Obtiene la última parte
$nombreFormateado .= Str::substr($ultimaParte, 0, 1) . '.'; // Inicial y punto

//dd($nombreFormateado); 

$partesApellido = explode(' ', $lastname);

if (count($partesApellido) >= 2) {
    $partesApellido[1] = Str::substr($partesApellido[1], 0, 1) . '.';
}

$apellidoFormateado = implode(' ', $partesApellido);

 $valores->name=$nombreFormateado ;

 $carnet->update(['name' => $valores->name]);

    $valores->lastname=$apellidoFormateado;
$carnet->update(['lastname' => $valores->lastname]);


        
  return redirect()->route('index')->with('success', 'Usuario Editado');
    }
  

    public function export() 
{

$excel=Excel::download(new UserExport, 'Carnets a fecha de '.today()->format('d-m-Y').'.xlsx');

    return $excel;
}

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
            'Access_levels.name as access',
            'Carnets.created_at'
        )->orderBy('Carnets.created_at','asc')
            ->get();
          //  $existe = File::exists('imgs/usuarios/'.$a[1]->card_code.'.png');
          //  dd($existe);
      $carnets=carnets::all();
      $cargos=charge::orderBy('name', 'asc')->get();
      $departamentos=department::orderBy('name', 'asc')->get();
      $niveles=access_levels::orderBy('name', 'asc')->get();
      $estados=states::orderBy('name', 'asc')->get();
      return (object) [
    'a' => $a,
    'carnets' => $carnets,
    'cargos' => $cargos,
    'departamentos' => $departamentos,
    'niveles' => $niveles,
    'estados' => $estados,
];
}
public function prueba()
{
    $in=db::table('Carnets')
    ->select('card_code')
      ->orderBy('card_code','asc')
            ->get();
dd($in);
}
     public function index()
    {
        $data=$this->datos();

           $a = $data->a;
    $carnets = $data->carnets;
    $cargos = $data->cargos;
    $departamentos = $data->departamentos;
    $niveles = $data->niveles;
    $estados = $data->estados;

    $in=db::table('Carnets')
      ->orderBy('card_code','asc')
            ->first();

     // dd(Auth::user()); 
    return view('index', [
        'carnets' => $carnets,
        'cargos' => $cargos,
        'departamentos' => $departamentos,
        'niveles' => $niveles,
        'estados' => $estados,
        'a' => $a,
         'in' => $in,
    ]);
    }

   

      public function descargar()
    {
      $source = public_path('imgs/usuarios');
    $destination = public_path('descargas/Imagenes.zip');

    if (!is_dir(public_path('descargas'))) {
        mkdir(public_path('descargas'), 0755, true);
    }

    if ($this->createZip($source, $destination)) {
        return response()->download($destination);
    } else {
        return response()->json(['error' => 'Error al comprimir los archivos']);
    }
        
    }

   function createZip($source, $destination) {
      if (!file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if ($zip->open($destination, ZipArchive::CREATE) !== true) {
        return false;
    }

    $source = realpath($source);

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

    foreach ($iterator as $file) {
        if ($iterator->isDot()) {
            continue; // Saltar archivos y directorios ocultos
        }

        // Verificar si es una imagen (puedes agregar más extensiones si es necesario)
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
            continue;
        }

        // Calcular la ruta relativa dentro del ZIP
        $relativePath = substr($file, strlen($source) + 1);

        $zip->addFile($file, $relativePath);
    }

    return $zip->close();
}

    

    public function registrar(request $request)
    {

     
       $request->validate([
        'archivo' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
    ]);
  
    if($request->hasFile('archivo')){

       
        // Store the uploaded file
        $avatarName =request()->document.'.'.request()->archivo->getClientOriginalExtension();

        $request->archivo->move('imgs/usuarios', $avatarName);
         //dd( $request->archivo->storeAs('public/imgs/usuarios', $avatarName));
        $avatarPath = $avatarName;
       
    }
  
     
    
    
        $valores = new carnets;

    $valores->name=strtoupper($request->name);
    $valores->lastname=strtoupper($request->surname);
    $valores->address=strtoupper($request->adress);
    $valores->expiration=Carbon::parse($request->date)->format('d/m/Y');
    $valores->cedule=$request->document;
    $valores->cellpone=$request->phone;
    $valores->card_code=$request->code;
    $valores->note=strtoupper($request->comment);
    $valores->id_department=$request->department;
     $valores->id_status=1;
    $valores->id_charge=$request->charge;
    $valores->id_access_levels=$request->access;
    $valores->id_state=$request->statesment;
   // $valores->image=$request->image;
    //$valores->date=$request->date;

        $name=$valores->name;
        $lastname=$valores->lastname;

        $partesNombre = explode(' ', $name);

if (count($partesNombre) >= 2) {
    $partesNombre[1] = Str::substr($partesNombre[1], 0, 1) . '.';
}

$nombreFormateado = implode(' ', $partesNombre);

$partesApellido = explode(' ', $lastname);

if (count($partesApellido) >= 2) {
    $partesApellido[1] = Str::substr($partesApellido[1], 0, 1) . '.';
}

$apellidoFormateado = implode(' ', $partesApellido);

 $valores->name=$nombreFormateado ;
    $valores->lastname=$apellidoFormateado;

     //dd($imagePath);
// dd($valores);
 $valores->save();
 return back()->with('status','Carnet Creado');
        
    }

     public function Login(Request $request)
    {

      $emailIngresado = $request->email; // Email ingresado por el usuario

$usuario = User::where('email', $emailIngresado)->first(); // Busca el usuario por email
//  dd($usuario);
if ($usuario) { // Verifica si el usuario existe
    $contrasenaIngresada = $request->password; // Contraseña ingresada por el usuario

    $a = Hash::make($contrasenaIngresada, ['rounds' => 10]);



    $contrasenaAlmacenada = $usuario->password; // Contraseña hasheada de la base de datos
 //dd($contrasenaAlmacenada);
    if (Hash::check($contrasenaIngresada, $contrasenaAlmacenada)) {
        Auth::login($usuario);
       // 
        return back();
    } else {
        // La contraseña es incorrecta
        return back(); // Mensaje de error más descriptivo
    }
} else {
     return back(); // Mensaje si el usuario no existe
}

      /*  session()->put('usuario', $request->email);
        return back();*/
       
    }
      public function logout()
    {
     Auth::logout();
        return redirect()->route('index');
        
    }

     
}

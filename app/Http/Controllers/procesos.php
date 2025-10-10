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
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Cache;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;
use SimpleSoftwareIO\QrCode\Facades\QrCode;// Importar la clase InputFile



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
use App\Models\partes_carnet;
use App\Models\datos;
use App\Models\trabajadores;

use App\Events\mensajeevento;

class procesos extends Controller
{

    public function sendMessage($receptor,$mensaje,$foto)
    {
       // dd('imgs/carnets/front/'.$foto.'-front.jpeg');


         $imagenperfil=public_path('imgs/usuarios/'.$foto.'.jpg');

        //dd(File::exists($imagenperfil));


        //dd($imagenfoto);
        $chat_id = $receptor;
        $message = $mensaje;

         $rutaFoto = $foto;

          try {
          //  dd(File::exists($imagenfoto));


        if ($foto == true) { // Verificar si $foto tiene un valor
            Telegram::sendPhoto([
                'chat_id' => $chat_id,
                'photo' => $foto,
                'caption' => $message,
            ]);
            return 'Mensaje e imagen enviados con éxito';
        } else {
            Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text' => $message,
            ]);
            return back()->with('success','Mensaje enviado con éxito, sin imagen');
        }
    } catch (\Exception $e) {
      //  Log::error('Error al enviar mensaje a Telegram: ' . $e->getMessage());
        return 'Error al enviar mensaje: ' . $e->getMessage();
    }
          try {

    } catch (\Exception $e) {
      //  Log::error('Error al enviar mensaje a Telegram: ' . $e->getMessage());
        return 'Error al enviar mensaje: ' . $e->getMessage();
    }


// return response()->json(['message' => $foto]);

    }

    //------------------------------------------------------------------------------------------------------

    public function reportMessages($receptor,$mensaje,$foto,$tipo)
    {
       // dd('imgs/carnets/front/'.$foto.'-front.jpeg');
       //dd();
        $imagenfoto=public_path('imgs/carnets/front/'.$foto.'-front.png');
         $imagenperfil=public_path('imgs/usuarios/'.$foto.'.jpg');

        //dd(File::exists($imagenperfil));


        //dd($imagenfoto);
        $chat_id = $receptor;
        $message = $mensaje;

         $rutaFoto = $foto;

          try {
          //  dd(File::exists($imagenfoto));
             if (File::exists($imagenfoto) == true && $tipo == 'Retiro') { // Verificar si $foto tiene un valor
            Telegram::sendPhoto([
                'chat_id' => $chat_id,
                'photo' => InputFile::create($imagenfoto, basename($imagenfoto)), // Usamos InputFile::create()
                'caption' => $message,
            ]);
            return back()->with('success','Mensaje e imagen enviados con éxito');
        }
            if (File::exists($imagenperfil) == true && $tipo == 'Solicitud') { // Verificar si $foto tiene un valor
            Telegram::sendPhoto([
                'chat_id' => $chat_id,
                'photo' => InputFile::create($imagenperfil, basename($imagenperfil)), // Usamos InputFile::create()
                'caption' => $message,
            ]);
            return back()->with('success','Mensaje e imagen enviados con éxito');
        }



    } catch (\Exception $e) {
      //  Log::error('Error al enviar mensaje a Telegram: ' . $e->getMessage());
        return 'Error al enviar mensaje: ' . $e->getMessage();
    }
          try {

    } catch (\Exception $e) {
      //  Log::error('Error al enviar mensaje a Telegram: ' . $e->getMessage());
        return 'Error al enviar mensaje: ' . $e->getMessage();
    }


// return response()->json(['message' => $foto]);

    }

    //-------------------------------------------------------------------------------------------------------

     public function checkNewMessages()
    {
        $user_id = Auth::user();

         $emisor = Mensajes::where(function ($query) use ($user_id) {
        $query

            ->where('receptor', $user_id->id);

    }) ->latest('mensajes.id')
         ->join('userEntity as u', 'u.id', '=', 'mensajes.emisor')
         ->select('mensajes.id','u.name as emisor')
         ->first();

         $lastMessage = Mensajes::where(function ($query) use ($user_id) {
        $query
            ->where('receptor', $user_id->id);
    })->latest('id')->first();

    $lastCheckedMessageId = Session::get('last_checked_message_id');

    if ($lastMessage) {
        if ($lastCheckedMessageId === null || (int) $lastCheckedMessageId < (int) $lastMessage->id) {
            Session::put('last_checked_message_id', $lastMessage->id);
            return response()->json(['newMessages' => true,'emisor' => $emisor]);
        }
    }

    return response()->json(['newMessages' => false]);

    }

    public function getMessages($userId)
{
     $authUser = Auth::id();

$messages = Mensajes::where(function ($query) use ($authUser, $userId) {
    $query->where('emisor', $authUser)->where('receptor', $userId);
})
->orWhere(function ($query) use ($authUser, $userId) {
    $query->where('emisor', $userId)->where('receptor', $authUser);
})
->groupBy('have_file', 'created_at', 'contenido','emisor','receptor')
->orderBy('created_at','asc')
->selectRaw('have_file, created_at, contenido, array_to_json(array_agg(file)) as files,emisor,receptor')
->get();

$messages = $messages->map(function ($message) use ($authUser) {
    $sender = User::find($message->emisor);
    $receiver = User::find($message->receptor);

    // Verificar si $sender y $receiver son null
    if ($sender) {
        $message->sender_online = $sender->isOnline();
        $message->sender_last_seen = $sender->lastSeen();
    } else {
        $message->sender_online = false; // O cualquier valor predeterminado
        $message->sender_last_seen = null;
    }

    if ($receiver) {
        $message->receiver_online = $receiver->isOnline();
        $message->receiver_last_seen = $receiver->lastSeen();
    } else {
        $message->receiver_online = false; // O cualquier valor predeterminado
        $message->receiver_last_seen = null;
    }

    // Asegurarse que created_at existe antes de formatear la fecha.
    if($message->created_at){
        $message->fdate = $message->created_at->format('d/m/Y H:i');
    } else {
        $message->fdate = null;
    }



    return $message;
});

//dd(json_decode(json_encode($messages->toArray()), true));



    return response()->json($messages);
}


public function getUsersStatus()
    {
           if (Auth::user()->rol=='admin') {
        $usuarios = User::select('*')->orderBy('id', 'asc')->get();
        }
        else
        {
                    $usuarios = User::where('name', '=', 'Miguel Cardenas')->get();
                    }

                    $status = $usuarios->map(function ($usuario) {
            return [
                'id' => $usuario->id,
                'online' => $usuario->isOnline(),
            ];
        });

        return response()->json(['status' => $status]);
    }

    public function mensajes()
    {

            $authUser = Auth::id();
        if (Auth::user()->rol=='admin') {
        $usuarios = User::select('*')->orderBy('id', 'asc')->get();
        }
        else
        {
                    $usuarios = User::where('name', '=', 'Miguel Cardenas')->get();
                    }
                 //   dd(cache());
        $user_id = Auth::user();

        $user_ip = Auth::id(); // Obtener el ID del usuario logueado

$messages = Mensajes::where('emisor', $user_ip)
    ->orWhere('receptor', $user_ip)
    ->where('emisor','-4729533633')
    ->orwhere('receptor','-4729533633')
    ->get();

       $messages = $messages->map(function ($message) {
        $message->fdate = $message->created_at->format('d/m/Y H:i');
        return $message;
    });



        return view('mensajes', compact('messages', 'user_id', 'usuarios'));


    }

     public function send(Request $request)
    {

        if($request->receiver_id=='-4729533633')
        {
             $receptor = $request->receiver_id;
                $mensaje = $request->message;
                $archivos = $request->file('archivos');
                        if ($archivos && is_array($archivos) && !empty($archivos)) {
                             $foto = $archivos[0]->getPathname();

                        }
                        else{
                        $foto=null;
                        }
            try {
                    if ($foto) { // Verificar si $foto tiene un valor

                                Telegram::sendPhoto([
                                'chat_id' => $request->receiver_id,
                                'photo' => InputFile::create($foto, 'archivo.jpg'),
                                'caption' => $request->message,
                                ]);
                                return response()->json(['message' => 'Mensaje enviado con éxito']);

                                }
                    else
                                {

                                Telegram::sendMessage([
                                'chat_id' => $request->receiver_id,
                                'text' => $request->message,
                                ]);

                                return response()->json(['message' => 'Mensaje enviado con éxito, sin imagen']);
                                }
                }
            catch (\Exception $e)
                {
      //  Log::error('Error al enviar mensaje a Telegram: ' . $e->getMessage());
        //return 'Error al enviar mensaje: ' . $e->getMessage();
         return response()->json(['message' => $e->getMessage()]);

                }


        }
        else{
$a=intval(Auth::user()->id);
     $user = Auth::user();
$message = new Mensajes();
      if ($request->hasFile('archivos')) {

            $archivos = $request->file('archivos');
              foreach ($archivos as $archivo) {
                $message = new Mensajes();
                $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
                $ruta = $archivo->move(public_path('imgs/mensajes/contenido'), $nombreArchivo); // Cambiado aquí

                   $message->have_file=1;
                $message->file = asset('imgs/mensajes/contenido/' . $nombreArchivo); // Cambiado aquí
                $message->emisor = $a; // Assuming user ID is used as emisor
        $message->receptor = $request->receiver_id;
        $message->contenido = $request->message;
            $message->save();
            }
        }
        else
        {
           $message->emisor = $a; // Assuming user ID is used as emisor
        $message->receptor = $request->receiver_id;
        $message->contenido = $request->message;
            $message->save();}



        //$message = new Mensajes();
       // $message->emisor = $a; // Assuming user ID is used as emisor
       // $message->receptor = $request->receiver_id;
       // $message->contenido = $request->message;
       // $message->save();

        // Broadcast the event with the message and relevant user data
     //   Event::dispatch(new MensajeEvento($user, $message));

        return response()->json(['message' => $message]);}
    }





//////////////////////////////// VISTA DE EDICION /////////////////////////////////

    public function editar($id)
    {
        $editar= db::table('Carnets')
         ->select('*','identifier as foranity', DB::raw('DATE(expiration) as expiration'))

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


      //dd(a);
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

  $valores->foranity=$request->identifier;

    $carnet->update(['identifier' => $valores->foranity]);

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


if(count($partesNombre) >= 2)
{

   $nombreFormateado = $partesNombre[0] . ' ';

$ultimaParte = end($partesNombre);
$nombreFormateado .= Str::substr($ultimaParte, 0, 1) . '.';

}
else
{
    $nombreFormateado = $partesNombre[0] ;

}
$partesApellido = explode(' ', $lastname);
//dd($partesApellido);

if(count($partesApellido) >= 2)
{

    $apellidoFormateado = $partesApellido[0] . ' ';


$ultimaPartea = end($partesApellido);
$apellidoFormateado .= Str::substr($ultimaPartea, 0, 1) . '.';

}
else
{

    $apellidoFormateado = $partesApellido[0];
}
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
        ) ->leftjoin(

            'partes_carnets',
            'partes_carnets.carnet_id',
            '=',
            'Carnets.card_code'
        )
            ->select(
            'Carnets.name',
            'Carnets.lastname',
            'Carnets.cedule',
            'Carnets.card_code',
            'Carnets.address',
             'Carnets.identifier as foranity',
            'Carnets.cellpone',
            'Carnets.expiration',
            'Carnets.note as note',
            'Status.name as id_status',
            'Department.name as department',
            'Charge.name as charge',
            'partes_carnets.id as valor_carnet',
            'partes_carnets.front as front',
            'partes_carnets.back as back',
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

    /////////////////////////////////////////////////QR////////////////////////////////////////

public function guardar(request $request)
    {
$request->cedula=$request->document;
//dd($request->cedula);

            $codigoEncriptado = md5($request->cedula); // Esto es solo un ejemplo, no es seguro para producción
//dd($codigoEncriptado);
        $qrCodeContentUrl = 'https://carnetsmp.ciip.com.ve/trabajador_' . $codigoEncriptado;



        $directory = 'qrcodes';
        $fileName = 'QR_cedula_' . Str::slug($request->cedula) . '.png';
        $fullPathForStorage = public_path('QR/' . $fileName);


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
            'cedula' => $request->cedula,
            'codigo' => $codigoEncriptado,
            'qr_code_path' => $fileName,

        ]);




        //  return redirect()->back()->with('success', 'Dato y QR guardados exitosamente.');
    }
  /////////////////////////////////////////////////QR////////////////////////////////////////

    //////////////////////////////// REGISTRO DE CARNETS /////////////////////////////////

    public function registrar(request $request)
    {

    // dd(File::exists(public_path('imgs/usuarios/' . request('document') . '.jpg')));

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

        $this->guardar($request);
       $request->validate([
        'archivo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480'
    ]);

    if($request->hasFile('archivo'))
    {
        if (File::exists(public_path('imgs/usuarios/' . request('document') . '.jpg'))) {

        }
       else
       {
            $avatarName =request()->document.'.'.request()->archivo->getClientOriginalExtension();


        $archivo=request()->archivo;

        $image = image::read($archivo)
        ->scale(width: 800);

       $image->save(public_path('imgs/usuarios/'.$avatarName));

        $avatarPath = $avatarName;
          }

    }


         $valores = new carnets;

        $valores->name=strtoupper($request->name);

        $valores->lastname=strtoupper($request->surname);

        $valores->address=strtoupper($request->adress);

        $valores->expiration=$request->date;

        $valores->cedule=$request->document;

        $valores->cellpone=$request->phone;

        $valores->card_code=$request->code;

        $valores->identifier=$request->identifier;

        $valores->note=strtoupper($request->comment);

        $valores->id_department=$request->department;

        $valores->id_status=1;

        $valores->id_charge=$request->charge;

        $valores->id_access_levels=$request->access;

        $valores->id_state=$request->statesment;


        $name=$valores->name;

        $lastname=$valores->lastname;

         $partesNombre = explode(' ', $name);

if(count($partesNombre) >= 2)
{

   $nombreFormateado = $partesNombre[0] . ' ';

$ultimaParte = end($partesNombre);
$nombreFormateado .= Str::substr($ultimaParte, 0, 1) . '.';

}
else
{
    $nombreFormateado = $partesNombre[0] ;

}

/*$nombreFormateado = $partesNombre[0] . ' ';

$ultimaParte = end($partesNombre);
$nombreFormateado .= Str::substr($ultimaParte, 0, 1) . '.';


*/
$partesApellido = explode(' ', $lastname);

//$apellidoFormateado = $partesApellido[0] . ' ';

//$ultimaPartea = end($partesApellido);
//$apellidoFormateado .= Str::substr($ultimaPartea, 0, 1) . '.';


if(count($partesApellido) >= 2)
{

    $apellidoFormateado = $partesApellido[0] . ' ';


$ultimaPartea = end($partesApellido);
$apellidoFormateado .= Str::substr($ultimaPartea, 0, 1) . '.';

}
else
{

    $apellidoFormateado = $partesApellido[0];
}

    $valores->name=$nombreFormateado ;

    $valores->lastname=$apellidoFormateado;

 $valores->save();

 $this->sendMessage('-4729533633','Trabajador con la Cedula '.$valores->foranity.'-'.$valores->cedule.' registrado en el sistema.',null);
//dd();
  $this->logs('Registro del Carnet '.$valores->cedule,'Registrar');

 return back()
 ->with('success','Carnet Creado');
        }
    }


//////////////////////////////// REGISTRO DE CARNETS /////////////////////////////////

/////////////////////////////// IMAGEN DE CARNET /////////////////////////////////////

public function carga_carnet(request $request)
{
    $variable=partes_carnet::all()->where('carnet_id','=',$request->carnet_id)->first();

    //dd($variable);
if($variable)
        {

      if($request->hasFile('front') && $request->hasFile('back'))

    {   $avatarName =request()->cedula;

        $front=request()->front;
        $back=request()->back;



        $frontroute='imgs/carnets/front/';
        $backroute='imgs/carnets/back/';

              $frente = image::read($front);
        $trasero = image::read($back);

        $frontextension=$frontroute.$avatarName.'-front.'.request()->front->getClientOriginalExtension();

        $backextension=$backroute.$avatarName.'-back.'.request()->back->getClientOriginalExtension();

      //  $fronttotal=$frontextension;
      //  $backtotal=$backroute.$avatarName.$backextension;

      $frente->save(public_path($frontextension));

       $trasero->save(public_path($backextension));


    return back()->with('success','Carnet Actualizado');

    }
    else
    {
        return back()->with('alert','Faltan datos');
    }
}




else
{
     if($request->hasFile('front') && $request->hasFile('back'))

    {

            $avatarName =request()->cedula;

        $front=request()->front;
        $back=request()->back;



        $frontroute='imgs/carnets/front/';
        $backroute='imgs/carnets/back/';

              $frente = image::read($front);
        $trasero = image::read($back);

        $frontextension=$frontroute.$avatarName.'-front.'.request()->front->getClientOriginalExtension();

        $backextension=$backroute.$avatarName.'-back.'.request()->back->getClientOriginalExtension();

      //  $fronttotal=$frontextension;
      //  $backtotal=$backroute.$avatarName.$backextension;

      $frente->save(public_path($frontextension));

       $trasero->save(public_path($backextension));

        $avatarPath = $avatarName;

         $carnet = new partes_carnet;

    $carnet -> front = $frontextension;
    $carnet -> back = $backextension;
    $carnet -> carnet_id = $request->carnet_id;
//dd($carnet);
    $carnet -> save();

    return back()->with('success','Carnet Cargado');

    }
    else
    {
        return back()->with('alert','Faltan datos');
    }
   }
}

/////////////////////////////// IMAGEN DE CARNET /////////////////////////////////////

 ///////////////////////////////// CODIGO PARA DESCARGAR CARNETS //////////////////////

    public function descargar_carnet($id,$tipo)
{
     $variable=partes_carnet::all()->where('id','=',$id)->first();

    $front = public_path($variable->front);
    $back = public_path($variable->back);

    if (file_exists($front )) {
        $this->logs('Descarga Exitosa', 'Descargar');
        if($tipo == "front")
        {
        return response()->download($front);
        }
        elseif ($tipo == "back") {
         return response()->download($back);
        }

    } else {
        $this->logs('Error al descargar imagen', 'Descarga');
        return back()->with('alert','No Tiene Foto');
    }
}

   ///////////////////////////////// CODIGO PARA DESCARGAR CARNETS //////////////////////

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
    ->select('card_code')


    ->orderBy('card_code', 'desc')
    ->first();

    if($in == null)
    {
        // dd($in->card_code);
        $in->card_code = '000000001';

    }

    $in->card_code=str_pad($in->card_code+1, 8, '0', STR_PAD_LEFT);
    //dd($in->card_code);
 // dd($in);
       $this->logs('Redirecion a la Vista index','Index');
//dd('imgs/usuarios/'.$in->cedule.'.jpg');

   //   dd($a->valor_carnet);
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
       Cache::forever('user-is-online-' . $usuario->id, true);
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
        Cache::forget('user-is-online-' . Auth::id());
        Auth::logout();

        return redirect()->route('index')->with('success','Vuelva Pronto');

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


public function verificarUsuario(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    $usuario = User::where('email', $email)->first(); // Busca el usuario por correo electrónico

    if ($usuario) {
        if ($usuario && Hash::check($password, $usuario->password)) { //verifica la contraseña
        return response()->json(['exists' => true, 'redirect' => route('login')]);

    }

    else
       {
        return response()->json(['user' => true]);
       }

    }
      else {
        return response()->json(['exists' => false]);
    }
}

}

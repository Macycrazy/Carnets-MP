<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Sistema de carnetizaciones CIIP</title>
      <link rel="icon" href="imgs/icono.ico" type="image/x-icon">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
     <!-- <link rel="stylesheet" href="croppie.css" />-->
     <link rel="stylesheet" type="text/css" href="cropper/cropper.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
         <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.4.3/css/scroller.bootstrap5.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/5.0.4/css/fixedColumns.bootstrap5.css">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
            <style type="text/css">

               #CajoNeta {

  animation: crecer 1s ease-in-out; /* Animación continua */
}

 .blur-out {
            transition: filter 2s ease-out, opacity 2s ease-out;
            filter: blur(5px);
            opacity: 0;
        }

@keyframes crecer {
  0% {
    height: 0%;
  }
  100% {
    height: 100%;
  }
}
.image-upload-container {
  display: flex;
  justify-content: space-around;
}

.image-box {
  width: 150px;
  aspect-ratio: 2/3;
  border: 2px dashed #ccc;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  border-radius: .5rem;
}

.image-box label {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1;
}

.image-box img {
  width: 100%;
  height: 100%;
  object-fit: fill;
  border-radius: .5rem;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1000; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */

  justify-content: center; /* Centrar horizontalmente */
  align-items: center; /* Centrar verticalmente */
}

.modal-content {
  margin: auto;
  display: block;
  vertical-align: middle;
  max-width: 29vw;
}

.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
            </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <div id="mySidepanel" class="sidepanel">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
         @auth

          <a href="{{route('mensajes')}}" >Soporte</a>

         <a href="#" id="Btnregistro" onclick="closeNav()">Registrar Carnet</a>

         <a href="#" id="Btnconsulta" onclick="closeNav()">Consultar Carnets</a>

         @if(Auth::user()->rol == 'admin')

         <a href="#" id="logs" onclick="closeNav()">Actividades</a>
         @endif

         <form method="POST" action="{{route('logout')}}">

            @csrf

         <button href="" type="sumbit" class="btn btn-primary m-auto text-center p-2" style="font-size: 100%;text-align: center;" >

           

         Cerrar Sesion

      </button>

         </form>

         @endauth

         @guest

         <a href="#service" onclick="closeNav()">

         Iniciar Sesion

         </a>

         @endguest

      </div>
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header" style="vertical-align:middle">

            <div class="container-fluid">

               <div class="row">

                  <div class="col-md-4 col-sm-4">

                     <div class="logo">

                        <!-- <a href="https://www.ciip.com.ve"> -->

                           <img src="images/logo-ciip.png" alt="#" />

                        <!--</a>-->

                     </div>

                  </div>

                  <div class="col-md-8 col-sm-8" style="vertical-align:center">


                     <div class="right_bottun" style="vertical-align: middle;">
                        @auth
                        <h2  style="vertical-align: middle;margin: 0;padding: 0;color:white;text-shadow:
    -1px -1px 0 black,
    1px -1px 0 black,
    -1px 1px 0 black,
    1px 1px 0 black;">Bienvenido: {{ ucfirst(Auth::user()->name) }} </h2>
                         @endauth
                      
                        <button class="openbtn" onclick="openNav()">

                           <img src="images/menu_icon.png" alt="#"/> 

                        </button> 

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </header>

      <!-- end header inner -->
      <!-- end header -->
      <!-- BANNER -->
      <section class="banner_main" id="main">

         
@auth
<!-- /////////////////// REGISTRO DE CARNETS //////////////////-->

 @if (session('success'))
   

<div class="alert alert-success alert-dismissible fade show w-50 m-auto align-items-center" role="alert" id="AlertAs">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
<strong> {{session('success')}} </strong>
 
</div>


@endif
 @if (session('alert') )


    <div class="alert alert-danger alert-dismissible fade show w-50 m-auto align-items-center" role="alert" id="AlertAs">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
 
<strong> {{session('alert')}}</strong>
 
</div>
@endif

<section class="w-75 m-auto mt-5" id="Cuadrore" style="text-align: center; background-color: white;padding: 1%;border: dotted 1px grey;border-radius: 3rem;display: none;">
 



<form style="font-family: arial;" method="POST" action="{{route('registrar')}}" id="Registro" enctype="multipart/form-data" autocomplete="off">


      @csrf

       {{ csrf_field() }}

   <h1>Registro de Carnet Institucional</h1> 


<div style="width:100%">

<!-- ////////////// FOTO DEL TRABAJADOR ////////////////-->
   <div id="preview_img" style="max-height:200px;height:200px;margin: 0 auto;margin-bottom: 1%">



      <img id="image" name="image" style="width: 100%;height: 100%;padding: 0;"  >


   </div>

<!-- ////////////// FOTO DEL TRABAJADOR ////////////////-->


<!-- ////////////// NOMBRE Y APELLIDO ////////////////-->


   <div class="mb-3 input-group">
<span class="input-group-text" id="name">Nombres</span>
      <input class="form-control" type="text" id="name" name="name" placeholder="ej. NOMBRES COMPLETOS" required>

      
      <span class="input-group-text" id="name">Apellidos</span>
      <input class="form-control" type="text" id="surname" name="surname" placeholder="ej. APELLIDOS COMPLETOS" required>



   </div>

<!-- ////////////// NOMBRE Y APELLIDO ////////////////-->

<!-- ////////////// CEDULA Y DIRECCION ////////////////-->
   <div class="mb-3 input-group">

      <span class="input-group-text" id="document">Cedula</span>

      <input class="form-control col-md-3" type="text" id="document" name="document" placeholder="ej. 12345678" required>


     <span class="input-group-text" id="adress">Direccion</span>

      <input class="form-control" type="text" id="adress" name="adress" placeholder="ej. CIIP" value="CIIP" required>

 
   </div>

<!-- ////////////// CEDULA Y DIRECCION ////////////////-->

<!-- ////////////// TELEFONO Y CODIGO ////////////////-->

   <div class="mb-3 input-group">

      <span class="input-group-text" id="phone">Telefono</span>
      <input class="form-control col-md-3" type="text" id="phone" name="phone" placeholder="ej. 02122743742" value="02122743742" required>

      <span class="input-group-text" id="code">Codigo</span>

      <input class="form-control" type="text" id="code" name="code" placeholder="ej. 100046 en adelante" value="{{$in->card_code}}" required>



   </div>

<!-- ////////////// TELEFONO Y CODIGO ////////////////-->

<!-- ////////////// DEPARTAMENTO Y CARGO ////////////////-->

   <div class="mb-3 input-group">
  <span class="input-group-text" id="department">Departamento</span>

      <select class="form-control" id="department" name="department" required>

         <option disabled selected>Seleccione un Departamento</option>
          @foreach($departamentos as $departamento)
         <option value="{{$departamento->id}}">{{$departamento->name}}</option>
      @endforeach

      </select>

          <span class="input-group-text" id="charge">Cargo</span>

      <select class="form-control col-md-3" id="charge" name="charge" required>
         <option disabled selected>Seleccione un Cargo</option>
      @foreach($cargos as $cargo)
         <option value="{{$cargo->id}}">{{$cargo->name}}</option>
      @endforeach
      </select>



   </div>

<!-- ////////////// DEPARTAMENTO Y CARGO ////////////////-->


<!-- ////////////// NIVEL DE ACCESO Y ESTADO ////////////////-->

   <div class="mb-3 input-group">
     <span class="input-group-text" id="access">Nivel de Acceso</span>
      <select class="form-control col-md-3" id="access" name="access" required>

         <option disabled selected>Seleccione el Nivel de acceso</option>
   @foreach($niveles as $nivel)
         <option value="{{$nivel->id}}" @if ($nivel->id == 1) selected @endif>{{$nivel->name}}</option>
      @endforeach
      </select>

       <span class="input-group-text" id="statesment">Estado</span>

      <select class="form-control" id="statesment" name="statesment" required>

         <option disabled selected>Seleccione el Estado</option>
   @foreach($estados as $estado)
         <option value="{{$estado->id}}" @if ($estado->id == 14) selected @endif>{{$estado->name}}</option>
      @endforeach
      </select>



   </div>

<!-- ////////////// NIVEL DE ACCESO Y ESTADO ////////////////-->

<!-- ////////////// FOTO DEL TRABAJADOR Y FECHA DE VENCIMIENTO ////////////////-->

   <div class="mb-3 input-group">

         

      <input type="file" id="croppedImg" name="archivo" class="form-control" hidden>


      <input class="form-control" type="file" id="file" name="image" accept="image/*" >
            <span class="input-group-text" id="file">Fotografia</span>


      <span class="input-group-text" id="date">Vencimiento</span>
      <input class="form-control col-md-3" type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" max="{{ now()->addYear()->format('Y-m-d') }}" value="{{ now()->addYear()->format('Y-m-d') }}" required >



   </div>

<!-- ////////////// FOTO DEL TRABAJADOR Y FECHA DE VENCIMIENTO ////////////////-->

<!-- ////////////// COMENTARIO ////////////////-->

   <div class="mb-3 input-group">

      <textarea placeholder="Observaciones" name="comment" class="form-control" style="height: 50px;min-height:50px;max-height:50px"></textarea>

   </div>

<!-- ////////////// COMENTARIO ////////////////-->



<!-- ////////////// BOTON DE REGISTRO ////////////////-->

   <div class="mb-3 input-group">

      <button class="btn btn-primary w-75 py-2 m-auto" type="submit" id="save">

         Registrar

      </button>

   </div>

<!-- ////////////// BOTON DE REGISTRO ////////////////-->

</div>

</form>


<!-- ////////////// EDITAR IMAGEN ////////////////-->

<div class="mb-3 input-group">

   <button id="downloadButton" class="btn btn-secondary m-auto">

      Recortar Imagen

   </button>

</div>

<!-- ////////////// EDITAR IMAGEN ////////////////-->


@endauth

<!-- /////////////////// REGISTRO DE CARNETS //////////////////-->




<!-- /////////////////// INICIO DE SESION //////////////////-->


@guest
<section class="w-50 m-auto" style="text-align: center;">

  

            <main class="form-signin w-100 m-auto">

  <form action="{{route('login')}}" method="POST">

   @csrf

    <h1 class="h1 mb-3 fw-normal">Iniciar Sesion</h1>

    <div class="form-floating">

      <input type="email" class="form-control" id="CorrEo" placeholder="correo@gmail.com" name="email">

      <label for="CorrEo">Correo electronico</label>

    </div>

    <br>

    <div class="form-floating">

      <input type="password" class="form-control" id="ContrAsena" placeholder="Contraseña" name="password">

      <label for="ContrAsena">Contraseña</label>

    </div>

<br>

   <button class="btn btn-primary w-75 py-2" type="submit" id="loginBtn">

    Registrarse

   </button>

  </form>
<br>
   <div class="w-50 m-auto" id="AliNeo"></div>

   @if (session('success'))
   

<div class="alert alert-success alert-dismissible fade show w-50 m-auto align-items-center" role="alert" id="AlertAs">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:" ><use xlink:href="#check-circle-fill"/></svg>
 {{session('success')}}
 
</div>


@endif
 @if (session('alert') )


    <div class="alert alert-danger alert-dismissible fade show w-50 m-auto align-items-center" role="alert" id="AlertAs">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
 
{{session('alert')}}
 
</div>
@endif

</main>

 </section>

@endguest
<!-- /////////////////// INICIO DE SESION //////////////////-->


        
        
      </section>
      <!-- BANNER -->
     
      @auth

      @if(Auth::user()->rol == 'admin')


        
       <div class="card m-auto" style="width: 95%;display: none;" id="CajoNeta">
        <!--  <button class="btn btn-outline-secondary w-25 m-auto" id="logs">Logs</button>-->

                <div class="card-body"  > 

            <table id="ActividDad" class="table table-striped nowrap" style="width:100%">
                <thead >
                    <tr >
                       
                        <th>Usuario</th>
                        <th>Ip</th>

                        <th>Accion</th>
                        <th>Controlador</th>
                        <th>Fecha</th>
                       
                    </tr>
                </thead>
                <tbody >
                   
 
                        

         
                </tbody>
            </table>
        </div>
        </div>

        @endif



      <div class="" style="width: 99%;background-color:white;margin: 0 auto;padding: 1%;border-radius: 2rem;display: none;" id="Cuadrcon">


<table id="example" class="table table-striped  m-auto" style="width:95%;text-align:center;vertical-align: middle;size: auto;">
        <thead style="text-align:center;vertical-align: middle;">
            <tr style="text-align:center;vertical-align: middle;">
                <th style="text-align:center;vertical-align: middle;">Cedula</th>
                <th style="text-align:center;vertical-align: middle;">Codigo de Carnet</th>
                <th style="text-align:center;vertical-align: middle;">Nombre</th>
                <th style="text-align:center;vertical-align: middle;">Apellido</th>
                <th style="text-align:center;vertical-align: middle;">Departamento</th>
                <th style="text-align:center;vertical-align: middle;">Cargo</th>

                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Foto de perfil</th>
                <th style="text-align:center;vertical-align: middle;">Estado</th>
                @if(Auth::user()->rol == 'admin')
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Cargar Carnet</th>
                 @endif
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Frente</th>
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Contra</th>
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Nota</th>
                <th style="text-align:center;vertical-align: middle;" >Creado El:</th>
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Editar</th>
                @if(Auth::user()->rol == 'admin')
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Descargar Imagen</th>
                @endif
               
                
            </tr>
        </thead>
        <tbody style="text-align:center;vertical-align: middle;">
         @foreach($a as $b)

            <tr style="text-align:center;vertical-align: middle;">
                <td style="text-align:center;vertical-align: middle;">{{$b->cedule}}</td>
                <td style="text-align:center;vertical-align: middle;">{{$b->card_code}}</td>
                <td style="text-align:center;vertical-align: middle;">{{ mb_ucfirst($b->name, 'UTF-8') }}</td>
                <td style="text-align:center;vertical-align: middle;">{{ mb_ucfirst($b->lastname, 'UTF-8') }}</td>
                <td style="text-align:center;vertical-align: middle;">{{$b->department}}</td>
                 <td style="text-align:center;vertical-align: middle;">{{ mb_ucfirst($b->charge, 'UTF-8') }}</td>
                 <td style="text-align:center;vertical-align: middle;" >

                  @if(File::exists('imgs/usuarios/'.$b->cedule.'.jpg'))

                  

          

                     <a href="imgs/usuarios/{{ $b->cedule}}.jpg" class="image-link">
  <img src="imgs/usuarios/{{ $b->cedule}}.jpg" style="max-height:100px" class="thumbnail-image">
</a>



                 

                  @else
                  No tiene
                  @endif
                </td>
                  <td style="text-align:center;vertical-align: middle;">{{$b->id_status}}</td>
                @if(Auth::user()->rol == 'admin')
                <td style="text-align:center;vertical-align: middle;">
                  <button type="button" class="btn btn-primary" data-toggle="modal"data-target="#add{{$b->card_code}}">
  +
</button>
               
                  <form method="POST" action="{{route('carga_carnet')}}" enctype="multipart/form-data">
                  @csrf

                  <div class="modal fade" id="add{{$b->card_code}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$b->name}} {{$b->lastname}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="image-upload-container">
  <input type="hidden" name="carnet_id" value="{{$b->card_code}}">
   <input type="hidden" name="cedula" value="{{$b->cedule}}">
  <div class="image-box" id="front-box_{{$b->card_code}}">
    <label for="front-input_{{$b->card_code}}">Frente</label>
    <input type="file" id="front-input_{{$b->card_code}}" accept="image/jpeg" name="front" style="display: none;">
  </div>
  <div class="image-box" id="back-box_{{$b->card_code}}">
    <label for="back-input_{{$b->card_code}}">Trasero</label>
    <input type="file" id="back-input_{{$b->card_code}}" accept="image/jpeg" name="back" style="display: none;">
  </div>
</div>
   </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">registrar</button>
      </div>
    </div>
  </div>
</div>


                  </form>
               </td>
                 @endif

                <td style="text-align:center;vertical-align: middle;">   @if(File::exists($b->front))

                  

          
                
                  <a href="{{ $b->front}}"  class="image-link">
  <img src="{{ $b->front}}" style="max-height:100px" class="thumbnail-image">
</a>

<div id="image-modal" class="modal">
 
  <img class="modal-content" id="full-image">
</div>

                 

                  @else
                 No Cargado
                  @endif
               </td>
                <td style="text-align:center;vertical-align: middle;">   
                  @if(File::exists($b->back))

                  

                <a href="{{ $b->back }}" class="image-link">
  <img src="{{ $b->back }}" style="max-height:100px" class="thumbnail-image">
</a>

<div id="image-modal" class="modal">

  <img class="modal-content" id="full-image">
</div>

                 

                  @else
                  No cargado
                  @endif</td>
                <td style="text-align:center;vertical-align: middle;" >{{ mb_ucfirst($b->note, 'UTF-8') }}</td>
                
                <td style="text-align:center;vertical-align: middle;">{{ \Carbon\Carbon::parse($b->created_at)->format('d-m-Y') }}</td>
                <td style="text-align:center;vertical-align: middle;"  ><a href="{{route('editar',$b->card_code)}}" > <button class="btn btn-warning">Editar</button> </a></td>
                 @if(Auth::user()->rol == 'admin')
                 <td style="text-align:center;vertical-align: middle;"  ><a href="{{ route('descargar_imagen',$b->cedule.'.jpg') }}" > <button class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
</svg></button> </a></td>
                @endif
                
            </tr>
          
      @endforeach
              </tbody>
    </table>
      @auth



        <!--////////////////////////// Descargar archivos ////////////////////////-->







<section class=" w-100 " style="display: inline-flex;margin: 0 auto;">
@if(Auth::user()->rol == 'admin')
  <a class="btn btn-primary m-auto" href="{{ route('descargar') }}" style="aspect-ratio: 1;vertical-align: baseline;" > 
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-zip" viewBox="0 0 16 16">
  <path d="M5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.11 0l-.929-.62a1 1 0 0 1-.415-1.074L5 8.438zm2 0H6v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.929-.62-.4-1.598A1 1 0 0 1 7 8.438z"/>
  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1h-2v1h-1v1h1v1h-1v1h1v1H6V5H5V4h1V3H5V2h1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
</svg>

@endif
   </a>

   <a class=" btn btn-success m-auto"  href="{{ route('excel') }}" style="aspect-ratio: 1;vertical-align: baseline;" >
 
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
  <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
</svg>

   </a>
   

<!--////////////////////////// Descargar archivos ////////////////////////-->
</section>

        @endguest
    </div>
    @endauth


     <!-- /////////////////// VISTA DE CARNETS //////////////////-->

     


          <!-- /////////////////// VISTA DE CARNETS //////////////////-->
     
      <!-- Javascript files-->


      <script src="js/jquery.min.js"></script>
      <script type="text/javascript" src="cropper/cropper.js"></script>
      @auth
      <script type="text/javascript">
         
         document.addEventListener('DOMContentLoaded', function() {
  const images = document.querySelectorAll('.image-link');
  const modal = document.getElementById('image-modal');
  const modalImg = document.getElementById('full-image');
  const closeBtn = document.querySelector('.close');

  images.forEach(image => {
    image.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      modal.style.display = 'flex';
      modalImg.src = this.querySelector('img').src;
    });
  });

  closeBtn.addEventListener('click', function() {
    modal.style.display = 'none';
  });

  window.addEventListener('click', function(event) {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
});

      </script>
      <script>
   document.addEventListener('DOMContentLoaded', function() {
  const containers = document.querySelectorAll('.image-upload-container');

  containers.forEach(container => {
    const cardCode = container.querySelector('input[name="carnet_id"]').value;
    const frontBox = document.getElementById(`front-box_${cardCode}`);
    const backBox = document.getElementById(`back-box_${cardCode}`);
    const frontInput = document.getElementById(`front-input_${cardCode}`);
    const backInput = document.getElementById(`back-input_${cardCode}`);

    frontBox.addEventListener('click', () => {
      frontInput.click();
    });

    backBox.addEventListener('click', () => {
      backInput.click();
    });

    frontInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          //frontBox.innerHTML = '';
          const img = document.createElement('img');
          img.src = e.target.result;
          img.style.zIndex=1000;
          frontBox.appendChild(img);
        };
        reader.readAsDataURL(file);
      }
    });

    backInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
       //   backBox.innerHTML = '';
          const img = document.createElement('img');
        
          img.src = e.target.result;
           img.style.zIndex=1000;
          backBox.appendChild(img);
        };
        reader.readAsDataURL(file);
      }
    });
  });
});
      </script>
  <script type="text/javascript">



let cropper;
document.addEventListener('DOMContentLoaded', () => {


    const imageInput = document.getElementById('file');

    imageInput.addEventListener('change', () => {
        $("#save").attr('disabled',true);
        // Destroy previous CropperJS instance if it exists
        if (typeof cropper != 'undefined') {
            console.log("Destroy previous");
            cropper.destroy();
            cropper = null;
        }
        const file = imageInput.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                // console.log(e,e.target);
                const imgResult = e.target.result;

                const image = document.getElementById('image');
                image.src = imgResult;
                cropper = new Cropper(image, {
                  viewMode:2,
                  scalable: true,
                    aspectRatio: 3/4,
                    initialAspectRatio:3/4,
                    autoCropArea:1,
                    responsive:true,
                    center:false,
                    guides:false,

                    background:false,


                    crop(event) {
                        $("#save").attr('disabled',true);
                    },
                    preview:'.preview'
                });
                $("#downloadButton").attr('hidden',false);
                 $("#downloadButton").attr('disabled',false);
                
            
            };
            reader.readAsDataURL(file);


        }

    });
});


$("#downloadButton").click(function () {
   
    let canvas = cropper.getCroppedCanvas();

    canvas.toBlob(function (blob) {
       
        const file = new File([blob], 'croppedImage.jpg', { type: blob.type });

        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        const croppedImageInput = $("input[name='archivo']");
        croppedImageInput[0].files = dataTransfer.files;
        console.log(croppedImageInput[0].files);
        $("#downloadButton").addClass("btn-success");
        $("#downloadButton").attr('disabled',true);
        $("#save").attr('disabled',false);
    });

});


  </script>
 

@endauth


<script type="text/javascript">
   

const inputs = document.querySelectorAll('input[type="text"]');
const selects = document.querySelectorAll('select');

// Function to validate input fields
function validateInput(event) {
  const input = event.target;
  const inputType = input.id;

  switch (inputType) {
    case 'name':
    case 'surname':
   case 'adress':
      // Allow only letters and spaces
      input.value = input.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/g, '');
      break;
   case 'document':
      // Allow only numbers, min 6, max 8 digits
      input.value = input.value.replace(/[^0-9]/g, '');
      if (input.value.length > 8) {
        input.value = input.value.slice(0, 8);
      }
      break;
    case 'phone':
      // Allow only numbers, min 11 digits
      input.value = input.value.replace(/[^0-9]/g, '');
      if (input.value.length > 11) {
        input.value = input.value.slice(0, 11);
      } 
      break;
    case 'code':
      // Allow only numbers
      input.value = input.value.replace(/[^0-9]/g, '');
      break;
  }
}

// Add event listeners to all input fields
inputs.forEach(input => {
  input.addEventListener('input', validateInput);
});

// Function to check if a select option is selected
function isSelectOptionSelected(select) {
  return select.selectedIndex !== 0; // 0 is the index of the default option
}

// Function to validate select fields
function validateSelects() {
  let isValid = true;

  selects.forEach(select => {
    if (!isSelectOptionSelected(select)) {
      isValid = false;
      // You can add visual feedback here, e.g.,
      select.classList.add('is-invalid');
    } else {
      select.classList.remove('is-invalid');
    }
  });

  return isValid;
}

// Add event listeners to all select fields (optional, to provide immediate feedback)
selects.forEach(select => {
  select.addEventListener('change', validateSelects);
});

// Example of how to use the validation function (e.g., before submitting the form)
function validateForm() {
  if (!validateSelects()) {
    alert('Por favor, seleccione una opción en todos los campos de selección.');
    return false;
  }

  // Further validation logic here (if needed)

  return true;
}




</script>

      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidepanel").style.width = "20%";
           document.getElementById("mySidepanel").style.backgroundColor = "#009ef2";
         }
         
         function closeNav() {
           document.getElementById("mySidepanel").style.width = "0";
         }
      </script>
      @auth
      <script type="text/javascript" src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
       <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.4.3/js/dataTables.scroller.js"></script>
           <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.4.3/js/scroller.bootstrap5.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/dataTables.fixedColumns.js"></script>
      <script type="text/javascript" src="
https://cdn.datatables.net/fixedcolumns/5.0.4/js/fixedColumns.bootstrap5.js"></script>

      <script type="text/javascript">
    
      $('#example').DataTable({
    "order": [[ 10, "desc" ]] ,
    fixedColumns: true,
    paging: false,
    scrollCollapse: true,
    scrollX: true,
    scrollY: 300
});
   </script>
   <script type="text/javascript">
   

new DataTable('#ActividDad', {

     ajax: "{{route('actividades')}}",
     columns:[
        {data:'usuario'},
        {data:'ip'},

        {data:'accion'},
        {data:'controlador'},
        {data:'created_at'}
        ],
        "order": [[ 4, "desc" ]],
        responsive: true,
     scrollCollapse: true,
    scroller: true,
    scrollY: 350
          
});

const usuario = '{{Auth::user()->rol}}'
       if(usuario == 'admin'){
       $logt=document.getElementById('logs');
      

$loga= document.getElementById('CajoNeta');
 }

$btnr=document.getElementById('Btnregistro');

$cdr=document.getElementById('Cuadrore');


$btnc=document.getElementById('Btnconsulta');

$cdc=document.getElementById('Cuadrcon');
  if(usuario == 'admin'){
$logt.addEventListener('click', () => {
  if ($loga.style.display === 'block') {

   // $loga.style.display = 'none';
  } else {
   $cdr.style.display = 'none';
$cdc.style.display = 'none';
    $loga.style.display = 'block';

  }
});
 }


$btnr.addEventListener('click', () => {
  if ($cdr.style.display === 'block') {
   // $cdr.style.display = 'none';
  } else {
   $cdc.style.display = 'none';
  if(usuario == 'admin'){
    $loga.style.display = 'none';
     }
    $cdr.style.display = 'block';
  }
});



$btnc.addEventListener('click', () => {
  if ($cdc.style.display === 'block') {
   // $cdc.style.display = 'none';
  } else {
  if(usuario == 'admin'){
    $loga.style.display = 'none';
     }
    $cdr.style.display = 'none';
    $cdc.style.display = 'block';
  }
});

</script>
@endauth
     
   
   <script>
        setTimeout(function() {
            let alerta = document.getElementById('AlertAs');
            if (alerta) { // Verifica si el elemento existe
                alerta.classList.add('blur-out');

                setTimeout(function() {
                    alerta.remove();
                }, 2000); // 500ms = 0.5 segundos (debe coincidir con la transición CSS)
            }
        }, 2000);



    </script>
    @guest
<script type="text/javascript">


   document.getElementById('loginBtn').addEventListener('click', function(event) {
    event.preventDefault(); // Previene el envío del formulario por defecto

    let email = document.getElementById('CorrEo').value;
    let password = document.getElementById('ContrAsena').value;

    if (document.getElementById('CorrEo').checkValidity() && document.getElementById('ContrAsena').checkValidity()) {
    
        // Los campos son válidos, realiza la solicitud AJAX
        fetch('{{route("verificarUsuario") }}', { // Reemplaza '/ruta-a-tu-backend' con la ruta correcta
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Agrega el token CSRF
            },
            body: JSON.stringify({ email: email, password: password })
        })
        .then(response => response.json())
        .then(data => {
         if (data.user) {
             mostrarAlerta('warning', 'Contraseña Invalida');
            }
            else if (data.exists) {
             enviarDatosInicioSesion(email, password);
            } else {
                // El usuario no existe, muestra la alerta
                mostrarAlerta('warning', 'Los Datos No Fueron Encontrados');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            mostrarAlerta('danger', 'Ocurrió un error al verificar el usuario');
        });
    } else {
        // Los campos no son válidos, muestra un mensaje de error o realiza otras acciones
        mostrarAlerta('warning', 'Por favor, complete todos los campos correctamente');
    }
});


   function enviarDatosInicioSesion(email, password) {
    fetch('{{ route("login") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ email: email, password: password })
    })
    .then(response => {
        if (response.ok) {
            // Redirige a la página de inicio o a donde necesites
         mostrarAlertai('success', 'Bienvenido... Redirigiendo');
            
        } else {
            mostrarAlerta('danger', 'Error al iniciar sesión');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        mostrarAlerta('danger', 'Ocurrió un error al iniciar sesión');
    });
}

function mostrarAlerta(tipo, mensaje) {
    let alerta = document.createElement('div');
    let main = document.getElementById('AliNeo');
    alerta.className = `alert alert-${tipo} alert-dismissible fade show w-100 m-auto align-items-center`;
   
    alerta.innerHTML = `
         <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>  ${mensaje}
        
    `;
     alerta.id = `AlertAs`;
  
    main.appendChild(alerta);

       setTimeout(function() {
            let alerta = document.getElementById('AlertAs');
            if (alerta) { // Verifica si el elemento existe
                alerta.classList.add('blur-out');

                setTimeout(function() {
                    alerta.remove();
                }, 2000); // 500ms = 0.5 segundos (debe coincidir con la transición CSS)
            }
        }, 2000);


}

function mostrarAlertai(tipo, mensaje) {
    let alerta = document.createElement('div');
    let main = document.getElementById('AliNeo');
    alerta.className = `alert alert-${tipo} alert-dismissible fade show w-100 m-auto align-items-center`;
   
    alerta.innerHTML = `
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  ${mensaje}
        
    `;
     alerta.id = `AlertAs`;
   
    main.appendChild(alerta);

       setTimeout(function() {
            let alerta = document.getElementById('AlertAs');
            if (alerta) { // Verifica si el elemento existe
                alerta.classList.add('blur-out');

                setTimeout(function() {
                    alerta.remove();
                           location.reload(); 
                }, 2000);   
            }
        }, 1000);



}


</script>

@endguest

   </body>
</html>


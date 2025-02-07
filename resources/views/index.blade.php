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

         <a href="#main">Crear</a>

         <a href="#consultas">Consultar</a>

         <form method="POST" action="{{route('logout')}}">

            @csrf

         <button href="" type="sumbit" class="btn btn-primary m-auto p-auto" style="font-size: 10px;" >

            <i class="fa fa-close" aria-hidden="true">
               
            </i>

         Cerrar Sesion

      </button>

         </form>

         @endauth

         @guest

         <a href="#service">

         Iniciar Sesion

         </a>

         @endguest

      </div>
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">

            <div class="container-fluid">

               <div class="row">

                  <div class="col-md-4 col-sm-4">

                     <div class="logo">

                        <a href="index.html">

                           <img src="images/logo-ciip.png" alt="#" />

                        </a>

                     </div>

                  </div>

                  <div class="col-md-8 col-sm-8" style="vertical-align:center">


                     <div class="right_bottun" style="vertical-align: middle;">
                        @auth
                        <h2  style="vertical-align: middle;margin: 0;padding: 0;color:white;">Bienvenido: {{ ucfirst(Auth::user()->name) }} </h2>
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

<section class="w-75 m-auto mt-5" style="text-align: center; background-color: white;padding: 1%;border: dotted 1px grey;border-radius: 3rem;">


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

      <input class="form-control" type="text" id="code" name="code" placeholder="ej. 100046 en adelante" required>



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
         <option value="{{$nivel->id}}">{{$nivel->name}}</option>
      @endforeach
      </select>

       <span class="input-group-text" id="statesment">Estado</span>

      <select class="form-control" id="statesment" name="statesment" required>

         <option disabled selected>Seleccione el Estado</option>
   @foreach($estados as $estado)
         <option value="{{$estado->id}}">{{$estado->name}}</option>
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

<!--////////////////////////// Descargar archivos ////////////////////////-->


@if(Auth::user()->rol == 'admin')
<section class=" w-100 " style="display: inline-flex;margin: 0 auto;">

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
@endauth

<!-- /////////////////// REGISTRO DE CARNETS //////////////////-->


<!-- /////////////////// INICIO DE SESION //////////////////-->


@guest
<section class="w-50 m-auto" style="text-align: center;">

            <main class="form-signin w-100 m-auto">

  <form action="{{route('login')}}" method="POST">

   @csrf

    <h1 class="h3 mb-3 fw-normal">Iniciar Sesion</h1>

    <div class="form-floating">

      <input type="email" class="form-control" id="floatingInput" placeholder="correo@gmail.com" name="email">

      <label for="floatingInput">Corre electronico</label>

    </div>

    <br>

    <div class="form-floating">

      <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="password">

      <label for="floatingPassword">Contraseña</label>

    </div>

<br>

   <button class="btn btn-primary w-100 py-2" type="submit">

    Iniciar

   </button>

  </form>

</main>

 </section>

@endguest
<!-- /////////////////// INICIO DE SESION //////////////////-->


        
        
      </section>
      <!-- BANNER -->
      <br>
      @auth

      @if(Auth::user()->rol == 'admin')

       <div class="card m-auto" style="width: 95%;">
                <div class="card-body"> 
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
        <br>
        @endif


      <div class="" style="width: 99%;background-color:white;margin: 0 auto;padding: 5%;border-radius: 2rem;">
<table id="example" class="table table-striped  m-auto" style="width:95%;text-align:center;vertical-align: middle;">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Codigo de Carnet</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Departamento</th>
                <th>Cargo</th>
                <th>Estado</th>
                <th data-dt-order="disable">Nota</th>
                <th data-dt-order="disable">Foto de perfil</th>
                <th >Creado El:</th>
                <th data-dt-order="disable">Editar</th>
               
                
            </tr>
        </thead>
        <tbody>
         @foreach($a as $b)
            <tr>
                <td>{{$b->cedule}}</td>
                <td>{{$b->card_code}}</td>
                <td>{{ mb_ucfirst($b->name, 'UTF-8') }}</td>
                <td>{{ mb_ucfirst($b->lastname, 'UTF-8') }}</td>
                <td>{{$b->department}}</td>
                 <td>{{ mb_ucfirst($b->charge, 'UTF-8') }}</td>
                  <td>{{$b->id_status}}</td>
                
                <td >{{ mb_ucfirst($b->note, 'UTF-8') }}</td>
                <td >
                  @if(File::exists('imgs/usuarios/'.$b->cedule.'.jpg'))

                  

                  <img src="imgs/usuarios/{{ $b->cedule}}.jpg" style="max-height:100px">
                  @else
                  No tiene
                  @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($b->created_at)->format('d/m/Y') }}</td>
                <td  ><a href="{{route('editar',$b->card_code)}}" > <button class="btn btn-warning">Editar</button> </a></td>

                
            </tr>
          
      @endforeach
              </tbody>
    </table>
    </div>
    @endauth

     <!-- /////////////////// VISTA DE CARNETS //////////////////-->

     


          <!-- /////////////////// VISTA DE CARNETS //////////////////-->
      
      <!--  footer -->
      <footer>
         
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Desarrolado por Miguel Cardenas.</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->


      <script src="js/jquery.min.js"></script>
      <script type="text/javascript" src="cropper/cropper.js"></script>
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
        $("#save").attr('disabled',false);
    });

});


  </script>
 




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
      <script type="text/javascript" src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
      <script type="text/javascript">
    
      $('#example').DataTable({
    "order": [[ 10, "desc" ]] // Ordena por la tercera columna (índice 2) en orden descendente
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
        "order": [[ 5, "desc" ]]

          
});


</script>
    

   </body>
</html>


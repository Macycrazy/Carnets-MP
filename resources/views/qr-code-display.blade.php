 @if(Auth::user()->rol == 'admin')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de Trabajador</title>
    <link rel="icon" type="image/x-icon" href="imgs/logo mp.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 30px;
        }

  body::before {
            content: ''; /* Obligatorio para pseudo-elementos */
            position: absolute; /* Para posicionarlo libremente */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("{{ asset('watermark.png') }}"); /* Ruta a tu imagen */
            background-repeat: repeat;
            background-position: center center;
            background-size: 10%;
            opacity: .08;
            z-index: -1000;
        }
        .carnet-container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 90%; /* Responsive width */
            max-width: 400px; /* Maximum width for larger screens */
            /* Necesario para que el pseudo-elemento se posicione correctamente */
            position: relative;
        }
        .carnet-header {
            background-color: #007bdd;
            color: #fff;
            text-align: center;
            padding: 1.5rem 0;
            /* Asegura que el contenido del header esté por encima de la marca de agua */
            position: relative;
            z-index: 1;
        }
        .carnet-body {
            padding: 1.5rem;
            text-align: center;
            /* Asegura que el contenido del body esté por encima de la marca de agua */
            position: relative;
            z-index: 1;
        }

        /* --- INICIO CÓDIGO DE MARCA DE AGUA CON PSEUDO-ELEMENTO --- */
        .carnet-container::before {
            content: ''; /* Obligatorio para pseudo-elementos */
            position: absolute; /* Para posicionarlo libremente */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transform: rotate(45deg);
            background-image: url("{{ asset('MARCADEAGUA.bmp') }}"); /* Ruta a tu imagen */
            background-repeat: repeat;
            background-position: center center;
            background-size: 50%; /* Ajusta el tamaño de la marca de agua */
            opacity: 0.03; /* Solo la marca de agua es semitransparente */
            z-index: 0; /* Colócalo detrás del contenido real */
        }
        /* --- FIN CÓDIGO DE MARCA DE AGUA --- */

        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
            border: 5px solid #eee;
        }
        .info-row {
            margin-bottom: 0.75rem;
            text-align: center;
        }
        .info-label {
            font-weight: bold;
            color: #495057;
            display: block;
            margin-bottom: 0.2rem;
        }
        .info-value {
            color: #212529;
        }
        .qr-code {
            margin-top: 1rem;
        }
        .signature-area {
            margin-top: 1.5rem;
            text-align: center;
            font-style: italic;
            color: #6c757d;
            border-top: 1px dashed #ced4da;
            padding-top: 1rem;
        }
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .carnet-container {
                max-width: 300px;
            }
            .carnet-header h2 {
                font-size: 1.5rem;
                max-height: 100px;
            }
            .carnet-body {
                padding: 1rem;
            }
            .profile-picture {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>
<body>
    @include('head')
    <div id="mySidepanel" class="sidepanel">

         @auth

         <a href="{{route('index')}}" id="Btnregistro" onclick="closeNav()">Volver</a>




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
    <div class="carnet-container">
        <div class="carnet-header">
            <h2> <img src="{{ asset('imgs/logo mp.png') }}" style="max-height: 80px;max-width: 80%;"></h2>
        </div>
        <div class="carnet-body">

            <strong style="text-align:center;">Creación de codigo QR</strong>
            <br>


 @if (session('warning'))

   <br>
<div class="alert alert-warning" style="margin: 0 auto;" role="alert">

<strong style="text-align:center;"><i class="bi bi-x-octagon-fill"></i> {{session('warning')}} </strong>

</div>


@endif


 @if (session('success'))

   <br>
<div class="alert alert-success" style="margin: 0 auto;" role="alert">

<strong style="text-align:center;"><i class="bi bi-check-circle-fill"></i> {{session('success')}} </strong>

</div>


@endif


 @if (session('danger'))

   <br>
<div class="alert alert-danger" style="margin: 0 auto;" role="alert">

<strong style="text-align:center;"><i class="bi bi-exclamation-triangle-fill"></i>{{session('danger')}} </strong>

</div>


@endif
<br>
            <div class="info-row">
             <form action="{{route('guardar')}}">
      @csrf
      <input class="form-control"type="text" name="cedula" placeholder="Cedula" style="text-align: center;">

       </form>
<br>
        <form action="{{route('guardar_masivo')}}">
      @csrf
      <input class="btn btn-outline-secondary" type="submit" value="Creacion Masiva" style="text-align: center;" >

       </form>
<br>
      <div class="card-body">
        {{$datos->links()}}
        <table class="table table-light table-striped" style="vertical-align: middle;text-align: center;align-items: center">

    <thead class="thead">

<tr>
    <th>Cedula</th>
     <th>Qr</th>
     </tr>
     </thead>

<tbody>
              @foreach($datos as $dato)




    <tr>
        <td>
                  <p style="vertical-align: middle;margin:0 auto">{{$dato->cedula}} </p>

     </td>

       <td>

           <a href="{{'https://carnetsmp.ciip.com.ve/trabajador_'.$dato->codigo}}">

       <img src="{{ asset('QR/'.$dato->qr_code_path) }}" style="max-height: 100px;">

       </a>
       </td>
       </tr>


          @endforeach
           </tbody>
  </table>
  </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

      <script>
         function openNav() {
           document.getElementById("mySidepanel").style.width = "20%";
           document.getElementById("mySidepanel").style.backgroundColor = "#009ef2";
         }

         function closeNav() {
           document.getElementById("mySidepanel").style.width = "0";
         }
      </script>

   </body>
</html>


 <script>
      openNav()
   </script>
</body>
</html>
 @endif

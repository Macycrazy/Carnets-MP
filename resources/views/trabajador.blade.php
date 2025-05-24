<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de Trabajador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
       body {
    background-color: #f8f9fa; /* Color inicial (blanco pálido) */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 30px;

    /* --- Animación del Fondo --- */
    animation: changeBackgroundColor 30s infinite alternate;
    /*
        'changeBackgroundColor': Nombre de la animación que definiremos.
        '30s': Duración total de un ciclo de la animación (ida y vuelta).
        'infinite': La animación se repetirá indefinidamente.
        'alternate': La animación se reproduce hacia adelante y luego hacia atrás en ciclos alternos.
                     Esto significa que irá de blanco a azul, y luego de azul a blanco,
                     lo que da un efecto de vaivén.
    */
}

 body::before {
            width: 100%;
            content: ''; /* Obligatorio para pseudo-elementos */
            position: absolute; /* Para posicionarlo libremente */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            
            background-image: url("{{ asset('watermark.png') }}"); /* Ruta a tu imagen */
            background-repeat: repeat-x repeat-y;
            background-position: center center;
            background-size: 20%; /* Ajusta el tamaño de la marca de agua */
            opacity: .08; /* Solo la marca de agua es semitransparente */
            z-index: -1000; /* Colócalo detrás del contenido real */
        }

@keyframes changeBackgroundColor {
      0% {
        background-color: #f8f9fa; /* Blanco */
    }
    
    50% {
        background-color: #007bff; /* Cambia a azul */
    }
    
    100% {
        background-color: #f8f9fa; /* Vuelve a blanco al final del ciclo */
    }
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
            width: 200%;
            content: ''; /* Obligatorio para pseudo-elementos */
            position: absolute; /* Para posicionarlo libremente */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transform: rotate(45deg);
            background-image: url("{{ asset('watermark.png') }}"); /* Ruta a tu imagen */
            background-repeat: repeat-x repeat-y;
            background-position: center center;
            background-size: 50%; /* Ajusta el tamaño de la marca de agua */
            opacity: .08; /* Solo la marca de agua es semitransparente */
            z-index: 0; /* Colócalo detrás del contenido real */
        }
        /* --- FIN CÓDIGO DE MARCA DE AGUA --- */

       .profile-picture {
    width: 120px;
    aspect-ratio: 1; /* Esto asegura que el cuadro siempre sea cuadrado (1:1) */
    border-radius: 50%;
    object-fit: cover; /* Esto hace que la imagen cubra el área, recortando si es necesario */
    object-position: top; /* ¡Esta es la clave! Hace que la imagen se alinee con la parte superior del contenedor. */
    margin-bottom: 1rem;
    border: 5px solid #eee;
    /* La propiedad 'position: top;' que tenías no es una propiedad CSS válida en este contexto.
       Si querías posicionar el elemento mismo, usarías 'position: absolute;' o 'relative;'
       junto con 'top: Xpx;'. Para la imagen dentro de su contenedor, usa object-position. */
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
    <div class="carnet-container">
        <div class="carnet-header">

            <h2> <img src="{{ asset('logo-blanco.png') }}" style="max-height: 80px;max-width: 80%;"></h2>
        </div>
        <div class="carnet-body">
             <span class="info-value">{{ $dato->nombre }} {{ $dato->apellido }}</span>
             <br>
               @if(File::exists('imgs/usuarios/'.$dato->cedula.'.jpg'))
            <img src="imgs/usuarios/{{$dato->cedula}}.jpg" alt="Foto del Trabajador" class="profile-picture">
            @else
             <img src="/imgs/mensajes/contenido/1742237245_ciiplogo.jpg" alt="Foto del Trabajador" class="profile-picture">
             @endif
            <div class="info-row">
           
               
            </div>
            <div class="info-row">
           
                <span class="info-value">{{ $dato->nacionalidad }}-{{ number_format($dato->cedula, 0, ',', '.') }}</span>
            </div>
             <div class="info-row">
           
                <span class="info-value">{{ $dato->cargo}}</span>
            </div>
             <div class="info-row">
           
                <span class="info-value">{{ $dato->departamento}}</span>
            </div>
          
            <div class="signature-area">
               
                <span>Av.Venezuela, Torre Epsilon, El rosal de cahcao, Estado miranda.</span>
                <br>
                 <span style="opacity: .5;">&copy;Copyright by Miguel Cardenas</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script type="text/javascript">
        /*
    miguelangelcardenasyepez@gmail.com
    +58-242994267

            */
    </script>
</body>
</html>
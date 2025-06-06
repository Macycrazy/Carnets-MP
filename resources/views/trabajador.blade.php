<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de Trabajador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Initial color (pale white) */
            display: flex;
            flex-direction: column; /* Allows vertical stacking of elements */
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 30px; /* Base padding for larger screens */
            overflow-x: hidden; /* Prevent horizontal scroll on smaller screens */

            /* --- Background Animation --- */
            animation: changeBackgroundColor 30s infinite alternate;
        }

        /* Background watermark */
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

        @keyframes changeBackgroundColor {
            0% {
                background-color: #f8f9fa; /* White */
            }
            50% {
                background-color: #e0f2f7; /* A light blue for transition */
            }
            100% {
                background-color: #f8f9fa; /* Returns to white at the end of the cycle */
            }
        }

        #carnetFrontal {
            font-family: Sans-serif;
             @if($dato->cargo == 'GERENTE GENERAL')

        background-image: url("{{asset('carnets imagenes/CARNET-CIIP-VIP.1.jpg')}}"); 

    @elseif($dato->cargo == 'ASISTENTE EJECUTIVO' || $dato->cargo == 'GERENTE' || $dato->cargo == 'COORDINADOR')

       background-image: url("{{asset('carnets imagenes/CARNET-CIIP-NARANJA.jpg')}}"); 

    @elseif($dato->cargo == 'PROFESIONAL' || $dato->cargo == 'ANALISTA')

         background-image: url("{{asset('carnets imagenes/CARNET-CIIP-VERDE.AD.1.jpg')}}"); 

    @elseif($dato->cargo == 'BACHILLER III NIVEL VII' || $dato->cargo == 'ASISTENTE ADMINISTRATIVO' || $dato->cargo == 'TECNICO' || $dato->cargo == 'ESCOLTA' || $dato->cargo == 'CHOFER')

     background-image: url("{{asset('carnets imagenes/CARNET-CIIP-VERDE.1.jpg')}}"); 

    @elseif($dato->cargo == 'SERVICIO MEDICO' )

      background-image: url("{{asset('carnets imagenes/CARNET-CIIP-ROJO.1.jpg')}}"); 

    @elseif($dato->cargo == 'OBRERO SUPERVISOR' ||$dato->cargo == 'OBRERO CERTIFICADO' || $dato->cargo == 'OBRERO GENERAL' || $dato->cargo == 'AUXILIAR DE SERVICIO' ||  $dato->cargo == 'SUPERVISOR AUXILIAR'  )

      background-image: url("{{asset('carnets imagenes/CARNET-CIIP-MORADO.1.jpg')}}"); 

       @else

      background-image: url("{{asset('carnets imagenes/CARNET-CIIP_Regular.1.jpg')}}"); 


    @endif
            background-size: 100% 100%; /* Ensures background image covers the container */
            background-repeat: no-repeat;
            background-position: center center;
            border-radius: 15px;
            width: 400px; /* Fixed width for larger screens (default) */
            aspect-ratio: 3/4; /* Maintains proportion */
            position: relative;
            box-shadow: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto; /* Center the carnet */

        }

        /* Specific styles for the QR image */
        .qr-code-img {
            height: 90px; /* Max QR size */
            width: 95px;
            display: block; /* Ensures no extra space */
            margin-right: 40px; /* Optional: space from the right edge */
        }

        .carnet-body {
            text-align: center;
            position: relative;
            z-index: 1;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            padding:10%;
            padding-top: 125px; /* Ajuste para mover el contenido hacia abajo y alinearlo con la foto */
        }

        .profile-picture {
            width: 148.6px;
            aspect-ratio: 2/2.21; /* Mantén la proporción de la foto */
            object-fit: fill;
            object-position: top;
            margin: 0 auto 20px auto;
            display: block;
            border: none; /* ELIMINADO: Quitar borde de la foto */
            border-radius: 16px;
           
        }

        .info-value {
            color: black;
            font-weight: bold;
            display: block;
            line-height: 1.3;
            text-shadow: 0 0 1px rgba(255, 255, 255, 0.5); /* Subtle text shadow for better readability over background */
        }
        .name-value {
            font-size: 20px; /* Adjusted for larger, more readable text */
            font-weight: 700;
        }
        .id-value {
            font-size: 20px; /* Adjusted */
            font-weight: 600;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .department-value {
            font-size: 16px; /* Slightly larger */
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: .5px;
            line-height: 1.2; /* Line-height adjustment for management text */
        }
       .position-value {
            font-size: 18px; /* Ajustado */
            font-weight: 800;
           margin-top: 20px;
        }

        .signature-area {
            margin-top: 30px;
            text-align: center;
            font-style: italic;
            border-top: 1px dashed #ced4da;
            padding-top: 10px;
            font-size: 0.8em;
        }

     

        /* --- Media Query for Phones (fixed smaller size) --- */
        @media (max-width: 576px) { /* Targets most phones in portrait mode */
            body {
                padding: 15px; /* Smaller overall padding for phones */
            }

            #carnetFrontal {
                width: 280px; /* Fixed smaller width for phones */
                margin: 20px auto; /* Add vertical margin and center horizontally */
                border-radius: 10px; /* Slightly smaller border-radius */
            }

            .carnet-body {
                padding: 5%; /* Reduced padding inside the carnet */
                padding-top: 87px; /* Adjusted for smaller photo and overall size */
            }

            .profile-picture {
                width: 104px; /* Smaller photo */
                margin-bottom: 8px;
                border-radius: 11.5px;
            }

            .name-value {
                font-size: 15px; /* Smaller font sizes */
            }
            .id-value {
                margin-top: 10px;
                font-size: 15px;
            }
            .department-value {
                font-size: 11px;
            }
            .position-value {
                font-size: 13px;
                margin-top: 4px;
            }

       
        }
    </style>
</head>
<body>
    <div style="display:flex;">
        <div class="carnet-container" id="carnetFrontal">
            <div class="carnet-body">
                @if(File::exists(public_path('imgs/usuarios/'.$dato->cedula.'.jpg')))
                    <img src="{{ asset('imgs/usuarios/'.$dato->cedula.'.jpg') }}" alt="Foto del Trabajador" class="profile-picture">
                @else
                    <img src="{{ asset('imgs/mensajes/contenido/1742237245_ciiplogo.jpg') }}" alt="Foto por defecto" class="profile-picture">
                @endif

                <div class="info-row">
                    <span class="info-value name-value">{{ $dato->nombre }} {{ $dato->apellido }}</span>
                </div>
                <div class="info-row">
                    <span class="info-value id-value">{{ $dato->nacionalidad }}-{{ number_format($dato->cedula, 0, ',', '.') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-value department-value">{{$dato->departamento}}</span>
                </div>
                <div class="info-row">
                    <span class="info-value position-value">{{ $dato->cargo}}</span>
                </div>
            </div>
        </div>
    </div>
    {{-- You might want to add the download button back if needed --}}
    {{-- <button id="downloadCarnet" class="btn-descargar">Descargar Carnet</button> --}}
</body>
</html>
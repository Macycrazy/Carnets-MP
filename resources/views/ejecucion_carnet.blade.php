<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de Trabajador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Georama:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Color inicial (blanco pálido) */
            display: flex;
            flex-direction: column; /* Permite apilar elementos verticalmente */
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 30px;
            overflow: hidden; /* Evita scroll si la animación o el carnet se desbordan */

            /* --- Animación del Fondo --- */
            animation: changeBackgroundColor 30s infinite alternate;
        }

        /* Marca de agua de fondo */
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
                background-color: #f8f9fa; /* Blanco */
            }
            50% {
                background-color: #e0f2f7; /* Un azul claro para la transición */
            }
            100% {
                background-color: #f8f9fa; /* Vuelve a blanco al final del ciclo */
            }
        }

        #carnetFrontal {
           font-family: 'Georama', sans-serif;
            @if($dato->cargo == 'GERENTE GENERAL')

        background-image: url("{{asset('carnets imagenes/CARNET-01.png')}}"); 



    @elseif($dato->cargo == 'ASISTENTE EJECUTIVO' || $dato->cargo == 'GERENTE' || $dato->cargo == 'COORDINADOR')

       background-image: url("{{asset('carnets imagenes/CARNET-01.png')}}"); 

    @elseif($dato->cargo == 'PROFESIONAL' || $dato->cargo == 'ANALISTA')

         background-image: url("{{asset('carnets imagenes/CARNET-01.png')}}"); 

    @elseif($dato->cargo == 'ASISTENTE ADMINISTRATIVO' || $dato->cargo == 'TECNICO' || $dato->cargo == 'ESCOLTA' || $dato->cargo == 'CHOFER')

     background-image: url("{{asset('carnets imagenes/CARNET-01.png')}}"); 

    @elseif($dato->cargo == 'SERVICIO MEDICO' )

      background-image: url("{{asset('carnets imagenes/CARNET-01.png')}}"); 

    @elseif($dato->cargo == 'AUXILIAR DE SERVICIO' ||  $dato->cargo == 'SUPERVISOR AUXILIAR'  )

      background-image: url("{{asset('carnets imagenes/CARNET-01.png')}}"); 

        @else

      background-image: url("{{asset('carnets imagenes/CARNET-01.png')}}"); 


    @endif
            background-size: 100% 100%; /* Asegura que la imagen de fondo cubra el contenedor */
            background-repeat: no-repeat;
            background-position: center center;
           /* border-radius: 15px;*/
            width: 634px; /* Ancho fijo para la visualización */
             height: 1004px; /* Ancho fijo para la visualización */
            position: relative;
            box-shadow: none; /* ELIMINADO: Quitar sombra para la captura sin bordes */
            display: flex;
            flex-direction: column;
            align-items: center;
            /* IMPORTANTE: Para html2canvas, si quieres que la captura sea del tamaño base,
               no le des bordes ni sombras aquí. Si las quieres en la captura, déjalas.
               Para "sin bordes" me refiero a que la captura final no tenga sombra ni un borde visual añadido por CSS. */
        }



         /* Estilo para el reverso del carnet */
.carnet-trasero {
    @if($dato->cargo == 'GERENTE GENERAL')

        background-image: url("{{asset('carnets imagenes/CARNET-02.jpg')}}"); 

    @elseif($dato->cargo == 'ASISTENTE EJECUTIVO' || $dato->cargo == 'GERENTE' || $dato->cargo == 'COORDINADOR')

       background-image: url("{{asset('carnets imagenes/CARNET-02.jpg')}}"); 

    @elseif($dato->cargo == 'PROFESIONAL' || $dato->cargo == 'ANALISTA')

         background-image: url("{{asset('carnets imagenes/CARNET-02.jpg')}}"); 

    @elseif($dato->cargo == 'ASISTENTE ADMINISTRATIVO' || $dato->cargo == 'TECNICO' || $dato->cargo == 'ESCOLTA' || $dato->cargo == 'CHOFER')

     background-image: url("{{asset('carnets imagenes/CARNET-02.jpg')}}"); 

    @elseif($dato->cargo == 'SERVICIO MEDICO' )

      background-image: url("{{asset('carnets imagenes/CARNET-02.jpg')}}"); 

    @elseif($dato->cargo == 'AUXILIAR DE SERVICIO' ||  $dato->cargo == 'SUPERVISOR AUXILIAR'  )

      background-image: url("{{asset('carnets imagenes/CARNET-02.jpg')}}"); 

        @else

      background-image: url("{{asset('carnets imagenes/CARNET-02.jpg')}}"); 


    @endif
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position: center center;
    /*border-radius: 15px;*/
     width: 634px; /* Ancho fijo para la visualización */
             height: 1004px; /* Ancho fijo para la visualización */
    position: relative;
    box-shadow: none; /* Sin sombra para la captura limpia */
    display: flex; /* Usamos flexbox para el contenido */
    flex-direction: column; /* Alineamos los elementos en columna */
    justify-content: flex-end; /* Alinea el contenido al final (abajo) */
    align-items: flex-end; /* Alinea los elementos a la derecha (horizontalmente) */
    padding: 20px; /* Padding para separar el QR de los bordes */
       padding-bottom: 5px; /* Padding para separar el QR de los bordes */
    box-sizing: border-box; /* Incluye padding en el tamaño total */
}

 .barcode-container {
            width:200px; /* HALF of 180px */
            height: 50px; /* HALF of 50px */
            display: flex;
            justify-content: right;
            align-items: center;
            overflow: hidden;
            vertical-align: middle;
            margin-bottom: 250px; /* HALF of 10px */
            margin-right: 1px;
        }




/* Estilos específicos para la imagen del QR */
.qr-code-img {
    height: 120px; /* Tamaño máximo del QR */
  
width: 120px;
    display: block; /* Asegura que no haya espacio extra */
  
    margin-right: 74px; /* Opcional: espacio desde el borde derecho */
    margin-bottom: 291px;
}

        .carnet-body {
            text-align: center;
            position: relative;
            z-index: 1;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            padding:10%;
            padding-top: 334px; /* Ajuste para mover el contenido hacia abajo y alinearlo con la foto */
        }

        .profile-picture {
            width: 241px;
            aspect-ratio: 1/1;
            object-fit: fill;
            object-position: top;
            margin: 0 auto 20px auto;
            display: block;
            border: none; /* ELIMINADO: Quitar borde de la foto */
            border-radius: 16px;
           
        }

        .info-value {
        
        
            font-weight: bold;
            display: block;
            line-height: 1.3;
            text-shadow: 0 0 1px rgba(255, 255, 255, 0.5); /* Sutil sombra de texto para mayor legibilidad sobre el fondo */
        }
        .name-value {
            font-size: 45px; /* Ajustado para que sea más grande y legible */
            font-weight: 700;
            line-height: 1;
            color: #323364;
         
          
        }
        .id-value {
            font-size: 28px; /* Ajustado */
            font-weight: 600;
             margin-top: 20px;
            margin-bottom: 5px;
            color: #565756;
          
        }
        .department-value {
             font-family: 'Georama', sans-serif;
              position: absolute;
              color: white;
              font-size: 35px;
              font-weight: bold;
  bottom:20px;
  width: 100%; 
  left: 0%;
  margin: 0 auto;
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

        .btn-descargar {
            margin-top: 30px; /* Espacio entre el carnet y el botón */
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .btn-descargar:hover {
            background-color: #0056b3;
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
                <span class="info-value name-value">{{ $dato->nombre }} </span>
                 <span class="info-value name-value">{{ $dato->apellido }} </span>
            </div>
            <div class="info-row">
                <span class="info-value id-value">{{ $dato->nacionalidad }}-{{ number_format($dato->cedula, 0, ',', '.') }}</span>
            </div>

            <div class="info-row">
                <span class="department-value">{{ $dato->departamento }}</span>
            </div>
            
        </div>
    </div>
    <br>    <br>    <br>
  <div class="carnet-trasero" id="carnetTrasero">
    {{-- QR Code: Current image from path --}}

 
        <img src="{{ asset('QR/'.$dato->qr_code_path) }}" alt="Código QR" class="qr-code-img">
  
    {{-- Dynamic Barcode: Generates barcode from $dato->card_code --}}
   
      
   </div>

</div>

    <button id="descargarAmbosBtn" class="btn-descargar">Descargar Ambos Lados</button>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        document.getElementById('descargarAmbosBtn').addEventListener('click', async function() {
            const carnetFrontal = document.getElementById('carnetFrontal');
            const carnetTrasero = document.getElementById('carnetTrasero'); // Asegúrate de que este elemento exista

            try {
                // Configuración para mayor resolución: scale y dpi
                const options = {
                    useCORS: true,
                    allowTaint: true,
                    scale: 3, // Aumenta la resolución 3 veces (ej: de 400x533 a 1200x1600)
                    dpi: 300, // Establece DPI a 300 para calidad de impresión
                    imageTimeout: 5000, // Tiempo de espera para cargar imágenes (en ms)
                };

                // Capturar el frontal
                const canvasFrontal = await html2canvas(carnetFrontal, options);
                const imagenFrontalUrl = canvasFrontal.toDataURL('image/png');
                descargarImagen(imagenFrontalUrl, {{$dato->cedula}}+'_front.png');

                // Capturar el trasero (asegúrate de que este elemento sea visible o tenga contenido renderizable)
                // Es crucial que 'carnetTrasero' tenga el CSS y contenido adecuado si es un carnet real.
                // Si 'carnetTrasero' es solo una imagen, puedes simplemente descargar esa imagen directamente.
                if (carnetTrasero && carnetTrasero.offsetWidth > 0 && carnetTrasero.offsetHeight > 0) {
                    const canvasTrasero = await html2canvas(carnetTrasero, options);
                    const imagenTraseroUrl = canvasTrasero.toDataURL('image/png');
                    descargarImagen(imagenTraseroUrl, {{$dato->cedula}}+'_back.png');
                } else {
                    console.warn("El elemento 'carnetTrasero' no es visible o no tiene dimensiones para ser capturado.");
                    // Si el trasero es una imagen de fondo de un div oculto, la captura podría no funcionar bien.
                    // Considera mostrarlo temporalmente o descargar la imagen directamente si es solo una URL.
                }


            } catch (error) {
                console.error('Error al generar las imágenes del carnet:', error);
                alert('Hubo un error al descargar las imágenes del carnet. Verifica la consola para más detalles (F12). Posibles causas: problemas de CORS con las imágenes o rutas incorrectas.');
            }
        });

        // Función auxiliar para descargar la imagen
        function descargarImagen(dataUrl, nombreArchivo) {
            const enlaceDescarga = document.createElement('a');
            enlaceDescarga.href = dataUrl;
            enlaceDescarga.download = nombreArchivo;
            document.body.appendChild(enlaceDescarga);
            enlaceDescarga.click();
            document.body.removeChild(enlaceDescarga);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
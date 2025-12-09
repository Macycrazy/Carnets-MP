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

      /* Estilo para el frontal del carnet (REDUCIDO A LA MITAD) */
#carnetFrontal {
    font-family: 'Georama', sans-serif;
    /* La URL se mantiene igual, asumiendo que es una variable de Laravel */
    
    @if($dato->cedula=='23434318')
    background-image: url("{{asset('carnets imagenes/CARNET-01.png')}}");     
@else
background-image: url("{{asset('carnets imagenes/'.$dato->departamento.'.jpg')}}"); 
@endif
    background-size: 100% 100%; 
    background-repeat: no-repeat;
    background-position: center center;
    width: 317px; /* 634px / 2 = 317px */
    height: 502px; /* 1004px / 2 = 502px */
    position: relative;
    box-shadow: none; 
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Estilo para el reverso del carnet (REDUCIDO A LA MITAD) */
.carnet-trasero {
    background-image: url("{{asset('carnets imagenes/CARNET-02.jpg')}}"); 
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position: center center;
    width: 317px; /* 634px / 2 = 317px */
    height: 502px; /* 1004px / 2 = 502px */
    position: relative;
    box-shadow: none;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-end;
    padding: 10px; /* 20px / 2 = 10px */
    padding-bottom: 2.5px; /* 5px / 2 = 2.5px */
    box-sizing: border-box;
}

/* Contenedor del código de barras (REDUCIDO A LA MITAD) */
.barcode-container {
    width: 100px; /* 200px / 2 = 100px */
    height: 25px; /* 50px / 2 = 25px */
    display: flex;
    justify-content: right;
    align-items: center;
    overflow: hidden;
    vertical-align: middle;
    margin-bottom: 125px; /* 250px / 2 = 125px */
    margin-right: 0.5px; /* 1px / 2 = 0.5px */
}

/* Estilos específicos para la imagen del QR (REDUCIDO A LA MITAD) */
.qr-code-img {
    height: 60px; /* 120px / 2 = 60px */
    width: 60px; /* 120px / 2 = 60px */
    display: block;
    margin-right: 37px; /* 74px / 2 = 37px */
    margin-bottom: 145.5px; /* 291px / 2 = 145.5px */
}

/* Cuerpo principal del carnet (REDUCIDO A LA MITAD) */
.carnet-body {
    text-align: center;
    position: relative;
    z-index: 1;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    padding: 5%; /* El porcentaje se mantiene igual, aunque el efecto es sobre el nuevo tamaño */
    padding-top: 166.5px; /* 334px / 2 = 167px */
}

/* Foto de perfil (REDUCIDO A LA MITAD) */
.profile-picture {
    width: 122px; /* 241px / 2 = 120.5px */
    aspect-ratio: 1/1;
    object-fit: fill;
    object-position: top;
    margin: 0 auto 10px auto; /* 20px / 2 = 10px */
    display: block;
    border: none; 
    border-radius: 8px; /* 16px / 2 = 8px */
}

/* Valores de información (Tamaño de fuente ajustado) */
.info-value {
    color: black;
    font-weight: bold;
    display: block;
    line-height: 1.3; /* Se mantiene igual */
    text-shadow: 0 0 1px rgba(255, 255, 255, 0.5); 
}

/* Nombre (REDUCIDO A LA MITAD en fuente) */
.name-value {
    font-size: 22.5px; /* 45px / 2 = 22.5px */
    font-weight: 700;
    line-height: 1;
    color: #323364;
}

/* ID (REDUCIDO A LA MITAD en fuente y márgenes) */
.id-value {
    font-size: 14px; /* 28px / 2 = 14px */
    font-weight: 600;
    margin-top: 10px; /* 20px / 2 = 10px */
    margin-bottom: 2.5px; /* 5px / 2 = 2.5px */
    color: #565756;
}

/* Departamento (El porcentaje se mantiene, pero el valor absoluto se reduce) */
.department-value {
    font-family: 'Georama', sans-serif;
    position: absolute;
    color: white;
    font-size: 50%; /* Se reduce el tamaño relativo para que encaje mejor si el 100% original era muy grande */
    font-weight: bold;
    bottom: 10px; /* 20px / 2 = 10px */
    width: 100%; 
    left: 0%;
    margin: 0 auto;
}

/* Posición (REDUCIDO A LA MITAD en fuente y margen) */
.position-value {
    font-size: 9px; /* 18px / 2 = 9px */
    font-weight: 800;
    margin-top: 10px; /* 20px / 2 = 10px */
}

/* Área de firma (Márgenes y padding ajustados) */
.signature-area {
    margin-top: 15px; /* 30px / 2 = 15px */
    text-align: center;
    font-style: italic;
    border-top: 1px dashed #ced4da; /* Se mantiene 1px, pero podría reducirse si se desea */
    padding-top: 5px; /* 10px / 2 = 5px */
    font-size: 0.8em; /* Se mantiene o se ajusta a 0.4em para la mitad, pero 0.8em es mejor para legibilidad */
}

/* Botón de descarga (Márgenes y padding ajustados) */
.btn-descargar {
    margin-top: 15px; /* 30px / 2 = 15px */
    padding: 5px 10px; /* 10px 20px / 2 */
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 2.5px; /* 5px / 2 = 2.5px */
    cursor: pointer;
    font-size: 0.8em; /* Se ajusta para que sea más pequeño */
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
                  @if($dato->departamento =='AUDITORÍA INTERNA' && $dato->cargo =='GERENTE')
                <span class="info-value id-value">AUDITOR INTERNO</span>
                @elseif($dato->cargo =='GERENTE')
                <span class="info-value id-value">{{ $dato->cargo}}</span>

                  @elseif($dato->cargo =='PRESIDENTE' && $dato->departamento =='PRESIDENCIA')
                <span class="info-value id-value">PRESIDENTA</span>
              
                 @elseif($dato->cedula='15122535')
                <span class="info-value id-value">GERENTE</span>
                
                @else
                <span class="info-value id-value">{{ $dato->nacionalidad }}-{{ number_format($dato->cedula, 0, ',', '.') }}</span>
                @endif
            </div>

        
            
        </div>
    </div>
    </div>
    {{-- You might want to add the download button back if needed --}}
    {{-- <button id="downloadCarnet" class="btn-descargar">Descargar Carnet</button> --}}
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const departmentValues = document.querySelectorAll('.department-value');

    departmentValues.forEach(element => {
        const textContent = element.textContent.trim();
        const wordCount = textContent.split(/\s+/).filter(word => word.length > 0).length;

        
        if (wordCount <= 3) {
            element.style.fontSize = '2em';
        } else if (wordCount <= 6) {
            element.style.fontSize = '1.6em';
            element.style.bottom = '30px';
        } else {
            element.style.fontSize = '2em';
            element.style.bottom = '-5px';
        }
    });
});
</script>
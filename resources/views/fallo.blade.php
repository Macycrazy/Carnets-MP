<!DOCTYPE html>

<html>
<head>
<title>Alerta</title>
<style>
body {
background-color: lightblue;
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
height: 100vh;
margin: 0;
color: white;
font-family: sans-serif;
text-align: center;
}

 body::before {
            width: 100%;
            content: ''; /* Obligatorio para pseudo-elementos */
            position: absolute; /* Para posicionarlo libremente */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
           
            background-image: url("{{ asset('MARCADEAGUA.png') }}"); /* Ruta a tu imagen */
            background-repeat: repeat-x repeat-y;
            background-position: center center;
            background-size: 50%; /* Ajusta el tamaño de la marca de agua */
            opacity: .097; /* Solo la marca de agua es semitransparente */
            z-index: 0; /* Colócalo detrás del contenido real */
        }
.alerta {
position: relative;
border-radius: 10px;
padding: 40px;
}

.icono-advertencia {
font-size: 8em;
color: white;
margin-bottom: 20px;
}

.texto-alerta {
font-size: 4em;
font-weight: bold;
color: black;

}
</style>

</head>
<body>

<div class="alerta">
<div class="icono-advertencia">⚠️</div>
<div class="texto-alerta">El usuario no se encuentra trabajajando en nuestro sistema.</div>
</div>

</body>
</html> 
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
     
      <!-- BANNER -->
      <section class="banner_main pt-0">

         

<!-- /////////////////// REGISTRO DE CARNETS //////////////////-->

<section class="w-75 m-auto mt-5" style="text-align: center; background-color: white;padding: 1%;border: dotted 1px grey;border-radius: 3rem;">


<form style="font-family: arial;" method="POST" action="{{route('actualizar',$editar->card_code)}}" id="Registro" enctype="multipart/form-data" autocomplete="off">


      @csrf

       {{ csrf_field() }}
       @method('PUT')

   <h1>Actualizacion de Carnet Institucional</h1>


<div style="width:100%">

<!-- ////////////// FOTO DEL TRABAJADOR ////////////////-->
   <div id="preview_img" style="max-height:200px;height:200px;margin: 0 auto;margin-bottom: 1%">



      <img id="image" name="image" style="width: 100%;height: 100%;padding: 0;"  >


   </div>

<!-- ////////////// FOTO DEL TRABAJADOR ////////////////-->


<!-- ////////////// NOMBRE Y APELLIDO ////////////////-->


   <div class="mb-3 input-group">

      <input class="form-control" type="text" id="name" name="name" placeholder="ej. NOMBRES COMPLETOS" value="{{$editar->name}}" required>

      <span class="input-group-text" id="name">Nombres</span>

      <input class="form-control" type="text" id="surname" name="surname" placeholder="ej. APELLIDOS COMPLETOS" value="{{$editar->lastname}}" required>

      <span class="input-group-text" id="name">Apellidos</span>

   </div>

<!-- ////////////// NOMBRE Y APELLIDO ////////////////-->

<!-- ////////////// CEDULA Y DIRECCION ////////////////-->
   <div class="mb-3 input-group">

      <input class="form-control col-md-3" type="text" id="document" name="document" placeholder="ej. 12345678" value="{{$editar->cedule}}"required>

      <span class="input-group-text" id="document">Cedula</span>

      <input class="form-control" type="text" id="adress" name="adress" placeholder="ej. CIIP" value="{{$editar->address}}" required>

      <span class="input-group-text" id="adress">Direccion</span>

   </div>

<!-- ////////////// CEDULA Y DIRECCION ////////////////-->

<!-- ////////////// TELEFONO Y CODIGO ////////////////-->

   <div class="mb-3 input-group">

      <input class="form-control col-md-3" type="text" id="phone" name="phone" placeholder="ej. 02122743742" value="{{$editar->cellpone}}" required>

      <span class="input-group-text" id="phone">Telefono</span>

      <input class="form-control" type="text" id="code" name="code" placeholder="ej. 100046 en adelante" value="{{$editar->card_code}}" required>

      <span class="input-group-text" id="code">Codigo</span>

   </div>

<!-- ////////////// TELEFONO Y CODIGO ////////////////-->

<!-- ////////////// DEPARTAMENTO Y CARGO ////////////////-->

   <div class="mb-3 input-group">

      <select class="form-control" id="department" name="department" required>

    
          @foreach($departamentos as $departamento)
         <option value="{{$departamento->id}}" @if ($departamento->id == $editar->id_department) selected @endif>{{$departamento->name}}</option>
      @endforeach

      </select>

      <span class="input-group-text" id="department">Departamento</span>

      <select class="form-control col-md-3" id="charge" name="charge" required>
         
      @foreach($cargos as $cargo)
         <option value="{{$cargo->id}}" @if ($cargo->id == $editar->id_charge) selected @endif>{{$cargo->name}}</option>
      @endforeach
      </select>

      <span class="input-group-text" id="charge">Cargo</span>

   </div>

<!-- ////////////// DEPARTAMENTO Y CARGO ////////////////-->


<!-- ////////////// NIVEL DE ACCESO Y ESTADO ////////////////-->

   <div class="mb-3 input-group">

      <select class="form-control col-md-3" id="access" name="access" required>

 
   @foreach($niveles as $nivel)
         <option value="{{$nivel->id}}" @if ($nivel->id == $editar->id_access_levels) selected @endif>{{$nivel->name}}</option>
      @endforeach
      </select>

      <span class="input-group-text" id="access">Nivel de Acceso</span>

      <select class="form-control" id="statesment" name="statesment" required>

        
   @foreach($estados as $estado)
         <option value="{{$estado->id}}" @if ($estado->id == $editar->id_state) selected @endif>{{$estado->name}}</option>
      @endforeach
      </select>

      <span class="input-group-text" id="statesment">Estado</span>

   </div>

<!-- ////////////// NIVEL DE ACCESO Y ESTADO ////////////////-->

<!-- ////////////// FOTO DEL TRABAJADOR Y FECHA DE VENCIMIENTO ////////////////-->

   <div class="mb-3 input-group">

      <input type="file" id="croppedImg" name="archivo" class="form-control" hidden>

      <input class="form-control" type="file" id="file" name="image" accept="image/*" value="" >

      <span class="input-group-text" id="file">Fotografia</span>

      <input class="form-control col-md-3" type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" max="{{ now()->addYear()->format('Y-m-d') }}" value="{{$editar->expiration}}" required >

      <span class="input-group-text" id="date">Vencimiento</span>

   </div>

<!-- ////////////// FOTO DEL TRABAJADOR Y FECHA DE VENCIMIENTO ////////////////-->

<!-- ////////////// COMENTARIO ////////////////-->

   <div class="mb-3 input-group">

      <textarea placeholder="Observaciones" name="comment" class="form-control" style="height: 50px;min-height:50px;max-height:50px">{{$editar->note}}</textarea>

   </div>

<!-- ////////////// COMENTARIO ////////////////-->



<!-- ////////////// BOTON DE REGISTRO ////////////////-->

   <div class="mb-3 input-group">

      <button class="btn btn-primary w-75 py-2 m-auto" type="submit" id="save">

         Actualizar

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







<!-- /////////////////// REGISTRO DE CARNETS //////////////////-->


<!-- /////////////////// INICIO DE SESION //////////////////-->


<!-- /////////////////// INICIO DE SESION //////////////////-->


        
        
      </section>
      <!-- BANNER -->
     

     <!-- /////////////////// VISTA DE CARNETS //////////////////-->

     


          <!-- /////////////////// VISTA DE CARNETS //////////////////-->
      
     
      <!-- Javascript files-->


      <script src="js/jquery.min.js"></script>
      <script type="text/javascript" src="cropper/cropper.js"></script>
  <script type="text/javascript">



let cropper;
document.addEventListener('DOMContentLoaded', () => {


    const imageInput = document.getElementById('file');
    const image = document.getElementById('image');
     image.src='imgs/usuarios/{{$editar->card_code}}.png';
    cropper = new Cropper(image, {
                  viewMode:2,
                  scalable:false,
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

            
                image.src = imgResult;
                cropper = new Cropper(image, {
                  viewMode:2,
                  scalable:false,
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
       
        const file = new File([blob], 'croppedImage.png', { type: blob.type });

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
      new DataTable('#example');
   </script>
   </body>
</html>


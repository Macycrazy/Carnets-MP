
      <script src="js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
    scrollY: 400
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
     

$btnr=document.getElementById('Btnregistro');

$cdr=document.getElementById('Cuadrore');


$btnc=document.getElementById('Btnconsulta');

$cdc=document.getElementById('Cuadrcon');
  


$btnr.addEventListener('click', () => {
  if ($cdr.style.display === 'block') {
   // $cdr.style.display = 'none';
  } else {
   $cdc.style.display = 'none';
  if(usuario == 'admin'){
   
     }
    $cdr.style.display = 'block';
  }
});



$btnc.addEventListener('click', () => {
  if ($cdc.style.display === 'block') {
   // $cdc.style.display = 'none';
  } else {
  if(usuario == 'admin'){
   
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


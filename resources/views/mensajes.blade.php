

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Soporte CIIP</title>
    <link rel="icon" href="imgs/icono.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
   <link href="mensajes.css" rel="stylesheet">
</head>
<body style="background-color: none;">

    <div id="imageModal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.9);z-index: 1000;">
    <span id="closeModal" style="position: absolute; top: 15px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; cursor: pointer;">&times;</span>
    <img id="modalImage" style="margin: auto; display: block; max-width: 90%; max-height: 90%;">
</div>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                          <input type="text" id="userSearch" class="form-control" placeholder="Search...">
                        </div>
                   <ul class="list-unstyled chat-list mt-2 mb-0" id="userList">
    @foreach($usuarios as $usuario)
        <li class="clearfix user-link" data-user-id="{{ $usuario->id }}" data-user-name="{{ strtolower($usuario->name) }}">
            <div class="about">
                <div class="name">{{ $usuario->name }}</div>
                <div class="status">
                    @if($usuario->isOnline())
                        <i class="fa fa-circle online"></i> online
                    @else
                        <i class="fa fa-circle offline"></i> Offline
                    @endif
                </div>
            </div>
        </li>
    @endforeach
    <li class="clearfix user-link" data-user-id="-4600162193" data-user-name="Telegram">
            <div class="about">
                <div class="name">Telegram</div>
                <div class="status">
                    
                        <i class="fa fa-circle online"></i> online
                    
                </div>
            </div>
        </li>
</ul>
                    </div>
                    <div class="chat">
                        <div class="chat-header clearfix">
    <div class="row">
        <div class="col-lg-6">

            <div class="chat-about">
                <h6 class="m-b-0" id="chat-user-name">Selecciona un usuario</h6>
            </div>
        </div>
        </div>
</div>
                        <div class="chat-history" id="chat-history">
                            <ul class="m-b-0" id="messages-container">
                             
                            </ul>
                        </div>
                     <!--   <div id="previewContainer" style="margin: 10px;padding: 10px;float: right;background-color: grey;border-radius: 1rem;">
    <img id="previewImage" style="max-width: 100px; max-height: 100px;border-radius: .5rem;">
</div>-->
<div id="previewContainer" style="margin: 10px;padding: 10px;float: right;background-color: grey;border-radius: 1rem; display: none;">
</div>

<div id="fullPreviewContainer" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); display: none; justify-content: center; align-items: center;z-index: 1000;">
    <img id="fullPreviewImage" style="max-width: 90%; max-height: 90%;">
</div>


                        <div class="chat-message clearfix">
                            <form id="message-form" data-route="{{ route('send') }}" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <input type="hidden" name="receiver_id" id="receiver_id" value="">
                                <div class="input-group mb-0">
                                    <div class="input-group-prepend">
                                    <button class="input-group-text" href="" type="sumbit" id="Btnmessage" disabled><i class="fa fa-send" > </i>
                                    </button>
                                    </div>
                                    <input type="text" class="form-control" style="height:100%" name="message" id="message" placeholder="Enter text here..." required>

                                    <div class="input-group-prepend">
                                     <label id="customFileUploadButton" class="input-group-text" for="hiddenFileInput">
        <i class="fa fa-image"></i>
    </label>
    <input type="file" id="hiddenFileInput" accept="image/png, image/jpeg" name="archivos[]" style="display: none;" multiple>

                                    </div>
                                 
<div id="imageModal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.9);z-index: 1000;">
  <span id="closeModal" style="position: absolute; top: 15px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; cursor: pointer;">&times;</span>
  <img id="modalImage" style="margin: auto; display: block; max-width: 90%; max-height: 90%;">
</div>
                               
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    

<script>
    var checkNewMessagesUrl = '{{ route("check-new-messages") }}';
    var user='{{ auth()->id() }}';

    document.getElementById('hiddenFileInput').addEventListener('change', function(event) {
    // Aquí puedes manejar la selección de archivos
    console.log("Archivo seleccionado:", this.files[0]);
});

 document.getElementById('hiddenFileInput').addEventListener('change', function(event) {
    const files = this.files;
    const previewContainer = document.getElementById('previewContainer');
    previewContainer.style.display='block';
    previewContainer.innerHTML = '';

    if (files) {
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.createElement('img');
                previewImage.src = e.target.result;
                previewImage.style.maxWidth = '50px';
                previewImage.style.maxHeight = '50px';
                previewImage.style.margin = '5px';
                previewImage.style.borderRadius = '.5rem';
                previewImage.style.cursor = 'pointer'; // Cambia el cursor para indicar que es clickable

                previewImage.addEventListener('click', function() {
                    document.getElementById('fullPreviewImage').src = e.target.result;
                    document.getElementById('fullPreviewContainer').style.display = 'flex';
                      document.getElementById('fullPreviewContainer').style.zIndex = '1000'; 
                });

                previewContainer.appendChild(previewImage);
            }
            reader.readAsDataURL(file);
        }
    }
});

document.getElementById('fullPreviewContainer').addEventListener('click', function() {
    this.style.display = 'none'; // Oculta la vista previa en tamaño completo al hacer clic fuera de la imagen
});

let previousUsersStatus = []; 

  function updateUsers() {
            $.ajax({
                url: '/get-users-status',
                type: 'GET',
                dataType: 'json',
                 success: function(response) {
                if (response && response.status && Array.isArray(response.status)) {
                    let currentUsersStatus = response.status; // Estado actual
                    let hasChanges = false; // Bandera para detectar cambios

                    currentUsersStatus.forEach(userStatus => {
                        const userElement = document.querySelector(`.user-link[data-user-id="${userStatus.id}"] .status`);
                        if (userElement) {
                            if (userStatus.online) {
                                userElement.innerHTML = '<i class="fa fa-circle online"></i> online';
                            } else {
                                userElement.innerHTML = '<i class="fa fa-circle offline"></i> offline';
                            }
                        }
                    });

                    // Comparar el estado actual con el anterior
                    if (previousUsersStatus.length > 0) {
                        hasChanges = !arraysAreEqual(previousUsersStatus, currentUsersStatus);
                    }

                    if (hasChanges) {
                        playSound(); // Reproducir sonido si hay cambios
                    }

                    previousUsersStatus = currentUsersStatus; // Actualizar estado anterior
                } else {
                    console.error('La respuesta del servidor no contiene un array de estado de usuarios válido.');
                }
            },
                error: function(xhr, status, error) {
                    console.error('Error al obtener usuarios:', error);
                    console.error('Estado:', status);
                    console.error('Respuesta completa:', xhr);
                }
            });
        }

        function arraysAreEqual(arr1, arr2) {
        if (arr1.length !== arr2.length) return false;
        for (let i = 0; i < arr1.length; i++) {
            if (arr1[i].id !== arr2[i].id || arr1[i].online !== arr2[i].online) {
                return false;
            }
        }
        return true;
    }

    // Función para reproducir el sonido
    function playSound() {
        let audio = new Audio('/notification1.mp3'); // Ruta al archivo de sonido
         audio.volume = 0.10;
        audio.play();
    }

    function playnewmess() {
        let audio = new Audio('/notification4.mp3'); // Ruta al archivo de sonido
        audio.volume = 0.50;
        audio.play();
    }

    $(document).ready(function() {
        updateUsers(); // Carga inicial
       setInterval(updateUsers, 1000); // Actualiza cada 10 segundos
    });
</script>
<script type="text/javascript" src="mensajes.js"></script>

   
</body>
</html>
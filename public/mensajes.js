$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

   document.addEventListener('DOMContentLoaded', function() {
        const userLinks = document.querySelectorAll('.user-link');
        const receiverIdInput = document.getElementById('receiver_id');

        userLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const userId = this.getAttribute('data-user-id');
                receiverIdInput.value = userId;
            });
        });
    });

$(document).ready(function() {

    setInterval(checkNewMessages, 1000);
  
 $('#message-form').submit(function(event) {
        event.preventDefault();

      //  console.log("Formulario submit detectado"); // Verifica si se detecta el submit

          let route = $(this).data('route');
    let formData = new FormData(this);
    //    console.log("Ruta:", route); // Imprime la ruta

       console.log("Datos a enviar:", $(this).serialize()); // Imprime los datos serializados

        $.ajax({
            url: route,
            type: 'POST',
            data: formData, // Usa FormData
        processData: false, // Evita que jQuery procese los datos
        contentType: false,
            beforeSend: function() {
            //    console.log("Enviando petición AJAX..."); // Verifica si se va a enviar la petición
            },
            success: function(response) {
           location.reload();
               console.log(response.message)
                // ...
            },
            error: function(xhr, status, error) {
                console.error("Error AJAX:", status, error); // Imprime el error AJAX
                console.log("Respuesta del servidor (error):", JSON.parse(xhr.responseText)); // Imprime la respuesta del servidor (si hay)
                alert("Ocurrió un error al enviar el mensaje. Por favor, inténtalo de nuevo.");
            }
        });
    });

let originalTitle = document.title;
    function checkNewMessages() {

        $.ajax({
            url: checkNewMessagesUrl, // Ruta Laravel para verificar nuevos mensajes
            type: 'GET',
            success: function(response) {
                if (response.newMessages) {
console.log(response.emisor);
                 document.title = 'Mensaje Nuevo de '+response.emisor.emisor;
                 playnewmess();
        // Cambiar el favicon
        let link = document.querySelector('link[rel="icon"]'); // Obtiene el favicon existente
        if (!link) { // si no existe, lo crea.
            link = document.createElement('link');
            link.setAttribute('rel', 'icon');
            link.setAttribute('type', 'image/x-icon');
            document.head.appendChild(link);
        }
        link.setAttribute('href', 'imgs/icono_nuevo.ico'); // Establece la nueva ruta del favicon

                }
                
            },
            error: function(xhr, status, error) {
                console.error("Error al verificar nuevos mensajes:", JSON.parse(xhr.responseText));
            }
        });
    }

    // Verifica nuevos mensajes cada 10 segundos
    
});


    document.addEventListener('DOMContentLoaded', function() {
    const userLinks = document.querySelectorAll('.user-link');
    const receiverIdInput = document.getElementById('receiver_id');
    const chatUserName = document.getElementById('chat-user-name');
    const messagesContainer = document.getElementById('messages-container');
    const messagesinput = document.getElementById('message');
    const btnmessage= document.getElementById('Btnmessage');

messagesinput.addEventListener('change', function(event) {
   if(messagesinput.checkValidity())
   {
     btnmessage.classList.add("btn-primary");
     btnmessage.disabled=false;
   }
    
})
    // Inicializar messagesContainer vacío
   // messagesContainer.innerHTML = '';
let imageIdCounter = 1;
let imageIds = [];
    userLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const userId = this.getAttribute('data-user-id');
            const userName = this.querySelector('.name').textContent;
            receiverIdInput.value = userId;
            chatUserName.textContent = userName;

            // Cargar mensajes usando AJAX solo al hacer clic
          fetch(`/messages/${userId}`)
    .then(response => response.json())
    .then(messages => {
     
        const messagesContainer = document.getElementById('messages-container');
        messagesContainer.innerHTML = '';
console.log(messages);
        messages.forEach(message => {
            let messageClass = 'other-message';
            let messageDataClass = '';
            let photoUrl = message.receptor_photo;
            let status = message.receiver_online ? 'online' : message.receiver_last_seen;

            if (message.emisor == user) {
                messageClass = 'my-message float-right';
                messageDataClass = 'text-right';
                photoUrl = message.emisor_photo;
                status = message.sender_online ? 'online' : message.sender_last_seen;
            }

            let filesHtml = '';
              let filesArray = []; 
            try {
                const filesString = message.files;
                if (filesString && filesString.trim()) { // Comprobación adicional
                            filesArray = JSON.parse(filesString);
                        }
                if (Array.isArray(filesArray)) 
                {
                  //  console.log(message.have_file)
                    filesArray.forEach(file => {
                        if (file )
                        {
                            const a= message.have_file;
                            console.log (a);
                            if(a==1)
                            {
                              const imageId = `image-${imageIdCounter++}`;
                                    filesHtml += `
                                        <img src="${file}" 
                                             id="${imageId}" 
                                             data-image-url="${file}" 
                                             style="max-width: auto; max-height: 100%; cursor: pointer; margin: .5%;border-radius:.5rem"
                                             onclick="showModal('${imageId}')">
                                    `;
                                    // Modal HTML dentro de messageHtml
                                      filesHtml += `
                                      

                                     <div id="modal-${imageId}" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); display: none; justify-content: center; align-items: center;z-index: 1000;">
                                    <img id="modal-image-${imageId}"  style="max-width: 90%; max-height: 90%;" ondblclick="showFullPreview('${imageId}')">
                                    </div>
                                    `;
                            }
                            else{
                                filesHtml += ''
                            }
                        }
                    });
                }
            } catch (error) {
                console.error("Error parsing files:", error);
            }
if (message.have_file==1) {
            var messageHtml = `
                <li class="clearfix">
                    <div class="message-data ${messageDataClass}">
                        <span class="message-data-time">${message.fdate}</span>
                    </div>
                    <div class="message ${messageClass}" style="margin:0 auto;min-width:10%">
                    <div style="margin:0 auto;display:flex;  justify-content: center;
    align-items: center; padding:.2%;height:50px">    
                    ${filesHtml} 
                    </div>
                    <br>${message.contenido}
                    </div>
                </li>
            `;
}
else{
     var messageHtml = `
                <li class="clearfix">
                    <div class="message-data ${messageDataClass}">
                        <span class="message-data-time">${message.fdate}</span>
                    </div>
                    <div class="message ${messageClass}" style="margin:0 auto;min-width:10%">
                   ${message.contenido}
                    </div>
                </li>
            `;
      }
                    messagesContainer.innerHTML += messageHtml;
                  //  console.log("messagesContainer.innerHTML:", messagesContainer.innerHTML); //verificar el contenido del container.
//console.log(imageIds)
              // Funciones para mostrar y cerrar el modal
                window.showModal = function(imageId) {
                    const modal = document.getElementById(`modal-${imageId}`);
                    const modalImage = document.getElementById(`modal-image-${imageId}`);
                    const img = document.getElementById(imageId);
                    modalImage.src = img.dataset.imageUrl;
                    modal.style.display = 'flex';

                                    
modal.addEventListener('click', function() {
    this.style.display = 'none'; // Oculta la vista previa en tamaño completo al hacer clic fuera de la imagen
});
                };


        });

     
    });
                });
            });

        
        });


   document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('userSearch');
        const userList = document.getElementById('userList');
        const userItems = userList.querySelectorAll('li');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            userItems.forEach(item => {
                const userName = item.dataset.userName;

                if (userName.includes(searchTerm)) {
                    item.style.display = 'flex'; // or 'block' depending on your styling
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
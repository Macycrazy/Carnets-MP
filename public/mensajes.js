$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function() {
  
 $('#message-form').submit(function(event) {
        event.preventDefault();

      //  console.log("Formulario submit detectado"); // Verifica si se detecta el submit

        let route = $(this).data('route');
    //    console.log("Ruta:", route); // Imprime la ruta

     //   console.log("Datos a enviar:", $(this).serialize()); // Imprime los datos serializados

        $.ajax({
            url: route,
            type: 'POST',
            data: $(this).serialize(),
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

console.log(checkNewMessagesUrl)
    function checkNewMessages() {
        $.ajax({
            url: checkNewMessagesUrl, // Ruta Laravel para verificar nuevos mensajes
            type: 'GET',
            success: function(response) {
                if (response.newMessages) {
                   location.reload(); // Recarga la página si hay nuevos mensajes
                }

            },
            error: function(xhr, status, error) {
                console.error("Error al verificar nuevos mensajes:", JSON.parse(xhr.responseText));
            }
        });
    }

    // Verifica nuevos mensajes cada 10 segundos
    setInterval(checkNewMessages, 1000);
});
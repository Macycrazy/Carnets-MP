

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mensajeria CIIP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
   <link href="mensajes.css" rel="stylesheet">
</head>
<body style="background-color: none;">
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
                        <div class="chat-message clearfix">
                            <form id="message-form" data-route="{{ route('send') }}">
                                @csrf
                                <input type="hidden" name="receiver_id" id="receiver_id" value="">
                                <div class="input-group mb-0">
                                    <div class="input-group-prepend">
                                    <button class="input-group-text" href="" type="sumbit" id="Btnmessage" disabled><i class="fa fa-send" > </i></button>
                                    </div>
                                    <input type="text" class="form-control" style="height:100%" name="message" id="message" placeholder="Enter text here..." required>
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
</script>


<script>
    var checkNewMessagesUrl = '{{ route("check-new-messages") }}';
</script>
<script type="text/javascript" src="mensajes.js"></script>

    <script type="text/javascript">


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
                            messagesContainer.innerHTML = '';
                            messages.forEach(message => {
                                let messageClass = 'other-message';
                                let messageDataClass = '';
                                let photoUrl = message.receptor_photo;
                                let status = message.receiver_online ? 'online' : message.receiver_last_seen;

                                if (message.emisor == {{ auth()->id() }}) {
                                    messageClass = 'my-message float-right';
                                    messageDataClass = 'text-right';
                                    photoUrl = message.emisor_photo;
                                    status = message.sender_online ? 'online' : message.sender_last_seen;
                                }

                                const messageHtml = `
                                    <li class="clearfix">
                                        <div class="message-data ${messageDataClass}">
                                            <span class="message-data-time">${message.fdate}</span>
                                          
                                           
                                        </div>
                                        <div class="message ${messageClass}">
                                            ${message.contenido}
                                        </div>
                                    </li>
                                `;
                                messagesContainer.innerHTML += messageHtml;
                            });
                        });
                });
            });

            // ... (tu código para enviar mensajes) ...
        });
    </script>

    <script>
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
</script>
</body>
</html>
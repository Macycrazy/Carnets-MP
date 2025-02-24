<meta name="csrf-token" content="{{ csrf_token() }}">


<h1>Chat con {{ $user_id->name}}</h1>

<h1>Usuarios</h1>
@foreach($usuarios as $usuario)
<li>{{$usuario->name}}</li>
@endforeach
<div id="messages-container">
    @foreach ($messages as $message)
        <p>
            <strong>DE:{{ $message->sender->name }} A: {{ $message->receiver->name }} </strong>CONTENIDO: {{ $message->contenido }}
        </p>
    @endforeach
</div>

<form id="message-form" data-route="{{ route('send') }}">
    @csrf
    <input type="hidden" name="receiver_id" value="{{ $user_id->id }}">
    <input type="text" name="message" id="message" placeholder="Escribe tu mensaje">
    <button type="submit">Enviar</button>
</form>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="mensajes.js"></script>
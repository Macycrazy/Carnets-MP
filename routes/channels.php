<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('mensajes.{recipientId}', function ($user, $recipientId) {
    return (int) $user->id === (int) $recipientId; // Only allow the recipient to listen
});
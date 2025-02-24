<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

 protected $table = 'userEntity';

 public function messages()
{
    return $this->hasMany(mensajes::class);
}

public function messagesSent() {
    return $this->hasMany(mensajes::class, 'emisor'); // Especifica la clave foránea
}

public function messagesReceived() {
    return $this->hasMany(mensajes::class, 'receptor'); // Especifica la clave foránea
}


}

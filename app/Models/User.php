<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

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

public function isOnline()
{
    return Cache::has('user-is-online-' . $this->id);
}

public function lastSeen()
{
    return Carbon::parse($this->last_seen)->diffForHumans();
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mensajes extends Model
{
    protected $table = 'mensajes';

   public function sender() {
    return $this->belongsTo(User::class, 'emisor'); // Especifica la clave foránea
}

public function receiver() {
    return $this->belongsTo(User::class, 'receptor'); // Especifica la clave foránea
}
}

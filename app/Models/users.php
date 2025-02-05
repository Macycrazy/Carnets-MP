<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable; // Importa el User Authenticatable
use Illuminate\Notifications\Notifiable;

class users extends Authenticatable 
{
     use HasFactory;
     protected $table = 'userEntity';
}

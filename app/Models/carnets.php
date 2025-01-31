<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carnets extends Model
{
    use HasFactory;
     protected $table = 'Carnets';

     protected $fillable = [
        'name',
         'lastname',
         'card_code',
          'expiration',
           'note',
            'cedule',
            'address',
            'cellpone',
            'id_department',
            'id_charge',
            'id_status',
            'id_access_levels',
            'id_state',
            'created_at',
            'updated_at'
    ];
}

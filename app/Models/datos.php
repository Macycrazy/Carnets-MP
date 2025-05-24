<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'datos'; // Asegúrate de que esto apunte a tu tabla 'datos'

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cedula',              // ¡Añade esta línea!
        'codigo',   // ¡Añade esta línea!
        'qr_code_path',   // ¡Añade esta línea si usas esta columna!
        // Agrega aquí cualquier otra columna que quieras asignar masivamente,
        // por ejemplo, 'nombre', 'apellido', etc.
    ];

    // Si prefieres, puedes usar $guarded en lugar de $fillable.
    // $guarded especifica qué campos *NO* pueden ser asignados masivamente.
    // Si el array está vacío, significa que *todos* los campos pueden ser asignados masivamente.
    // protected $guarded = []; // Esto permitiría la asignación masiva a todos los campos.
                            // Usar $fillable es generalmente más seguro.
}
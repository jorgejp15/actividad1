<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Rol_usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'Usuario_id'; // Indicar la clave foránea como clave primaria
    public $incrementing = false; // Desactivar la autoincrementación


    protected $fillable = [
        'nombreRol',
        'Usuario_id',
    ];

    protected $table = 'rol_usuarios';

    public function usuario()
    {
        return $this->hasOne (Usuario::class, 'Usuario_id');
    }
}

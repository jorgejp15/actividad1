<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rol_usuario;
use App\Models\Paciente;
use App\Models\Cita;
use App\Models\Historia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'contrasena',
    ];

    protected $table = 'usuarios';

    public function rolUsuarios()
    {
        return $this->hasMany(Rol_usuario::class, 'Usuario_id');
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'Usuario_id');
    }

    public function citas()
    {
        return $this->hasMany(Cita::class, 'Usuario_id');
    }

    public function historias()
    {
        return $this->hasMany(Historia::class, 'Usuario_id');
    }
}

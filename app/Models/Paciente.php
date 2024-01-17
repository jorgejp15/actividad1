<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Cita;
use App\Models\Historia;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'sexo',
        'fechaNacimineto',
        'edad',
        'idNum',
        'aseguradora',
        'email',
        'domicilio',
        'telefono',
        'otros',
        'foto',
        'Usuario_id',
    ];

    protected $table = 'pacientes';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_id');
    }

    public function citas()
    {
        return $this->hasMany(Cita::class, 'Paciente_id');
    }

    public function historias()
    {
        return $this->hasMany(Historia::class, 'Paciente_id');
    }
}
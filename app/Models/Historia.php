<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Paciente;
use App\Models\Recetario;

class Historia extends Model
{
    use HasFactory;

    protected $fillable = [
        'fechaElaboracion',
        'hora',
        'descripcion',
        'diagnostico',
        'tratamiento',
        'Usuario_id',
        'Paciente_id',
    ];

    protected $table = 'historias';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'Paciente_id');
    }

    public function recetario()
    {
        return $this->hasOne(Recetario::class, 'Historia_id');
    }
}

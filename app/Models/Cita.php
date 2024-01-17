<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'motivoConsulta',
        'Usuario_id',
        'Paciente_id',
    ];

    protected $table = 'citas';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'Paciente_id');
    }
}

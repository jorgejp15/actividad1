<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudiante;
use App\Models\Docente;
use Illuminate\Database\Eloquent\SoftDeletes;
class Persona extends Model
{
    use HasFactory;
    protected $fillable = [
        
        
        'ci',
        'nombre',
        'apellidos',
        'sexo',
        'fecha_nacimiento',

    ];
    protected $table = 'personas';
    use SoftDeletes;
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class);
    }
    public function docente()
    {
        return $this->hasOne(Docente::class);
    }
}


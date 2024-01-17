<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;
use App\Models\Docente_grado;

use Illuminate\Database\Eloquent\SoftDeletes;

class Docente extends Model
{
    use HasFactory;
    protected $fillable = [
        'persona_id',
        'salario',
        'fecha_de_ingreso',
        
    ];
    use SoftDeletes;
    protected $table = 'docentes'; 

    public function docente_grado()
    {
        return $this->hasOne(Docente_grado::class);
    }
    
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }




    
}




<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;
use App\Models\Matricula;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'persona_id',
        
    ];
    use SoftDeletes;
    protected $table = 'estudiantes'; 
    
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }
    public function matricula()
    {
        return $this->hasOne(Matricula::class);
    }




    
}




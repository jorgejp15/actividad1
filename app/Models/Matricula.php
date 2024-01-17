<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matricula extends Model
{
    use HasFactory;
    protected $fillable = [
        'carrera_id',
        'estudiante_id',
        
    ];
    use SoftDeletes;
    protected $table = 'matriculas'; 
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id');
    }
    
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id');
    }




    
}




<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matricula;
use Illuminate\Database\Eloquent\SoftDeletes;
class Carrera extends Model
{
    use HasFactory;
    protected $fillable = [
     
        'nombre',
        'descripcion',
        
    ];
    protected $table = 'carreras';
    use SoftDeletes;
    public function matricula()
    {
        return $this->hasOne(Matricula::class);
    }
}


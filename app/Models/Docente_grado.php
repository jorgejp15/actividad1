<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grado;
use App\Models\Docente;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docente_grado extends Model
{
    use HasFactory;
    protected $fillable = [
        'grado_id',
        'docente_id',
        'descripcion',
    ];
    use SoftDeletes;
    protected $table = 'docente_grados'; 
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }
    
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id');
    }


    
}




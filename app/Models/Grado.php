<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Docente_grado;
use Illuminate\Database\Eloquent\SoftDeletes;
class Grado extends Model
{
    use HasFactory;
    protected $fillable = [
     
        'nombre',
        
        
    ];
    protected $table = 'grados';
    use SoftDeletes;
    public function docente_grado()
    {
        return $this->hasOne(Docente_grado::class);
    }
}


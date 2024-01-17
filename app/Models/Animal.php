<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Especie;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'zoo_id',
        'especie_id',
        'sexo',
        'añonacim',
        'pais',
        'continente',
        // Otros campos que puedas tener...
    ];
    use SoftDeletes;
    protected $table = 'animal'; 
    
    public function especie()
{
    return $this->belongsTo(Especie::class, 'especie_id');
}

public function zoo()
{
    return $this->belongsTo(Zoo::class, 'zoo_id');
}


    
}




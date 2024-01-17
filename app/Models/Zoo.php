<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;
use Illuminate\Database\Eloquent\SoftDeletes;
class Zoo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ciudad',
        'pais',
        'tamaño',
        'presupuesto',
        // Otros campos que puedas tener...
    ];
    protected $table = 'zoo';
    use SoftDeletes;
    public function animal()
    {
        return $this->hasOne(Animal::class);
    }
}

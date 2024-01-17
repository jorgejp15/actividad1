<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;
use Illuminate\Database\Eloquent\SoftDeletes;
class Especie extends Model
{

    //protected $fillable=['nomcientifico','nomvulgar','familia']; 
    use HasFactory;
    protected $fillable = [
        'nomcientifico',
        'nomvulgar',
        'familia',
        'peligro',
        // Otros campos que puedas tener...
    ];
    protected $table = 'especie';
    use SoftDeletes;
    public function animal()
    {
        return $this->hasOne(Animal::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Historia;

class Recetario extends Model
{
    use HasFactory;

    protected $fillable = [
        'Historia_id',
    ];

    protected $table = 'recetarios';

    public function historia()
    {
        return $this->belongsTo(Historia::class, 'Historia_id');
    }
}

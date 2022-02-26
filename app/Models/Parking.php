<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
        'ville_id',
        'nom',
        'description',
        'nombre_de_place'
    ];
    use HasFactory;
}

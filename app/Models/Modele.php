<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{

    protected $fillable = [
            'nommodele',
            'commentairemodele',
    ];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    protected $fillable = [
            'nommarque',
            'commentairemarque',
            
    ];
    use HasFactory;
}

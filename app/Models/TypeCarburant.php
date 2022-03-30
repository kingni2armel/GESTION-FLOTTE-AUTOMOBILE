<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCarburant extends Model
{
    protected $fillable = [
            'nomtypecarburant',
            'libellecarburant'
    ];
    use HasFactory;
}

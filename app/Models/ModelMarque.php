<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMarque extends Model
{
    protected $fillable = [
        'marque_id',
        'modele_id'
    ];
    use HasFactory;
    
}

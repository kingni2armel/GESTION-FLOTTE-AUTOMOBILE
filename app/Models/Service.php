<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'departement_id',
        'nom_service',
        'commentaire_service'
    ];
    use HasFactory;

}

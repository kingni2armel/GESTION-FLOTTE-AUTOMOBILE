<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable=[
        'nom_departement',
        'direction_id',
        'commentaire_departement'
    ];
    use HasFactory;
}

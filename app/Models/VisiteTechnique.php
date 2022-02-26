<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiteTechnique extends Model
{
    protected $fillable = [
        'vehicule_id',
        'date_visite_technique',
        'date_prochaine_visite',
        'commentaire'
    ];
    use HasFactory;
}

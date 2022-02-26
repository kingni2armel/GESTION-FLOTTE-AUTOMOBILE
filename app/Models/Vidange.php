<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidange extends Model
{
    protected $fillable = [
        'vehicule_id',
        'date_vidange',
        'date_prochaine_vidange',
        'commentaire'
    ];
    use HasFactory;
}

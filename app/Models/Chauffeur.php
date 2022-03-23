<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    protected $fillable = [
        'user_id',
        'numero_cni',
        'numero_permis',
        'statut_chauffeur'
    ];
    use HasFactory;
}

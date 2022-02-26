<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'nom_client',
        'prenom_client',
        'telephone_client',
        'motif demande',
        'date_depart',
        'date_retour',
        'nombre_de_place',
        'statut_convoiture'
    ];
    use HasFactory;
}

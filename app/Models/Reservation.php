<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'nom_client',
        'prenom_client',
        'telephone_client',
        'motif_demande',
        'ville_depart',
        'ville_destination',
        'date_depart',
        'date_retour',
        'nombre_de_place',
        'statut_chauffeur',
        'statut_convoiture',
        'statut_reservation',
        'statut_traitement',
    ];
    use HasFactory;
}

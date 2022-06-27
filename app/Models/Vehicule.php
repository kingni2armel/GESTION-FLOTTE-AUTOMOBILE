<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable =[
            'marque_id',
            'modele_id',
            'typeCarburant_id',
            'parking_id',
            'statut_vehicule',
            'immatriculation',
            'kilometrage',
            'numero_chassi',
            'date_debut_assurance',
            'date_fin_assurance',
            'path',
            'statut_vehicule'


    ];
    protected $dates =['expired_at'];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable =[
            'marque_id',
            'modele_id',
            'type_carburant_id',
            'parking_id',
            'immatriculation',
            'kilometrage',
            'numero_chassi',
            'date_debut_assurance',
            'date_fin_assurance',


    ];
    protected $dates =['expired_at'];
    use HasFactory;
}

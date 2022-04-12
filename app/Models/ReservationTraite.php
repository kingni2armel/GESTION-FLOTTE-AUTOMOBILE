<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationTraite extends Model
{
    protected $fillable = [
            'reservation_id',
            'chauffeur_id',
            'vehicule_id'

    ];
    use HasFactory;
}

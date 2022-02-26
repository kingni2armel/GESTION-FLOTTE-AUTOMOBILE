<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationSuperviseur extends Model
{
    protected $fillable = [
        'reservation_id',
        'superviseur_id'
    ];
    use HasFactory;
}

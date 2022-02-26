<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDispatcheur extends Model
{
    protected $fillable = [
        'reservation_id',
        'dispatcheur_id'
    ];
    use HasFactory;
}

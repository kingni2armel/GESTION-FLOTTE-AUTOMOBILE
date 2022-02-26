<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationChauffeur extends Model
{
    protected $fillable = [
        'reservation_id',
        'chaffeur_id'
    ];
    use HasFactory;
}

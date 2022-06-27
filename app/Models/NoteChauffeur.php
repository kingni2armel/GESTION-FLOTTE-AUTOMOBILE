<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteChauffeur extends Model
{
    use HasFactory;
    protected $fillable = [
            'chauffeur_id',
            'reservation_id',
            'client_id',
            'note_chauffeur',
            'commentaire'
    ];
}

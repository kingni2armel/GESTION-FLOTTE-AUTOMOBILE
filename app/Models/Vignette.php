<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vignette extends Model
{
    protected $fillable = [
        'date_vignette',
        'date_expiration',
        'commentaire'
    ];
    use HasFactory;
}

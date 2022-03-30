<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'direction_id',
        'departement_id',
        'service_id'
    ];
    use HasFactory;
}

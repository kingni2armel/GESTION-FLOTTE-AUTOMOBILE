<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable=[
            'nom',
            'prenom',
            'numero_telephone',
            'email',
            'password',
    ];
    use HasFactory;
}

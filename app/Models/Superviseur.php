<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superviseur extends Model
{
    protected $fillable = [
        'user_id'
    ];
    use HasFactory;
}
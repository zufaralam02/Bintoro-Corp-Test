<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name', 'birth_date', 'birth_place', 'gender',
    ];

    protected $casts = [
        'birth_date' => 'datetime:Y-m-d'
    ];
}

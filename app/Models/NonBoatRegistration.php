<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonBoatRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'address',
        'registration_no',
        'fisherfolk_id',
        'remarks',
        'date_registered',

    ];

}

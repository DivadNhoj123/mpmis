<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'address',
        'registration_no',
        'fisherfolk_id',
        'name_of_boat',
        'engine',
        'engine_serial',
        'hp',
        'color',
        'tonnage',
        'remarks',
        'date_registered',
    ];
}

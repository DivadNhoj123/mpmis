<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'middle_name',
        'surname',
        'suffix',
        'position',
        'barangay'
    ];
}

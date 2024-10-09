<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GearLicence extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'address',
        'tax_cert_no',
        'date_issued',
        'place_issued',
        'fishing_gear',
        'specs',
        'net_length',
        'net_depth',
        'net_mesh_size',
        'trap_length',
        'trap_height',
        'trap_width',
        'trap_mesh_size',
        'nylon',
        'hook_size',
        'hook_no',
    ];
}

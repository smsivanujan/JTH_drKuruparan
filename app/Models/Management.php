<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'managements';
    protected $fillable = [
        'plan_delivery',
        'mng_poa',
        'mng_mod',
        'avd',
        'em',
        'el',
    ];
}

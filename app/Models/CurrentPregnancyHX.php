<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrentPregnancyHX extends Model
{
    protected $table = 'current_pregnancy_hxs';
    protected $fillable = [
        'g',
        'p',
        'c',
        'married_year',
        'lmp',
        'edd',
        'working_edd',
    ];
}

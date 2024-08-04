<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentPregnancyHX extends Model
{
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

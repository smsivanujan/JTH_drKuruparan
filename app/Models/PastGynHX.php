<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastGynHX extends Model
{
    protected $table = 'past_gyn_hxs';
    protected $fillable = [
        'age',
        'amount',
        'PGHx_duration',
        'status',
        'aub',
        'contraception',
        'subfertility',
        'gender',
        'male_factors',
        'ovulatory_disorder',
        'tubal_factors',
        'uterine_factors',
    ];

    protected $casts = [
        'contraception' => 'array',
        'male_factors' => 'array',
        'ovulatory_disorder' => 'array',
        'tubal_factors' => 'array',
        'uterine_factors' => 'array',
    ];
}

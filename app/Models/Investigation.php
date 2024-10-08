<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    protected $table = 'investigations';
    protected $fillable = [
        'ctg',
        'tas',
        'hb',
        'plt',
        'wbc',
        'crp',
        'urine_full_report',
        'ohtt_bss',
        'antibiotics',
        'plan_delivery',
    ];
}

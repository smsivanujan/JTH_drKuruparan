<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObsExaminations extends Model
{
    protected $table = 'obs_examinations';
    protected $fillable = [
        'pallor',
        'odema',
        'bp',
        'pr',
        'thyroid_examination',
        'inspection',
        'sfh',
        'precentation',
        'lie',
        'position',
        'efw',
        'engagement',
        'liquor',
        'fhs',
        'cervical_dilatation',
        'effacement',
        'station',
        'cervical_consistency',
        'cervical_position',
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

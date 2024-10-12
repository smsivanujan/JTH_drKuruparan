<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObsExaminations extends Model
{
    protected $table = 'obs_examinations';
    protected $fillable = [
        'obs_general',
        'obs_systolic',
        'obs_diastolic',
        'obs_pulse_rate',
        'obs_thyroid_examination',
        'obs_inspection',
        'sfh',
        'lie',
        'position',
        'engagement',
        'fhs',
        'cervical_dilatation',
        'cervical_consistency',
        'cervical_canel',
        'cervical_position',
        'station',
        'fetus',
        'presentation',
        'bpd',
        'ac',
        'hc',
        'fl',
        'placental_position',
        'efw',
        'liquor',
        'dopplier',
    ];
}

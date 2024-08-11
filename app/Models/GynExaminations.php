<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GynExaminations extends Model
{
    protected $table = 'gyn_examinations';
    protected $fillable = [
        'pregnancy_id',
        'general',
        'height',
        'weight',
        'bmi',
        'temperature',
        'system',
        'pulse_rate',
        'rhythm',
        'systolic',
        'diastolic',
        'heart_sound',
        'memor',
        'breath_sound',
        'thyroid_examination',
        'abd_examination',
        'inspection',
        'stress_incontinence',
        'cervical',
        'os',
        'polyp_ulcer',
        'cervical_motion_tenderness',
        'direction',
        'adnexial_mass',
        'tas_uterus',
        'tvs_uterus',
        'endometrium',
        'adnexial_mass_scan',
        'problist',
        'medical_hx',
        'surgery_hx',
    ];
}

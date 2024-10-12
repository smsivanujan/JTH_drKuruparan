<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VitalMonitoring extends Model
{
    protected $table = 'vital_monitorings';
    protected $fillable = [
        'vm_systolic',
        'vm_diastolic',
        'vm_pulse_rate',
        'vm_temperature',
        'pph',
        'pph_i',
        'htn',
        'htn_i',
        'pp_psychosis_depressional',
        'pp_psychosis_depressional_i',
        'pp_sepsis',
        'pp_sepsis_i',
        'dvt',
        'dvt_i',
        'icu_admission',
        'icu_admission_i',
        'icu_admission_mx',
    ];
}

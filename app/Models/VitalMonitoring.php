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
        'htn',
        'pp_psychosis_depressional',
        'pp_sepsis',
        'dvt',
        'icu_admission',
    ];
}

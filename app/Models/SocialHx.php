<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialHx extends Model
{
    protected $table = 'social_hxs';
    protected $fillable = [
        'family_status',
        'monthly_income',
        'patient_education',
        'patient_occupation',
        'patient_social_problems',
        'partner_education',
        'partner_occupation',
        'partner_social_problems',
    ];

    // Cast the social problems to array
    protected $casts = [
        'patient_social_problems' => 'array',
        'partner_social_problems' => 'array',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastMedHxDrugs extends Model
{
    protected $table = 'past_med_hx_drugs';
    protected $fillable = [
        'drugpastmedhx_drug_name',
        'drugpastmedhx_dosage',
        'drugpastmedhx_dosage_unit',
        'drugpastmedhx_route',
        'drugpastmedhx_frequency',
    ];
}

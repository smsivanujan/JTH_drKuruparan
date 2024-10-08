<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementDrugs extends Model
{
    protected $table = 'management_drugs';
    protected $fillable = [
        'drugmng_drug_name',
        'drugmng_dosage',
        'drugmng_dosage_unit',
        'drugmng_route',
        'drugmng_frequency',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherHX extends Model
{
    protected $fillable = [
        'drugalergyhx',
        'food_allergy_hx',
        'past_surgery_hx',
        'family_hx',
        'social_hx',
    ];
}
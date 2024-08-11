<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastObsHX extends Model
{
    protected $table = 'past_obs_hxs';
    protected $fillable = [
        'year',
        'poa',
        'mod',
        'birth_weight',
        'remarks'
    ];
}

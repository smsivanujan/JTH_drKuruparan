<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastObsHX extends Model
{
    protected $table = 'past_obs_hxs';
    protected $fillable = [
        'year',
        'past_obs_poa',
        'past_obs_mod',
        'past_obs_birth_weight',
        'pastObshx_remark',
    ];
}

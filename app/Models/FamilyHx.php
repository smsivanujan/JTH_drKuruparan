<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyHx extends Model
{
    protected $table = 'family_hxs';
    protected $fillable = [
        'family_med_hx',
        'remarks',
    ];
}

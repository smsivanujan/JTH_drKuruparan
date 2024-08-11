<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastMedHX extends Model
{
    protected $table = 'past_med_hxs';
    protected $fillable = [
        'past_med_hx',
        'remarks',
    ];
}

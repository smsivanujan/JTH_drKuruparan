<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllergicHX extends Model
{
    protected $table = 'allergic_hxs';

    protected $fillable = [
        'pregnancy_id',
        'drugalergyhx',
        'foodallergyhx',
        'otherallergyhx',
    ];

    protected $casts = [
        'drugalergyhx' => 'array', // Automatically cast JSON to array
    ];
}

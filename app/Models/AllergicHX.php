<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllergicHX extends Model
{
    protected $table = 'allergic_hxs';

    protected $fillable = [
        'drugalergyhx',
        'foodallergyhx',
        'otherallergyhx',
    ];

    protected $casts = [
        'drugalergyhx' => 'array',
    ];
}

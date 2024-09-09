<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessPoint extends Model
{
    protected $table = 'access_points';
    protected $primarykey = 'id';

    protected $fillable = [
        'display_name',
        'value'

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessModel extends Model
{
    protected $table = 'access_models';
    protected $primarykey ='id';

    protected $fillable = [
        'name',
           
    ];
}

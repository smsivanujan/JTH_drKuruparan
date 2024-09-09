<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $primarykey ='id';

    protected $fillable = [
        'permision',
           
    ];
}

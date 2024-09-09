<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregnanacy extends Model
{
    protected $table = 'pregnanacies';
    protected $fillable = [
        'category',
    ];
}

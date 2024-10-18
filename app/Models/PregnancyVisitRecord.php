<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PregnancyVisitRecord extends Model
{
    protected $table = 'pregnancy_visit_records';
    protected $fillable = [
        'pregnancy_visit',
    ];
}

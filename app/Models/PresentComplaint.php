<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentComplaint extends Model
{
    protected $table = 'present_complaints';
    protected $fillable = [
        'complaint',
        'duration',
        'severity',
        'remarks',
    ];
}

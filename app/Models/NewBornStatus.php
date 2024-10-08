<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewBornStatus extends Model
{
    protected $table = 'new_born_statuses';
    protected $fillable = [
        'baby_dob',
        'baby_gender',
        'aphar',
        'nbs_birth_weight',
        'pbu_admission',
    ];
}

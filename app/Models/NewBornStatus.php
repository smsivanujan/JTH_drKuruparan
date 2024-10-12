<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewBornStatus extends Model
{
    protected $table = 'new_born_statuses';
    protected $fillable = [
        'baby_dob',
        'baby_gender',
        'apgar',
        'nbs_birth_weight',
        'pbu_admission',
        'pbu_admission_i',
    ];
}

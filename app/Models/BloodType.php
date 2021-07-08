<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $table = 'blood_types';
    protected $fillable = ['name'];
}

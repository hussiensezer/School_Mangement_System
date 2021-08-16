<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;
   protected $table = "teachers";
   protected $guarded = [];
    public $translatable = ['name'];

    public function gender() {
        return $this->belongsTo(Gender::class,'gender_id');
    }

    public function specialization() {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
}

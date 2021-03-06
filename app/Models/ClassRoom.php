<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClassRoom extends Model
{
    use HasTranslations;
    protected  $table = 'classrooms';
    protected $guarded = [];
    public $translatable = ['name'];
    public $timestamps = true;

    //Classroom Relations belongsTo
    public function grade() {
        return $this->belongsTo(Grade::class);
    }
    // ClassRoom Has Many Sections

    public function sections() {
        return $this->hasMany(ClassRoom::class);
    }

    public function getNameAttribute($name) {

        return ucfirst($name);
    }
}

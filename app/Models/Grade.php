<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Grade extends Model
{
    use HasTranslations;
    protected $table = 'grades';
    public $translatable = ['name'];
    protected $guarded = [];
    public $timestamps = true;

    public function classrooms(){
        return $this->hasMany(ClassRoom::class);
    }
    public function sections(){
        return $this->hasMany(Section::class);
    }
    public function getNameAttribute($name) {

        return ucfirst($name);
    }
}

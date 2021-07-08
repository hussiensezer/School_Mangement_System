<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    protected $table = 'sections';
    public $translatable = ['name'];
    protected $guarded = [];
    public $timestamps = true;

    //Grade Relations
    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    //Classroom Relations
    public function classroom() {
        return $this->belongsTo(ClassRoom::class);
    }


    public function getNameAttribute($name) {

        return ucfirst($name);
    }//End Of Name
}

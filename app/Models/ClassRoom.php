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

    public function grade() {
        return $this->belongsTo(Grade::class);
    }
}

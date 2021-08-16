<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialization extends Model
{
    use HasTranslations;
    protected $table = "specializations";
    public $translatable = ['name'];
    protected $fillable = ['name'];

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}

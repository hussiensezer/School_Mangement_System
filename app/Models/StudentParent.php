<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StudentParent extends Model
{
    use HasTranslations;
    protected $table = "student_parents";
    public $translatable = ['father_name','mother_name','father_job',"mother_job"];
    protected $guarded = [];

    public function parentAttachment() {
        return $this->hasOne(ParentAttachment::class,"parent_id",'id');
    }

}

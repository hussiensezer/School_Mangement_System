<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{
   protected $table = "parent_attachments";
   public $fillable = ['file_name','parent_id'];


    public function studentParent() {
        return $this->belongsTo(StudentParent::class);
    }

}

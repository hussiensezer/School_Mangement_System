<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
  public function imageStore ($photo,$path) {

      $input_file =  $photo->getClientOriginalName();
      $file_Extensions =  $photo->getClientOriginalExtension();

      $hashPath = md5($input_file .  now()) . "." . $file_Extensions ;
      $dataPath = Storage::disk('parent')->putFileAs("imageStore", $photo, $hashPath);


      return $hashPath;

  }// End ImageStore
}

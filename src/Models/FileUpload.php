<?php

namespace Otif\Dropzone\Models;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{

    //
    protected $guarded=[];



    public static function getFileByName($name)
    {
        return FileUpload::where('original_name','=',$name)->first();
    }
    public function getAssetLink($id)
    {
        $file = FileUpload::where('id','=',$id)->first();

        return asset('/images/'.$file->filename);
    }
}

<?php

namespace Otifsolutions\Dropzone\Http\Controllers;


use App\Http\Controllers\Controller;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Otifsolutions\Dropzone\Models\FileUpload;

class UploadFileController extends Controller
{



    public function destroy($id)
    {
        $current = FileUpload::getFileByName($id);
        $filename = $current->filename;
        FileUpload::where('id',$current->id)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;

    }
    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();

        $filename = Str::random().".". $request->file('file')->extension();
        $image->move(public_path('images'),$filename);
        FileUpload::create([
            'original_name' => $imageName,
            'filename'=> $filename,

        ]);
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        FileUpload::where('original_name',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return response()->json(['success'=> "DELETED"]);
    }



}

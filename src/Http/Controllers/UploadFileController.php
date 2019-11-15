<?php

namespace Otif\Dropzone\Http\Controllers;


use App\Http\Controllers\Controller;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Otif\Dropzone\Models\FileUpload;

class UploadFileController extends Controller
{
    //

    public function getBaseLink()
    {
        return "C://" . $_SERVER['SERVER_NAME'] . "/";
    }
    public function getAssetLink($id)
    {
        $file = FileUpload::where('id','=',$id)->first();

        return asset('/images/'.$file->filename);
    }
    public function dropzone()
    {
        return view('Dropzone::dropzone');
    }

    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();

        $random = Str::random();
        $ext =  ".". $request->file('file')->extension();

        $filename = $random.$ext;


        $image->move(public_path('images'),$filename);

        $imageUpload = new FileUpload();
        $imageUpload->original_name = $imageName;
        $imageUpload->filename = $filename;
        $imageUpload->save();
        $url = asset('images/'.$filename);
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
        return $filename;
    }



    public function search(Request $request)
    {
        $wantedfile =  FileUpload::getFileByName($request->checkfilename);
        echo $wantedfile;
        $forlink = $wantedfile->id;
     echo " <br> ASSET LINK is ".  $this->getAssetLink($forlink). "   <br> And Base LINK IS". $this->getBaseLink();


    }
    public function index()
    {
        return view('Dropzone::mypackage');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'fileToUpload' => 'required'

        ]);


        $file = $request->file('fileToUpload');

        $name = $file->getClientOriginalName();
        $random = Str::random();
        $ext =  ".". $request->file('fileToUpload')->extension();

        $filename = $random.$ext;

        $file->move('images', $filename);

        $newfile = new FileUpload([
            'original_name'=>$name,
            'filename'=>$random,
        ]);
        $newfile->save();

        $url = asset('images/'.$filename);
        return back();




    }
}

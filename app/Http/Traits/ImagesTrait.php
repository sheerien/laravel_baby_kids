<?php
namespace App\Http\Traits;


trait ImagesTrait
{
    private function uploadImage($file, $fileName, $path, $oldFile = null)
    {
        $ext = $file->getClientOriginalExtension();
        // $ext = $file->extension();
        // $ext = 'png';
        $file_name = time() . $fileName . '.' . $ext;
        $file->move(public_path('images/' . $path), $file_name);
        if(!is_null($oldFile)){
            unlink(public_path($oldFile));
        }
        return $file_name;
    }
}
<?php

namespace App\Traits;


use Illuminate\Support\Facades\Storage;

trait FileUploaderTrait {

    /**
     * Handle an incoming File.
     *
     * @param $File or image that is to be validated
     *@param $ToWhichFolder you need to move the image or file
     * @return string|bool
     */
    function UploadFile($File): string|bool
    {
        if (!empty($File)) {
            $FileName = time() .$File->getClientOriginalName();
            //$Done = $File->move(public_path('storage/'), $FileName);
            $Done = Storage::disk('files')->put($FileName, $File);
            if ($Done) {
                return $FileName;
            }
            return false;
        } else {
            return false;
        }
    }

    /*
     * $FILENAME => THE NAME OF THE FILE YOU WANT TO DELETE
     * $FromWhichFolder => the image folder(UserImages-BooksImages-BooksFiles)
     * unlink(string $filename, ?resource $context = null): bool
     * */
    function DeleteFile($Filename){
        $file = str_replace(asset('storage/'),"",$Filename);
        if (unlink(unlink(public_path("storage".$file)))){
            return true;
        }
        return false;
    }
    public function uploadUserImage($Image): bool|string
    {
        return $this->UploadFile($Image);
    }

    public function deleteArrayOfImages($images)
    {
        foreach ($images as $image)
        {
            //dd($image->image);
            $img = str_replace(asset('storage/'),"",$image->image);
           //dd($img,public_path("storage".$img));
            unlink(public_path("storage".$img));
        }
    }
}

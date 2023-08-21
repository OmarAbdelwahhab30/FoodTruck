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
            $Done = $File->move(public_path('storage/'), $FileName);
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
        if (unlink($Filename)){
            return true;
        }
        return false;
    }

    function deleteFileByCompletePath($image)
    {
        unlink($image);
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

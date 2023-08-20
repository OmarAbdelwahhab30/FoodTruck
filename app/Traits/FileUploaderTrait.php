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
            $extension = pathinfo($File->getClientOriginalName(), PATHINFO_EXTENSION);
            $FileName = time() .$File->getClientOriginalName().".".$extension;
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
        if (unlink(public_path('storage/'.$Filename))){
            return true;
        }
        return false;
    }

    function deleteFileByCompletePath($image)
    {
        unlink(public_path('storage'.DIRECTORY_SEPARATOR.$image));
    }
    public function uploadUserImage($Image): bool|string
    {
        return $this->UploadFile($Image);
    }
}

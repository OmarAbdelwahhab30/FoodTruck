<?php

namespace App\Services\Auth\UpdateAccountInformation;

use App\Models\User;

class UpdateAccountInformationService
{


    public function UpdateAccountInformation($request)
    {
        $user_id = auth("sanctum")->user()->id;
        return User::where("id",$user_id)->update(array_filter($request->all())); // except empty fields
    }
}

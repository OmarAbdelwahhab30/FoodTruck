<?php

namespace App\Services\Auth\UpdateAccountInformation;

use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;

class UpdateAccountInformationService extends Service
{


    public function UpdateAccountInformation($request)
    {
        $user_id = auth("sanctum")->user()->id;
        return User::where("id",$user_id)->update(array_filter($request->all())); // except empty fields
    }

    public function ChangePassword($request)
    {
        $checked = $this->CheckOldPassword($request->current_password);
        if ($checked === false){
            return false;
        }else{
            $user_id = auth("sanctum")->user()->id;
            $done = User::where("id",$user_id)->update([
                'password'  =>  Hash::make($request->new_password),
            ]);
            if ($done){
                return true;
            }
            return false;
        }
    }

    public function CheckOldPassword($password)
    {
        if (Hash::check($password,auth("sanctum")->user()->password))
        {
            return true;
        }
        return false;
    }
}

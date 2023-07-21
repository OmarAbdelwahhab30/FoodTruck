<?php

namespace App\Services\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordService extends Controller
{

    public function createNewPassword($request)
    {
        $updated = User::where('phone',$request->phone)->update([
            "password" => Hash::make($request->password),
        ]);
        if ($updated){
            $user = (new LoginService())->login($request);
            return $user;
        }
        return false;
    }

    public function IsPhoneNumberExists($request): bool
    {
        $user = User::where("phone",$request->phone)->first();
        if ($user == null){
            return false;
        }
        return true;
    }
}

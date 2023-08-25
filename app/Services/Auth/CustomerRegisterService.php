<?php

namespace App\Services\Auth;

use App\Interfaces\Auth\RegisterInterface;
use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerRegisterService extends Service implements RegisterInterface
{

    public function register($request)
    {
        $Role_ID = $this->GetRoleID($request->role);
        return DB::transaction(function ()use ($request,$Role_ID){
            $user = User::create([
                'name'      => $request->name,
                'phone'     => $request->phone,
                'password'  => Hash::make($request->password),
                'email'     => $request->email,
                'role_id'   => $Role_ID,
                'active'    => 1,
                'accepted'  => 1,
                'image'     => $request->file("image") !== null ?
                    $this->UploadFile($request->file("image"))
                    :"default.png",
            ]);
            $user->token = $this->createToken($user);
            $cart = Cart::create([
                'user_id' => $user->id,
                'truck_id' => null,
            ]);
            $user->cart = $cart;
            return $user;
        });

    }

    private function createToken(User $user)
    {
        return $user->createToken("personal access token")->plainTextToken;
    }

    private function GetRoleID($role_name)
    {
        return Role::where("name",$role_name)->first()->id;
    }


}

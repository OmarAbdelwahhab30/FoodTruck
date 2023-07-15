<?php

namespace App\Services\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{

    public function register($request)
    {
        $Role_ID = $this->GetRoleID($request->role);
        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   => $Role_ID,
        ]);
        $user->token = $this->createToken($user);
        return $user;
    }

    private function createToken(User $user){
        return $user->createToken("personal access token")->plainTextToken;
    }

    private function GetRoleID($role_name)
    {
        return Role::where("name",$role_name)->first()->id;
    }
}

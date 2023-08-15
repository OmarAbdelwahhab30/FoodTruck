<?php

namespace App\Http\Controllers\admin\update_account;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UpdateAdminAccountController extends Controller
{

    public function index()
    {
        return view("admin.update-account.update-profile");
    }

    public function updateProfile(UpdateProfileRequest $request): \Illuminate\Http\RedirectResponse
    {


        $user = auth("web")->user();
        $updated = User::where("id",$user->id)->update(Arr::except(array_filter($request->validated()),
            ['image','password','confirm_password']));
        if ($request->password!== null){
            $user->password = Hash::make($request->password);
        }
        if ($request->def == "default.png"){
            $user->image = "storage/images/default.png";
            $user->save();
        } elseif ($request->file("image")!== null){
            $user->image = env("APP_URL")."storage/images/admins/".
                $this->UploadFile($request->file("image"),"images/admins/");
            $user->save();
        }
        if ($updated){
            return redirect()->back()->with("success", "Your profile has been updated successfully.");
        }
        return redirect()->back()->with("error", "Some thing went wrong , try again later.");
    }
}

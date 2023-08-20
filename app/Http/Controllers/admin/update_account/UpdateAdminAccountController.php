<?php

namespace App\Http\Controllers\admin\update_account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Models\User;
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
            $user->image = "default.png";
            $user->save();
        } elseif ($request->file("image")!== null){
            $user->image = $this->UploadFile($request->file("image"));
            $user->save();
        }
        if ($updated){
            return redirect()->back()->with("success", __("admin.Your profile has been updated successfully"));
        }
        return redirect()->back()->with("error", __("admin.Something went wrong try again later"));
    }
}

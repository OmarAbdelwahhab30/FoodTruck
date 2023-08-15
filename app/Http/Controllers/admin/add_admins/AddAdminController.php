<?php

namespace App\Http\Controllers\admin\add_admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddAdminImageRequest;
use App\Http\Requests\Admin\AddAdminRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddAdminController extends Controller
{

    public function index()
    {
        return view("admin.add_admins.add-admin");
    }

    public function addAdmin(AddAdminRequest $request)
    {
        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' =>$request->phone,
            'role_id'   => Role::ROLE_ADMINISTRATOR,
            'password'  => Hash::make($request->password),
            'image'     => $request->file("image") !== null ?
                env("APP_URL")."storage/images/admins/".$this->UploadFile($request->file("image")
                    ,"images/admins/")
                :env("APP_URL")."storage/images/default.png",
        ]);
        if ($user){
            return redirect()->back()->with("success", "Admin has been added successfully.");
        }
        return redirect()->back()->with("error", "Some thing went wrong , try again later.");
    }
}

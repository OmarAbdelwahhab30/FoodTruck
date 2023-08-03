<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("admin.auth.login");
    }

    public function postLogin(Request $request): \Illuminate\Http\RedirectResponse
    {

        if(auth()->guard('web')
            ->attempt(['name' => $request->input('name')
            ,'password' => $request->input('password')],isset($request->remember))
        ){
            return redirect()->route('admin.home')->with('success','You are Logged in successfully.');
        }else {
            return redirect()->back()->withInput()->with('error','Whoops! invalid name or password.');
        }
    }

    public function logout(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        auth()->guard('web')->logout();
        Session::flush();
        return redirect("/admin")->with("success","You are logged out successfully.");
    }
}

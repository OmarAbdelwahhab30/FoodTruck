<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ForgetPasswordRequest;
use App\Http\Requests\Admin\ResetPasswordRequest;
use App\Mail\NotifyMail;
use App\Models\User;
use App\Mail\RecoveryPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ForgetPasswordController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("admin.auth.forget-password");
    }

    public function send($to , $data){
        Mail::to($to)->send(new RecoveryPasswordMail($data));
    }
    public function postForget(ForgetPasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $code = Str::random(5);
        $data =[
            'subject' => 'FoodTruck recovery email',
            'body'    => "Your Recovery code is ".$code,
        ];
        $this->send($request->email , $data);
        $email = $request->email;
        return redirect()->route("admin.post.add.password")
            ->with("success", __("admin.Code has sent to you, Check it please"))
            ->with("email",$email)
            ->with("code",$code);
    }

    public function resetPassIndex()
    {
        return view("admin.auth.add-new-password");
    }
    public function resetPass(ResetPasswordRequest $request)
    {
        if ($request->code != $request->iscode){
            return redirect()->to(LaravelLocalization::getCurrentLocale()."/admin")
                ->with("error",__("admin.The Code is not correct try again"));
        }
        $updated = User::where("email",$request->email)->update([
            'password' => Hash::make($request->password),
        ]);
        if ($updated){
            return redirect()->route('admin.login')->with('success',__("admin.Password has been reset successfully"));
        }else {
            return redirect()->back()->withInput()->with('error',__("admin.Code is not correct"));
        }
    }

}

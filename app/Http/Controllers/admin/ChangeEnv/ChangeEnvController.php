<?php

namespace App\Http\Controllers\admin\ChangeEnv;

use App\Http\Controllers\Controller;

class ChangeEnvController extends Controller
{

    private $arr = [
        'PUSHER' => [
            'PUSHER_APP_ID',
            'PUSHER_APP_KEY',
            'PUSHER_APP_SECRET',
            'PUSHER_APP_CLUSTER'
        ],
        'VONAGE' => [
            'VONAGE_KEY',
            'VONAGE_SECRET',
        ],
        'CHECKOUT' => [
            'CHECKOUT_APP_KEY',
            'CHECKOUT_APP_SECRET',
            'CHECKOUT_PROCESSING_CHANNEL_ID',
        ],
        'Paypal' => [
            'PAYPAL_CLIENT_ID',
            'PAYPAL_SECRET',
            'PAYPAL_CURRENCY',
            'PAYPAL_MODE'
        ],
    ];
    public function index()
    {
        $arr = collect($this->arr);
        return view("admin.env.index",compact('arr'));
    }

    public function change(\Illuminate\Http\Request $request)
    {

        $arr = $this->HandleRequest($request);
        foreach ($arr as $key => $value){
            $this->changeEnv($key,$value);
        }
        return redirect()->back()->with("success", __("admin.The value has been changed successfully"));
    }

    private function HandleRequest($request): array
    {
        $arr = $request->toArray();
        unset($arr['_token']);
        return array_filter($arr);
    }
}

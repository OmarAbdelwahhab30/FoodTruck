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
        'OneSignal' => [
            'ONE_SIGNAL_APP_ID',
            'ONE_SIGNAL_AUTHORIZE',     // REST API KEY
        ],
    ];
    public function index()
    {
        $arr = collect($this->arr);
        return view("admin.env.index",compact('arr'));
    }

    public function change(\Illuminate\Http\Request $request)
    {
        $return = $this->changeEnv($request->key, $request->value);
        if ($return) {
            return redirect()->back()->with("success", __("admin.The value has been changed successfully"));
        }
        return redirect()->back()->with("error", __("admin.Something went wrong try again later"));
    }
}

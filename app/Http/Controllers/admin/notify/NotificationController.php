<?php

namespace App\Http\Controllers\admin\notify;

use App\Events\SendNotificationEvent;
use App\Http\Requests\Admin\ControlNotificationsRequest;
use App\Models\User;

class NotificationController
{


    public function index()
    {
        return view("admin.notify.index");
    }

    public function notify(ControlNotificationsRequest $request)
    {

        $users = User::where("role_id",1)->select("player_id")->get();
        //dd($users);
        SendNotificationEvent::dispatch($users,$request->notification);

    }
}

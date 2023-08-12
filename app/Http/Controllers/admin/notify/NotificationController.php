<?php

namespace App\Http\Controllers\admin\notify;

use App\Events\SendNotificationEvent;
use App\Http\Requests\Admin\ControlNotificationsRequest;
use App\Jobs\SendNotifications;
use App\Models\Role;
use App\Models\User;
use Ladumor\OneSignal\OneSignal;

class NotificationController
{


    public function index()
    {
        return view("admin.notify.index");
    }

    public function notify(ControlNotificationsRequest $request)
    {
        $users = [];
        if ($request->check && count($request->check) > 1 ) {
            $users = User::where("role_id","<>", Role::ROLE_ADMINISTRATOR)->select("player_id")->get();
        } elseif ($request->check && count($request->check) == 1) {
            if ($request->check[0] == "users"){
                $users = User::where("role_id", 1)->select("player_id")->get();
            }elseif ($request->check[0] == "sellers"){
                $users = User::where("role_id", 2)->select("player_id")->get();
            }
        }
        SendNotifications::dispatch($users, $request->notification);
        return redirect()->back()->with("success","Notification has been sent to the selected users");
    }
}

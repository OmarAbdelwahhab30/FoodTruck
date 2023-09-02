<?php

namespace App\Http\Controllers\admin\notify;

use App\Http\Requests\Admin\ControlNotificationsRequest;
use App\Jobs\SendNotifications;
use App\Models\Role;
use App\Models\User;
use App\Models\User_Notification;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Contract\Messaging;

class NotificationController
{

    private Messaging $messaging;

    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    public function index()
    {
        return view("admin.notify.index");
    }

    /**
     * @throws MessagingException
     * @throws FirebaseException
     */
    public function notify(ControlNotificationsRequest $request)
    {
        if (empty($request->check[0])) {
            return redirect()->back()->with("error", __("admin.Please choose at least one of checkboxes!"));
        }
        $topic = "";
        if ($request->check && count($request->check) > 1) {
            $topic = "both";
            $this->SaveNotificationToDBForAll($request->notification);
        } elseif ($request->check && count($request->check) == 1) {
            if ($request->check[0] == "users") {
                $topic = "customers";
                $this->SaveNotificationToDBForCustomers($request->notification);
            } elseif ($request->check[0] == "sellers") {
                $topic = "sellers";
                $this->SaveNotificationToDBForSellers($request->notification);
            }
        }
        $message = CloudMessage::withTarget('topic', $topic)->withNotification([$request->notification]);
        $this-> messaging->send($message);
        return redirect()->back()->with("success", __("admin.Notification has been sent to the selected users"));
    }

    private function SaveNotificationToDBForSellers($notification)
    {
        $users = User::where("role_id", Role::ROLE_SELLER)->get("id");
        foreach ($users as $user) {
            User_Notification::create([
                'notification_ar' => $notification,
                'notification_en' => $notification,
                'user_id' => $user->id
            ]);
        }
    }

    private function SaveNotificationToDBForCustomers($notification)
    {
        $users = User::where("role_id", Role::ROLE_CUSTOMER)->get("id");
        foreach ($users as $user) {
            User_Notification::create([
                'notification_ar' => $notification,
                'notification_en' => $notification,
                'user_id' => $user->id
            ]);
        }
    }

    private function SaveNotificationToDBForAll($notification)
    {
        $users = User::where("role_id", Role::ROLE_SELLER)->where("role_id", Role::ROLE_CUSTOMER)->get("id");
        foreach ($users as $user) {
            User_Notification::create([
                'notification_ar' => $notification,
                'notification_en' => $notification,
                'user_id' => $user->id
            ]);
        }
    }
}

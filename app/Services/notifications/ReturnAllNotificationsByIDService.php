<?php

namespace App\Services\notifications;

use App\Models\Notification;
use Ladumor\OneSignal\OneSignal;

class ReturnAllNotificationsByIDService extends \App\Services\Service
{


    public function ReturnNotificationsByUserID(): array
    {

        $user_id = auth("sanctum")->user()->id;
        $notifications = Notification::where("user_id",$user_id)->select("notification_id")->get();
        $collections = [];
        foreach ($notifications as $notification){
            $collections[] = OneSignal::getNotification($notification->notification_id);
        }
        return $collections;
    }
}

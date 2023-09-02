<?php

namespace App\Services\notifications;

use App\Models\Notification;
use App\Models\User_Notification;

class ReturnAllNotificationsByIDService extends \App\Services\Service
{
    public function ReturnNotificationsByUserID()
    {
        $user_id = auth("sanctum")->user()->id;
        return User_Notification::where("user_id",$user_id)->with("sender")
            ->select("id","notification_".app()->getLocale()." as notification","created_at","sender_id")
            ->orderBy("created_at","ASC")
            ->get();
    }
}

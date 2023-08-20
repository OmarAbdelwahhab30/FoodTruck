<?php

namespace App\Services\notifications;

use App\Models\Notification;

class ReturnAllNotificationsByIDService extends \App\Services\Service
{
    public function ReturnNotificationsByUserID(): array
    {
        $user_id = auth("sanctum")->user()->id;
        return Notification::where("user_id",$user_id)->select("id","notification_".app()->getLocale())->get();
    }
}

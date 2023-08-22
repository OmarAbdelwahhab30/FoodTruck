<?php

namespace App\Services\notifications;

use App\Models\Notification;
use App\Models\User;

class StoreNotificationsService extends \App\Services\Service
{
    public function StoreNotifications($request): bool
    {
        $created = Notification::create([
            'notification_ar' =>$request->notification_ar,
            'notification_en' =>$request->notification_en,
            'user_id' =>$request->user_id,
        ]);
        if ($created){
            return true;
        }
        return false;
    }
}

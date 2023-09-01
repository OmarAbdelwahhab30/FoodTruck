<?php

namespace App\Traits;

use App\Abstracts\Notification;
use Kreait\Firebase\Messaging\CloudMessage;

trait FirebaseNotificationsTrait
{


    public function PushNotification()
    {

    }

    private function AddNotificationToDB($id, $receiver_id): void
    {
        Notification::create([
            'notification_id' => $id,
            'user_id' => $receiver_id,
        ]);
    }
}



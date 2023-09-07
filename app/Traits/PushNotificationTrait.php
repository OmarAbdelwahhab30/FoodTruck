<?php

namespace App\Traits;

use App\Abstracts\Notification;

use App\Models\User_Notification;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Messaging\CloudMessage;

trait PushNotificationTrait
{
    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    /**
     * @throws MessagingException
     * @throws FirebaseException
     */
    public function PushNotification($device_token, $type, $receiver_id, $sender_id, $user_name = false)
    {
        $notifications = [];
        if ($user_name !== false) {
            $notifications = $this->GetNotificationsWithReplacement($type, $user_name);
        } else {
            $notifications = $this->GetNotificationsWithoutReplacement($type);
        }
        $this->AddNotificationToDB($notifications, $receiver_id, $sender_id);

        if ($device_token != null) {

            $message = CloudMessage::withTarget('token', $device_token)
                ->withNotification(
                    \Kreait\Firebase\Messaging\Notification::create(
                        'FoodTruck Notification',
                        $notifications['notification_ar'] . " \n " . $notifications['notification_en']
                    ));
            try {
                $this->messaging->send($message);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => $e->getCode(),
                    'message ' => $e->getMessage(),
                ]);
            }
        }
    }

    private function AddNotificationToDB($notifications, $receiver_id, $sender_id): void
    {
        User_Notification::create([
            'notification_ar' => $notifications['notification_ar'],
            'notification_en' => $notifications['notification_en'],
            'user_id' => $receiver_id,
            'sender_id' => $sender_id,
        ]);
    }

    private function GetNotificationsWithReplacement($type, $user_name): array|string
    {
        $notification_ar = $this->getArNotification($type);
        $notification_en = $this->getEnNotification($type);
        $notification_en = str_replace("@", $user_name . " ", $notification_en);
        $notification_ar = $this->ExplodeNotificationInArabic($user_name, $notification_ar);

        return [
            'notification_ar' => $notification_ar,
            'notification_en' => $notification_en,
        ];
    }

    private function ExplodeNotificationInArabic($user_name, $notification_ar)
    {
        $parts = explode('@', $notification_ar, 2);
        return trim($parts[1]) . ' ' . $user_name . ' ' . trim($parts[0]);
    }

    private function GetNotificationsWithoutReplacement($type): array
    {
        $notification_ar = $this->getArNotification($type);
        $notification_en = $this->getEnNotification($type);
        return [
            'notification_ar' => $notification_ar,
            'notification_en' => $notification_en,
        ];
    }

    private function getArNotification($type)
    {
        return \App\Models\Notification::find($type)->notification_ar;
    }

    private function getEnNotification($type)
    {
        return \App\Models\Notification::find($type)->notification_en;
    }
}



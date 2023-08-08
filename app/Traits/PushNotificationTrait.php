<?php

namespace App\Traits;

use App\Abstracts\Notification;
use App\Models\ArNotification;
use App\Models\EnNotification;
use Ladumor\OneSignal\OneSignal;

trait PushNotificationTrait
{


    public function PushNotification($player_id, $type, $user_name = false): void
    {
        $fields['include_player_ids'] = [$player_id];

        if ($user_name !== false) {
            $messages = $this->GetNotificationsWithReplacement($type, $user_name);
        }else{
            $messages = $this->GetNotificationsWithoutReplacement($type);
        }

        $fields['contents'] = array(
        "en" => $messages['message_en'],
        "ar" => $messages['message_ar'],
        );

        OneSignal::sendPush($fields);
    }

    private function GetNotificationsWithReplacement($type, $user_name): array|string
    {

        $message_ar = $this->getArNotification($type);
        $message_en = $this->getEnNotification($type);
        $message_en = str_replace("@", $user_name . " ", $message_en);
        $message_ar = str_replace("@", $user_name . " ", $message_ar);
        return [
            'message_ar' => $message_ar,
            'message_en' => $message_en,
        ];
    }

    private function GetNotificationsWithoutReplacement($type): array
    {
        $message_ar = $this->getArNotification($type);
        $message_en = $this->getEnNotification($type);
        return [
            'message_ar' => $message_ar,
            'message_en' => $message_en,
        ];
    }

    private function getArNotification($type)
    {
        return ArNotification::find($type)->value;
    }



    private function getEnNotification($type)
    {
        return EnNotification::find($type)->value;
    }
}



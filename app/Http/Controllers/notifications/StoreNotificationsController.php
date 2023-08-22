<?php

namespace App\Http\Controllers\notifications;

use App\Http\Controllers\Controller;
use App\Http\Requests\notifications\StoreNotificationRequest;
use App\Services\notifications\StoreNotificationsService;


class StoreNotificationsController extends Controller
{
    public function StoreNotifications(StoreNotificationRequest $request,StoreNotificationsService $service ): \Illuminate\Http\JsonResponse
    {
        $notifications = $service->StoreNotifications($request);
        if ($notifications)
        {
            return $this->returnSuccessMessage("notification has been saved successfully.");
        }
        return $this->returnError("some thing went wrong");
    }
}


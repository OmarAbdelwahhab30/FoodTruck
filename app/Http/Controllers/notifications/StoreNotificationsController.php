<?php

namespace App\Http\Controllers\notifications;

use App\Http\Controllers\Controller;
use App\Http\Requests\notifications\StoreNotificationRequest;
use App\Services\notifications\StoreNotificationsService;
use Illuminate\Support\Facades\Gate;


class StoreNotificationsController extends Controller
{
    public function StoreNotifications(StoreNotificationRequest $request,StoreNotificationsService $service ): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("store-notifications")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $notifications = $service->StoreNotifications($request);
        if ($notifications)
        {
            return $this->returnSuccessMessage("notification has been saved successfully.");
        }
        return $this->returnError("some thing went wrong");
    }
}


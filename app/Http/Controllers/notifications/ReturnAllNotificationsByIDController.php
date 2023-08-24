<?php

namespace App\Http\Controllers\notifications;

use App\Http\Controllers\Controller;
use App\Http\Requests\notifications\ReturnNotificationsRequest;
use App\Services\notifications\ReturnAllNotificationsByIDService;
use Illuminate\Support\Facades\Gate;

class ReturnAllNotificationsByIDController extends Controller
{


    public function ReturnNotificationsByUserID(ReturnAllNotificationsByIDService $service ): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("get-notifications")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $notifications = $service->ReturnNotificationsByUserID();
        if ($notifications){
            return $this->returnData("notifications",$notifications,"All notifications");
        }
        return $this->returnError(__("responses.no notifications are available"));
    }
}

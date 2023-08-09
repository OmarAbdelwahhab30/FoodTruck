<?php

namespace App\Http\Controllers\notifications;

use App\Http\Controllers\Controller;
use App\Services\notifications\ReturnAllNotificationsByIDService;
use Illuminate\Http\Request;

class ReturnAllNotificationsByIDController extends Controller
{


    public function ReturnNotificationsByUserID(ReturnAllNotificationsByIDService $service ): \Illuminate\Http\JsonResponse
    {
        $notifications = $service->ReturnNotificationsByUserID();
        if ($notifications){
            return $this->returnData("notifications",$notifications,"All notifications");
        }
        return $this->returnError("no notifications are available");
    }
}

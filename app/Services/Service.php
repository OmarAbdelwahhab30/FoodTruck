<?php

namespace App\Services;

use App\Traits\ApiResponseHandler;
use App\Traits\FileUploaderTrait;
use App\Traits\PushNotificationTrait;

class Service
{

     use ApiResponseHandler,FileUploaderTrait,PushNotificationTrait;
}

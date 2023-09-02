<?php

namespace App\Services;

use App\Traits\ApiResponseHandler;
use App\Traits\CurrentTimeTrait;
use App\Traits\FileUploaderTrait;
use App\Traits\PushNotificationTrait;
use App\Traits\WalletTrait;

class Service
{

     use ApiResponseHandler,FileUploaderTrait,PushNotificationTrait,WalletTrait,CurrentTimeTrait;

    private \Kreait\Firebase\Contract\Messaging $messaging;
}

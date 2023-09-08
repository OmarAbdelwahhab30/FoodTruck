<?php

namespace App\Services;

use App\Traits\ApiResponseHandler;
use App\Traits\CurrentTimeTrait;
use App\Traits\FileUploaderTrait;
use App\Traits\PushNotificationTrait;
use App\Traits\WalletTrait;
use Kreait\Firebase\Contract\Messaging;

class Service
{

     use ApiResponseHandler,FileUploaderTrait,WalletTrait,CurrentTimeTrait;

    //public \Kreait\Firebase\Contract\Messaging $messaging;


}

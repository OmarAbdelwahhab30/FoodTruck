<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseHandler;
use App\Traits\FileUploaderTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,ApiResponseHandler,FileUploaderTrait;
}

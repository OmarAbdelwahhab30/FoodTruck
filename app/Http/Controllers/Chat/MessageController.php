<?php

namespace App\Http\Controllers\Chat;

use App\Events\Chat\SendMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\SendMesaageRequest;
use App\Http\Requests\Chats\loadMessagesRequest;
use App\lib\PusherFactory;
use App\Models\Chat;
use App\Models\Message;
use App\Services\Chats\MessageService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Pusher\ApiErrorException;
use Pusher\PusherException;

class MessageController extends Controller
{


    public function sendMessage(SendMesaageRequest $request, MessageService $service)
   {
       if (!Gate::allows("send-message")){
           return $this->notAuthorized("You don't have the authorization on this action.");
       }
       $service->SendMessage($request);
   }

   public function LoadLatestMessages(loadMessagesRequest $request,MessageService $service): \Illuminate\Http\JsonResponse
   {
       if (!Gate::allows("load-latest-message")){
           return $this->notAuthorized("You don't have the authorization on this action.");
       }
      return $this->returnData("messages",$service->LoadLatestMessages($request),"Here are the latest messages");
   }

}

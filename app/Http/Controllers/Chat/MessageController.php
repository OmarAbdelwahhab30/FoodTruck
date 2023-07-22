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
use Pusher\ApiErrorException;
use Pusher\PusherException;

class MessageController extends Controller
{

    /**
     * @throws PusherException
     * @throws ApiErrorException
     * @throws GuzzleException
     */
    public function sendMessage(SendMesaageRequest $request, MessageService $service)
   {
       $service->SendMessage($request);
   }

   public function LoadLatestMessages(loadMessagesRequest $request,MessageService $service): \Illuminate\Http\JsonResponse
   {
      return $this->returnData("messages",$service->LoadLatestMessages($request),"Here are the latest messages");
   }

}

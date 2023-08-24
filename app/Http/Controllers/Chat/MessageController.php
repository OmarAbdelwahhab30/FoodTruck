<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\SendMesaageRequest;
use App\Http\Requests\Chats\loadMessagesRequest;
use App\Services\Chats\MessageService;
use Illuminate\Support\Facades\Gate;

class MessageController extends Controller
{


    public function sendMessage(SendMesaageRequest $request, MessageService $service)
   {
       if (!Gate::allows("send-message")){
           return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
       }
       $message = $service->SendMessage($request,$request->to_user);
       return  $this->returnData("msg",$message,"message is here");
   }

   public function LoadLatestMessages(loadMessagesRequest $request,MessageService $service): \Illuminate\Http\JsonResponse
   {
       if (!Gate::allows("load-latest-message")){
           return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
       }
      return $this->returnData(__("messages"),$service->LoadLatestMessages($request),__("responses.Here are the latest messages"));
   }

}

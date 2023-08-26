<?php

namespace App\Services\Chats;

use App\Events\Chat\SendMessageEvent;
use App\Http\Requests\Chat\GetChatParticipantsRequest;
use App\Http\Requests\Chat\SendMesaageRequest;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Truck;
use App\Models\User;
use App\Services\Service;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Pusher\ApiErrorException;
use Pusher\PusherException;


class MessageService extends Service
{

    /**
     * @throws PusherException
     * @throws GuzzleException
     * @throws ApiErrorException
     */

    private Chat $chat;
    public function SendMessage($request,$to_user)
    {

        $sender = auth("sanctum")->user()->id;

        $collection = (new ChatService())->IsTherePreviousChat($sender,$to_user);

        if (!$collection)
        {
            $this->chat = (new ChatService())->createNewChat($sender,$to_user);
        }
        $message = $this->createMessage($request,$collection,$to_user);

        broadcast(new SendMessageEvent($message->id))->toOthers();

        return $message;
    }

    public function createMessage($request,$collection,$to_user)
    {

        return Message::create([

            'from_user' => auth("sanctum")->user()->id,

            'to_user'   => $to_user,

            'content'   => $this->checkMSG($request),

            'type'      => $this->checkType($request),

            'chat_id'   => !$collection ? $this->chat->id:$collection[0]->chat_id,
        ]);
    }
    public function LoadLatestMessages($request)
    {

        return Message::where(
            function($query) use ($request)
            {
                $query->where('from_user', auth("sanctum")->user()->id)
                    ->where('to_user', $request->other_user_id);
            }
        )->orWhere(
            function ($query) use ($request)
            {
                $query->where('from_user', $request->other_user_id)
                    ->where('to_user'  , auth("sanctum")->user()->id);
            }
        )->select("content",'type',"from_user","to_user","chat_id","created_at")->get();

    }

    public function GetChatParticipants($request)
    {
        $customer = User::where("id",$request->customer_id)->select("name","image")->get();
        $seller_truck = User::where("id",$request->seller_id)->with("truck" , function ($q){
            $q->select("name","user_id","id");
            $q->with("images",function ($qq){
                $qq->select("image","truck_id");
            })->get();
        })->select("id","truck_id","image")->get();
        $returned = $customer->merge($seller_truck);
        return [
            'customer' => $returned[0],
            'seller'   => $returned[1],
        ];
    }
    private function checkMSG($request)
    {
        if ($request->has("record")){
            $content = $this->UploadFile($request->file("record"));

        }elseif($request->has("file")){
            $content = $this->UploadFile($request->file("file"));
        }else{
            $content = $request->text;
        }
        return $content;
    }

    private function checkType($request)
    {
        if ($request->has("record")){
            $type = 'record';

        }elseif($request->has("file")){
            $type = 'file';
        }else{
            $type = 'text';
        }
        return $type;
    }

}

<?php

namespace App\Services\Chats;

use App\Events\Chat\SendMessageEvent;
use App\Http\Requests\Chat\SendMesaageRequest;
use App\Models\Chat;
use App\Models\Message;
use App\Services\Service;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
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
    public function SendMessage($request)
    {

        $sender = auth("sanctum")->user()->id;

        $collection = (new ChatService())->IsTherePreviousChat($sender,$request->to_user);

        if (!$collection)
        {
            $this->chat = (new ChatService())->createNewChat($sender,$request->to_user);
        }
        $message = $this->createMessage($request,$collection);

        broadcast(new SendMessageEvent($message))->toOthers();
        return $message;
    }

    public function createMessage($request,$collection)
    {
        return Message::create([

            'from_user' => auth("sanctum")->user()->id,

            'to_user'   => $request->to_user,

            'content'   => $request->file("message") !== null ?
                env("APP_URL")."/storage/chat/".$this->UploadFile($request->file("message"),"chat")
            :$request->message,

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
        )->select("content","from_user","to_user","chat_id")->get();

    }

}

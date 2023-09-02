<?php

namespace App\Services\Chats;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use App\Services\Service;
use Illuminate\Http\Request;

class ChatService extends Service
{
    public function IsTherePreviousChat($sender,$receiver)
    {
        $collection = Message::whereHas('chat' ,
            function($q) use ($sender,$receiver)
            {
                $q->where('from_user',$sender)
                    ->where('to_user', $receiver);
            })
            ->orWhere(
                function ($q) use ($sender,$receiver)
                {
                    $q->where('from_user',$receiver)
                        ->where('to_user', $sender);
                }
            )->get();

        if (count($collection) > 0)
        {
            return $collection;
        }
        return false;
    }

    public function createNewChat($sender,$to_user)
    {
        return Chat::create([
            'first_user'      => $sender ,
            'second_user'    => $to_user,
        ]);
    }
}

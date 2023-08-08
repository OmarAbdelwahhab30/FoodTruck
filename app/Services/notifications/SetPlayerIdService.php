<?php

namespace App\Services\notifications;

use App\Models\User;

class SetPlayerIdService extends \App\Services\Service
{

    public function SetPlayerId($request): bool
    {
        $user = User::find(auth("sanctum")->user()->id);
        $user->player_id = $request->player_id;
        if($user->save()){
            return true;
        }
        return false;
    }
}

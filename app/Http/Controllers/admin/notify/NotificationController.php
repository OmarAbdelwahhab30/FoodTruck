<?php

namespace App\Http\Controllers\admin\notify;

use App\Http\Requests\Admin\ControlNotificationsRequest;
use App\Jobs\SendNotifications;
use App\Models\Role;
use App\Models\User;
use App\Models\User_Notification;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Contract\Messaging;

class NotificationController
{

    public function index()
    {
        return view("admin.notify.index");
    }

    /**
     * @throws MessagingException
     * @throws FirebaseException
     */
    public function notify(ControlNotificationsRequest $request)
    {
        if (empty($request->check[0])) {
            return redirect()->back()->with("error", __("admin.Please choose at least one of checkboxes!"));
        }
        dispatch(new SendNotifications($request->check,$request->notification));
        return redirect()->back()->with("success", __("admin.Notification has been sent to the selected users"));
    }
}

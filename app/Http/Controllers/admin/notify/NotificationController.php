<?php

namespace App\Http\Controllers\admin\notify;

use App\Http\Requests\Admin\ControlNotificationsRequest;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Contract\Messaging;

class NotificationController
{
    private Messaging $messaging;

    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    public function index()
    {
        return view("admin.notify.index");
    }

    public function notify(ControlNotificationsRequest $request)
    {
        $topic = "";
        if (empty($request->check[0]))
        {
            return redirect()->back()->with("error",__("admin.Please choose at least one of checkboxes!"));
        }
        if ($request->check && count($request->check) > 1 ) {
            $topic = "both";
        } elseif ($request->check && count($request->check) == 1)
        {
            if ($request->check[0] == "users"){
                $topic = "customers";
            }elseif ($request->check[0] == "sellers"){
                $topic = "sellers";
            }
        }
        $this->notify_users($topic,$request->notification);
        return redirect()->back()->with("success",__("admin.Notification has been sent to the selected users"));
    }

    /**
     * @throws MessagingException
     * @throws FirebaseException
     */
    private function notify_users($topic,$notification)
    {
        $message = CloudMessage::withTarget('topic', $topic)->withNotification([$notification]);
        $this->messaging->send($message);
    }


}

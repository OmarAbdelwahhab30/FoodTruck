<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            'OrderAdded' => [
                'en' => '@ Requests for an order.',
                'ar' => "قام @ بإضافة طلب لك"
            ],
            'OrderAccepted' => [
                'en' => 'Order has been accepted now.',
                'ar' => "تم قبول طلبك "
            ],
            'OrderPickedUp' => [
                'en' => "order has picked up.",
                'ar' => "تم إستلام الطلب."
            ],
            'OrderCancelled' => [
                'en' => "Unfortunately, the order is cancelled",
                'ar' => "لسوء الحظ تم إلغاء الطلب."
            ],
            'OrderDelivered' => [
                'en' => "Order has delivered now.",
                'ar' => "تم وصول الطلب الآن."
            ],
            'PAID' => [
                'en' => "The fees has been paid by@.",
                'ar' => "تم دفع ثمن الطلب بواسطة @ الآن. "
            ],
            "REVIEW" => [
                'en' => "@posted a review about you.",
                'ar' => "قام @ بإضافة رأي عنك",
            ],
            "MESSAGE"   => [
                'en' => "@sent you a message you.",
                'ar' => "قام @ بإرسال رسالة إليك",
            ]
        ];

        foreach ($notifications as $key => $value) {
            Notification::create([
                'type'  => $key,
                'notification_en'   => $value['en'] ,
                'notification_ar'   => $value['ar'],
            ]);
        }
    }
}

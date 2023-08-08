<?php

namespace Database\Seeders;

use App\Models\ArNotification;
use Illuminate\Database\Seeder;

class ArNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            'OrderAdded'       => "قام @ بإضافة طلب لك .",
            'OrderAccepted'    => "تم قبول طلبك ",
            'OrderPickedUp'   => "تم إستلام الطلب.",
            'OrderCancelled'   => "لسوء الحظ تم إلغاء الطلب.",
            'OrderDelivered'   => "تم وصول الطلب الآن.",
            'PAID'              => "تم دفع ثمن الطلب بواسطة @ الآن. ",
            "REVIEW"            => "قام @ بإضافة رأي عنك",
        ];

        foreach ($notifications as $key => $value){
            ArNotification::create([
                'key'   => $key,
                'value' => $value,
            ]);
        }
    }
}

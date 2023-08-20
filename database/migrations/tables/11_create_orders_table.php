<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("arrival_time")->default(now());
            $table->enum("delivery_type_en",['delivery','pick_up']);
            $table->enum("delivery_type_ar",['توصيل','بدون توصيل']);
            $table->double("total_price")->default(0);
            $table->enum("status_en",['pending','processing','picked-up','cancelled','delivered'])->default("pending");
            $table->enum("status_ar",['في قائمة الإنتظار','يتم تجهيزه','تم الإستلام','تم الإلغاء','تم التوصيل'])->default("في قائمة الإنتظار");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

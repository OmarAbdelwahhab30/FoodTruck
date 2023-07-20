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
            $table->enum("delivery_type",['delivery','pick_up']);
            $table->decimal("total_price")->default(0);
            $table->enum("status",['pending','processing','picked-up','cancelled','delivered'])->default("pending");
            $table->foreignId("truck_id")->references("id")->on("trucks")->cascadeOnUpdate()->cascadeOnDelete();
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

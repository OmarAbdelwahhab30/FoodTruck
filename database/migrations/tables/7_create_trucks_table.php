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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("license");
            $table->boolean("delivery");
            $table->string("plate_no")->unique();
            $table->decimal("delivery_price")->nullable();
            //$table->unsignedBigInteger("food_type_id");
            //$table->bigInteger('user_id')->unsigned()->index();
            $table->string("work_time");
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
        Schema::dropIfExists('trucks');
    }
};

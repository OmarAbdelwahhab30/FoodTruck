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
            $table->string("plate_no");
            $table->string("license");
            $table->string("image");
            $table->boolean("delivery");
            //$table->foreignId("food_type_id")->references("id")->on("food_types");
            //$table->foreignId("user_id")->references("id")->on("users");
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

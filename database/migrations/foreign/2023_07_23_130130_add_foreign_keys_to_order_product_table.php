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
        Schema::table('order_product', function (Blueprint $table) {
            $table->foreignId("order_id")->references("id")->on("orders")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("product_id")->references("id")->on("products")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("optional_id")->nullable()->after("product_id")->references("id")->on("optionals")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId("size_id")->references("id")->on("sizes")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            //
        });
    }
};

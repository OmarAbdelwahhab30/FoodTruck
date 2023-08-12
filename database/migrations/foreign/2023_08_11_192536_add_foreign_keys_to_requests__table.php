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
        Schema::table('requests', function (Blueprint $table) {
            $table->foreignId("wallet_id")->references("id")
                ->on("wallets")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("user_id")->references("id")
                ->on("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("bank_account_id")->references("id")
                ->on("bank_accounts")->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            //
        });
    }
};

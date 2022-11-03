<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentShopPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_shop', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->index();
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->unsignedBigInteger('shop_id')->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->primary(['payment_id', 'shop_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_shop');
    }
}

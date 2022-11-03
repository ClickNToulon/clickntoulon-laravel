<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductProductPricePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_product_price', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('product_prices')->onDelete('cascade');
            $table->unsignedBigInteger('product_price_id')->index();
            $table->foreign('product_price_id')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['product_id', 'product_price_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_price');
    }
}

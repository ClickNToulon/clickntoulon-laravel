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
    public function up(): void
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->float('unitPrice');
            $table->float('discount')->nullable();
            $table->float('discountedPrice')->nullable();
            $table->float('vat');
            $table->float('vatPrice');
            $table->timestamp('discountedFrom');
            $table->timestamp('discountedUntil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};

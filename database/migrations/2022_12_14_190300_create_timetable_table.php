<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * @return void
     */
    public function up() {
        Schema::create('timetable', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops');
            $table->timestamp('hour_open');
            $table->timestamp('hour_close');
            $table->string('day', 1);
        });
    }

    /**
     * @return void
     */
    public function down() {
        Schema::dropIfExists('timetable');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::dropIfExists('timetable');
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops');
            $table->timestamp('hour_open');
            $table->timestamp('hour_close');
            $table->string('day', 1);
        });
    }

    public function down() {
        Schema::dropIfExists('timetables');
        Schema::create('timetable', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops');
            $table->timestamp('hour_open');
            $table->timestamp('hour_close');
            $table->string('day', 1);
        });
    }
};

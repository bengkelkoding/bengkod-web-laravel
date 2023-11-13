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
        Schema::create('room_logs', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 50)->nullable(false);
            $table->string('session', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('access_status', 50)->nullable();
            $table->dateTime('accessed')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_logs');
    }
};

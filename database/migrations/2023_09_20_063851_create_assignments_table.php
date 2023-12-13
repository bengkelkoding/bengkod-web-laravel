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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_course');
            $table->foreignId('id_classroom');
            $table->string('title');
            $table->string('description');
            $table->string('task_file')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->timestamps();

            $table->foreign('id_course')
                ->references('id')
                ->on('course')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
};

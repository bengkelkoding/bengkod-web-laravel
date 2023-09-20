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
            $table->foreignId('id_kursus');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('file_soal')->nullable();
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->timestamps();

            $table->foreign('id_kursus')
                ->references('id')
                ->on('kursus')
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

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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('facilitie_id');
            $table->index('facilitie_id');
            $table->foreign('facilitie_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->string('nama', 50);
            $table->string('email', 70)->unique();
            $table->string('phone', 13);
            $table->string('nama_tamu', 50);
            $table->enum('tipe_kamar', ['superior', 'deluxe']);
            $table->string('jumlah_kamar', 10);
            $table->enum('status_kamar', ['kosong', 'terisi', 'proses']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};

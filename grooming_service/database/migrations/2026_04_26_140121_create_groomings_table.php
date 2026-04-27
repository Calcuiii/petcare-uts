<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groomings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hewan');
            $table->string('jenis_hewan');
            $table->integer('umur')->nullable();
            $table->string('layanan');
            $table->integer('harga')->nullable();
            $table->date('tanggal');
            $table->time('jam')->nullable();
            $table->string('nama_pemilik');
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groomings');
    }
};

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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meja_id');
  $table->date('tanggal_pemesanan');
  $table->time('jam_mulai');
  $table->time('jam_selesai');
  $table->string('nama_pemesan');
  $table->integer('jumlah_pelanggan');
//   $table->foreign('meja_id')->references('meja_id')->on('meja');
  $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};

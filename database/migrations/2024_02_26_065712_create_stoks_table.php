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
        Schema::create('stok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->integer('jumlah');
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade')->onUpdate('cascade    ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
        });

        Schema::dropIfExists('stok');
    }
};

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
        Schema::create('broadcasts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('guest_name');
            $table->string('guest_phone');
            $table->enum('url', ['byattari', 'attarivation']);
            $table->enum('session', ['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5']);
            $table->enum('no_table', ['Meja 1', 'Meja 2', 'Meja 3', 'Meja 4', 'Meja 5']);
            $table->enum('guest_limit', ['1 Orang', '2 Orang', '3 Orang', '4 Orang', '5 Orang', '6 Orang']);
            $table->text('kata_pengantar');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broadcasts');
    }
};

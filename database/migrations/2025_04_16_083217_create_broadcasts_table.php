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
            $table->text('guest_name');
            $table->string('guest_whatsapp');
            $table->enum('session', ['Kursi 1', 'Kursi 2', 'Kursi 3', 'Kursi 4', 'Kursi 5']);
            $table->enum('guest_limit', ['1 Orang', '2 Orang', '3 Orang', '4 Orang', '5 Orang', '6 Orang']);
            $table->timestamps();
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

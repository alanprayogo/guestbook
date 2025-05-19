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
            $table->string('the_organizer');
            $table->string('guest_name');
            $table->string('guest_phone');
            $table->enum('url', ['byattari', 'attarivitation']);
            $table->enum('session', ['1', '2', '3', '4', '5']);
            $table->enum('no_table', ['1', '2', '3', '4', '5']);
            $table->enum('guest_limit', ['1', '2', '3', '4', '5', '6']);
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

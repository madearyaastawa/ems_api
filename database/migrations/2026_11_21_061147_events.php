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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id')->autoIncrement();
            $table->string('category_name', 50);
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id')->autoIncrement();
            $table->foreignId('organizer_id');
            $table->foreignId('category_id');
            $table->string('title', 100);
            $table->dateTime('event_datetime');
            $table->integer('quota');
            $table->enum('status', ['draft', 'published', 'ongoing', 'completed', 'cancelled'])->default('draft')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('organizer_id')->references('user_id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('categories');
    }
};
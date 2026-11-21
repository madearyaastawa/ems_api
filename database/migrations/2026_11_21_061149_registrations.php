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
        Schema::create('registrations', function(Blueprint $table){
            $table->id('registration_id')->autoIncrement();
            $table->foreignId('event_id');
            $table->foreignId('user_id');
            $table->enum('status', ['pending', 'approved', 'rejected', 'cancelled'])->default('pending')->nullable();
            $table->timestamps();

            $table->foreign('event_id')->references('event_id')->on('events')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
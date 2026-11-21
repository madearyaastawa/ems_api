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
        Schema::create('attendances', function(Blueprint $table){
            $table->id('attendance_id')->autoIncrement();
            $table->foreignId('ticket_id');
            $table->dateTime('checked_in_at')->nullable();

            $table->foreign('ticket_id')->references('ticket_id')->on('tickets')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
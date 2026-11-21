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
        Schema::create('tickets',  function (Blueprint $table) {
            $table->id('ticket_id')->autoIncrement();
            $table->foreignId('registration_id');
            $table->string('ticket_code', 100);
            $table->string('qr_code', 100);

            $table->foreign('registration_id')->references('registration_id')->on('registrations')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
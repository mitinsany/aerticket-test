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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();

            $table->foreignId('departure_airport_id');
            $table->foreign('departure_airport_id')->references('id')->on('airports');

            $table->foreignId('arrival_airport_id');
            $table->foreign('arrival_airport_id')->references('id')->on('airports');

            $table->foreignId('transporter_id');
            $table->foreign('transporter_id')->references('id')->on('transporters');

            $table->string('flight_number');
            $table->unsignedInteger('duration');

            $table->timestamp('departure_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};

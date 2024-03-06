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
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
            $table->string('icao');
            $table->string('iata')->nullable();
            $table->string('name');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('country');
            $table->integer('elevation');
            $table->double('lat', null, 11);
            $table->double('lon', null, 11);
            $table->string('timezone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};

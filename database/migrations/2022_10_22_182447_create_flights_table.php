<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_airport_id');
            $table->unsignedBigInteger('destination_airport_id');
            $table->timestampTz('departure_time');
            $table->timestampTz('arrival_time');
            $table->integer('seats');
            $table->integer('ticket_price');
            $table->timestampsTz();

            $table->foreign('origin_airport_id')->references('id')->on('airports');
            $table->foreign('destination_airport_id')->references('id')->on('airports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
};

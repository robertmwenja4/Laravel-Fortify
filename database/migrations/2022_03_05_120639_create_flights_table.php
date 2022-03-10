<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            // 'flight_no',
            // 'destination',
            // 'origin',
            // 'date',
            // 'flight_status',
            // 'no_bags',
            $table->id();
            $table->string('flight_no');
            $table->string('destination');
            $table->string('origin');
            $table->date('date');
            $table->string('flight_status')->default('On Time');
            $table->string('no_bags');
            $table->timestamps();
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
}

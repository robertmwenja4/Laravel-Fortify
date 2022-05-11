<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassangersTable extends Migration
{
    /**
     * Run the migrations.
     *'pid', 'name', 'fligh_no','email','phone_number','flight_class','flight_origin', 'destination',
     * @return void
     */
    public function up()
    {
        Schema::create('passangers', function (Blueprint $table) {
            $table->id();
            $table->string('pid');
            $table->string('name');
            $table->string('fligh_no');
            $table->string('email');
            $table->decimal('phone_number', 10);
            $table->string('flight_class');
            $table->string('flight_origin');
            $table->string('destination');

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
        Schema::dropIfExists('passangers');
    }
}

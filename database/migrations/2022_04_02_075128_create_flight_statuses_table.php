<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightStatusesTable extends Migration
{
    /**
     * Run the migrations.
     * 'bag_tagID','Terminal_at','pid', 'flight_no'
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('bag_tagID');
            $table->string('Terminal_at');
            $table->string('pid');
            $table->string('flight_no');
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
        Schema::dropIfExists('flight_statuses');
    }
}

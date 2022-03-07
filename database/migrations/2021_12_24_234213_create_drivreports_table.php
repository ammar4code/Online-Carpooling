<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivreports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('driver_name');
            $table->string('driver_id');
            $table->string('psn_name');
            $table->string('psn_id');
            $table->string('eventid');
            $table->string('date');
            $table->string('status')->default(0);
            $table->longText('desc');
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
        Schema::dropIfExists('drivreports');
    }
}

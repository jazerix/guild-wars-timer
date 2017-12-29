<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('follow_up_id')->nullable();
            $table->unsignedInteger('previous_id')->nullable();
            $table->string('name');
            $table->string('location');
            $table->string('location_link');
            $table->string('waypoint_link');
            $table->string('wiki_link');
            $table->string('class');
            $table->timestamps();

            $table->foreign('follow_up_id')->references('id')->on('events');
            $table->foreign('previous_id')->references('id')->on('events'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

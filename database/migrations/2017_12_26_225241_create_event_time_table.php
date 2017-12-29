<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_time', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('event_id');
            $table->time('time_at');
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('time_at')->references('at')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_time');
    }
}

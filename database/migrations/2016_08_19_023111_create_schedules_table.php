<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('films_id')->unsigned();
            $table->foreign('films_id')->references('id')->on('films');
            $table->integer('cinemas_id')->unsigned();
            $table->foreign('cinemas_id')->references('id')->on('cinemas');
            $table->integer('days_id')->unsigned();
            $table->foreign('days_id')->references('id')->on('days');
            $table->string('schedule');
            $table->integer('rooms_id')->unsigned();
            $table->foreign('rooms_id')->references('id')->on('rooms');
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
        Schema::drop('schedules');
    }
}

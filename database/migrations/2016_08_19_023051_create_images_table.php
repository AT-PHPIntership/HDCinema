<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('description',1000);
            $table->integer('films_id')->unsigned();
            $table->foreign('films_id')->references('id')->on('films');
            $table->integer('cinemas_id')->unsigned();
            $table->foreign('cinemas_id')->references('id')->on('cinemas');
            $table->integer('news_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news');
            $table->integer('advertisements_id')->unsigned();
            $table->foreign('advertisements_id')->references('id')->on('news');
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
        Schema::drop('images');
    }
}

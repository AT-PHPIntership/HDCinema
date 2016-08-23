<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',45);
            $table->string('genre',45);
            $table->string('actor',255);
            $table->string('director',45);
            $table->time('duration');
            $table->string('starttime',45);
            $table->string('image',100);
            $table->string('trailer',100);
            $table->integer('views',10);
            $table->integer('hide',1);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('admins_id')->unsigned();
            $table->foreign('admins_id')->references('id')->on('admins');
            $table->integer('type_films_id')->unsigned();
            $table->foreign('type_films_id')->references('id')->on('type_films');
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
        Schema::drop('films');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',50);
            $table->string('password',100);
            $table->string('fullname',100);
            $table->string('address',100);
            $table->string('tel',15);
            $table->string('image',100);
            $table->integer('block');
            $table->integer('admins_id')->unsigned();
            $table->foreign('admins_id')->references('id')->on('admins');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

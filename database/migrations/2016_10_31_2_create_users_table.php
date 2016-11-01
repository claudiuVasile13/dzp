<?php

use Illuminate\Support\Facades\Schema;
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
            $table->engine = 'InnoDB';
            $table->increments('user_id');
            $table->integer('group_id')->unsigned();
            $table->tinyInteger('admin');
            $table->string('email')->unique();
            $table->string('username');
            $table->text('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('picture');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->foreign('group_id')->references('group_id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

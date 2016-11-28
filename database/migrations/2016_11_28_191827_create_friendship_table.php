<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendship', function (Blueprint $table) {
            $table->increments('friendship_id');
            $table->integer('userID')->unsigned();
            $table->integer('friendID')->unsigned();
            $table->timestamps();
        });

        Schema::table('friendship', function(Blueprint $table) {
            $table->foreign('userID')->references('user_id')->on('users');
            $table->foreign('friendID')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendship');
    }
}

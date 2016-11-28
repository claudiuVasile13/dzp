<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendshipRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendship_requests', function (Blueprint $table) {
            $table->increments('friendship_request_id');
            $table->integer('senderID')->unsigned();
            $table->integer('receiverID')->unsigned();
            $table->timestamps();
        });

        Schema::table('friendship_requests', function(Blueprint $table) {
            $table->foreign('senderID')->references('user_id')->on('users');
            $table->foreign('receiverID')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendship_request');
    }
}

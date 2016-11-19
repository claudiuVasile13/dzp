<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->increments('group_user_id');
            $table->integer('userID')->unsigned();
            $table->integer('groupID')->unsigned();
            $table->timestamps();
        });

        Schema::table('group_user', function(Blueprint $table) {
            $table->foreign('userID')->references('user_id')->on('users');
            $table->foreign('groupID')->references('group_id')->on('groups');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_groups');
    }
}

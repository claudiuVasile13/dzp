<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank_user', function (Blueprint $table) {
            $table->increments('rank_user_id');
            $table->integer('userID')->unsigned();
            $table->integer('rankID')->unsigned();
            $table->tinyInteger('main_rank');
            $table->timestamps();
        });

        Schema::table('rank_user', function(Blueprint $table) {
            $table->foreign('userID')->references('user_id')->on('users');
            $table->foreign('rankID')->references('rank_id')->on('ranks');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rank_user');
    }
}

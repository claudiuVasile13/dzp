<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_messages', function (Blueprint $table) {
            $table->increments('pm_id');
            $table->integer('pm_author')->unsigned();
            $table->integer('pm_receiver');
            $table->string('pm_title');
            $table->text('pm_body');
            $table->timestamps();
        });

        Schema::table('private_messages', function($table) {
            $table->foreign('pm_author')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('private_messages');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_chat_messages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('live_chat_message_id');
            $table->integer('live_chat_message_author')->unsigned();
            $table->text('live_chat_message_body');
            $table->timestamps();
        });

        Schema::table('live_chat_messages', function($table) {
            $table->foreign('live_chat_message_author')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('live_chat_messages', function (Blueprint $table) {
            //
        });
    }
}

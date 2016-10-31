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
        Schema::table('live_chat_messages', function (Blueprint $table) {
            $table->increments('live_chat_message_id');
            $table->text('live_chat_message_body');
            $table->integer('live_chat_message_author')->unique();
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
        Schema::table('live_chat_messages', function (Blueprint $table) {
            //
        });
    }
}

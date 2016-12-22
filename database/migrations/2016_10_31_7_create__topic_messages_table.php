<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_messages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('topic_message_id');
            $table->integer('topicID')->unsigned();
            $table->integer('topic_message_author')->unsigned();
            $table->text('topic_message_body');
            $table->timestamps();
        });
        Schema::table('topic_messages', function($table) {
            $table->foreign('topicID')->references('topic_id')->on('topics');
            $table->foreign('topic_message_author')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_messages', function (Blueprint $table) {
            //
        });
    }
}

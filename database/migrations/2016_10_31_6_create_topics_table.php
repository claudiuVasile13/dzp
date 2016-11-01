<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('topic_id');
            $table->integer('topic_category_id')->unsigned();
            $table->integer('topic_author')->unsigned();
            $table->string('topic_name');
            $table->text('topic_description');
            $table->timestamps();
        });

        Schema::table('topics', function($table) {
            $table->foreign('topic_category_id')->references('topic_category_id')->on('topic_categories');
            $table->foreign('topic_author')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('topic_category_id');
            $table->string('topic_category_name');
            $table->text('topic_category_description');
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
        Schema::table('topic_categories', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('user_id');
            $table->integer('countryID')->unsigned();
            $table->integer('groupID')->unsigned();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->text('password');
            $table->string('image');
            $table->tinyInteger('activated');
            $table->text('registration_token');
            $table->text('password_reset_token')->nullable();
            $table->tinyInteger('status');
            $table->integer('reputation');
            $table->date('birthday')->nullable();
            $table->string('job_hobbies')->nullable();
            $table->text('description')->nullable();
            $table->string('gameranger_id')->nullable();
            $table->string('gender');
            $table->string('skype')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('signature')->nullable();
            $table->string('user_ip');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->foreign('countryID')->references('country_id')->on('countries');
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitialDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });


        Schema::create('events', function (Blueprint $table) {
            $table->increments('eid');
            $table->string('name');
            $table->string('location');
            $table->string('date');
            $table->string('time');
            $table->string('desc');
            $table->string('link')->nullable();
            $table->string('video')->nullable();
            $table->string('audio')->nullable();
            $table->string('tag');
            $table->string('image',2000);
            $table->timestamps();
        });


        Schema::create('news', function (Blueprint $table) {
            $table->increments('nid');
            $table->string('name');
            $table->string('desc');
            $table->string('tag');
            $table->string('link')->nullable();
            $table->string('video')->nullable();
            $table->string('audio')->nullable();
            $table->string('image',2000);
            $table->string('image2',2000);
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
    }
}

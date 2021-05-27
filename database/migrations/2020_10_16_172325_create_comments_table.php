<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('desk_id')->unsigned();
            $table->bigInteger('thread_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('message');
            $table->text('file');
            $table->bigInteger('reply_to')->unsigned();
            $table->foreign('desk_id')->references('id')->on('desks');
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('comments');
    }
}

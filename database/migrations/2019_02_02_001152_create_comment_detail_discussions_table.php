<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentDetailDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_detail_discussions', function (Blueprint $table) {
            $table->increments('id');
             $table->text('comment_detail_discussion_content');
            $table->integer('id_comment_discussion')->unsigned();
            $table->foreign('id_comment_discussion')->references('id')->on('comment_discussions');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('comment_detail_discussions');
    }
}

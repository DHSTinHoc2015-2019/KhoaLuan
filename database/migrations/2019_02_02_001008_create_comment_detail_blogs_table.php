<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentDetailBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_detail_blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('conment_detail_blog_content');
            $table->integer('id_comment_blog')->unsigned();
            $table->foreign('id_comment_blog')->references('id')->on('comment_blogs');
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
        Schema::dropIfExists('comment_detail_blogs');
    }
}

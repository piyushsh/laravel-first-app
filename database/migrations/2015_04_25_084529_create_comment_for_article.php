<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentForArticle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create("comments",function(Blueprint $table){
            $table->increments('id');
            $table->integer('article_id')->unsigned();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->text('comment');
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
		//
        Schema::table('comments',function(Blueprint $table)
        {
            $table->dropForeign('comments_article_id_foreign');
        });
        Schema::drop('comments');
	}

}

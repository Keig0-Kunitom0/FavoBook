<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('book_id')->default(0)->comment('商品ID');
            $table->unsignedBigInteger('user_id')->default(0)->comment('ユーザーID');
            $table->integer('stars')->default(0)->comment('星');
            $table->text('comment')->comment('コメント');
            $table->string('title');
            $table->string('img_url');
            $table->timestamps();
    
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->unique(['book_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_reviews');
    }
}

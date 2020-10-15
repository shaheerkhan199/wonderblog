<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments("postID");
            $table->string("postTitle");
            $table->longText('description');
            $table->unsignedInteger('author_id');
            $table->foreign('author_id')->references('authorID')->on('authors')->onDelete('cascade');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('categoryID')->on('categories')->onDelete('cascade');
            // $table->foreignId('authorID')->constrained('authors')->onDelete('cascade');
            // $table->foreignId('categoryID')->constrained('categories')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}

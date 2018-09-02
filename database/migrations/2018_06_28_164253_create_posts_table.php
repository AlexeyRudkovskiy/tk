<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('slug');
            $table->string('title');
            $table->text('content');

            $table->integer('author_id', false, true);
            $table->integer('preview_id', false, true);

            $table->boolean('is_promoting')->default(false);

            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('preview_id')->references('id')->on('files')->onDelete('cascade');
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

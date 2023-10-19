<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->id();
            // $table->bigIncrements('id')
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('description');
            $table->string('image_path');
            $table->string('category');
            $table->string('status');
            $table->string('pined');
            $table->integer('no_of_comment');
            $table->integer('views');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
};

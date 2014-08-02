<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryVideosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryVideos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('video_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('label')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade')->onUpdate("cascade");
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("categoryVideos", function ($table) {
            $table->drop("categoryVideos_category_id");
            $table->drop("categoryVideos_video_id");
        });
        Schema::drop('categoryVideos');
    }

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductVideosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productVideos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('video_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('label')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate("cascade");
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
        Schema::table("productVideos", function ($table) {
            $table->drop("productVideos_product_id");
            $table->drop("productVideos_video_id");
        });
        Schema::drop('productVideos');
    }

}

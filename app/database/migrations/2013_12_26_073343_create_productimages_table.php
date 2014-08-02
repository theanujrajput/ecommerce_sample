<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductImagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productImages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('caption')->nullable();
            $table->string('notes')->nullable();
            $table->boolean('is_primary')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade')->onUpdate("cascade");
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("productImages", function ($table) {
            $table->drop("productImages_product_id");
            $table->drop("productImages_image_id");
        });
        Schema::drop('productImages');
    }

}

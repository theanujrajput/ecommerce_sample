<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductSpecificAttributes extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("product_specific_attributes", function ($table) {

            $table->increments("id");
            $table->integer('product_id')->unsigned();
            $table->string("name");
            $table->string("value");
            $table->text("notes")->nullable();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate("cascade");

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
        Schema::table("product_specific_attributes", function ($table) {
            $table->drop("product_specific_attributes_product_id");
        });
        Schema::drop("product_specific_attributes");
    }

}
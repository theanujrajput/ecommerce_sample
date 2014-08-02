<?php

use Illuminate\Database\Migrations\Migration;

class CreateComboProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_products', function ($table) {
            $table->increments('id');
            $table->integer('combo_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->decimal('combo_price');
            $table->timestamps();

            $table->foreign('combo_id')->references('id')->on('combos')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate("cascade");
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("combo_products", function ($table) {
            $table->drop("combo_products_combo_id");
            $table->drop("combo_products_product_id");
        });
        Schema::drop('combo_products');
    }

}
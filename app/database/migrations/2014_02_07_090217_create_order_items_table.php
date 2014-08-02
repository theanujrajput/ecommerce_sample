<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function ($table) {


            $table->increments('id')->unsigned();;
            $table->integer('order_id')->unsigned();;
            $table->integer('product_id')->unsigned();;
            $table->enum('product_type', array('product', 'combo'));
            $table->float('offer_price');
            $table->float('list_price')->nullable();
            $table->integer('qty');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("order_items", function ($table) {
            $table->drop("order_items_order_id");
            $table->drop("order_items_product_id");
        });
        Schema::drop('order_items');
    }

}
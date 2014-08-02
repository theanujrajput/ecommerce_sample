<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function ($table) {

            $table->increments('id')->unsigned();
            $table->string('item_type')->nullbale();
            $table->integer('item_id');
            $table->integer('user_id')->unsigned();
            $table->integer('qty');
            $table->float('price');
            $table->float('subtotal');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("user_id")->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("cart", function ($table) {
            $table->drop("cart_user_id");
        });
        Schema::drop('cart');
    }

}

<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function ($table) {

            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->float('net_value');
            $table->float('final_value');
            $table->enum('status', array('new', 'open', 'closed'))->default('new');
            $table->enum('payment_status', array('paid', 'unpaid'))->default('unpaid');
            $table->text('notes')->nullable();
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
        Schema::table("orders", function ($table) {
            $table->drop("orders_user_id");
        });
        Schema::drop('orders');
    }

}
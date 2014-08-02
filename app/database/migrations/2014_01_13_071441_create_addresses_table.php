<?php

use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function ($table) {

            $table->increments('id');
            $table->string("line1")->nullable();
            $table->string("line2")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->string("landmark")->nullable();
            $table->string("pincode")->nullable();
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate("cascade");

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
        Schema::table("addresses", function ($table) {
            $table->drop("addresses_user_id");
        });

        Schema::drop('addresses');
    }

}
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsAndOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();

        Schema::table('products', function ($table) {
            $table->string('sap_code')->nullable();
        });

        //add pending enum value in payment status
        DB::update("ALTER TABLE orders MODIFY COLUMN payment_status ENUM('paid','unpaid','pending')");

        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::beginTransaction();

        Schema::table('products', function ($table) {
            $table->drop('sap_code')->nullable();
        });

        //remove pending enum value in payment_status
        DB::update("ALTER TABLE orders MODIFY COLUMN values ENUM('paid','unpaid')");

        DB::commit();
    }

}

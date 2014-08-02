<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductDocumentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productDocuments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('document_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('label')->nullable();
            $table->string('notes')->nullable();

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade')->onUpdate("cascade");
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("productDocuments", function ($table) {
            $table->drop("productDocuments_product_id");
            $table->drop("productDocuments_document_id");
        });
        Schema::drop('productDocuments');
    }

}

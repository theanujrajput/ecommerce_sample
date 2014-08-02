<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryDocumentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryDocuments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->unsigned();
            $table->integer('document_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('label')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate("cascade");
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
        Schema::table("categoryDocuments", function ($table) {
            $table->drop("categoryDocuments_category_id");
            $table->drop("categoryDocuments_document_id");
        });
        Schema::drop('categoryDocuments');
    }

}

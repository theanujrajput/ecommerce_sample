<?php

use Illuminate\Database\Migrations\Migration;

class CreatePagedataTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("pagedata", function ($table) {

            $table->increments("id");
            $table->string("name")->unique();  //this is the page name,this field will be used to identify the page.
            $table->longtext("value");
            $table->text("meta_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->text("meta_keywords")->nullable();
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
        Schema::drop("pagedata");
    }

}
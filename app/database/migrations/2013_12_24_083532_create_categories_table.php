<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('shortcode')->unique()->nullable();
            $table->text('description')->nullable();
            $table->text('description_secondary')->nullable();
            $table->integer('sequence')->nullable();
            $table->integer('parent_category_id')->unsigned()->nullable(); //null if top level category
            $table->boolean('active')->default(true)->nullable(); //enable disable product categories

            //base category settings - can be overridden in products individually
            $table->boolean('is_delivered')->nullable(); //if the product is delivered
            $table->boolean('is_ltw')->nullable(); //if the product is eligible for lifetime warranty
            $table->boolean('is_cod')->nullable(); //if the product is eligible for lifetime warranty
            $table->integer('warranty')->nullable(); //warranty in years
            //end base category settings

            $table->text("meta_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->text("meta_keywords")->nullable();

            $table->timestamps();

            $table->foreign('parent_category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate("cascade");
        });


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("categories", function ($table) {

            $table->drop("categories_parent_category_id");

        });
        Schema::drop('categories');
    }

}

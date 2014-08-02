<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('shortcode')->unique()->nullable();
            $table->text('description')->nullable();
            $table->text('description_secondary')->nullable();
            $table->integer('category_id')->unsigned()->nullable(); //null if top level category
            $table->integer('base_product_id')->unsigned()->nullable(); //null if top level product, set for variations
            $table->boolean('active')->nullable(); //enable disable product categories

            //Override category settings
            $table->boolean('is_delivered')->nullable()->default(null); //if the product is delivered
            $table->boolean('is_ltw')->nullable()->default(null); //if the product is eligible for lifetime warranty
            $table->boolean('is_cod')->nullable()->default(null); //if the product is eligible for lifetime warranty
            $table->integer('warranty')->nullable()->default(null); //warranty in years
            //end override category settings

            $table->decimal('list_price')->nullable();
            $table->decimal('offer_price')->nullable();
            $table->decimal('weight')->nullable(); // weight in grams
            $table->integer('sequence')->nullable();


            $table->string('base_diff_text')->nullable(); // text to display the difference form base product

            $table->text("meta_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->text("meta_keywords")->nullable();


            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('base_product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate("cascade");
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table("products",function($table){
            $table->drop("products_category_id");
            $table->drop("products_base_product_id");
        });
		Schema::drop('products');
	}

}

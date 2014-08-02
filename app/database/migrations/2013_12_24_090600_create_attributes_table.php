<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttributesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->unique();
            $table->string('attribute_category');
            $table->text('description');
            $table->integer('category_id')->unsigned();
            $table->boolean('is_comparable'); //attribute will be used to compare
            $table->boolean('is_filterable'); //attribute will be used to filter options
            $table->enum('attribute_value_type', array("string", "integer", "decimal", "options"));
            $table->string('options')->nullable();
            $table->boolean('active'); //enable disable attribute
            $table->integer('sequence');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate("cascade");
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("attributes",function($table){
            $table->drop("attributes_category_id");
        });
        Schema::drop('attributes');
    }

}

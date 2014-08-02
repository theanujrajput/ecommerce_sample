<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("user_roles", function ($table) {

            $table->increments('id');
            $table->integer("user_id")->unsigned();
            $table->integer("role_id")->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate("cascade");

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
        Schema::table("user_roles", function ($table) {
            $table->drop("user_roles_user_id");
            $table->drop("user_roles_user_id");
        });
        Schema::drop('user_roles');
    }

}
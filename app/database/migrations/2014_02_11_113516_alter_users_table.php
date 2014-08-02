<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('landline')->nullable();
            $table->boolean('newsletters')->default(false);
            $table->boolean('special_offers')->default(false);
            $table->dropColumn('name');
        });
        DB::update('ALTER TABLE users MODIFY mobile VARCHAR(200) DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('landline');
            $table->dropColumn('newsletters');
            $table->dropColumn('special_offers');
            $table->string('name');
        });
        DB::update('ALTER TABLE users MODIFY mobile VARCHAR(200) DEFAULT NOT NULL');
    }

}

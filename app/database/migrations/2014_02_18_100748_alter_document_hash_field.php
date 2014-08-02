<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDocumentHashField extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::update('ALTER TABLE documents modify hash VARCHAR(200) DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::update('ALTER TABLE documents modify hash VARCHAR(200) DEFAULT NOT NULL');
    }
}

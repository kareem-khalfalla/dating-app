<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmokesTable extends Migration
{
    /**
     * Run the migrations.
     *2021_08_30_061236_create_smokes_table.php
     * @return void
     */
    public function up()
    {
        Schema::create('smokes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
        Schema::dropIfExists('smokes');
    }
}

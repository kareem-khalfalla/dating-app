<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_profile', function (Blueprint $table) {
            $table->unsignedMediumInteger('country_id');
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
            $table->boolean('is_hometown')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_profile');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('body_id');
            $table->foreignId('skin_id');
            $table->foreignId('hair_color_id');
            $table->foreignId('hair_length_id');
            $table->foreignId('hair_kind_id');
            $table->foreignId('eye_color_id');
            $table->foreignId('eye_glass_id');
            $table->foreignId('health_id');
            $table->foreignId('psychological_pattern_id');
            $table->decimal('height', 4);
            $table->decimal('weight', 3);
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
        Schema::dropIfExists('details');
    }
}

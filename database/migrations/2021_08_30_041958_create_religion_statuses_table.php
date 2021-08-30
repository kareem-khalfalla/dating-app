<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReligionStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('religion_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('religion_id');
            $table->foreignId('method_id');
            $table->foreignId('obligation_id');
            $table->foreignId('prayer_id');
            $table->foreignId('alfajr_prayer_id');
            $table->foreignId('headdress_id');
            $table->foreignId('fasting_id');
            $table->foreignId('reading_quran_id');
            $table->foreignId('robe_id');
            $table->foreignId('veil_id');
            $table->foreignId('overdress_id');
            $table->foreignId('beard_id');
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
        Schema::dropIfExists('religion_statuses');
    }
}

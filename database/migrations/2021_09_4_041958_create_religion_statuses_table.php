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
            $table->foreignId('profile_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('religion_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('method_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('obligation_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('prayer_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('alfajr_prayer_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('headdress_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('fasting_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('reading_quran_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('robe_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('veil_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('overdress_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('beard_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('tafaqah_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('music_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('friend_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('show_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('lesson_listing')->nullable();
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

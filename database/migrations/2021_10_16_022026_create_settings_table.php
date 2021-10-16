<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->enum('id', [1])->primary();
            $table->enum('create_fake_user_time', $this->data())->default('yearly')->nullable();
            $table->enum('delete_fake_user_time', $this->data())->default('yearly')->nullable();
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
        Schema::dropIfExists('settings');
    }

    private function data(): array
    {
        return [
            'everyMinute',
            'everyTwoMinutes',
            'everyThreeMinutes',
            'everyFourMinutes',
            'everyFiveMinutes',
            'everyTenMinutes',
            'everyFifteenMinutes',
            'everyThirtyMinutes',
            'hourly',
            'everyTwoHours',
            'everyThreeHours',
            'everyFourHours',
            'everySixHours',
            'daily',
            'twiceDaily',
            'weekly',
            'monthly',
            'twiceMonthly',
            'lastDayOfMonth',
            'yearly',
        ];
    }
}

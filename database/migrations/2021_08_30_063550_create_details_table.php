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
            $table->foreignId('profile_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('body_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('skin_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('hair_color_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('hair_length_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('hair_kind_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('eye_color_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('eye_glass_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('health_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('psychological_pattern_id')->nullable()->constrained()->onDelete('cascade');
            $table->decimal('height', 4)->nullable();
            $table->decimal('weight', 3)->nullable();
            $table->text('clarification')->nullable();
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

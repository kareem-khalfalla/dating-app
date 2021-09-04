<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('marital_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('polygamy_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('shelter_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('shelter_shape_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('shelter_way_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('children_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('children_desire_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('divorced_reason')->nullable();
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
        Schema::dropIfExists('social_statuses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('religion_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('detail_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('lifestyle_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('social_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('education_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('work_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('marriage_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedMediumInteger('hometown_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedMediumInteger('country_of_residence_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedMediumInteger('state_id')->nullable()->constrained()->onDelete('cascade');
            // $table->unsignedMediumInteger('city_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('wife_work_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('accept_wife_work_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('nationality_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('residency_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('shelter_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('relocate_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('relationship_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('gender', ['male', 'female']);
            $table->string('specialization')->nullable();
            $table->decimal('income')->nullable();
            $table->text('bio')->nullable();
            $table->text('partner_bio')->nullable();
            $table->text('competence')->nullable();
            $table->date('dob')->nullable();
            $table->string('postal_code', 32)->nullable();
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
        Schema::dropIfExists('profiles');
    }
}

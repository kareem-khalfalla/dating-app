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
            $table->unsignedMediumInteger('country_of_origin_id')->nullable();
            $table->unsignedMediumInteger('country_of_residence_id')->nullable();
            $table->unsignedMediumInteger('state_id')->nullable();
            $table->unsignedMediumInteger('native_language_id')->nullable();
            $table->unsignedMediumInteger('second_language_id')->nullable();
            $table->unsignedMediumInteger('third_language_id')->nullable();
            $table->unsignedMediumInteger('nationality_id')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('second_language_perfection')->nullable();
            $table->string('third_language_perfection')->nullable();
            $table->string('education_status')->nullable();
            $table->string('work')->nullable();
            $table->string('marriage_status')->nullable();
            $table->string('male_polygamy_status')->nullable();
            $table->string('female_polygamy_status')->nullable();
            $table->string('male_work_status')->nullable();
            $table->string('female_work_status')->nullable();
            $table->string('male_study_status')->nullable();
            $table->string('female_study_status')->nullable();
            $table->string('residence_status')->nullable();
            $table->string('relocate_status')->nullable();
            $table->string('relationship_status')->nullable();
            $table->string('body_status')->nullable();
            $table->string('skin_status')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('hair_length')->nullable();
            $table->string('hair_kind')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('eye_glass')->nullable();
            $table->string('health_status')->nullable();
            $table->string('psychological_pattern')->nullable();
            $table->string('shelter_type')->nullable();
            $table->string('shelter_shape')->nullable();
            $table->string('shelter_way')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('children_status')->nullable();
            $table->string('children_desire_status')->nullable();
            $table->string('smoke_status')->nullable();
            $table->string('alcohol_status')->nullable();
            $table->string('halal_food_status')->nullable();
            $table->string('food_type')->nullable();
            $table->string('religion')->nullable();
            $table->string('religion_method')->nullable();
            $table->string('obligation')->nullable();
            $table->string('prayer')->nullable();
            $table->string('alfajr_prayer')->nullable();
            $table->string('headdress')->nullable();
            $table->string('fasting')->nullable();
            $table->string('reading_quran')->nullable();
            $table->string('robe_status')->nullable();
            $table->string('veil_status')->nullable();
            $table->string('overdress')->nullable();
            $table->string('beard_status')->nullable();
            $table->string('tafaqah_status')->nullable();
            $table->string('music_status')->nullable();
            $table->string('friend_status')->nullable();
            $table->string('show_status')->nullable();
            $table->unsignedTinyInteger('children_count')->default(0);
            $table->string('postal_code', 32)->nullable();
            $table->string('progress_bar', 5)->nullable()->default('08.00');
            $table->string('specialization')->nullable();
            $table->string('books')->nullable();
            $table->string('places')->nullable();
            $table->string('interests')->nullable();
            $table->decimal('height')->nullable();
            $table->decimal('income')->nullable();
            $table->decimal('weight')->nullable();
            $table->date('dob')->nullable();
            $table->text('bio')->nullable();
            $table->text('partner_bio')->nullable();
            $table->text('competence')->nullable();
            $table->text('children_information')->nullable();
            $table->text('divorced_reason')->nullable();
            $table->text('clarification')->nullable();
            $table->text('lesson_listing')->nullable();
            $table->timestamps();
            // $table->unsignedMediumInteger('city')->nullable();


            $table->foreign('country_of_origin_id')->on('countries')->references('id');
            $table->foreign('country_of_residence_id')->on('countries')->references('id');
            $table->foreign('state_id')->on('states')->references('id');
            $table->foreign('native_language_id')->on('languages')->references('id');
            $table->foreign('second_language_id')->on('languages')->references('id');
            $table->foreign('third_language_id')->on('languages')->references('id');
            $table->foreign('nationality_id')->on('nationalities')->references('id');
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

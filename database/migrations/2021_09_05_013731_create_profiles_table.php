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
            $table->foreignId('education_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('work_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('marriage_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('wife_work_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('wife_polygamy_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('wife_study_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('accept_wife_work_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('accept_wife_study_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('nationality_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('residence_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('relocate_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('relationship_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('body_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('skin_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('hair_color_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('hair_length_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('hair_kind_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('eye_color_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('eye_glass_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('health_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('psychological_pattern_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('shelter_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('shelter_shape_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('shelter_way_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('marital_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('polygamy_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('children_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('children_desire_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('smoke_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('alcohol_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('halal_food_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('food_type_id')->nullable()->constrained('food_types')->onDelete('cascade');
            $table->foreignId('religion_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('religion_method_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('obligation_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('prayer_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('alfajr_prayer_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('headdress_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('fasting_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('reading_quran_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('robe_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('veil_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('overdress_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('beard_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('tafaqah_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('music_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('friend_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('show_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedMediumInteger('state_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedMediumInteger('country_of_origin_id')->nullable();
            $table->unsignedMediumInteger('country_of_residence_id')->nullable();
            $table->unsignedTinyInteger('children_count')->default(0);
            $table->string('postal_code', 32)->nullable();
            $table->string('progress_bar', 5)->nullable()->default('00.00');
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
            // $table->unsignedMediumInteger('city_id')->nullable()->constrained()->onDelete('cascade');


            $table->foreign('country_of_origin_id')->references('id')->on('country')->onDelete('cascade');
            $table->foreign('country_of_residence_id')->references('id')->on('country')->onDelete('cascade');
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

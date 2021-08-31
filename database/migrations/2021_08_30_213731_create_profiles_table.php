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
            $table->foreignId('social_status_id')->nullable();
            $table->foreignId('education_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('work_status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('marriage_id')->nullable();
            $table->foreignId('hometown_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('country_of_residence_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('nationality_id')->nullable();
            $table->foreignId('shelter_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('residency_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('relocate_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('relationship_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('gender', ['male', 'female']);
            $table->string('specialization')->nullable();
            $table->decimal('income')->nullable();
            $table->unsignedTinyInteger('partner_work_acceptance_status')->default(1);
            $table->unsignedTinyInteger('partner_education_acceptance_status')->default(1);
            $table->text('bio')->nullable();
            $table->text('partner_bio')->nullable();
            $table->date('dob')->nullable();
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

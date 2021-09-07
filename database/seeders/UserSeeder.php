<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mm.com',
            'username' => 'superadmin',
            'phone' => '123-123-1234',
            'password' => bcrypt('secret'),
            'gender' => 'male',
        ]);

        /** @var \App\Models\Profile $adminUserProfile */
        $adminUserProfile = $user->profile()->create();
        $adminUserProfile->education_status_id = rand(1, 3);
        $adminUserProfile->work_status_id = rand(1, 3);
        $adminUserProfile->marriage_status_id = rand(1, 3);
        $adminUserProfile->wife_work_status_id = rand(1, 3);
        $adminUserProfile->wife_study_status_id = rand(1, 3);
        $adminUserProfile->accept_wife_work_status_id = rand(1, 3);
        $adminUserProfile->accept_wife_study_status_id = rand(1, 3);
        $adminUserProfile->nationality_id = rand(1, 3);
        $adminUserProfile->residency_status_id = rand(1, 3);
        $adminUserProfile->relocate_status_id = rand(1, 3);
        $adminUserProfile->relationship_status_id = rand(1, 2);
        $adminUserProfile->hometown_id = rand(1, 3);
        $adminUserProfile->country_of_residence_id = rand(1, 3);
        $adminUserProfile->state_id = rand(1, 3);

        $adminUserProfile->specialization = 'Computers';
        $adminUserProfile->income = 999.99;
        $adminUserProfile->bio = 'Lorem ipsum dolor sit amet consectetur.';
        $adminUserProfile->partner_bio = 'Lorem, ipsum dolor sit amet consectetur adipisicing.';
        $adminUserProfile->competence = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.';
        $adminUserProfile->dob = '1995-01-14';
        $adminUserProfile->postal_code = '123-45';
        $adminUserProfile->progress_bar = '99.99';

        $adminUserProfile->shelter_type_id = rand(1, 2);
        $adminUserProfile->shelter_shape_id = rand(1, 4);
        $adminUserProfile->shelter_way_id = rand(1, 3);

        $adminUserProfile->smoke_status_id = rand(1, 4);
        $adminUserProfile->alcohol_status_id = rand(1, 4);
        $adminUserProfile->halal_food_status_id = rand(1, 4);
        $adminUserProfile->food_type_id = rand(1, 4);
        $adminUserProfile->books = 'Lorem ipsum, dolor sit amet consectetur adipisicing.';
        $adminUserProfile->places = 'Lorem ipsum dolor sit amet consectetur.';
        $adminUserProfile->interests = 'Lorem ipsum dolor sit amet.';

        $adminUserProfile->body_id = rand(1, 4);
        $adminUserProfile->skin_status_id = rand(1, 4);
        $adminUserProfile->hair_color_id = rand(1, 4);
        $adminUserProfile->hair_length_id = rand(1, 4);
        $adminUserProfile->hair_kind_id = rand(1, 4);
        $adminUserProfile->eye_color_id = rand(1, 4);
        $adminUserProfile->eye_glass_id = rand(1, 3);
        $adminUserProfile->health_id = rand(1, 3);
        $adminUserProfile->psychological_pattern_id = rand(1, 4);
        $adminUserProfile->height = rand(166, 188);
        $adminUserProfile->weight = rand(66, 111);
        $adminUserProfile->clarification = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, ipsam?';

        $adminUserProfile->marital_status_id = rand(1, 3);
        $adminUserProfile->polygamy_status_id = rand(1, 3);
        $adminUserProfile->shelter_type_id = rand(1, 3);
        $adminUserProfile->shelter_shape_id = rand(1, 3);
        $adminUserProfile->shelter_way_id = rand(1, 3);

        $adminUserProfile->children_count = rand(1, 9);
        $adminUserProfile->children_status_id = rand(1, 3);
        $adminUserProfile->children_information = 'Lorem ipsum dolor sit.';

        $adminUserProfile->children_desire_status_id = rand(1, 3);
        $adminUserProfile->divorced_reason = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima error iste cumque omnis iure. Ratione!';



        $adminUserProfile->religion_id = rand(1, 3);
        $adminUserProfile->method_id = rand(1, 3);
        $adminUserProfile->obligation_id = rand(1, 3);
        $adminUserProfile->prayer_id = rand(1, 3);
        $adminUserProfile->alfajr_prayer_id = rand(1, 3);
        $adminUserProfile->headdress_id = rand(1, 3);
        $adminUserProfile->fasting_id = rand(1, 3);
        $adminUserProfile->reading_quran_id = rand(1, 3);
        $adminUserProfile->robe_status_id = rand(1, 3);
        $adminUserProfile->veil_status_id = rand(1, 3);
        // $adminUserProfile->overdress_id = rand(1, 2);
        $adminUserProfile->beard_status_id = rand(1, 3);
        $adminUserProfile->tafaqah_status_id = rand(1, 3);
        $adminUserProfile->music_status_id = rand(1, 3);
        $adminUserProfile->friend_status_id = rand(1, 3);
        $adminUserProfile->show_status_id = rand(1, 3);
        $adminUserProfile->lesson_listing = 'Lorem ipsum dolor sit amet.';

        $adminUserProfile->save();
    }
}

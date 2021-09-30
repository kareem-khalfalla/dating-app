<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Language;
use App\Models\Nationality;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        /** @var \App\Models\Profile $profile */
        $profile = $user->profile()->create();
        $profile->country_of_origin_id = Country::all()->random()->id;
        $profile->country_of_residence_id = Country::all()->random()->id;
        $profile->state_id = Country::find($profile->country_of_origin_id)->states->random()->id;
        $profile->native_language_id = Language::all()->random()->id;
        $profile->second_language_id = Language::all()->random()->id;
        $profile->third_language_id = Language::all()->random()->id;
        $profile->nationality_id = Nationality::all()->random()->id;
        $profile->hobbies = '[Sport, Reading, Writing, Travel, Games, Computer, Spoking]';
        $profile->second_language_perfection = $faker->randomElement($this->perfections());
        $profile->third_language_perfection = $faker->randomElement($this->perfections());
        $profile->education_status = $faker->randomElement(['Doctorate', 'Master', 'Bachelor', 'Institut', 'Secondary', 'Junior', 'Other',]);
        $profile->work = $faker->randomElement(['Working', 'Student', 'Job seeker', 'House wife',]);
        $profile->marriage_status = $faker->randomElement([
            'Engagement and then marriageStatus',
            'A short acquaintance, then engagement, then marriageStatus',
            'Long time acquaintance before engagement',
            'Friendship and love before engagement',
            'no marriageStatus',
        ]);
        $profile->residence_status = $faker->randomElement(['Citizen', 'Resident', 'Visitor', 'Student',]);
        $profile->relocate_status = $faker->randomElement([
            'Accept',
            'Refuse',
            'Accept due to nearby city',
            'Accept due to be inside my origin',
            'Accept due to nearby country',
        ]);
        $profile->relationship_status = $faker->randomElement([
            'MarriageStatus', 'Other',
        ]);
        $profile->body_status = $faker->randomElement([
            'Fit', 'Fitness', 'Fat', 'Thin',
        ]);
        $profile->skin_status = $faker->randomElement([
            'White', 'Very light', 'light', 'Tan', 'Wheat', 'dark', 'Very dark',
        ]);
        $profile->hair_color = $faker->randomElement([
            'Black', 'Brown', 'Light brown', 'Blonde', 'White', 'Red',
        ]);
        $profile->hair_length = $faker->randomElement([
            'Hairless', 'Shaved', 'Short', 'a little tall', 'Long', 'Very long',
        ]);
        $profile->hair_kind = $faker->randomElement([
            'Smooth', 'Crispy', 'Slightly curly', 'Very curly', 'Other',
        ]);
        $profile->eye_color = $faker->randomElement([
            'Black', 'Brown', 'Light brown', 'Blue', 'Hazel', 'Green',
        ]);
        $profile->eye_glass = $faker->randomElement([
            'No', 'Eyeglass', 'Contact lenses',
        ]);
        $profile->health_status = $faker->randomElement([
            'Good', 'Some persistent diseases', 'Partial handicap',
        ]);
        $profile->psychological_pattern = $faker->randomElement([
            'Normal', 'Neural', 'Romantic', 'Very sensitive',
            'Irritable', 'quick to get angry', 'Calm',
            'Suspicious', 'Curious', 'Sly', 'Cheerful',
        ]);
        $profile->shelter_type = $faker->randomElement([
            'Mine', 'Rent',
        ]);
        $profile->shelter_shape = $faker->randomElement([
            'Detached house',
            'Apartment',
            'Room',
            'Student housing',
            'Shared accommodation',
        ]);
        $profile->shelter_way = $faker->randomElement([
            'Alone',
            'With family',
            'With friends',
        ]);
        $profile->marital_status = $faker->randomElement([
            'Single', 'Married', 'Widower', 'divorced',
        ]);

        $profile->children_status = $faker->randomElement([
            'Yes, but they are not with me',
            'Yes, but not now',
            'According to the wishes of the other partner',
        ]);
        $profile->children_desire_status = $faker->randomElement([
            'I would like it',
            'I do not want it',
            'Yes but not now',
            'According to the desire of the other partner',
        ]);
        $profile->smoke_status = $faker->randomElement([
            'Yes', 'No, I do not like it', 'No', 'a little', 'Shisha',
        ]);
        $profile->alcohol_status = $faker->randomElement([
            'Yes', 'No', 'No, I do not like it', 'a little',
        ]);
        $profile->halal_food_status = $faker->randomElement([
            'Halal only', 'Halal if exists', 'Not a problem', 'Vegetarian',
        ]);
        $profile->food_type = $faker->randomElement([
            'Arabic', 'Western', 'Asian', 'Fastfood', 'Hearty meals',
        ]);
        $profile->religion = $faker->randomElement([
            'Christianity', 'Islam', 'Secular', 'Hinduism', 'Buddhism',
            'Chinese traditional religion', 'African traditional religions',
            'Sikhism', 'Spiritism', 'Judaism', 'Baháʼí', 'Jainism', 'Shinto',
            'Cao', 'Zoroastrianism', 'Tenrikyo', 'Animism', 'Neo-Paganism',
            'Unitarian Universalism', 'Rastafari',
        ]);
        $profile->religion_method = $faker->randomElement([
            'Feel', 'Dismissal predecessor', 'Sufi of the Sunnah',
            'Zedy Munkar', 'Jaafari', 'Matrade', 'Abadi', 'My income',
            'brothers', 'Ethiopian', 'Protestant', 'Catholic', 'Autodox',
            'I do not know', 'other',
        ]);
        $profile->obligation = $faker->randomElement([
            'Committed', 'Uncommitted', 'Sometimes obligated', 'Not interested',
        ]);
        $profile->prayer = $faker->randomElement([
            'Committed to', 'Not original', 'Original and leave', 'Friday only', 'Mostly original',
        ]);
        $profile->alfajr_prayer = $faker->randomElement([
            'Committed to', 'Not Committed to', 'Sometimes',
        ]);
        $profile->fasting = $faker->randomElement([
            'Ramadan', 'Ramadan and waffles', 'Not every Ramadan',
        ]);
        $profile->reading_quran = $faker->randomElement([
            'Read daily', 'Read a lot', 'Read a little', 'Rarely', 'Do not read',
        ]);

        if ($user->gender == 'male') {
            $profile->male_work_status = $faker->randomElement([
                'Yes',
                'Should work',
                'I do not accept',
                'I do not like it but leave it to her',
                'It does not matter',
            ]);
            $profile->male_study_status = $faker->randomElement([
                'Yes',
                'No',
                'I do not like it but leave it to her',
            ]);
            $profile->male_polygamy_status = $faker->randomElement([
                'Yes',
                'No',
                'Yes, but in agreement with the other partner',
                'Not in my mind, but if I decide to, I will',
                'Not in my mind, but if I decide to, I do not do it without her consent',
            ]);
            $profile->beard_status = $faker->randomElement([
                'No', 'light', 'heavy'
            ]);
        } else {
            $profile->female_work_status = $faker->randomElement([
                'Yes',
                'I have to work',
                'I do not accept to work',
                'If allowed',
                'I do not like to work unless circumstances require',
            ]);
            $profile->female_polygamy_status = $faker->randomElement([
                'Accept',
                'I accept if he was previously married and I do not accept that he gets married after me',
                'I do not accept',
                'May we agree on that',
            ]);
            $profile->female_study_status = $faker->randomElement([
                'Yes',
                'No',
                'Yes, if I may',
            ]);
            $profile->headdress = $faker->randomElement([
                'Yes' => 'Yes',
                'No' => 'No',
                'With his trait' => 'With his trait',
            ]);
            $profile->robe_status = $faker->randomElement([
                'full', 'jilbab covering the knees', 'jilbab covering the waist',
                'No jilbab', 'No, but I would like to wear it',
            ]);
            $profile->veil_status = $faker->randomElement([
                'Yes', 'No',
                'I do not want to wear it',
                'No, but if the husband wants, I will wear it',
            ]);
            // $profile->overdress = $faker->randomElement([]);
        }
        $profile->tafaqah_status = $faker->randomElement([
            'Know the basics', 'Read or attend lessons Sometimes',
            'Interested in educationStatus and try it', 'Seek knowledge',
        ]);
        $profile->music_status = $faker->randomElement([
            'Listen', 'Listen a little', 'I hear, but I want to leave it',
            'I do not hear songs', 'I do not hear and I do not want her at home',
        ]);
        $profile->friend_status = $faker->randomElement([
            'I have no problem with that',
            'I have my own controls',
            'I do not have it and I refuse to do so',
            'Connect with colleagues outside of work',
        ]);
        $profile->show_status = $faker->randomElement([
            'Watch it', 'A little', 'Rarely', 'No', 'No, and I do not want it at home',
        ]);
        $profile->children_count = rand(0, 9);
        $profile->postal_code = $faker->postcode();
        $profile->progress_bar = 99.99;
        $profile->specialization = $faker->jobTitle();
        $profile->books = $faker->word();
        $profile->places = $faker->word();
        $profile->interests = $faker->word();
        $profile->height = rand(155, 190);
        $profile->weight = rand(50, 130);
        $profile->income = rand(999, 9999);
        $profile->dob = $faker->dateTimeBetween('-60 years');
        $profile->bio = $faker->paragraph();
        $profile->partner_bio = $faker->paragraph();
        $profile->competence = $faker->paragraph();
        $profile->children_information = $faker->paragraph();
        if ($profile->marital_status == 'divorced') {
            $profile->divorced_reason = $faker->paragraph();
        }
        $profile->clarification = $faker->paragraph();
        $profile->lesson_listing = $faker->paragraph();

        $profile->save();
    }

    private function perfections(): array
    {
        return [
            'High',
            'Good',
            'Bad',
        ];
    }
}

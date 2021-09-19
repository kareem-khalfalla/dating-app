<?php

namespace App\Actions\Fortify;

use App\Models\Language;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name'     => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone'    => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'gender'   => ['required', 'string'],

            'dob'            => ['nullable', 'date'],
            'postal_code'    => ['nullable', 'string', 'max:32'],
            'income'         => ['nullable', 'numeric'],
            'height'         => ['nullable', 'numeric'],
            'weight'         => ['nullable', 'numeric'],
            'children_count' => ['nullable', 'integer', 'min:0', 'max:9'],

            // textarea
            'bio'                  => ['nullable', 'string', 'min:6', 'max:1000'],
            'competence'           => ['nullable', 'string', 'min:6', 'max:1000'],
            'partner_bio'          => ['nullable', 'string', 'min:6', 'max:1000'],
            'divorced_reason'      => ['nullable', 'string', 'min:6', 'max:1000'],
            'children_information' => ['nullable', 'string', 'min:6', 'max:1000'],
            'lesson_listing'       => ['nullable', 'string', 'min:6', 'max:1000'],
            'interests'            => ['nullable', 'string', 'min:6', 'max:1000'],
            'books'                => ['nullable', 'string', 'min:6', 'max:1000'],
            'places'               => ['nullable', 'string', 'min:6', 'max:1000'],
            'clarification'        => ['nullable', 'string', 'min:6', 'max:1000'],


            // select boxes
            'religion_id'                 => ['nullable', 'numeric'],
            'obligation_id'               => ['nullable', 'numeric'],
            'religion_method_id'          => ['nullable', 'numeric'],
            'prayer_id'                   => ['nullable', 'numeric'],
            'alfajr_prayer_id'            => ['nullable', 'numeric'],
            'fasting_id'                  => ['nullable', 'numeric'],
            'reading_quran_id'            => ['nullable', 'numeric'],
            'tafaqah_status_id'           => ['nullable', 'numeric'],
            'music_status_id'             => ['nullable', 'numeric'],
            'show_status_id'              => ['nullable', 'numeric'],
            'friend_status_id'            => ['nullable', 'numeric'],
            'country_hometown'            => ['nullable', 'numeric'],
            'country_residence'           => ['nullable', 'numeric'],
            'residency_status_id'         => ['nullable', 'numeric'],
            'relocate_status_id'          => ['nullable', 'numeric'],
            'nationality_id'              => ['nullable', 'numeric'],
            'education_status_id'         => ['nullable', 'numeric'],
            'relationship_status_id'      => ['nullable', 'numeric'],
            'marriage_status_id'          => ['nullable', 'numeric'],
            'work_status_id'              => ['nullable', 'numeric'],
            'accept_wife_work_status_id'  => ['nullable', 'numeric'],
            'accept_wife_study_status_id' => ['nullable', 'numeric'],
            'wife_work_status_id'         => ['nullable', 'numeric'],
            'wife_study_status_id'        => ['nullable', 'numeric'],
            'wife_polygamy_status_id'     => ['nullable', 'numeric'],
            'marital_status_id'           => ['nullable', 'numeric'],
            'children_status_id'          => ['nullable', 'numeric'],
            'children_desire_status_id'   => ['nullable', 'numeric'],
            'polygamy_status_id'          => ['nullable', 'numeric'],
            'shelter_type_id'             => ['nullable', 'numeric'],
            'shelter_shape_id'            => ['nullable', 'numeric'],
            'shelter_way_id'              => ['nullable', 'numeric'],
            'body_status_id'              => ['nullable', 'numeric'],
            'skin_status_id'              => ['nullable', 'numeric'],
            'hair_color_id'               => ['nullable', 'numeric'],
            'hair_length_id'              => ['nullable', 'numeric'],
            'hair_kind_id'                => ['nullable', 'numeric'],
            'eye_color_id'                => ['nullable', 'numeric'],
            'eye_glass_id'                => ['nullable', 'numeric'],
            'health_status_id'            => ['nullable', 'numeric'],
            'psychological_pattern_id'    => ['nullable', 'numeric'],
            'state_id'                    => ['nullable', 'numeric'],
            'language_*'                  => ['nullable', 'numeric'],
            'country_*'                   => ['nullable', 'numeric'],

            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        $arr = Arr::only($input, [
            'language_native', 'language_second', 'language_third',
        ]);

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        foreach ($arr as $key => $value) {
            if (is_null($value)) {
                continue;
            } else {
                if ($key == 'language_second') {
                    Language::where('id', $value)->update([
                        'order' => 2
                    ]);
                }

                if ($key == 'language_third') {
                    Language::where('id', $value)->update([
                        'order' => 3
                    ]);
                }
                $profile->languages()->syncWithoutDetaching($input[$key]);
            }
        }


        if (isset($input['language_second_perfection_id'])) {
            $user->profile->languages()->second()->first()->update([
                'language_perfection_status_id' => $input['language_second_perfection_id']
            ]);
        }

        if (isset($input['language_third_perfection_id'])) {
            $user->profile->languages()->second()->first()->update([
                'language_perfection_status_id' => $input['language_third_perfection_id']
            ]);
        }


        $countriesIds = [
            $input['country_hometown'],
            $input['country_residence'],
        ];
                
        $profile->countries()->sync($countriesIds);
        $profile->countries->find($countriesIds[1])->pivot->is_hometown = 0;
        $profile->countries->find($countriesIds[1])->pivot->save();

        $profile->update([
            'dob'                         => $input['dob'],
            'residency_status_id'         => $input['residency_status_id'],
            'relocate_status_id'          => $input['relocate_status_id'],
            'nationality_id'              => $input['nationality_id'],
            'relationship_status_id'      => $input['relationship_status_id'],
            'marriage_status_id'          => $input['marriage_status_id'],
            'education_status_id'         => $input['education_status_id'],
            'work_status_id'              => $input['work_status_id'],
            'accept_wife_work_status_id'  => $input['accept_wife_work_status_id'],
            'accept_wife_study_status_id' => $input['accept_wife_study_status_id'],
            'wife_work_status_id'         => $input['wife_work_status_id'],
            'wife_study_status_id'        => $input['wife_study_status_id'],
            'income'                      => $input['income'],
            'state_id'                    => $input['state_id'],
            'postal_code'                 => $input['postal_code'],
            'bio'                         => $input['bio'],
            'competence'                  => $input['competence'],
            'partner_bio'                 => $input['partner_bio'],
            'progress_bar'                => $input['progress_bar'],
            'marital_status_id'           => $input['marital_status_id'],
            'divorced_reason'             => $input['divorced_reason'],
            'children_status_id'          => $input['children_status_id'],
            'children_desire_status_id'   => $input['children_desire_status_id'],
            'polygamy_status_id'          => $input['polygamy_status_id'],
            'shelter_type_id'             => $input['shelter_type_id'],
            'shelter_shape_id'            => $input['shelter_shape_id'],
            'shelter_way_id'              => $input['shelter_way_id'],
            'children_count'              => $input['children_count'],
            'children_information'        => $input['children_information'],
            'religion_id'                 => $input['religion_id'],
            'obligation_id'               => $input['obligation_id'],
            'religion_method_id'          => $input['religion_method_id'],
            'prayer_id'                   => $input['prayer_id'],
            'alfajr_prayer_id'            => $input['alfajr_prayer_id'],
            'fasting_id'                  => $input['fasting_id'],
            'reading_quran_id'            => $input['reading_quran_id'],
            'headdress_id'                => $input['headdress_id'],
            'veil_status_id'              => $input['veil_status_id'],
            'robe_status_id'              => $input['robe_status_id'],
            'beard_status_id'             => $input['beard_status_id'],
            'tafaqah_status_id'           => $input['tafaqah_status_id'],
            'lesson_listing'              => $input['lesson_listing'],
            'music_status_id'             => $input['music_status_id'],
            'show_status_id'              => $input['show_status_id'],
            'friend_status_id'            => $input['friend_status_id'],
            // 'overdress_id'             => $input['overdress_id'],
            'body_status_id'              => $input['body_status_id'],
            'skin_status_id'              => $input['skin_status_id'],
            'hair_color_id'               => $input['hair_color_id'],
            'hair_length_id'              => $input['hair_length_id'],
            'hair_kind_id'                => $input['hair_kind_id'],
            'eye_color_id'                => $input['eye_color_id'],
            'eye_glass_id'                => $input['eye_glass_id'],
            'health_status_id'            => $input['health_status_id'],
            'psychological_pattern_id'    => $input['psychological_pattern_id'],
            'height'                      => $input['height'],
            'weight'                      => $input['weight'],
            'clarification'               => $input['clarification'],
            'smoke_status_id'             => $input['smoke_status_id'],
            'alcohol_status_id'           => $input['alcohol_status_id'],
            'halal_food_status_id'        => $input['halal_food_status_id'],
            'books'                       => $input['books'],
            'places'                      => $input['places'],
            'interests'                   => $input['interests'],
        ]);

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'gender' => $input['gender'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}

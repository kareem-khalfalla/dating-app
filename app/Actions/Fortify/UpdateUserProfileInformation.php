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

            'dob'           => ['required', 'date'],
            'postal_code'   => ['required', 'string', 'max:32'],
            'childrenCount' => ['required', 'integer', 'min:0', 'max:9'],
            'income'        => ['required', 'numeric'],
            'height'        => ['required', 'numeric'],
            'weight'        => ['required', 'numeric'],

            // textarea
            'bio'                 => ['required', 'string', 'min:6', 'max:1000'],
            'competence'          => ['required', 'string', 'min:6', 'max:1000'],
            'partner_bio'         => ['required', 'string', 'min:6', 'max:1000'],
            'divorced_reason'     => ['required', 'string', 'min:6', 'max:1000'],
            'childrenInformation' => ['required', 'string', 'min:6', 'max:1000'],
            'lesson_listing'      => ['required', 'string', 'min:6', 'max:1000'],
            'interests'           => ['required', 'string', 'min:6', 'max:1000'],
            'books'               => ['required', 'string', 'min:6', 'max:1000'],
            'places'              => ['required', 'string', 'min:6', 'max:1000'],
            'clarification'       => ['required', 'string', 'min:6', 'max:1000'],


            // select boxes
            'religion_id'                 => ['nullable', 'numeric'],
            'obligation_id'               => ['nullable', 'numeric'],
            'method_id'                   => ['nullable', 'numeric'],
            'prayer_id'                   => ['nullable', 'numeric'],
            'alfajr_prayer_id'            => ['nullable', 'numeric'],
            'fasting_id'                  => ['nullable', 'numeric'],
            'reading_quran_id'            => ['nullable', 'numeric'],
            'tafaqah_id'                  => ['nullable', 'numeric'],
            'music_status_id'             => ['nullable', 'numeric'],
            'show_status_id'              => ['nullable', 'numeric'],
            'friend_status_id'            => ['nullable', 'numeric'],
            'hometown_id'                 => ['nullable', 'numeric'],
            'country_of_residence_id'     => ['nullable', 'numeric'],
            'residency_id'                => ['nullable', 'numeric'],
            'relocate_id'                 => ['nullable', 'numeric'],
            'nationality_id'              => ['nullable', 'numeric'],
            'education_id'                => ['nullable', 'numeric'],
            'relationship_id'             => ['nullable', 'numeric'],
            'marriage_id'                 => ['nullable', 'numeric'],
            'work_status_id'              => ['nullable', 'numeric'],
            'accept_wife_work_status_id'  => ['nullable', 'numeric'],
            'accept_wife_study_status_id' => ['nullable', 'numeric'],
            'wife_work_status_id'         => ['nullable', 'numeric'],
            'wife_study_status_id'        => ['nullable', 'numeric'],
            'marital_status_id'           => ['nullable', 'numeric'],
            'children_status_id'          => ['nullable', 'numeric'],
            'children_desire_status_id'   => ['nullable', 'numeric'],
            'polygamy_status_id'          => ['nullable', 'numeric'],
            'shelter_type_id'             => ['nullable', 'numeric'],
            'shelter_shape_id'            => ['nullable', 'numeric'],
            'shelter_way_id'              => ['nullable', 'numeric'],
            'body_id'                     => ['nullable', 'numeric'],
            'skin_id'                     => ['nullable', 'numeric'],
            'hair_color_id'               => ['nullable', 'numeric'],
            'hair_length_id'              => ['nullable', 'numeric'],
            'hair_kind_id'                => ['nullable', 'numeric'],
            'eye_color_id'                => ['nullable', 'numeric'],
            'eye_glass_id'                => ['nullable', 'numeric'],
            'health_id'                   => ['nullable', 'numeric'],
            'psychological_pattern_id'    => ['nullable', 'numeric'],
            'state_id'                    => ['nullable', 'numeric'],
            'language_*'                  => ['nullable', 'numeric'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        $arr = Arr::only($input, [
            'language_native', 'language_second', 'language_third',
        ]);

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
                $user->profile->languages()->syncWithoutDetaching($input[$key]);
            }
        }


        if (isset($input['language_second_perfection_id'])) {
            $user->profile->languages()->second()->first()->update([
                'language_perfection_id' => $input['language_second_perfection_id']
            ]);
        }

        if (isset($input['language_third_perfection_id'])) {
            $user->profile->languages()->second()->first()->update([
                'language_perfection_id' => $input['language_third_perfection_id']
            ]);
        }

        $user->profile()->update([
            'dob' => $input['dob'],
            'hometown_id' => $input['hometown_id'],
            'country_of_residence_id' => $input['country_of_residence_id'],
            'residency_id' => $input['residency_id'],
            'relocate_id' => $input['relocate_id'],
            'nationality_id' => $input['nationality_id'],
            'relationship_id' => $input['relationship_id'],
            'marriage_id' => $input['marriage_id'],
            'education_id' => $input['education_id'],
            'work_status_id' => $input['work_status_id'],
            'accept_wife_work_status_id' => $input['accept_wife_work_status_id'],
            'accept_wife_study_status_id' => $input['accept_wife_study_status_id'],
            'wife_work_status_id' => $input['wife_work_status_id'],
            'wife_study_status_id' => $input['wife_study_status_id'],
            'income' => $input['income'],
            'state_id' => $input['state_id'],
            'postal_code' => $input['postal_code'],
            'bio' => $input['bio'],
            'competence' => $input['competence'],
            'partner_bio' => $input['partner_bio'],
            'progress_bar' => $input['progress_bar'],
        ]);

        $user->profile->socialStatus->update([
            'marital_status_id' => $input['marital_status_id'],
            'divorced_reason' => $input['divorced_reason'],
            'children_status_id' => $input['children_status_id'],
            'children_desire_status_id' => $input['children_desire_status_id'],
            'polygamy_status_id' => $input['polygamy_status_id'],
            'shelter_type_id' => $input['shelter_type_id'],
            'shelter_shape_id' => $input['shelter_shape_id'],
            'shelter_way_id' => $input['shelter_way_id'],
        ]);

        if (!is_null($user->profile->socialStatus->childrenStatus)) {
            $user->profile->socialStatus->childrenStatus->update([
                'count' => $input['childrenCount'],
                'information' => $input['childrenInformation'],
            ]);
        }

        $user->profile->religionStatus->update([
            'religion_id' => $input['religion_id'],
            'obligation_id' => $input['obligation_id'],
            'method_id' => $input['method_id'],
            'prayer_id' => $input['prayer_id'],
            'alfajr_prayer_id' => $input['alfajr_prayer_id'],
            'fasting_id' => $input['fasting_id'],
            'reading_quran_id' => $input['reading_quran_id'],
            'headdress_id' => $input['headdress_id'],
            'veil_id' => $input['veil_id'],
            'robe_id' => $input['robe_id'],
            'beard_id' => $input['beard_id'],
            'tafaqah_id' => $input['tafaqah_id'],
            'lesson_listing' => $input['lesson_listing'],
            'music_status_id' => $input['music_status_id'],
            'show_status_id' => $input['show_status_id'],
            'friend_status_id' => $input['friend_status_id'],
            // 'overdress_id' => $input['overdress_id'],
        ]);

        $user->profile->detail->update([
            'body_id' => $input['body_id'],
            'skin_id' => $input['skin_id'],
            'hair_color_id' => $input['hair_color_id'],
            'hair_length_id' => $input['hair_length_id'],
            'hair_kind_id' => $input['hair_kind_id'],
            'eye_color_id' => $input['eye_color_id'],
            'eye_glass_id' => $input['eye_glass_id'],
            'health_id' => $input['health_id'],
            'psychological_pattern_id' => $input['psychological_pattern_id'],
            'height' => $input['height'],
            'weight' => $input['weight'],
            'clarification' => $input['clarification'],
        ]);

        $user->profile->lifeStyle->update([
            'smoke_id' => $input['smoke_id'],
            'alcohol_id' => $input['alcohol_id'],
            'halal_food_id' => $input['halal_food_id'],
            'books' => $input['books'],
            'places' => $input['places'],
            'interests' => $input['interests'],
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

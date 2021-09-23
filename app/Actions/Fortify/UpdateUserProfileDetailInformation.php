<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileDetailInformation implements UpdatesUserProfileInformation
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
            'dob' => ['required', 'date'],
            'country_of_residence_id' => ['required', 'numeric'],
            'nationality_id' => ['required', 'numeric'],
            'postal_code' => ['required', 'string'],
            'residence_status_id' => ['required', 'numeric'],
            'relocate_status_id' => ['required', 'numeric'],
            'language_native_id' => ['required', 'numeric'],
            'language_second_id' => ['required', 'numeric'],
            'language_third_id' => ['required', 'numeric'],
            'language_second_perfection_id' => ['required_with:language_second_id', 'numeric'],
            'language_third_perfection_id' => ['required_with:language_third_id', 'numeric'],
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;


        if (isset($input['hobby_id'])) {
            $profile->hobbies()->sync($input['hobby_id']);
        }

        $profile->update([
            'dob'                         => $input['dob'],
            'nationality_id'              => $input['nationality_id'],
            'postal_code'                 => $input['postal_code'],
            'residence_status_id'         => $input['residence_status_id'],
            'relocate_status_id'          => $input['relocate_status_id'],
            'state_id'                    => $input['state_id'],
            'country_of_origin_id'        => $input['country_of_origin_id'],
            'country_of_residence_id'     => $input['country_of_residence_id'],
            'language_native_id'          => $input['language_native_id'],
            'language_second_id'          => $input['language_second_id'],
            'language_third_id'           => $input['language_third_id'],
        ]);

        $profile->languageSecond->update([
            'language_perfection_status_id' => $input['language_second_perfection_id'],
        ]);

        $profile->languageThird->update([
            'language_perfection_status_id' => $input['language_third_perfection_id'],
        ]);
    }
}
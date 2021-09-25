<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileReligionInformation implements UpdatesUserProfileInformation
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
            'religion_id' => ['required', 'integer'],
            'religion_method_id' => ['required', 'integer'],
            'obligation_id' => ['required', 'integer'],
            'prayer_id' => ['required', 'integer'],
            'alfajr_prayer_id' => ['required', 'integer'],
            'fasting_id' => ['required', 'integer'],
            'reading_quran_id' => ['required', 'integer'],
            'beard_status_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'integer'],
            'headdress_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'integer'],
            'robe_status_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'integer'],
            'veil_status_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'integer'],
            'tafaqah_status_id' => ['required', 'integer'],
            'lesson_listing' => ['required', 'string', 'max:1000'],
            'music_status_id' => ['required', 'integer'],
            'show_status_id' => ['required', 'integer'],
            'friend_status_id' => ['required', 'integer'],
        ], [
            '*.integer' => 'Please choose :attribute'
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

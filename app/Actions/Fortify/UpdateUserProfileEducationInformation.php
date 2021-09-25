<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileEducationInformation implements UpdatesUserProfileInformation
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
            'education_status_id' => ['required', 'integer'],
            'competence' => ['required', 'string', 'max:1000'],
            'work_status_id' => ['required', 'integer'],
            'income' => ['required', 'numeric'],
            'accept_wife_work_status_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'integer'],
            'accept_wife_study_status_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'integer'],
            'wife_work_status_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'integer'],
            'wife_study_status_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'integer'],
        ], [
            '*.integer' => 'The :attribute is required'
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

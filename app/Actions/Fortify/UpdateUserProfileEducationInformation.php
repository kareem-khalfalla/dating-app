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
            'work_status' => ['required', 'string', Rule::in([
                'Working',
                'Student',
                'Job seeker',
                'House wife',
            ])],
            'competence' => ['required', 'string', 'max:1000'],
            'education_status' => ['required', 'string', Rule::in([
                'Doctorate', 'Master', 'Bachelor', 'Institut', 'Secondary', 'Junior', 'Other',
            ])],
            'income' => ['required', 'numeric'],
            'accept_wife_work_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'string', Rule::in([
                'yes',
                'should work',
                'I do not accept',
                'I do not like it but leave it to her',
                'it does not matter',
            ])],
            'accept_wife_study_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'string', Rule::in([
                'yes',
                'should work',
                'I do not accept',
                'I do not like it but leave it to her',
                'it does not matter',
            ])],
            'wife_work_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'string', Rule::in([
                'I have to work',
                'I do not accept to work',
                'If allowed',
                'I do not like to work unless circumstances require',
            ])],

            'wife_study_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'string', Rule::in([
                'Yes',
                'No',
                'No, but I leave the choice to her',
                'Yes, if I may',
            ])],

        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

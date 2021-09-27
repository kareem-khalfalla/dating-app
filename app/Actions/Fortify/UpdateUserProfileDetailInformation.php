<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
            'country_of_residence_id' => ['required', 'integer'],
            'nationality_id' => ['required', 'integer'],
            'postal_code' => ['required', 'string'],
            'residence_status' => ['required', 'string', Rule::in([
                'Citizen', 'Resident', 'Visitor', 'Student',
            ])],
            'relocate_status' => ['required', 'string', Rule::in([
                'Accept',
                'Refuse',
                'Accept due to nearby city',
                'Accept due to be inside my origin',
                'Accept due to nearby country',
            ])],
            'native_language_id' => ['required', 'integer'],
            'second_language_id' => ['required', 'integer'],
            'third_language_id' => ['required', 'integer'],
            'second_language_perfection' => [
                'required_with:second_language_id', 'string', Rule::in($this->perfection())
            ],
            'third_language_perfection' => [
                'required_with:third_language_id', Rule::in($this->perfection())
            ],
        ], [
            '*.integer' => 'The :attribute is required.'
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }

    private function perfection(): array
    {
        return [
            'High',
            'Good',
            'Bad',
        ];
    }
}

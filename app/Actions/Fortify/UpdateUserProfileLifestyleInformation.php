<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileLifestyleInformation implements UpdatesUserProfileInformation
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
            'smoke_status' => ['required', 'string', Rule::in([
                'Yes', 'No, I do not like it', 'No', 'a little', 'Shisha',
            ])],
            'alcohol_status' => ['required', 'string', Rule::in([
                'Yes', 'No', 'No, I do not like it', 'a little',
            ])],
            'halal_food_status' => ['required', 'string', Rule::in([
                'Halal only', 'Halal if exists', 'Not a problem', 'Vegetarian',
            ])],
            'food_type' => ['required', 'string', Rule::in([
                'Arabic', 'Western', 'Asian', 'Fastfood', 'Hearty meals',
            ])],
            'hobbies' => ['required'],
            'interests' => ['required', 'string', 'max:1000'],
            'books' => ['required', 'string', 'max:1000'],
            'places' => ['required', 'string', 'max:1000'],
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

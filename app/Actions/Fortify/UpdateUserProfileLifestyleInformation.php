<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
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
            'smoke_status_id' => ['required', 'integer'],
            'alcohol_status_id' => ['required', 'integer'],
            'halal_food_status_id' => ['required', 'integer'],
            'food_type_id' => ['required', 'integer'],
            'hobby_id' => ['required', 'integer'],
            'interests' => ['required', 'string', 'max:1000'],
            'books' => ['required', 'string', 'max:1000'],
            'places' => ['required', 'string', 'max:1000'],
        ], [
            '*.integer' => 'The :attribute is required'
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update(Arr::except($input, 'hobby_id'));

        $profile->hobbies()->sync($input['hobby_id']);
    }
}

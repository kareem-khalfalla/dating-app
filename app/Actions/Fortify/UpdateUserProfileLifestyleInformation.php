<?php

namespace App\Actions\Fortify;

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

        $profile->update([
            'smoke_status_id' => $input['smoke_status_id'],
            'alcohol_status_id' => $input['alcohol_status_id'],
            'halal_food_status_id' => $input['halal_food_status_id'],
            'food_type_id' => $input['food_type_id'],
            'interests' => $input['interests'],
            'books' => $input['books'],
            'places' => $input['places'],
        ]);

        $profile->hobbies()->sync($input['hobby_id']);
    }
}

<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileShapeInformation implements UpdatesUserProfileInformation
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
            'height' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
            'body_status_id' => ['required', 'integer'],
            'skin_status_id' => ['required', 'integer'],
            'hair_color_id' => ['required', 'integer'],
            'hair_length_id' => ['required', 'integer'],
            'hair_kind_id' => ['required', 'integer'],
            'eye_color_id' => ['required', 'integer'],
            'eye_glass_id' => ['required', 'integer'],
            'health_status_id' => ['required', 'integer'],
            'psychological_pattern_id' => ['required', 'integer'],
            'clarification' => ['required', 'string', 'max:1000'],
        ], [
            '*.integer' => 'The :attribute is required'
        ])->validate();


        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

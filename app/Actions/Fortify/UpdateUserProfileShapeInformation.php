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

        $profile->update([
            'height' => $input['height'],
            'weight' => $input['weight'],
            'body_status_id' => $input['body_status_id'],
            'skin_status_id' => $input['skin_status_id'],
            'hair_color_id' => $input['hair_color_id'],
            'hair_length_id' => $input['hair_length_id'],
            'hair_kind_id' => $input['hair_kind_id'],
            'eye_color_id' => $input['eye_color_id'],
            'eye_glass_id' => $input['eye_glass_id'],
            'health_status_id' => $input['health_status_id'],
            'psychological_pattern_id' => $input['psychological_pattern_id'],
            'clarification' => $input['clarification'],
        ]);
    }
}

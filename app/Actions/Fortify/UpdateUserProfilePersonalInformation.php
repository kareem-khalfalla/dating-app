<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfilePersonalInformation implements UpdatesUserProfileInformation
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
            'bio' => ['required', 'string', 'max:1000'],
            'partner_bio' => ['required', 'string', 'max:1000'],
            'relationship_status_id' => ['required', 'integer'],
            'marriage_status_id' => ['required', 'integer'],
        ], [
            '*.integer' => 'The :attribute is required'
        ])->validate();


        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update([
            'bio' => $input['bio'],
            'partner_bio' => $input['partner_bio'],
            'relationship_status_id' => $input['relationship_status_id'],
            'marriage_status_id' => $input['marriage_status_id'],
        ]);
    }
}

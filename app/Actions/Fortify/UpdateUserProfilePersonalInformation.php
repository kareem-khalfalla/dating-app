<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
            'relationship_status' => ['required', 'string', Rule::in([
                'MarriageStatus', 'Other',
            ])],
            'marriage_status' => ['required', 'string', Rule::in([
                'Engagement and then marriageStatus',
                'A short acquaintance, then engagement, then marriageStatus',
                'Long time acquaintance before engagement',
                'Friendship and love before engagement',
                'no marriageStatus',
            ])],
        ])->validate();


        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

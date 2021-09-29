<?php

namespace App\Actions\Fortify;

use App\Traits\FormValidation;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileDetailInformation implements UpdatesUserProfileInformation
{
    use FormValidation;

    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, $this->profileDetailsRules(), [
            '*.integer' => 'The :attribute is required.'
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

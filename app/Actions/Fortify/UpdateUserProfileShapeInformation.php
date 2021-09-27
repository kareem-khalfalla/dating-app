<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
            'height' => ['required', 'integer', 'min:40', 'max:220'],
            'weight' => ['required', 'integer', 'min:40', 'max:220'],
            'body_status' => ['required', 'string', Rule::in([
                'fit', 'fitness', 'fat', 'thin',
            ])],
            'skin_status' => ['required', 'string', Rule::in([
                'White', 'very light', 'light', 'tan', 'wheat', 'dark', 'very dark',
            ])],
            'hair_color' => ['required', 'string', Rule::in([
                'Black', 'Brown', 'Light brown', 'Blonde', 'White', 'Red',
            ])],
            'hair_length' => ['required', 'string', Rule::in([
                'Hairless', 'Shaved', 'Short', 'a little tall', 'Long', 'Very long',
            ])],
            'hair_kind' => ['required', 'string', Rule::in([
                'Smooth', 'Crispy', 'Slightly curly', 'Very curly', 'Other',
            ])],
            'eye_color' => ['required', 'string', Rule::in([
                'Black', 'Brown', 'Light brown', 'Blue', 'Hazel', 'Green',
            ])],
            'eye_glass' => ['required', 'string', Rule::in([
                'No', 'Eyeglass', 'Contact lenses',
            ])],
            'health_status' => ['required', 'string', Rule::in([
                'Good', 'Some persistent diseases', 'Partial handicap',
            ])],
            'psychological_pattern' => ['required', 'string', Rule::in([
                'Normal', 'Neural', 'Romantic', 'Very sensitive',
                'Irritable', 'quick to get angry', 'Calm',
                'Suspicious', 'Curious', 'Sly', 'Cheerful',
            ])],
            'clarification' => ['required', 'string', 'max:1000'],
        ])->validate();


        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

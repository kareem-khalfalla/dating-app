<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileSocialInformation implements UpdatesUserProfileInformation
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
            'marital_status_id' => ['required', 'integer'],
            'children_status_id' => ['required', 'integer'],
            'children_count' => ['required', 'integer'],
            'children_desire_status_id' => ['required', 'integer'],
            'children_information' => ['required', 'string', 'max:1000'],
            'divorced_reason' => ['nullable', RUle::requiredIf(function () use ($input) {
                return $input['marital_status_id'] == 4;
            }), 'max:1000'],
            'polygamy_status_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'integer'],
            'wife_polygamy_status_id' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'integer'],
            'shelter_type_id' => ['required', 'integer'],
            'shelter_shape_id' => ['required', 'integer'],
            'shelter_way_id' => ['required', 'integer'],
        ], [
            '*.integer' => 'The :attribute is required'
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

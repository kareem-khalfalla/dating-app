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
            'marital_status' => ['required', 'string', Rule::in([
                'Single', 'Married', 'Widower', 'divorced',
            ])],
            'children_status' => ['required', 'string', Rule::in([
                'Yes, but they are not with me',
                'Yes, but not now',
                'According to the wishes of the other party',
            ])],
            'children_count' => ['required', 'integer'],
            'children_desire_status' => ['required', 'string', Rule::in([
                'I would like it',
                'I do not want it',
                'Yes but not now Yes but not now',
                'According to the desire of the other party According to the desire of the other party',
            ])],
            'children_information' => ['required', 'string', 'max:1000'],
            'divorced_reason' => ['nullable', RUle::requiredIf(function () use ($input) {
                return $input['marital_status'] == 'divorced';
            }), 'max:1000'],
            'polygamy_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'string', Rule::in([
                'Yes',
                'No',
                'Yes, but in agreement with the other party',
                'It\'s not in my mind, but if I decide to, I will',
                'It\'s not in my mind, but if I decide to, I don\'t do it without her consent',
            ])],
            'wife_polygamy_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'string', Rule::in([
                'Accept',
                'I accept if he was previously married and I do not accept that he gets married after me',
                'I do not accept',
                'May we agree on that',
            ])],
            'shelter_type' => ['required', 'string', Rule::in([
                'mine', 'rent',
            ])],
            'shelter_shape' => ['required', 'string', Rule::in([
                'detached house',
                'apartment',
                'room',
                'student housing',
                'shared accommodation',
            ])],
            'shelter_way' => ['required', 'string', Rule::in([
                'alone',
                'with family',
                'with friends',
            ])],
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

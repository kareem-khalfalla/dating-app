<?php

namespace App\Actions\Fortify;

use App\Models\Language;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'gender' => ['required', 'string'],

            'dob' => ['nullable', 'date'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'competence' => ['nullable', 'string', 'max:1000'],
            'partner_bio' => ['nullable', 'string', 'max:1000'],
            'divorced_reason' => ['nullable', 'string', 'max:1000'],
            'childrenInformation' => ['nullable', 'string', 'max:1000'],

            'hometown_id' => ['nullable', 'numeric'],
            'country_of_residence_id' => ['nullable', 'numeric'],
            'residency_id' => ['nullable', 'numeric'],
            'relocate_id' => ['nullable', 'numeric'],
            'nationality_id' => ['nullable', 'numeric'],
            'education_id' => ['nullable', 'numeric'],
            'relationship_id' => ['nullable', 'numeric'],
            'marriage_id' => ['nullable', 'numeric'],
            'work_status_id' => ['nullable', 'numeric'],
            'accept_wife_work_status_id' => ['nullable', 'numeric'],
            'accept_wife_study_status_id' => ['nullable', 'numeric'],
            'wife_work_status_id' => ['nullable', 'numeric'],
            'wife_study_status_id' => ['nullable', 'numeric'],
            'marital_status_id' => ['nullable', 'numeric'],
            'children_status_id' => ['nullable', 'numeric'],
            'children_desire_status_id' => ['nullable', 'numeric'],
            'polygamy_status_id' => ['nullable', 'numeric'],
            'shelter_type_id' => ['nullable', 'numeric'],
            'shelter_shape_id' => ['nullable', 'numeric'],
            'shelter_way_id' => ['nullable', 'numeric'],
            'income' => ['nullable', 'numeric'],
            'state_id' => ['nullable', 'numeric'],
            'language_*' => ['nullable', 'numeric'],
            'postal_code' => ['nullable', 'string', 'max:32'],
            'childrenCount' => ['nullable', 'integer', 'min:0', 'max:9'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        $arr = Arr::only($input, [
            'language_native', 'language_second', 'language_third',
        ]);

        foreach ($arr as $key => $value) {
            if (is_null($value)) {
                continue;
            } else {
                if ($key == 'language_second') {
                    Language::where('id', $value)->update([
                        'order' => 2
                    ]);
                }

                if ($key == 'language_third') {
                    Language::where('id', $value)->update([
                        'order' => 3
                    ]);
                }
                $user->profile->languages()->syncWithoutDetaching($input[$key]);
            }
        }


        if (isset($input['language_second_perfection_id'])) {
            $user->profile->languages()->second()->first()->update([
                'language_perfection_id' => $input['language_second_perfection_id']
            ]);
        }

        if (isset($input['language_third_perfection_id'])) {
            $user->profile->languages()->second()->first()->update([
                'language_perfection_id' => $input['language_third_perfection_id']
            ]);
        }

        $user->profile()->update([
            'gender' => $input['gender'],
            'dob' => $input['dob'],
            'hometown_id' => $input['hometown_id'],
            'country_of_residence_id' => $input['country_of_residence_id'],
            'residency_id' => $input['residency_id'],
            'relocate_id' => $input['relocate_id'],
            'nationality_id' => $input['nationality_id'],
            'relationship_id' => $input['relationship_id'],
            'marriage_id' => $input['marriage_id'],
            'education_id' => $input['education_id'],
            'work_status_id' => $input['work_status_id'],
            'accept_wife_work_status_id' => $input['accept_wife_work_status_id'],
            'accept_wife_study_status_id' => $input['accept_wife_study_status_id'],
            'wife_work_status_id' => $input['wife_work_status_id'],
            'wife_study_status_id' => $input['wife_study_status_id'],
            'income' => $input['income'],
            'state_id' => $input['state_id'],
            'postal_code' => $input['postal_code'],
            'bio' => $input['bio'],
            'competence' => $input['competence'],
            'partner_bio' => $input['partner_bio'],
        ]);

        $user->profile->socialStatus->update([
            'marital_status_id' => $input['marital_status_id'],
            'divorced_reason' => $input['divorced_reason'],
            'children_status_id' => $input['children_status_id'],
            'children_desire_status_id' => $input['children_desire_status_id'],
            'polygamy_status_id' => $input['polygamy_status_id'],
            'shelter_type_id' => $input['shelter_type_id'],
            'shelter_shape_id' => $input['shelter_shape_id'],
            'shelter_way_id' => $input['shelter_way_id'],
        ]);

        if (!is_null($user->profile->socialStatus->childrenStatus)) {
            $user->profile->socialStatus->childrenStatus->update([
                'count' => $input['childrenCount'],
                'information' => $input['childrenInformation'],
            ]);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}

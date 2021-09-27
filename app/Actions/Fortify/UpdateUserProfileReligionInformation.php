<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileReligionInformation implements UpdatesUserProfileInformation
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
            'religion' => ['required', 'string', Rule::in([
                'Christianity', 'Islam', 'Secular', 'Hinduism', 'Buddhism',
                'Chinese traditional religion', 'African traditional religions',
                'Sikhism', 'Spiritism', 'Judaism', 'Baháʼí', 'Jainism', 'Shinto',
                'Cao', 'Zoroastrianism', 'Tenrikyo', 'Animism', 'Neo-Paganism',
                'Unitarian Universalism', 'Rastafari',
            ])],
            'religion_method' => ['required', 'string', Rule::in([
                'feel', 'Dismissal predecessor', 'Sufi of the Sunnah',
                'Zedy Munkar', 'Jaafari', 'Matrade', 'Abadi', 'my income',
                'brothers', 'Ethiopian', 'Protestant', 'Catholic', 'Autodox',
                'I do not know', 'other',
            ])],
            'obligation' => ['required', 'string', Rule::in([
                'committed', 'Uncommitted', 'sometimes obligated', 'Not interested',
            ])],
            'prayer' => ['required', 'string', Rule::in([
                'committed to', 'Not original', 'Original and leave', 'Friday only', 'mostly original',
            ])],
            'alfajr_prayer' => ['required', 'string', Rule::in([
                'committed to', 'not committed to', 'sometimes',
            ])],
            'fasting' => ['required', 'string', Rule::in([
                'Ramadan', 'Ramadan and waffles', 'Not every Ramadan',
                'I fast some days of Ramadan', 'I do not fasting',
            ])],
            'reading_quran' => ['required', 'string', Rule::in([
                'read daily', 'read a lot', 'Read a little', 'rarely', 'do not read',
            ])],
            'beard_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'string', Rule::in(['No', 'light', 'heavy',])],
            'headdress' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'string', Rule::in([
                'Yes' => 'Yes',
                'No' => 'No',
                'With his trait' => 'With his trait',
            ])],
            'robe_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'string', Rule::in([
                'full', 'jilbab covering the knees', 'jilbab covering the waist',
                'No jilbab', 'No, but I would like to wear it',
            ])],
            'veil_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'string', Rule::in([
                'yes', 'No',
                'I do not want to wear it',
                'No, but if the husband wants, I will wear it',
            ])],
            'lesson_listing' => ['required', 'string', 'max:1000'],
            'tafaqah_status' => ['required', 'string', Rule::in([
                'Know the basics', 'Read or attend lessons sometimes',
                'Interested in educationStatus and try it', 'Seek knowledge',
            ])],
            'music_status' => ['required', 'string', Rule::in([
                'Listen', 'Listen a little', 'I hear, but I want to leave it',
                'I do not hear songs', 'I do not hear and I do not want her at home',
            ])],
            'show_status' => ['required', 'string', Rule::in([
                'Watch it', 'A little', 'rarely', 'No', 'No, and I do not want her at home',
            ])],
            'friend_status' => ['required', 'string', Rule::in([
                'I have no problem with that I have no problem with that',
                'I have my own controls but I have my own controls but',
                'I do not have it and I refuse to do so I do not have it and I refuse to do so',
                'Connect with colleagues outside of work Connect with colleagues outside of work',
            ])],
        ])->validate();

        /** @var \App\Models\Profile $profile */
        $profile = $user->profile;

        $profile->update($input);
    }
}

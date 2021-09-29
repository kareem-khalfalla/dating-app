<?php

namespace App\Traits;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Validation\Rule;

trait FormValidation
{
    use PasswordValidationRules;

    public function createUserRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ];
    }

    public function profileDetailsRules(): array
    {
        return [
            'dob' => ['required', 'date'],
            'country_of_residence_id' => ['required', 'integer'],
            'nationality_id' => ['required', 'integer'],
            'postal_code' => ['required', 'string'],
            'residence_status' => ['required', 'string', Rule::in([
                'Citizen', 'Resident', 'Visitor', 'Student',
            ])],
            'relocate_status' => ['required', 'string', Rule::in([
                'Accept',
                'Refuse',
                'Accept due to nearby city',
                'Accept due to be inside my origin',
                'Accept due to nearby country',
            ])],
            'native_language_id' => ['required', 'integer'],
            'second_language_id' => ['required', 'integer'],
            'third_language_id' => ['required', 'integer'],
            'second_language_perfection' => [
                'required_with:second_language_id', 'string', Rule::in($this->perfection())
            ],
            'third_language_perfection' => [
                'required_with:third_language_id', Rule::in($this->perfection())
            ],
        ];
    }

    public function profileEducationRules(User $user): array
    {
        return [
            'work' => ['required', 'string', Rule::in([
                'Working',
                'Student',
                'Job seeker',
                'House wife',
            ])],
            'competence' => ['required', 'string', 'max:1000'],
            'education_status' => ['required', 'string', Rule::in([
                'Doctorate', 'Master', 'Bachelor', 'Institut', 'Secondary', 'Junior', 'Other',
            ])],
            'income' => ['required', 'numeric'],
            'male_work_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'string', Rule::in([
                'yes',
                'should work',
                'I do not accept',
                'I do not like it but leave it to her',
                'it does not matter',
            ])],
            'male_study_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'string', Rule::in([
                'yes',
                'No',
                'I do not like it but leave it to her',
            ])],
            'female_work_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'string', Rule::in([
                'yes',
                'I have to work',
                'I do not accept to work',
                'If allowed',
                'I do not like to work unless circumstances require',
            ])],

            'female_study_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'female';
            }), 'nullable', 'string', Rule::in([
                'Yes',
                'No',
                'Yes, if I may',
            ])],

        ];
    }

    public function profilePersonalRules(): array
    {
        return [
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
        ];
    }

    public function profileReligionRules(User $user): array
    {
        return [
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
        ];
    }

    public function profileLifestyleRules(): array
    {
        return [
            'smoke_status' => ['required', 'string', Rule::in([
                'Yes', 'No, I do not like it', 'No', 'a little', 'Shisha',
            ])],
            'alcohol_status' => ['required', 'string', Rule::in([
                'Yes', 'No', 'No, I do not like it', 'a little',
            ])],
            'halal_food_status' => ['required', 'string', Rule::in([
                'Halal only', 'Halal if exists', 'Not a problem', 'Vegetarian',
            ])],
            'food_type' => ['required', 'string', Rule::in([
                'Arabic', 'Western', 'Asian', 'Fastfood', 'Hearty meals',
            ])],
            'hobbies' => ['required'],
            'interests' => ['required', 'string', 'max:1000'],
            'books' => ['required', 'string', 'max:1000'],
            'places' => ['required', 'string', 'max:1000'],
        ];
    }

    public function profileSocialRules(User $user): array
    {
        return [
            'marital_status' => ['required', 'string', Rule::in([
                'Single', 'Married', 'Widower', 'divorced',
            ])],
            'children_status' => ['required', 'string', Rule::in([
                'Yes, but they are not with me',
                'Yes, but not now',
                'According to the wishes of the other partner',
            ])],
            'children_count' => ['required', 'integer'],
            'children_desire_status' => ['required', 'string', Rule::in([
                'I would like it',
                'I do not want it',
                'Yes but not now Yes but not now',
                'According to the desire of the other partner According to the desire of the other partner',
            ])],
            'children_information' => ['required', 'string', 'max:1000'],
            'divorced_reason' => ['nullable', RUle::requiredIf(function () {
                return $this->state['marital_status'] == 'divorced';
            }), 'max:1000'],
            'male_polygamy_status' => [Rule::requiredIf(function () use ($user) {
                return $user->gender == 'male';
            }), 'nullable', 'string', Rule::in([
                'Yes',
                'No',
                'Yes, but in agreement with the other partner',
                'Not in my mind, but if I decide to, I will',
                'Not in my mind, but if I decide to, I do not do it without her consent',
            ])],
            'female_polygamy_status' => [Rule::requiredIf(function () use ($user) {
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
        ];
    }

    public function profileShapeRules(): array
    {
        return [
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
        ];
    }

    private function perfection(): array
    {
        return [
            'High',
            'Good',
            'Bad',
        ];
    }
}

<?php

namespace App\Traits;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Validation\Rule;

trait FormValidation
{
    use PasswordValidationRules;

    public function userRules(User $user = null): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id ?? '')],
            'phone'    => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id ?? '')],
            'gender'   => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id ?? ''),
            ],
            'password' => $user ?? $this->passwordRules()
        ];
    }

    public function profileDetailsRules(): array
    {
        return [
            'dob' => ['nullable', 'date'],
            'country_of_residence_id' => ['nullable', 'integer'],
            'nationality_id' => ['nullable', 'integer'],
            'postal_code' => ['nullable', 'string'],
            'residence_status' => ['nullable', 'string', Rule::in([
                'Citizen', 'Resident', 'Visitor', 'Student',
            ])],
            'relocate_status' => ['nullable', 'string', Rule::in([
                'Accept',
                'Refuse',
                'Accept due to nearby city',
                'Accept due to be inside my origin',
                'Accept due to nearby country',
            ])],
            'native_language_id' => ['nullable', 'integer'],
            'second_language_id' => ['nullable', 'integer'],
            'third_language_id' => ['nullable', 'integer'],
            'second_language_perfection' => [
                'nullable', 'string', Rule::in($this->perfection())
            ],
            'third_language_perfection' => [
                'nullable', Rule::in($this->perfection())
            ],
        ];
    }

    public function profileEducationRules(User $user = null): array
    {
        return [
            'work' => ['nullable', 'string', Rule::in([
                'Working',
                'Student',
                'Job seeker',
                'House wife',
            ])],
            'competence' => ['nullable', 'string', 'max:1000'],
            'education_status' => ['nullable', 'string', Rule::in([
                'Doctorate', 'Master', 'Bachelor', 'Institut', 'Secondary', 'Junior', 'Other',
            ])],
            'income' => ['nullable', 'numeric'],
            'male_work_status' => [
                'nullable', 'string', Rule::in([
                    'Yes',
                    'Should work',
                    'I do not accept',
                    'I do not like it but leave it to her',
                    'It does not matter',
                ])
            ],
            'male_study_status' => [
                'nullable', 'string', Rule::in([
                    'Yes',
                    'No',
                    'I do not like it but leave it to her',
                ])
            ],
            'female_work_status' => [
                'nullable', 'string', Rule::in([
                    'Yes',
                    'I have to work',
                    'I do not accept to work',
                    'If allowed',
                    'I do not like to work unless circumstances require',
                ])
            ],

            'female_study_status' => [
                'nullable', 'string', Rule::in([
                    'Yes',
                    'No',
                    'Yes, if I may',
                ])
            ],

        ];
    }

    public function profilePersonalRules(): array
    {
        return [
            'bio' => ['nullable', 'string', 'max:1000'],
            'partner_bio' => ['nullable', 'string', 'max:1000'],
            'relationship_status' => ['nullable', 'string', Rule::in([
                'MarriageStatus', 'Other',
            ])],
            'marriage_status' => ['nullable', 'string', Rule::in([
                'Engagement and then marriageStatus',
                'A short acquaintance, then engagement, then marriageStatus',
                'Long time acquaintance before engagement',
                'Friendship and love before engagement',
                'no marriageStatus',
            ])],
        ];
    }

    public function profileReligionRules(User $user = null): array
    {
        return [
            'religion' => ['nullable', 'string', Rule::in([
                'Christianity', 'Islam', 'Secular', 'Hinduism', 'Buddhism',
                'Chinese traditional religion', 'African traditional religions',
                'Sikhism', 'Spiritism', 'Judaism', 'Baháʼí', 'Jainism', 'Shinto',
                'Cao', 'Zoroastrianism', 'Tenrikyo', 'Animism', 'Neo-Paganism',
                'Unitarian Universalism', 'Rastafari',
            ])],
            'religion_method' => ['nullable', 'string', Rule::in([
                'Feel', 'Dismissal predecessor', 'Sufi of the Sunnah',
                'Zedy Munkar', 'Jaafari', 'Matrade', 'Abadi',
                'brothers', 'Ethiopian', 'Protestant', 'Catholic', 'Autodox',
                'I do not know', 'other',
            ])],
            'obligation' => ['nullable', 'string', Rule::in([
                'Committed', 'Uncommitted', 'Sometimes obligated', 'Not interested',
            ])],
            'prayer' => ['nullable', 'string', Rule::in([
                'Committed to', 'Not original', 'Original and leave', 'Friday only', 'Mostly original',
            ])],
            'alfajr_prayer' => ['nullable', 'string', Rule::in([
                'Committed to', 'Not Committed to', 'Sometimes',
            ])],
            'fasting' => ['nullable', 'string', Rule::in([
                'Ramadan', 'Ramadan and waffles', 'Not every Ramadan',
                'I fast some days of Ramadan', 'I do not fasting',
            ])],
            'reading_quran' => ['nullable', 'string', Rule::in([
                'Read daily', 'Read a lot', 'Read a little', 'Rarely', 'Do not read',
            ])],
            'beard_status' => [
                'nullable', 'string', Rule::in(['No', 'light', 'heavy',])
            ],
            'headdress' => [
                'nullable', 'string', Rule::in([
                    'Yes' => 'Yes',
                    'No' => 'No',
                    'With his trait' => 'With his trait',
                ])
            ],
            'robe_status' => [
                'nullable', 'string', Rule::in([
                    'full', 'jilbab covering the knees', 'jilbab covering the waist',
                    'No jilbab', 'No, but I would like to wear it',
                ])
            ],
            'veil_status' => [
                'nullable', 'string', Rule::in([
                    'Yes', 'No',
                    'I do not want to wear it',
                    'No, but if the husband wants, I will wear it',
                ])
            ],
            'lesson_listing' => ['nullable', 'string', 'max:1000'],
            'tafaqah_status' => ['nullable', 'string', Rule::in([
                'Know the basics', 'Read or attend lessons Sometimes',
                'Interested in educationStatus and try it', 'Seek knowledge',
            ])],
            'music_status' => ['nullable', 'string', Rule::in([
                'Listen', 'Listen a little', 'I hear, but I want to leave it',
                'I do not hear songs', 'I do not hear and I do not want her at home',
            ])],
            'show_status' => ['nullable', 'string', Rule::in([
                'Watch it', 'A little', 'Rarely', 'No', 'No, and I do not want it at home',
            ])],
            'friend_status' => ['nullable', 'string', Rule::in([
                'I have no problem with that',
                'I have my own controls',
                'I do not have it and I refuse to do so',
                'Connect with colleagues outside of work',
            ])],
        ];
    }

    public function profileLifestyleRules(): array
    {
        return [
            'smoke_status' => ['nullable', 'string', Rule::in([
                'Yes', 'No, I do not like it', 'No', 'a little', 'Shisha',
            ])],
            'alcohol_status' => ['nullable', 'string', Rule::in([
                'Yes', 'No', 'No, I do not like it', 'a little',
            ])],
            'halal_food_status' => ['nullable', 'string', Rule::in([
                'Halal only', 'Halal if exists', 'Not a problem', 'Vegetarian',
            ])],
            'food_type' => ['nullable', 'string', Rule::in([
                'Arabic', 'Western', 'Asian', 'Fastfood', 'Hearty meals',
            ])],
            'hobbies' => ['nullable'],
            'interests' => ['nullable', 'string', 'max:1000'],
            'books' => ['nullable', 'string', 'max:1000'],
            'places' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function profileSocialRules(User $user = null): array
    {
        return [
            'marital_status' => ['nullable', 'string', Rule::in([
                'Single', 'Married', 'Widower', 'divorced',
            ])],
            'children_status' => ['nullable', 'string', Rule::in([
                'Yes, but they are not with me',
                'Yes, but not now',
                'According to the wishes of the other partner',
            ])],
            'children_count' => ['nullable', 'integer'],
            'children_desire_status' => ['nullable', 'string', Rule::in([
                'I would like it',
                'I do not want it',
                'Yes but not now',
                'According to the desire of the other partner',
            ])],
            'children_information' => ['nullable', 'string', 'max:1000'],
            'divorced_reason' => [
                'nullable',
                'max:1000'
            ],
            'male_polygamy_status' => [
                'nullable', 'string', Rule::in([
                    'Yes',
                    'No',
                    'Yes, but in agreement with the other partner',
                    'Not in my mind, but if I decide to, I will',
                    'Not in my mind, but if I decide to, I do not do it without her consent',
                ])
            ],
            'female_polygamy_status' => [
                'nullable', 'string', Rule::in([
                    'Accept',
                    'I accept if he was previously married and I do not accept that he gets married after me',
                    'I do not accept',
                    'May we agree on that',
                ])
            ],
            'shelter_type' => ['nullable', 'string', Rule::in([
                'Mine', 'Rent',
            ])],
            'shelter_shape' => ['nullable', 'string', Rule::in([
                'Detached house',
                'Apartment',
                'Room',
                'Student housing',
                'Shared accommodation',
            ])],
            'shelter_way' => ['nullable', 'string', Rule::in([
                'Alone',
                'With family',
                'With friends',
            ])],
        ];
    }

    public function profileShapeRules(): array
    {
        return [
            'height' => ['nullable', 'numeric', 'min:40', 'max:220'],
            'weight' => ['nullable', 'numeric', 'min:40', 'max:220'],
            'body_status' => ['nullable', 'string', Rule::in([
                'Fit', 'Fitness', 'Fat', 'Thin',
            ])],
            'skin_status' => ['nullable', 'string', Rule::in([
                'White', 'Very light', 'light', 'Tan', 'Wheat', 'dark', 'Very dark',
            ])],
            'hair_color' => ['nullable', 'string', Rule::in([
                'Black', 'Brown', 'Light brown', 'Blonde', 'White', 'Red',
            ])],
            'hair_length' => ['nullable', 'string', Rule::in([
                'Hairless', 'Shaved', 'Short', 'a little tall', 'Long', 'Very long',
            ])],
            'hair_kind' => ['nullable', 'string', Rule::in([
                'Smooth', 'Crispy', 'Slightly curly', 'Very curly', 'Other',
            ])],
            'eye_color' => ['nullable', 'string', Rule::in([
                'Black', 'Brown', 'Light brown', 'Blue', 'Hazel', 'Green',
            ])],
            'eye_glass' => ['nullable', 'string', Rule::in([
                'No', 'Eyeglass', 'Contact lenses',
            ])],
            'health_status' => ['nullable', 'string', Rule::in([
                'Good', 'Some persistent diseases', 'Partial handicap',
            ])],
            'psychological_pattern' => ['nullable', 'string', Rule::in([
                'Normal', 'Neural', 'Romantic', 'Very sensitive',
                'Irritable', 'quick to get angry', 'Calm',
                'Suspicious', 'Curious', 'Sly', 'Cheerful',
            ])],
            'clarification' => ['nullable', 'string', 'max:1000'],
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

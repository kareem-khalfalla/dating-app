<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        // details
        'dob'                           => 'Date of birth',
        'selectedCountry'               => 'Country of origin',
        'selectedState'                 => 'States',
        'country_of_residence_id'       => 'Country of residence',
        'nationality_id'                => 'Nationality',
        'postal_code'                   => 'Postal code',
        'residence_status_id'           => 'Residence',
        'relocate_status_id'            => 'Relocate',
        'language_native_id'            => 'Mother tongue',
        'language_second_id'            => 'the second language',
        'language_third_id'             => 'third language',
        'language_second_perfection_id' => 'second language quality',
        'language_third_perfection_id'  => 'The quality of the third language',
        // personal
        'bio'                           => 'bio',
        'partner_bio'                   => 'partner bio',
        'relationship_status_id'        => 'Relationship status',
        'marriage_status_id'            => 'Marriage status',
        // education
        'education_status_id'           => 'Education',
        'competence'                    => 'Competence',
        'work_status_id'                => 'Work',
        'income'                        => 'Income',
        'male_work_status_id'    => 'Accept Wife Work',
        'male_study_status_id'   => 'accept wife Study',
        'female_work_status_id'           => 'Wife work',
        'female_study_status_id'          => 'Wife study',
        // social
        'marital_status_id'            => 'Marital status',
        'children_status_id'           => 'Children status',
        'children_count'               => 'Children count',
        'children_desire_status_id'    => 'Children desire_status',
        'children_information'         => 'Children information',
        'male_polygamy_status_id'           => 'Polygamy status',
        'female_polygamy_status_id'      => 'Wife polygamy status',
        'shelter_type_id'              => 'Shelter type',
        'shelter_shape_id'             => 'Shelter shape',
        'shelter_way_id'               => 'Shelter way',
        // religion done
        'religion_id'                   => 'Religion',
        'religion_method_id'            => 'Religion method',
        'obligation_id'                 => 'Obligation',
        'prayer_id'                     => 'Prayer status',
        'alfajr_prayer_id'              => 'Alfajr prayer status',
        'fasting_id'                    => 'Fasting status',
        'reading_quran_id'              => 'Rading quran status',
        'beard_status_id'               => 'Beard status',
        'headdress_id'                  => 'Headdress status',
        'robe_status_id'                => 'Robe status',
        'veil_status_id'                => 'Veil status',
        'tafaqah_status_id'             => 'Tafaqah status',
        'lesson_listing'                => 'Lesson status',
        'music_status_id'               => 'Music status',
        'show_status_id'                => 'Show status',
        'friend_status_id'              => 'Friend status',
        // shape
        'height'                        => 'height',
        'weight'                        => 'weight',
        'body_status_id'                => 'Body',
        'skin_status_id'                => 'Skin',
        'hair_color_id'                 => 'Hair color',
        'hair_length_id'                => 'Hair length',
        'hair_kind_id'                  => 'Hair kind',
        'eye_color_id'                  => 'Eye color',
        'eye_glass_id'                  => 'Eye glass',
        'health_status_id'              => 'Health status',
        'psychological_pattern_id'      => 'Psychological pattern',
        'clarification'                 => 'Clarification',
        // lifestyle
        'smoke_status_id'               => 'Smoke status',
        'alcohol_status_id'             => 'Alcohol status',
        'halal_food_status_id'          => 'Halal food status',
        'food_type_id'                  => 'Food type',
        'hobby_id'                      => 'Hobby',
        'interests'                     => 'Interests',
        'books'                         => 'Books',
        'places'                        => 'Places',
    ],

];

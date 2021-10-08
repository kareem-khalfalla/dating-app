<div class="container pb-1 mb-4">
    <div class="shadow m-0 bg-white pb-4 p-3">
        <form wire:submit.prevent="store" id="captcha_form" method="post" action="#">
            <div class="row">
                <div class="form-group col-md-12 m-auto ">
                    <label class="col-12" for="exampleFormControlFile1">choose image</label>
                    <input wire:model.defer="image" type="file"
                        class="form-control-file @error('image')
                        is-invalid
                    @enderror"
                        id="exampleFormControlFile1">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @if (!$isCreate)

                    <div class="input-group input-group-lg mb-3 mt-3 col-md-6">
                        <label class="col-12">fullname</label>
                        <x-input wire:model.defer="state.name" placeholder="fullname"
                            type="text" />
                    </div>
                    <div class="input-group input-group-lg mb-3 mt-3 col-md-6">
                        <label class="col-12">username</label>
                        <x-input wire:model.defer="state.username" placeholder="username"
                            type="text" />
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">email</label>
                        <x-input wire:model.defer="state.email" placeholder="email"
                            type="email" />
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">phone</label>
                        <x-input wire:model.defer="state.phone" placeholder="phone" type="tel" />
                    </div>

                @endif

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Native language</label>
                    <x-selectbox wire:model.defer="state.native_language_id">
                        <option value="">---</option>
                        @foreach ($languages as $nativeLanguage)
                            <option value="{{ $nativeLanguage->id }}">{{ $nativeLanguage->name }}</option>
                        @endforeach
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Birthday</label>
                    <x-input wire:model.defer="state.dob" placeholder="Birthday" type="date" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Country of Origin</label>
                    <x-selectbox wire:model="selectedCountry">
                        <option>---</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">
                                {{ $country->translations[app()->getLocale() == 'ar' ? 'fa' : app()->getLocale()] ?? $country->name }}
                            </option>
                        @endforeach
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Country of Residence</label>
                    <x-selectbox wire:model="state.country_of_residence_id">
                        <option>---</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">
                                {{ $country->translations[app()->getLocale() == 'ar' ? 'fa' : app()->getLocale()] ?? $country->name }}
                            </option>
                        @endforeach
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Nationality</label>
                    <x-selectbox wire:model.defer="state.nationality_id">
                        <option value="">---</option>
                        @foreach ($nationalities as $nationality)
                            <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                        @endforeach
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Moving to another place</label>
                    <x-selectbox wire:model.defer="state.relocate_status">
                        <option value="">---</option>
                        <x-selectboxes.relocate_statuses />
                    </x-selectbox>
                </div>
                <div class="form-row col-12">
                    <div class="input-group input-group-lg mb-3 col-6">
                        <label class="col-12">City</label>
                        <x-selectbox wire:model.defer="selectedState">
                            <option value="">---</option>
                            @foreach ($countryStates as $countryState)
                                <option value="{{ $countryState->id }}">{{ $countryState->name }}</option>
                            @endforeach
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-6">
                        <label class="col-12">Postal code</label>
                        <x-input wire:model.defer="state.postal_code"
                            placeholder="Postal code" />
                    </div>
                </div>
                <div class="form-row col-12">
                    <div class="input-group input-group-lg mb-3 col-7">
                        <label class="col-12">second language</label>
                        <x-selectbox wire:model.defer="state.second_language_id">
                            <option value="">---</option>
                            @foreach ($languages as $secondLanguage)
                                <option value="{{ $secondLanguage->id }}">{{ $secondLanguage->name }}</option>
                            @endforeach
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-5">
                        <label class="col-12">level</label>
                        <x-selectbox wire:model.defer="state.second_language_perfection">
                            <option value="">---</option>
                            <x-selectboxes.language_perfection />
                        </x-selectbox>
                    </div>
                </div>
                <div class="form-row col-12">
                    <div class="input-group input-group-lg mb-3 col-7">
                        <label class="col-12">third language</label>
                        <x-selectbox wire:model="state.third_language_id">
                            <option value="">---</option>
                            @foreach ($languages as $thirdLanguage)
                                <option value="{{ $thirdLanguage->id }}">{{ $thirdLanguage->name }}</option>
                            @endforeach
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-5">
                        <label class="col-12">level</label>
                        <x-selectbox wire:model.defer="state.third_language_perfection">
                            <option value="">---</option>
                            <x-selectboxes.language_perfection />
                        </x-selectbox>
                    </div>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label class="col-12">brief about me</label>
                    <x-textarea wire:model.defer="state.bio" placeholder="brief about me" />
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label class="col-12">A profile of your desired partner</label>
                    <x-textarea wire:model.defer="state.partner_bio"
                        placeholder="A profile of your desired partner" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Type of accommodation</label>
                    <x-selectbox wire:model.defer="state.residence_status">
                        <option value="">---</option>
                        <x-selectboxes.residence_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">The required relationship</label>
                    <x-selectbox wire:model.defer="state.relationship_status">
                        <option value="">---</option>
                        <x-selectboxes.relationship_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Desired method of marriageStatus</label>
                    <x-selectbox wire:model.defer="state.marriage_status">
                        <option value="">---</option>
                        <x-selectboxes.marriage_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">EducationStatus</label>
                    <x-selectbox wire:model.defer="state.education_status">
                        <option value="">---</option>
                        <x-selectboxes.education_and_work_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label
                        class="col-12">If you listen to the lessons, who will you listen to?</label>
                    <x-textarea wire:model.defer="state.lesson_listing"
                        placeholder="If you listen to the lessons, who will you listen to?" />
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label class="col-12">competence</label>
                    <x-textarea wire:model.defer="state.competence" placeholder="competence" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Monthly income</label>
                    <x-input wire:model.defer="state.income" placeholder="Monthly income" type="number" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">the work</label>
                    <x-selectbox wire:model.defer="state.work">
                        <option value="">---</option>
                        <x-selectboxes.work />
                    </x-selectbox>
                </div>
                @if ($isMale)
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">Do you accept the wife\'s work?</label>
                        <x-selectbox wire:model.defer="state.male_work_status">
                            <option value="">---</option>
                            <x-selectboxes.male.accet_wife_work />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label
                            class="col-12">Do you accept studying the wife after marriageStatus?</label>
                        <x-selectbox wire:model.defer="state.male_study_status">
                            <option value="">---</option>
                            <x-selectboxes.male.accept_wife_study />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">BeardStatus</label>
                        <x-selectbox wire:model.defer="state.beard_status">
                            <option value="">---</option>
                            <x-selectboxes.male.beard_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">Do you want polygamy?</label>
                        <x-selectbox wire:model.defer="state.male_polygamy_status">
                            <option value="">---</option>
                            <x-selectboxes.male.need_polygamy />
                        </x-selectbox>
                    </div>
                @else
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">You want the work?</label>
                        <x-selectbox wire:model.defer="state.female_work_status">
                            <option value="">---</option>
                            <x-selectboxes.female.can_work_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label
                            class="col-12">Do you want to study after marriageStatus?</label>
                        <x-selectbox wire:model.defer="state.female_study_status">
                            <option value="">---</option>
                            <x-selectboxes.female.can_study_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">Headdress</label>
                        <x-selectbox wire:model.defer="state.headdress">
                            <option value="">---</option>
                            <x-selectboxes.female.headdress_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">Niqab</label>
                        <x-selectbox wire:model.defer="state.veil_status">
                            <option value="">---</option>
                            <x-selectboxes.female.niqab_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">Veil</label>
                        <x-selectbox wire:model.defer="state.robe_status">
                            <option value="">---</option>
                            <x-selectboxes.female.jilbab_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">Do you accept polygamy?</label>
                        <x-selectbox wire:model.defer="state.female_polygamy_status">
                            <option value="">---</option>
                            <x-selectboxes.female.can_polygamy_statuses />
                        </x-selectbox>
                    </div>
                @endif
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Religious</label>
                    <x-selectbox wire:model.defer="state.religion">
                        <option value="">---</option>
                        <x-selectboxes.religions />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label for="ReligionMethod" class="col-12">ReligionMethod</label>
                    <x-selectbox wire:model.defer="state.religion_method">
                        <option value="">---</option>
                        <x-selectboxes.religion_method />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Commitment</label>
                    <x-selectbox wire:model.defer="state.obligation">
                        <option value="">---</option>
                        <x-selectboxes.obligations />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Prayer</label>
                    <x-selectbox wire:model.defer="state.prayer">
                        <option value="">---</option>
                        <x-selectboxes.prayers />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Al-fajr prayer</label>
                    <x-selectbox wire:model.defer="state.alfajr_prayer">
                        <option value="">---</option>
                        <x-selectboxes.alfajr_prayer_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">fasting</label>
                    <x-selectbox wire:model.defer="state.fasting">
                        <option value="">---</option>
                        <x-selectboxes.fastings />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Reading the Qoran</label>
                    <x-selectbox wire:model.defer="state.reading_quran">
                        <option value="">---</option>
                        <x-selectboxes.reading_quran_statuses />
                    </x-selectbox>
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">TafaqahStatus in religion</label>
                    <x-selectbox wire:model.defer="state.tafaqah_status">
                        <option value="">---</option>
                        <x-selectboxes.tafaqah_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Listening to music</label>
                    <x-selectbox wire:model.defer="state.music_status">
                        <option value="">---</option>
                        <x-selectboxes.music_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Movies and series</label>
                    <x-selectbox wire:model.defer="state.show_status">
                        <option value="">---</option>
                        <x-selectboxes.shows_statuses />
                        </option>
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Friends of the opposite sex</label>
                    <x-selectbox wire:model.defer="state.friend_status">
                        <option value="">---</option>
                        <x-selectboxes.friend_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Do you have children?</label>
                    <x-selectbox wire:model.defer="state.children_status">
                        <option value="">---</option>
                        <x-selectboxes.children_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">number of children</label>
                    <x-input wire:model.defer="state.children_count"
                        placeholder="number of children" min="0" max="9" type="number" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Marital Status</label>
                    <x-selectbox wire:model="state.marital_status">
                        <option value="">---</option>
                        <x-selectboxes.marital_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label
                        class="col-12">Determine the reason for the divorce, if any</label>
                    <x-textarea wire:model.defer="state.divorced_reason"
                        placeholder="Determine the reason for the divorce, if any" />
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label class="col-12">Information about children</label>
                    <x-textarea wire:model.defer="state.children_information"
                        placeholder="Information about children" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">desire to have children</label>
                    <x-selectbox wire:model.defer="state.children_desire_status">
                        <option value="">---</option>
                        <x-selectboxes.children_desire_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Current type of housing</label>
                    <x-selectbox wire:model.defer="state.shelter_type">
                        <option value="">---</option>
                        <x-selectboxes.shelter_type_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">housing form</label>
                    <x-selectbox wire:model.defer="state.shelter_shape">
                        <option value="">---</option>
                        <x-selectboxes.shelter_way_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Housing method</label>
                    <x-selectbox wire:model.defer="state.shelter_way">
                        <option value="">---</option>
                        <x-selectboxes.shelter_shape_statuses />
                    </x-selectbox>
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">Length</label>
                    <x-input wire:model.defer="state.height" type="number" min="40" max="222" placeholder="Length" />
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">the weight</label>
                    <x-input wire:model.defer="state.weight" type="number" min="40" max="222"
                        placeholder="the weight" />
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">body type</label>
                    <x-selectbox wire:model.defer="state.body_status">
                        <option value="">---</option>
                        <x-selectboxes.body_statuses />
                    </x-selectbox>
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">
                        skinStatus colour</label>
                    <x-selectbox wire:model.defer="state.skin_status">
                        <option value="">---</option>
                        <x-selectboxes.skin_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label>hair colour</label>
                    <x-selectbox wire:model.defer="state.hair_color">
                        <option value="">---</option>
                        <x-selectboxes.hair_colors />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label>hair length</label>
                    <x-selectbox wire:model.defer="state.hair_length">
                        <option value="">---</option>
                        <x-selectboxes.hair_lengths />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label>hair type</label>
                    <x-selectbox wire:model.defer="state.hair_kind">
                        <option value="">---</option>
                        <x-selectboxes.hair_types />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label>Eye color</label>
                    <x-selectbox wire:model.defer="state.eye_color">
                        <option value="">---</option>
                        <x-selectboxes.eye_colors />
                    </x-selectbox>
                </div>


                <div class="form-group mb-3 col-md-6">
                    <label>Wearing the eye</label>
                    <x-selectbox wire:model.defer="state.eye_glass">
                        <option value="">---</option>
                        <x-selectboxes.eye_glasses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label>physical healthStatus</label>
                    <x-selectbox wire:model.defer="state.health_status">
                        <option value="">---</option>
                        <x-selectboxes.health_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label>psychological pattern</label>
                    <x-selectbox wire:model.defer="state.psychological_pattern">
                        <option value="">---</option>
                        <x-selectboxes.psychological_pattern_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label>smoking</label>
                    <x-selectbox wire:model.defer="state.smoke_status">
                        <option value="">---</option>
                        <x-selectboxes.smoke_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label>Alcohol</label>
                    <x-selectbox wire:model.defer="state.alcohol_status">
                        <option value="">---</option>
                        <x-selectboxes.alcohol_statuses />
                    </x-selectbox>
                </div>


                <div class="form-group mb-3 col-md-6">
                    <label>halal food</label>
                    <x-selectbox wire:model.defer="state.halal_food_status">
                        <option value="">---</option>
                        <x-selectboxes.halal_food_statuses />
                    </x-selectbox>
                </div>

                <div wire:ignore class="form-group mb-3 col-md-6">
                    <label>food style</label>
                    <x-selectbox wire:model.defer="state.food_type">
                        <option value="">---</option>
                        <x-selectboxes.food_type_statuses />
                    </x-selectbox>
                </div>

                <div wire:ignore class="form-group mb-3 col-md-6">
                    <label>Interests</label>
                    <x-selectbox wire:model.defer="state.hobbies" class="select2" multiple>
                        <x-selectboxes.hobbies :hobbies="$state['hobbies'] ?? []" />
                    </x-selectbox>
                </div>

                <div class="form-group  mb-3 col-md-6">
                    <label
                        for="exampleFormControlTextarea1">Clarification on physical healthStatus</label>
                    <x-textarea wire:model.defer="state.clarification" />
                </div>
                <div class="form-group  mb-3 col-md-6">
                    <label for="exampleFormControlTextarea1">Favorite books</label>
                    <x-textarea wire:model.defer="state.books" />
                </div>

                <div class="form-group  mb-3 col-md-6">
                    <label for="exampleFormControlTextarea1">favorite places</label>
                    <x-textarea wire:model.defer="state.places" />
                </div>

                <div class="form-group  mb-3 col-md-6">
                    <label for="exampleFormControlTextarea1">Other interests</label>
                    <x-textarea wire:model.defer="state.interests" />
                </div>
                <div class="mt-4 col-12">
                    <button class="btn btn-dark">submit</button>
                </div>
            </div>
        </form>
    </div>
    <br>
</div>

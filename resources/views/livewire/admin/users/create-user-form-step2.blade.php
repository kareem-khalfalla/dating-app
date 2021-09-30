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
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Native language') }}</label>
                    <x-selectbox wire:model.defer="state.native_language_id">
                        <option value="">---</option>
                        @foreach ($languages as $nativeLanguage)
                            <option value="{{ $nativeLanguage->id }}">{{ $nativeLanguage->name }}</option>
                        @endforeach
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Birthday') }}</label>
                    <x-input wire:model.defer="state.dob" placeholder="{{ __('settings.Birthday') }}" type="date" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Country of Origin') }}</label>
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
                    <label class="col-12">{{ __('settings.Country of Residence') }}</label>
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
                    <label class="col-12">{{ __('settings.Nationality') }}</label>
                    <x-selectbox wire:model.defer="state.nationality_id">
                        <option value="">---</option>
                        @foreach ($nationalities as $nationality)
                            <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                        @endforeach
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Moving to another place') }}</label>
                    <x-selectbox wire:model.defer="state.relocate_status">
                        <option value="">---</option>
                        <x-selectboxes.relocate_statuses />
                    </x-selectbox>
                </div>
                <div class="form-row col-12">
                    <div class="input-group input-group-lg mb-3 col-6">
                        @if ($selectedCountry)
                            <label class="col-12">{{ __('settings.City') }}</label>
                            <x-selectbox wire:model.defer="selectedState">
                                <option value="">---</option>
                                @foreach ($countryStates as $countryState)
                                    <option value="{{ $countryState->id }}">{{ $countryState->name }}</option>
                                @endforeach
                            </x-selectbox>
                        @endif
                    </div>
                    <div class="input-group input-group-lg mb-3 col-6">
                        <label class="col-12">{{ __('settings.Postal code') }}</label>
                        <x-input wire:model.defer="state.postal_code"
                            placeholder="{{ __('settings.Postal code') }}" />
                    </div>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Type of accommodation') }}</label>
                    <x-selectbox wire:model.defer="state.residence_status">
                        <option value="">---</option>
                        <x-selectboxes.residence_statuses />
                    </x-selectbox>
                </div>
                <div class="form-row col-12">
                    <div class="input-group input-group-lg mb-3 col-7">
                        <label class="col-12">{{ __('settings.second language') }}</label>
                        <x-selectbox wire:model.defer="state.second_language_id">
                            <option value="">---</option>
                            @foreach ($languages as $secondLanguage)
                                <option value="{{ $secondLanguage->id }}">{{ $secondLanguage->name }}</option>
                            @endforeach
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-5">
                        @if (isset($state['second_language_id']))

                            <label class="col-12">{{ __('settings.level') }}</label>
                            <x-selectbox wire:model.defer="state.second_language_perfection">
                                <option value="">---</option>
                                <x-selectboxes.language_perfection />
                            </x-selectbox>
                        @endif
                    </div>
                </div>
                <div class="form-row col-12">
                    <div class="input-group input-group-lg mb-3 col-7">
                        <label class="col-12">{{ __('settings.third language') }}</label>
                        <x-selectbox wire:model="state.third_language_id">
                            <option value="">---</option>
                            @foreach ($languages as $thirdLanguage)
                                <option value="{{ $thirdLanguage->id }}">{{ $thirdLanguage->name }}</option>
                            @endforeach
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-5">
                        @if (isset($state['third_language_id']))
                            <label class="col-12">{{ __('settings.level') }}</label>
                            <x-selectbox wire:model.defer="state.third_language_perfection">
                                <option value="">---</option>
                                <x-selectboxes.language_perfection />
                            </x-selectbox>
                        @endif
                    </div>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.brief about me') }}</label>
                    <x-textarea wire:model.defer="state.bio" placeholder="{{ __('settings.brief about me') }}" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.A profile of your desired partner') }}</label>
                    <x-textarea wire:model.defer="state.partner_bio"
                        placeholder="{{ __('settings.A profile of your desired partner') }}" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.The required relationship') }}</label>
                    <x-selectbox wire:model.defer="state.relationship_status">
                        <option value="">---</option>
                        <x-selectboxes.relationship_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Desired method of marriageStatus') }}</label>
                    <x-selectbox wire:model.defer="state.marriage_status">
                        <option value="">---</option>
                        <x-selectboxes.marriage_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.EducationStatus') }}</label>
                    <x-selectbox wire:model.defer="state.education_status">
                        <option value="">---</option>
                        <x-selectboxes.education_and_work_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.the work') }}</label>
                    <x-selectbox wire:model.defer="state.work">
                        <option value="">---</option>
                        <x-selectboxes.work />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label
                        class="col-12">{{ __('settings.If you listen to the lessons, who will you listen to?') }}</label>
                    <x-textarea wire:model.defer="state.lesson_listing"
                        placeholder="{{ __('settings.If you listen to the lessons, who will you listen to?') }}" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.competence') }}</label>
                    <x-textarea wire:model.defer="state.competence" placeholder="{{ __('settings.competence') }}" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Monthly income') }}</label>
                    <x-input wire:model.defer="state.income" placeholder="Monthly income" type="number" />
                </div>
                @if ($isMale)
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">{{ __('settings.Do you accept the wife\'s work?') }}</label>
                        <x-selectbox wire:model.defer="state.male_work_status">
                            <option value="">---</option>
                            <x-selectboxes.male.accet_wife_work />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label
                            class="col-12">{{ __('settings.Do you accept studying the wife after marriageStatus?') }}</label>
                        <x-selectbox wire:model.defer="state.male_study_status">
                            <option value="">---</option>
                            <x-selectboxes.male.accept_wife_study />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">{{ __('settings.BeardStatus') }}</label>
                        <x-selectbox wire:model.defer="state.beard_status">
                            <option value="">---</option>
                            <x-selectboxes.male.beard_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">{{ __('settings.Do you want polygamy?') }}</label>
                        <x-selectbox wire:model.defer="state.male_polygamy_status">
                            <option value="">---</option>
                            <x-selectboxes.male.need_polygamy />
                        </x-selectbox>
                    </div>
                @else
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">{{ __('settings.You want the work?') }}</label>
                        <x-selectbox wire:model.defer="state.female_work_status">
                            <option value="">---</option>
                            <x-selectboxes.female.can_work_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label
                            class="col-12">{{ __('settings.Do you want to study after marriageStatus?') }}</label>
                        <x-selectbox wire:model.defer="state.female_study_status">
                            <option value="">---</option>
                            <x-selectboxes.female.can_study_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">{{ __('settings.Headdress') }}</label>
                        <x-selectbox wire:model.defer="state.headdress">
                            <option value="">---</option>
                            <x-selectboxes.female.headdress_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">{{ __('settings.Niqab') }}</label>
                        <x-selectbox wire:model.defer="state.veil_status">
                            <option value="">---</option>
                            <x-selectboxes.female.niqab_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">{{ __('settings.Veil') }}</label>
                        <x-selectbox wire:model.defer="state.robe_status">
                            <option value="">---</option>
                            <x-selectboxes.female.jilbab_statuses />
                        </x-selectbox>
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label class="col-12">{{ __('settings.Do you accept polygamy?') }}</label>
                        <x-selectbox wire:model.defer="state.female_polygamy_status">
                            <option value="">---</option>
                            <x-selectboxes.female.can_polygamy_statuses />
                        </x-selectbox>
                    </div>
                @endif
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Religious') }}</label>
                    <x-selectbox wire:model.defer="state.religion">
                        <option value="">---</option>
                        <x-selectboxes.religions />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label for="ReligionMethod" class="col-12">{{ __('settings.ReligionMethod') }}</label>
                    <x-selectbox wire:model.defer="state.religion_method">
                        <option value="">---</option>
                        <x-selectboxes.religion_method />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Commitment') }}</label>
                    <x-selectbox wire:model.defer="state.obligation">
                        <option value="">---</option>
                        <x-selectboxes.obligations />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Prayer') }}</label>
                    <x-selectbox wire:model.defer="state.prayer">
                        <option value="">---</option>
                        <x-selectboxes.prayers />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Al-fajr prayer') }}</label>
                    <x-selectbox wire:model.defer="state.alfajr_prayer">
                        <option value="">---</option>
                        <x-selectboxes.alfajr_prayer_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.fasting') }}</label>
                    <x-selectbox wire:model.defer="state.fasting">
                        <option value="">---</option>
                        <x-selectboxes.fastings />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Reading the Qoran') }}</label>
                    <x-selectbox wire:model.defer="state.reading_quran">
                        <option value="">---</option>
                        <x-selectboxes.reading_quran_statuses />
                    </x-selectbox>
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.TafaqahStatus in religion') }}</label>
                    <x-selectbox wire:model.defer="state.tafaqah_status">
                        <option value="">---</option>
                        <x-selectboxes.tafaqah_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Listening to music') }}</label>
                    <x-selectbox wire:model.defer="state.music_status">
                        <option value="">---</option>
                        <x-selectboxes.music_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Movies and series') }}</label>
                    <x-selectbox wire:model.defer="state.show_status">
                        <option value="">---</option>
                        <x-selectboxes.shows_statuses />
                        </option>
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Friends of the opposite sex') }}</label>
                    <x-selectbox wire:model.defer="state.friend_status">
                        <option value="">---</option>
                        <x-selectboxes.friend_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Do you have children?') }}</label>
                    <x-selectbox wire:model.defer="state.children_status">
                        <option value="">---</option>
                        <x-selectboxes.children_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.number of children') }}</label>
                    <x-input wire:model.defer="state.children_count"
                        placeholder="{{ __('settings.number of children') }}" min="0" max="9" type="number" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Marital Status') }}</label>
                    <x-selectbox wire:model="state.marital_status">
                        <option value="">---</option>
                        <x-selectboxes.marital_statuses />
                    </x-selectbox>
                </div>

                @if (isset($state['marital_status']) && $state['marital_status'] == 'divorced')
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <label
                            class="col-12">{{ __('settings.Determine the reason for the divorce, if any') }}</label>
                        <x-textarea wire:model.defer="state.divorced_reason"
                            placeholder="{{ __('settings.Determine the reason for the divorce, if any') }}" />
                    </div>
                @endif
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Information about children') }}</label>
                    <x-textarea wire:model.defer="state.children_information"
                        placeholder="{{ __('settings.Information about children') }}" />
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.desire to have children') }}</label>
                    <x-selectbox wire:model.defer="state.children_desire_status">
                        <option value="">---</option>
                        <x-selectboxes.children_desire_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Current type of housing') }}</label>
                    <x-selectbox wire:model.defer="state.shelter_type">
                        <option value="">---</option>
                        <x-selectboxes.shelter_type_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.housing form') }}</label>
                    <x-selectbox wire:model.defer="state.shelter_shape">
                        <option value="">---</option>
                        <x-selectboxes.shelter_way_statuses />
                    </x-selectbox>
                </div>
                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label class="col-12">{{ __('settings.Housing method') }}</label>
                    <x-selectbox wire:model.defer="state.shelter_way">
                        <option value="">---</option>
                        <x-selectboxes.shelter_shape_statuses />
                    </x-selectbox>
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.Length') }}</label>
                    <x-input wire:model.defer="state.height" type="number" min="40" max="222" placeholder="Length" />
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.the weight') }}</label>
                    <x-input wire:model.defer="state.weight" type="number" min="40" max="222"
                        placeholder="the weight" />
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.body type') }}</label>
                    <x-selectbox wire:model.defer="state.body_status">
                        <option value="">---</option>
                        <x-selectboxes.body_statuses />
                    </x-selectbox>
                </div>

                <div class="input-group input-group-lg mb-3 col-md-6">
                    <label for="exampleInputEmail1"> {{ __('settings.skinStatus colour') }}</label>
                    <x-selectbox wire:model.defer="state.skin_status">
                        <option value="">---</option>
                        <x-selectboxes.skin_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.hair colour') }}</label>
                    <x-selectbox wire:model.defer="state.hair_color">
                        <option value="">---</option>
                        <x-selectboxes.hair_colors />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.hair length') }}</label>
                    <x-selectbox wire:model.defer="state.hair_length">
                        <option value="">---</option>
                        <x-selectboxes.hair_lengths />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.hair type') }}</label>
                    <x-selectbox wire:model.defer="state.hair_kind">
                        <option value="">---</option>
                        <x-selectboxes.hair_types />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.Eye color') }}</label>
                    <x-selectbox wire:model.defer="state.eye_color">
                        <option value="">---</option>
                        <x-selectboxes.eye_colors />
                    </x-selectbox>
                </div>


                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.Wearing the eye') }}</label>
                    <x-selectbox wire:model.defer="state.eye_glass">
                        <option value="">---</option>
                        <x-selectboxes.eye_glasses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.physical healthStatus') }}</label>
                    <x-selectbox wire:model.defer="state.health_status">
                        <option value="">---</option>
                        <x-selectboxes.health_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.psychological pattern') }}</label>
                    <x-selectbox wire:model.defer="state.psychological_pattern">
                        <option value="">---</option>
                        <x-selectboxes.psychological_pattern_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.smoking') }}</label>
                    <x-selectbox wire:model.defer="state.smoke_status">
                        <option value="">---</option>
                        <x-selectboxes.smoke_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.Alcohol') }}</label>
                    <x-selectbox wire:model.defer="state.alcohol_status">
                        <option value="">---</option>
                        <x-selectboxes.alcohol_statuses />
                    </x-selectbox>
                </div>


                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.halal food') }}</label>
                    <x-selectbox wire:model.defer="state.halal_food_status">
                        <option value="">---</option>
                        <x-selectboxes.halal_food_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.food style') }}</label>
                    <x-selectbox wire:model.defer="state.food_type">
                        <option value="">---</option>
                        <x-selectboxes.food_type_statuses />
                    </x-selectbox>
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label for="exampleInputEmail1">{{ __('settings.Interests') }}</label>
                    <x-selectbox wire:model.defer="state.hobbies" multiple>
                        <x-selectboxes.hobbies />
                    </x-selectbox>
                </div>

                <div class="form-group  mb-3 col-md-6">
                    <label
                        for="exampleFormControlTextarea1">{{ __('settings.Clarification on physical healthStatus') }}</label>
                    <x-textarea wire:model.defer="state.clarification" />
                </div>
                <div class="form-group  mb-3 col-md-6">
                    <label for="exampleFormControlTextarea1">{{ __('settings.Favorite books') }}</label>
                    <x-textarea wire:model.defer="state.books" />
                </div>

                <div class="form-group  mb-3 col-md-6">
                    <label for="exampleFormControlTextarea1">{{ __('settings.favorite places') }}</label>
                    <x-textarea wire:model.defer="state.places" />
                </div>

                <div class="form-group  mb-3 col-md-6">
                    <label for="exampleFormControlTextarea1">{{ __('settings.Other interests') }}</label>
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

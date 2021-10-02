<div class="container pb-1 mb-4 pt-4">
    <div class="shadow m-0 bg-white pb-4 mt-4">
        <div class="setting_content pt-2 mt-4">
            <div class="col-lg-11 m-auto pb-4">
                <h3 class="color_h text-primary">Complete search</h3>
                <hr>
                <form wire:submit.prevent="showResults" method="post">
                    <br>
                    <div class="row">
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox wire:model.defer="state.residenceStatuses" class="selectpicker" multiple
                                title="Type of accommodation">
                                <x-selectboxes.residence_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3  col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.relocations"
                                title="Moving to another place" multiple>
                                <x-selectboxes.relocate_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.relationships"
                                title="Relationships" multiple>
                                <x-selectboxes.relationship_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3  col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.nativeLanguages"
                                title="Native language" multiple>
                                @foreach ($languages as $nativeLanguage)
                                    <option value="{{ $nativeLanguage->id }}">{{ $nativeLanguage->name }}</option>
                                @endforeach
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3  col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.secondLanguages"
                                title="Second language" multiple>
                                @foreach ($languages as $secondLanguage)
                                    <option value="{{ $secondLanguage->id }}">{{ $secondLanguage->name }}</option>
                                @endforeach
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.secondLanguagePerfections"
                                title="Level" multiple>
                                <x-selectboxes.language_perfection />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.thirdLanguages"
                                title="Third language" multiple>
                                @foreach ($languages as $thirdLanguage)
                                    <option value="{{ $thirdLanguage->id }}">{{ $thirdLanguage->name }}</option>
                                @endforeach
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.thirdlanguagePerfections"
                                title="Level" multiple>
                                <x-selectboxes.language_perfection />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.marriageStatuses"
                                title="Desired method of marriage" multiple>
                                <x-selectboxes.marriage_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.educationStatuses"
                                title="Education" multiple>
                                <x-selectboxes.education_and_work_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.workStatuses" title="The work"
                                multiple>
                                <x-selectboxes.work />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.acceptWifeWorkStatuses"
                                title="Do you accept the wife's work?" multiple>
                                <x-selectboxes.male.accet_wife_work />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.acceptWifeStudyStatuses"
                                title="Do you accept studying the wife after marriage?" multiple>
                                <x-selectboxes.male.accept_wife_study />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.headdresses" title="Headdress"
                                multiple>
                                <x-selectboxes.female.headdress_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.robeStatuses" title="Jilbab"
                                multiple>
                                <x-selectboxes.female.niqab_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.veilStatuses" title="Jilbab"
                                multiple>
                                <x-selectboxes.female.jilbab_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.polygamyStatuses"
                                title="Do you want multiplicity?" multiple>
                                <x-selectboxes.male.need_polygamy />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.wifeWorkStatuses"
                                title="You want the work?" multiple>
                                <x-selectboxes.female.can_work_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.wifeStudyStatuses"
                                title="Do you want to study after marriage?" multiple>
                                <x-selectboxes.female.can_study_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.beardStatuses" title="Beard"
                                multiple>
                                <x-selectboxes.male.beard_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.wifePolygamyStatuses"
                                title="Do you accept polygamy?" multiple>
                                <x-selectboxes.female.can_polygamy_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.religions" title="Religious"
                                multiple>
                                <x-selectboxes.religions />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.religionMethods" title="Method"
                                multiple>
                                <x-selectboxes.religion_method />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.obligations" title="Commitment"
                                multiple>
                                <x-selectboxes.obligations />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.prayers" title="Prayer"
                                multiple>
                                <x-selectboxes.prayers />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.alfajrPrayers" title="fasting"
                                multiple>
                                <x-selectboxes.alfajr_prayer_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.fastings" title="Fasting"
                                multiple>
                                <x-selectboxes.fastings />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.readingQurans"
                                title="Reading the Qoran" multiple>
                                <x-selectboxes.reading_quran_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.tafaqahStatuses"
                                title="Tafaqah in religion" multiple>
                                <x-selectboxes.tafaqah_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.musicStatuses"
                                title="Listening to music" multiple>
                                <x-selectboxes.music_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.showStatuses"
                                title="Movies and series" multiple>
                                <x-selectboxes.shows_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.friendStatuses"
                                title="Friends of the opposite sex" multiple>
                                <x-selectboxes.friend_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.maritalStatuses"
                                title="Marital Status" multiple>
                                <x-selectboxes.marital_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.childrenStatuses"
                                title="Do you have children?" multiple>
                                <x-selectboxes.children_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.childrenDesireStatuses"
                                title="Desire to have children" multiple>
                                <x-selectboxes.children_desire_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.shelterTypes"
                                title="Current type of housing" multiple>
                                <x-selectboxes.shelter_type_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.shelterShapes"
                                title="Housing method" multiple>
                                <x-selectboxes.shelter_shape_statuses />
                            </x-selectbox>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.shelterWays"
                                title="Housing form" multiple>
                                <x-selectboxes.shelter_way_statuses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.bodyStatuses" title="Body type"
                                multiple>
                                <x-selectboxes.body_statuses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.skinStatuses"
                                title="Skin colour" multiple>
                                <x-selectboxes.skin_statuses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.hairColors" title="Hair colour"
                                multiple>
                                <x-selectboxes.hair_colors />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.hairLengths" title="Hair length"
                                multiple>
                                <x-selectboxes.hair_lengths />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.hairKinds" title="Hair type"
                                multiple>
                                <x-selectboxes.hair_types />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.eyeColors" title="Eye color"
                                multiple>
                                <x-selectboxes.eye_colors />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.eyeGlasses"
                                title="Wearing the eye" multiple>
                                <x-selectboxes.eye_glasses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.healthStatuses"
                                title="Physical health" multiple>
                                <x-selectboxes.health_statuses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.psychologicalPatterns"
                                title="Psychological pattern" multiple>
                                <x-selectboxes.psychological_pattern_statuses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.smokeStatuses" title="Smoking"
                                multiple>
                                <x-selectboxes.smoke_statuses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.alcoholStatuses"
                                title="Alcohol" multiple>
                                <x-selectboxes.alcohol_statuses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.halalFoodStatuses"
                                title="Halal style" multiple>
                                <x-selectboxes.halal_food_statuses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.foodTypes" title="Food style"
                                multiple>
                                <x-selectboxes.food_type_statuses />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.hobbies" title="Interests"
                                multiple>
                                <x-selectboxes.hobbies />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.countriesOfOrigin"
                                title="Countries of origin" multiple>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">
                                        {{ $country->translations[app()->getLocale() == 'ar' ? 'fa' : app()->getLocale()] ?? $country->name }}
                                    </option>
                                @endforeach
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.countriesOfResidences"
                                title="Countries of residences" multiple>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">
                                        {{ $country->translations[app()->getLocale() == 'ar' ? 'fa' : app()->getLocale()] ?? $country->name }}
                                    </option>
                                @endforeach
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.nationalities"
                                title="Nationalities" multiple>
                                @foreach ($nationalities as $nationality)
                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                @endforeach
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label>Length</label>
                            <x-selectbox wire:model.defer="state.height_from_to_id">
                                <x-selectboxes.height_from_to />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label>the weight </label>
                            <x-selectbox wire:model.defer="state.weight_from_to_id">
                                <x-selectboxes.weight_from_to />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label>number of children</label>
                            <x-selectbox wire:model.defer="state.children_count_from_to_id">
                                <x-selectboxes.children_count_from_to />
                            </x-selectbox>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label>Monthly income </label>
                            <x-selectbox wire:model.defer="state.income_from_to_id"
                                class="form-control form-control-lg">
                                <x-selectboxes.income_from_to />
                            </x-selectbox>
                        </div>
                        <div class="m-4 col-12">
                            <button class="btn btn-dark">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

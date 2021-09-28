<div class="container pb-1 mb-4">
    <div class="shadow m-0 bg-white pb-4 p-3">

        <form wire:submit.prevent="store" id="captcha_form" method="post" action="#">
            <div class="row">
                <div class="form-group col-md-12 m-auto ">
                    <label class="col-12" for="exampleFormControlFile1">choose image</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                @include('livewire.inc.partials.details.native_language')
                @include('livewire.inc.partials.details.dob')
                @include('livewire.inc.partials.details.country_of_origin')
                @include('livewire.inc.partials.details.country_of_residence')
                @include('livewire.inc.partials.details.nationality')
                @include('livewire.inc.partials.details.relocate_status')
                <div class="form-row col-12">
                    @include('livewire.inc.partials.details.city')
                    @include('livewire.inc.partials.details.postal_code')
                </div>
                @include('livewire.inc.partials.details.residence_status')
                <div class="form-row col-12">
                    @include('livewire.inc.partials.details.second_language')
                    @if (isset($state['second_language_id']))
                        @include('livewire.inc.partials.details.second_language_perfection')
                    @endif
                </div>
                <div class="form-row col-12">
                    @include('livewire.inc.partials.details.third_language') <div
                        class="input-group input-group-lg mb-3 col-5">
                        @if (isset($state['third_language_id']))
                            @include('livewire.inc.partials.details.third_language_perfection')
                        @endif
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.personal.bio')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.personal.partner_bio')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.personal.relationship_status')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.personal.marriage_status')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.education_work.education')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.education_work.work')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.lesson_listing')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.education_work.competence')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.education_work.income')
                    </div>
                    @if ($state['gender'] == 'male')
                        <div class="input-group input-group-lg mb-3 col-md-6">
                            @include('livewire.inc.partials.social.polygamy_status')
                        </div>
                        <div class="input-group input-group-lg mb-3 col-md-6">
                            @include('livewire.inc.partials.education_work.male_work_status')
                        </div>
                        <div class="input-group input-group-lg mb-3 col-md-6">
                            @include('livewire.inc.partials.education_work.male_study_status')
                        </div>
                    @else
                        <div class="input-group input-group-lg mb-3 col-md-6">
                            @include('livewire.inc.partials.social.female_polygamy_status')
                        </div>
                        <div class="input-group input-group-lg mb-3 col-md-6">
                            @include('livewire.inc.partials.education_work.female_work_status')
                        </div>
                        <div class="input-group input-group-lg mb-3 col-md-6">
                            @include('livewire.inc.partials.education_work.female_study_status')
                        </div>
                    @endif
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.religion')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.religion_method')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.obligation')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.prayer')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.alfajr_prayer')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.fastings')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.reading_quran')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.headdress')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.robe')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.niqab')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.beard_status')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.tafaqah_status')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.music_status')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.show_status')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.religion.friend_status')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.social.children_status')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.social.children_count')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.social.marital_status')
                    </div>
                    @if (isset($state['marital_status']) && $state['marital_status'] == 'divorced')
                        <div class="input-group input-group-lg mb-3 col-md-6">
                            @include('livewire.inc.partials.social.divorced_reason')
                        </div>
                    @endif
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.social.children_information')
                    </div>

                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.social.children_desire_status')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.social.shelter_type')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.social.shelter_shape')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.social.shelter_method')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.height')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.weight')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.body_type')
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.skin_status')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.hair_color')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.hair_length')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.hair_type')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.eye_color')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.eye_glass')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.health_status')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.psychological_pattern')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.lifestyle.smoke_status')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.lifestyle.smoke_status')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.lifestyle.halal_food_status')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.lifestyle.food_type_status')
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        @include('livewire.inc.partials.lifestyle.hobbies')
                    </div>
                    <div class="form-group  mb-3 col-md-6">
                        @include('livewire.inc.partials.shape.clarification')
                    </div>
                    <div class="form-group  mb-3 col-md-6">
                        <label class="col-12" for="exampleFormControlTextarea1">Favorite books</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group  mb-3 col-md-6">
                        <label class="col-12" for="exampleFormControlTextarea1">favorite places</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    @include('livewire.inc.partials.lifestyle.interests')
                    <div class="mt-4 col-12">
                        <button class="btn btn-dark">submit</button>
                    </div>
                </div>
        </form>
        <br>
    </div>

</div>

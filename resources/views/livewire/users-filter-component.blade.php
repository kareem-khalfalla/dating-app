<div class="container pb-1 mb-4 pt-4">
    <div class="shadow m-0 bg-white pb-4 mt-4">
        <div class="setting_content pt-2 mt-4">
            <div id="" class="col-lg-11 m-auto pb-4">
                <h3 class="color_h text-primary">Complete search</h3>
                <hr>
                <form wire:submit.prevent="showResults" method="post">
                    <br>
                    <div class="row">
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.residenceStatuses" :data="$residenceStatuses"
                                title="Type of accommodation" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3  col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.relocations" :data="$relocations"
                                title="Moving to another place" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.relationships" :data="$relationships"
                                title="Relationships" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3  col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.languages" :data="$languages" title="Native language"
                                multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3  col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.languages" :data="$languages" title="Second language"
                                multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-5">
                            <x-selectbox class="selectpicker" wire:model.defer="state.languagePerfections" :data="$languagePerfections"
                                title="Level" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-7">
                            <x-selectbox class="selectpicker" wire:model.defer="state.languages" :data="$languages" title="Second language"
                                multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-5">
                            <x-selectbox class="selectpicker" wire:model.defer="state.languagePerfections" :data="$languagePerfections"
                                title="Level" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.marriageStatuses" :data="$marriageStatuses"
                                title="Desired method of marriage" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.educationStatuses" :data="$educationStatuses"
                                title="Education" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.workStatuses" :data="$workStatuses" title="The work"
                                multiple />
                        </div>
                        @if (Auth::user()->gender == 'male')
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <x-selectbox class="selectpicker" wire:model.defer="state.acceptWifeWorkStatuses"
                                    :data="$acceptWifeWorkStatuses" title="Do you accept the wife's work?" multiple />
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <x-selectbox class="selectpicker" wire:model.defer="state.acceptWifeStudyStatuses"
                                    :data="$acceptWifeStudyStatuses"
                                    title="Do you accept studying the wife after marriage?" multiple />
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <x-selectbox class="selectpicker" wire:model.defer="state.headdresses" :data="$headdresses"
                                    title="Headdress" multiple />
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <x-selectbox class="selectpicker" wire:model.defer="state.robeStatuses" :data="$robeStatuses" title="Jilbab"
                                    multiple />
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <x-selectbox class="selectpicker" wire:model.defer="state.polygamyStatuses" :data="$polygamyStatuses"
                                    title="Do you want multiplicity?" multiple />
                            </div>
                        @else
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <x-selectbox class="selectpicker" wire:model.defer="state.wifeWorkStatuses" :data="$wifeWorkStatuses"
                                    title="You want the work?" multiple />
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <x-selectbox class="selectpicker" wire:model.defer="state.wifeStudyStatuses" :data="$wifeStudyStatuses"
                                    title="Do you want to study after marriage?" multiple />
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <x-selectbox class="selectpicker" wire:model.defer="state.beardStatuses" :data="$beardStatuses"
                                    title="Beard" multiple />
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <x-selectbox class="selectpicker" wire:model.defer="state.wifePolygamyStatuses"
                                    :data="$wifePolygamyStatuses" title="Do you accept polygamy?" multiple />
                            </div>
                        @endif
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.religions" :data="$religions" title="Religious"
                                multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.religionMethods" :data="$religionMethods"
                                title="Method" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.obligations" :data="$obligations" title="Commitment"
                                multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.prayers" :data="$prayers" title="Prayer" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.alfajrPrayers" :data="$alfajrPrayers" title="fasting"
                                multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.fastings" :data="$fastings" title="Fasting"
                                multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.readingQurans" :data="$readingQurans"
                                title="Reading the Qoran" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.tafaqahStatuses" :data="$tafaqahStatuses"
                                title="Tafaqah in religion" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.musicStatuses" :data="$musicStatuses"
                                title="Listening to music" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.showStatuses" :data="$showStatuses"
                                title="Movies and series" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.friendStatuses" :data="$friendStatuses"
                                title="Friends of the opposite sex" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.maritalStatuses" :data="$maritalStatuses"
                                title="Marital Status" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.childrenStatuses" :data="$childrenStatuses"
                                title="Do you have children?" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.childrenDesireStatuses"
                                :data="$childrenDesireStatuses" title="Desire to have children" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.shelterTypes" :data="$shelterTypes"
                                title="Current type of housing" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.shelterShapes" :data="$shelterShapes"
                                title="Housing method" multiple />
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.shelterWays" :data="$shelterWays" title="Housing form"
                                multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.bodyStatuses" :data="$bodyStatuses" title="Body type"
                                multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.skinStatuses" :data="$skinStatuses"
                                title="Skin colour" multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.hairColors" :data="$hairColors" title="Hair colour"
                                multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.hairLengths" :data="$hairLengths" title="Hair length"
                                multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.hairKinds" :data="$hairKinds" title="Hair type"
                                multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.eyeColors" :data="$eyeColors" title="Eye color"
                                multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.eyeGlasses" :data="$eyeGlasses"
                                title="Wearing the eye" multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.healthStatuses" :data="$healthStatuses"
                                title="Physical health" multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.psychologicalPatterns" :data="$psychologicalPatterns"
                                title="Psychological pattern" multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.smokeStatuses" :data="$smokeStatuses" title="Smoking"
                                multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.alcoholStatuses" :data="$alcoholStatuses"
                                title="Alcohol" multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.halalFoodStatuses" :data="$halalFoodStatuses"
                                title="Halal style" multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.foodTypes" :data="$foodTypes" title="Food style"
                                multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.hobbies" :data="$hobbies" title="Interests"
                                multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.countriesOfOrigin" :data="$countries"
                                title="Countries of origin" multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.countriesOfResidences" :data="$countries"
                                title="Countries of residences" multiple />
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <x-selectbox class="selectpicker" wire:model.defer="state.nationalities" :data="$nationalities"
                                title="Nationalities" multiple />
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label for="">Length</label>
                            <select wire:model.defer="state.height_from_to_id" class="form-control form-control-lg">
                                <option>Length</option>
                                <option value="1">from 120 to 140 cm</option>
                                <option value="2">from 140 to 160 cm</option>
                                <option value="3">from 160 to 180 cm</option>
                                <option value="4">from 180 to 200 cm</option>
                                <option value="5">more than that</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="">the weight </label>
                            <select wire:model.defer="state.weight_from_to_id" class="form-control form-control-lg">
                                <option>the weight </option>
                                <option value="1">less than that </option>
                                <option value="2">from 50 to 60 kg</option>
                                <option value="3">from 60 to 70 kg</option>
                                <option value="4">from 70 to 80 kg</option>
                                <option value="5">from 80 to 90 kg</option>
                                <option value="6">from 90 to 100 kg</option>
                                <option value="7">from 100 to 110 kg</option>
                                <option value="8">from 110 to 120 kg</option>
                                <option value="9">from 120 to 130 kg</option>
                                <option value="10">from 130 to 140 kg</option>
                                <option value="11">from 140 to 150 kg</option>
                                <option value="12">from 150 to 160 kg</option>
                                <option value="13">from 160 to 170 kg</option>
                                <option value="14">from 170 to 180 kg</option>
                                <option value="15">more than that</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="">number of children</label>
                            <select wire:model.defer="state.children_count_from_to_id"
                                class="form-control form-control-lg">
                                <option value="1">0</option>
                                <option value="2">from 1 to 3 </option>
                                <option value="3">from 3 to 6 </option>
                                <option value="4">from 6 to 9 </option>
                                <option value="5">from 9 to 12 </option>
                                <option value="6">more than that</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="">Monthly income </label>
                            <select wire:model.defer="state.income_from_to_id" class="form-control form-control-lg">
                                <option>Monthly income </option>
                                <option value="1">less than that </option>
                                <option value="2">from 1000 $ to 2000$</option>
                                <option value="3">from 2000 $ to 3000$</option>
                                <option value="4">from 3000 $ to 4000$</option>
                                <option value="5">from 4000 $ to 5000$</option>
                                <option value="6">from 5000 $ to 6000$</option>
                                <option value="7">from 6000 $ to 7000$</option>
                                <option value="8">from 7000 $ to 8000$</option>
                                <option value="9">from 8000 $ to 9000$</option>
                                <option value="10">from 9000 $ to 10000$</option>
                                <option value="11">more than that</option>
                            </select>
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

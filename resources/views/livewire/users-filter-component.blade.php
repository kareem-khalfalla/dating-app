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
                            <select wire:model.defer="state.residenceStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="Type of accommodation">
                                @foreach ($residencyStatuses as $residencyStatus)
                                    <option value="{{ $residencyStatus->id }}">{{ $residencyStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3  col-lg-6">

                            <select wire:model.defer="state.relocateStatuses"
                                class="form-control form-control-lg selectpicker" multiple
                                title="Moving to another place">
                                @foreach ($relocations as $relocateStatus)
                                    <option value="{{ $relocateStatus->id }}">{{ $relocateStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.relationshipStatuses" multiple
                                class="form-control form-control-lg selectpicker">
                                @foreach ($relationships as $relationship)
                                    <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3  col-lg-6">
                            <select wire:model.defer="state.nativeLanguages"
                                class="form-control form-control-lg selectpicker" multiple title="Native language">
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3  col-lg-6">
                            <select wire:model.defer="state.secondLanguages"
                                class="form-control form-control-lg selectpicker" multiple title="Second language">
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-5">
                            <select wire:model.defer="state.secondLanguagesPerfection"
                                class="form-control form-control-lg selectpicker" multiple title="level">
                                @foreach ($languagePerfections as $langPerfection)
                                    <option value="{{ $langPerfection->id }}">{{ $langPerfection->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row col-12">
                            <div class="input-group input-group-lg mb-3 col-7">
                                <select wire:model.defer="state.thirdLanguages"
                                    class="form-control form-control-lg selectpicker" multiple title="Second language">
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-lg mb-3 col-5">
                                <select wire:model.defer="state.thirdLanguagesPerfection"
                                    class="form-control form-control-lg selectpicker" multiple title="level">
                                    @foreach ($languagePerfections as $langPerfection)
                                        <option value="{{ $langPerfection->id }}">{{ $langPerfection->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.marriageStatuses"
                                class="form-control form-control-lg selectpicker" multiple
                                title="Desired method of marriage">
                                @foreach ($marriageStatuses as $marriageStatus)
                                    <option value="{{ $marriageStatus->id }}">{{ $marriageStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.educationStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="Education">
                                @foreach ($educationStatuses as $educationStatus)
                                    <option value="{{ $educationStatus->id }}">{{ $educationStatus->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.workStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="the work">
                                @foreach ($workStatuses as $workStatus)
                                    <option value="{{ $workStatus->id }}">{{ $workStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (Auth::user()->gender == 'male')
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <select wire:model.defer="state.acceptWifeWorkStatuses"
                                    class="form-control form-control-lg selectpicker" multiple
                                    title="Do you accept the wife's work?">
                                    @foreach ($acceptWifeWorkStatuses as $acceptence)
                                        <option value="{{ $acceptence->id }}">{{ $acceptence->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <select wire:model.defer="state.acceptWifeStudyStatuses"
                                    class="form-control form-control-lg selectpicker" multiple
                                    title=" Do you accept studying the wife after marriage?">
                                    @foreach ($acceptWifeStudyStatuses as $studyAcceptence)
                                        <option value="{{ $studyAcceptence->id }}">{{ $studyAcceptence->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <select wire:model.defer="state.headdresses"
                                    class="form-control form-control-lg selectpicker" multiple title="Headdress">
                                    @foreach ($headdresses as $headdress)
                                        <option value="{{ $headdress->id }}">{{ $headdress->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <select wire:model.defer="state.robeStatuses"
                                    class="form-control form-control-lg selectpicker" multiple title="Jilbab">
                                    @foreach ($robeStatuses as $robe)
                                        <option value="{{ $robe->id }}">{{ $robe->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <select wire:model.defer="state.polygamyStatuses"
                                    class="form-control form-control-lg selectpicker" multiple
                                    title="Do you want multiplicity?">
                                    @foreach ($polygamyStatuses as $polygamyStatus)
                                        <option value="{{ $polygamyStatus->id }}">{{ $polygamyStatus->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <select wire:model.defer="state.wifeWorkStatuses"
                                    class="form-control form-control-lg selectpicker" multiple
                                    title="You want the work?">
                                    @foreach ($wifeWorkStatuses as $wifeWorkStatus)
                                        <option value="{{ $wifeWorkStatus->id }}">{{ $wifeWorkStatus->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <select wire:model.defer="state.WifeStudyStatuses"
                                    class="form-control form-control-lg selectpicker" multiple
                                    title="Do you want to study after marriage?">
                                    @foreach ($wifeStudyStatuses as $wifeStudyStatus)
                                        <option value="{{ $wifeStudyStatus->id }}">{{ $wifeStudyStatus->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <select wire:model.defer="state.beardStatuses"
                                    class="form-control form-control-lg selectpicker" multiple title="Beard">
                                    @foreach ($beardStatuses as $beardStatus)
                                        <option value="{{ $beardStatus->id }}">{{ $beardStatus->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-lg mb-3 col-lg-6">
                                <select wire:model.defer="state.wifePolygamyStatuses"
                                    class="form-control form-control-lg selectpicker" multiple
                                    title="Do you accept polygamy?">
                                    @foreach ($wifePolygamyStatuses as $wifePolygamyStatus)
                                        <option value="{{ $wifePolygamyStatus->id }}">
                                            {{ $wifePolygamyStatus->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.religions" class="form-control form-control-lg selectpicker"
                                multiple title="Religious">
                                @foreach ($religions as $religion)
                                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.religionMethods"
                                class="form-control form-control-lg selectpicker" multiple title="Method">
                                @foreach ($methods as $method)
                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.obligations"
                                class="form-control form-control-lg selectpicker" multiple title="Commitment">
                                @foreach ($obligations as $obligation)
                                    <option value="{{ $obligation->id }}">{{ $obligation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.prayers" class="form-control form-control-lg selectpicker"
                                multiple title="Prayer">
                                @foreach ($prayers as $prayer)
                                    <option value="{{ $prayer->id }}">{{ $prayer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.alfajrPrayers"
                                class="form-control form-control-lg selectpicker" multiple title="fasting">
                                @foreach ($alfajrPrayers as $alfajrPrayer)
                                    <option value="{{ $alfajrPrayer->id }}">{{ $alfajrPrayer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.fastings" class="form-control form-control-lg selectpicker"
                                multiple title="fasting">
                                @foreach ($fastings as $fasting)
                                    <option value="{{ $fasting->id }}">{{ $fasting->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.readingQurans"
                                class="form-control form-control-lg selectpicker" multiple title="Reading the Qoran">
                                @foreach ($readingQurans as $readingQuran)
                                    <option value="{{ $readingQuran->id }}">{{ $readingQuran->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.tafaqahStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="Tafaqah in religion">
                                @foreach ($tafaqahStatuses as $tafaqahStatus)
                                    <option value="{{ $tafaqahStatus->id }}">{{ $tafaqahStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.musicStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="Listening to music">
                                @foreach ($musicStatuses as $musicStatus)
                                    <option value="{{ $musicStatus->id }}">{{ $musicStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.showStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="Movies and series">
                                @foreach ($showStatuses as $showStatus)
                                    <option value="{{ $showStatus->id }}">{{ $showStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.friendStatuses"
                                class="form-control form-control-lg selectpicker" multiple
                                title="Friends of the opposite sex">
                                @foreach ($friendStatuses as $friendStatus)
                                    <option value="{{ $friendStatus->id }}">{{ $friendStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model="state.maritalStatuses" class="form-control form-control-lg selectpicker"
                                multiple title="Marital Status">
                                @foreach ($maritalStatuses as $maritalStatus)
                                    <option value="{{ $maritalStatus->id }}">{{ $maritalStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.childrenStatuses"
                                class="form-control form-control-lg selectpicker" multiple
                                title="Do you have children?">
                                @foreach ($childrenStatuses as $childStatus)
                                    <option value="{{ $childStatus->id }}">{{ $childStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.childrenDesireStatuses"
                                class="form-control form-control-lg selectpicker" multiple
                                title="desire to have children">
                                @foreach ($childrenDesireStatuses as $childrenDesireStatus)
                                    <option value="{{ $childrenDesireStatus->id }}">
                                        {{ $childrenDesireStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.shelterTypes"
                                class="form-control form-control-lg selectpicker" multiple
                                title="Current type of housing">
                                @foreach ($shelterTypes as $shelterType)
                                    <option value="{{ $shelterType->id }}">{{ $shelterType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.shelterShapes"
                                class="form-control form-control-lg selectpicker" multiple title="Housing method">
                                @foreach ($shelterShapes as $shelterShape)
                                    <option value="{{ $shelterShape->id }}">{{ $shelterShape->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-lg-6">
                            <select wire:model.defer="state.shelterWays"
                                class="form-control form-control-lg selectpicker" multiple title="housing form">
                                @foreach ($shelterWays as $shelterWay)
                                    <option value="{{ $shelterWay->id }}">{{ $shelterWay->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.bodyStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="body type">
                                @foreach ($bodyStatuses as $bodyStatus)
                                    <option value="{{ $bodyStatus->id }}">{{ $bodyStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.skinStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="skin colour">
                                @foreach ($skins as $skinStatus)
                                    <option value="{{ $skinStatus->id }}">{{ $skinStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.hairColors"
                                class="form-control form-control-lg selectpicker" multiple title="hair colour">
                                @foreach ($hairColors as $hairColor)
                                    <option value="{{ $hairColor->id }}">{{ $hairColor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.hairLengths"
                                class="form-control form-control-lg selectpicker" multiple title="hair length">
                                @foreach ($hairLengths as $hairLength)
                                    <option value="{{ $hairLength->id }}">{{ $hairLength->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.hairKinds" class="form-control form-control-lg selectpicker"
                                multiple title="hair type">
                                @foreach ($hairKinds as $hairKind)
                                    <option value="{{ $hairKind->id }}">{{ $hairKind->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.eyeColors" class="form-control form-control-lg selectpicker"
                                multiple title="Eye color">
                                @foreach ($eyeColors as $eyeColor)
                                    <option value="{{ $eyeColor->id }}">{{ $eyeColor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.eyeGlasses"
                                class="form-control form-control-lg selectpicker" multiple title="Wearing the eye">
                                @foreach ($eyeGlasses as $eyeGlass)
                                    <option value="{{ $eyeGlass->id }}">{{ $eyeGlass->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.healthStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="physical health">
                                @foreach ($healthStatuses as $healthStatus)
                                    <option value="{{ $healthStatus->id }}">{{ $healthStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.psychologicalPatterns"
                                class="form-control form-control-lg selectpicker" multiple
                                title="psychological pattern">
                                @foreach ($psychologicalPatterns as $psychologicalPattern)
                                    <option value="{{ $psychologicalPattern->id }}">
                                        {{ $psychologicalPattern->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.smokeStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="smoking">
                                @foreach ($smokeStatuses as $smokeStatus)
                                    <option value="{{ $smokeStatus->id }}">{{ $smokeStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.alcoholStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="Alcohol">
                                @foreach ($alcoholStatuses as $alcoholStatus)
                                    <option value="{{ $alcoholStatus->id }}">{{ $alcoholStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.halalFoodStatuses"
                                class="form-control form-control-lg selectpicker" multiple title="halal food">
                                @foreach ($halalFoodStatuses as $halalFoodStatuses)
                                    <option value="{{ $halalFoodStatuses->id }}">{{ $halalFoodStatuses->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.foodTypes"
                                class="form-control form-control-lg selectpicker" multiple title="food style">
                                @foreach ($food_types as $food)
                                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.hobbies" class="form-control form-control-lg selectpicker"
                                multiple title="Interests">
                                @foreach ($hobbies as $hobby)
                                    <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.countries"
                                class="form-control form-control-lg selectpicker" multiple title="Countries">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.countriesOfResidences"
                                class="form-control form-control-lg selectpicker" multiple
                                title="Countries of residences">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <select wire:model.defer="state.nationalities"
                                class="form-control form-control-lg selectpicker" multiple title="Nationalities">
                                @foreach ($nationalities as $nationality)
                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="">Length</label>
                            <select wire:model.defer="state.height_from_to_id" class="form-control form-control-lg">
                                <option disabled selected>Length</option>
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
                                <option disabled selected>the weight </option>
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
                                <option disabled selected>Monthly income </option>
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

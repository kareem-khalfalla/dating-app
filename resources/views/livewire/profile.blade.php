<div class="container container_settings col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert" role="alert">
            <button class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif
    <div class="shadow m-0 bg-white pb-4">

        <ol class="breadcrumb mb-4">
            <h1 class="pb-md-3 color_h col-md-5">settings</h1>
            <div class="col-md-7">
                <label for="choose_settings">Choose One</label>
                <select id="choose_settings" class="select_one form-control form-control-lg mt-0">
                    <option value="change_photo">change photo</option>
                    <option value="change_password">change password</option>
                    <option value="change_main_information">change main information</option>
                    <option value="Detailed_information">Detailed information</option>
                    <option value="Personal_profile">Personal profile</option>
                    <option value="Education_and_work">Education and work</option>
                    <option value="Social_status">Social status</option>
                    <option value="Religious_status">Religious status</option>
                    <option value="the_shape">the shape</option>
                    <option value="their_lifestyle">their lifestyle</option>
                </select>

            </div>

        </ol>

        <div class="setting_content p-0">

            <!--==============[ Start change photo]=========================-->
            <div id="change_photo" class="col-lg-11 m-auto pb-4" wire:ignore.self>
                <h3 class="color_h mb-3">Change photo</h3>
                <br>
                <div class="row">
                    <figure class="col-md-6">
                        <img src="{{ !is_null($image) ? $image->temporaryUrl() : asset('img/avatar.png') }}" alt="..."
                            class="img-thumbnail">
                    </figure>
                    @if (!empty($imageName))
                        <figure class="col-md-6">
                            <img src="{{ asset('storage/' . $imageName) }}" alt="..." class="img-thumbnail">
                        </figure>
                    @endif
                    <div class="form-group col-md-6 m-auto">
                        <label for="exampleFormControlFile1">choose image</label>
                        <input type="file" wire:model="image"
                            class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1"
                            accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mt-4">
                            <button wire:click="updateOrCreateImage"
                                class="btn btn_form_settings btn-block p-2">save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--==============[ Start change password]=========================-->
            <div id="change_password" class="col-lg-11 m-auto pb-4" wire:ignore.self>
                <h3 class="color_h">Change Password</h3>
                <form id="captcha_form" wire:submit.prevent="updatePassword" method="post">
                    <br>
                    <div class="input-group input-group-lg mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                    class="fa fa-key"></i></span>
                        </div>
                        <input wire:model.defer="state.current_password" placeholder="Old password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                    class="fa fa-key"></i></span>
                        </div>
                        <input wire:model.defer="state.password" placeholder="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                                    aria-hidden="true"></i></span>
                        </div>
                        <input wire:model.defer="state.password_confirmation" placeholder="Confirm password"
                            type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn_form_settings btn-block p-2">save</button>
                    </div>
                </form>
            </div>

            <!--==============[ Start change main information]=========================-->
            <div id="change_main_information" class="col-lg-11 m-auto pb-4" wire:ignore.self>
                <h3 class="color_h">Change main information</h3>

                <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
                    <br>
                    <div class="input-group input-group-lg mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                    class="fa fa-user"></i></span>
                        </div>
                        <input wire:model.defer="state.name" placeholder="fullname" type="text"
                            class="form-control @error('name') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                    class="fa fa-user-circle"></i></span>
                        </div>
                        <input wire:model.defer="state.username" placeholder="username" type="text"
                            class="form-control @error('username') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-envelope"
                                    aria-hidden="true"></i></span>
                        </div>
                        <input wire:model.defer="state.email" placeholder="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-phone"
                                    aria-hidden="true"></i></span>
                        </div>
                        <input wire:model.defer="state.phone" placeholder="phone" type="tel"
                            class="form-control @error('phone') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- => End input phone  !-->


                    <!-- => [ Start select box gender ] !-->
                    {{-- <div class="input-group input-group-lg mb-3 ">

                        <select name="lang" required="required" class="form-control form-control-lg ">
                            <option value="">language</option>
                            <option value="eng">arabic</option>
                            <option value="arb">English</option>
                            <option value="alm">German</option>
                        </select>
                    </div> --}}
                    <!-- => [ End select box gender ] !-->

                    <!-- => [ Start select box gender ] !-->
                    <div class="mt-2 mb-2 pr-2">
                        <label class="mr-3"><b>Gender</b></label>
                        <label class="radio-inline p-2">
                            <input type="radio" id="male" name="gender" wire:model.defer="state.gender"
                                wire:model.defer="state.gender" id="male" value="male">
                            &nbsp;Male
                        </label>
                        <label class="radio-inline p-2">
                            <input type="radio" id="female" name="gender" wire:model.defer="state.gender"
                                wire:model.defer="state.gender" id="female" value="female">
                            &nbsp;Female
                        </label>
                    </div>
                    <div class="mt-4">
                        <input type="submit" class="btn btn_form_settings btn-block p-2" value="save">
                    </div>
                </form>
            </div>

            <!--==============[ Start change Detailed_information]=========================-->
            <div id="Detailed_information" class="col-lg-11 m-auto pb-4" wire:ignore.self>
                <h3 class="color_h">Change detailed information</h3>

                <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
                    <br>
                    <div class="input-group input-group-lg mb-3 mt-3">
                        <label class="col-12">Birthday</label>
                        <input wire:model.defer="state.dob" placeholder="Birthday" type="date"
                            class="form-control @error('dob') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('dob')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3 ">
                        <label class="col-12">Country of Origin</label>
                        <select wire:model="selectedCountry" required="required"
                            class="form-control form-control-lg @error('hometown_id') is-invalid @enderror">
                            <option disabled value="">Select Hometown Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('hometown_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3 ">
                        <label class="col-12">Country of Residency</label>
                        <select wire:model="state.country_of_residence_id" required="required"
                            class="form-control form-control-lg @error('country_of_residence_id') is-invalid @enderror">
                            <option disabled value="">Select residency Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_of_residence_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <label class="col-12">Nationality</label>
                        <select wire:model="state.nationality_id" required="required"
                            class="form-control form-control-lg @error('nationality_id') is-invalid @enderror">
                            <option disabled value="">Select nationality</option>
                            @foreach ($nationalities as $nationality)
                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                            @endforeach
                        </select>
                        @error('nationality_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-row">
                        @if ($selectedCountry)
                            <div class="input-group input-group-lg mb-3 col-6">
                                <label class="col-12">City</label>
                                <select wire:model="selectedState" required="required"
                                    class="form-control form-control-lg @error('state_id') is-invalid @enderror">
                                    <option disabled value="">Select City</option>
                                    @foreach ($countryStates as $countryState)
                                        <option value="{{ $countryState->id }}">{{ $countryState->name }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                        <div class="input-group input-group-lg mb-3 col-6">
                            <label class="col-12">Postal code</label>
                            <input wire:model="state.postal_code" placeholder="Postal code" type="text"
                                class="form-control @error('state_id') is-invalid @enderror" aria-label="Large"
                                aria-describedby="inputGroup-sizing-sm">
                            @error('postal_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group input-group-lg mb-3 ">
                        <label class="col-12">Type of accommodation</label>
                        <select wire:model="state.residency_id" class="form-control form-control-lg ">
                            <option disabled value="">Type of accommodation</option>
                            @foreach ($residencies as $residency)
                                <option value="{{ $residency->id }}">{{ $residency->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-lg mb-3 ">
                        <label class="col-12">Moving to another place</label>
                        <select wire:model="state.relocate_id" class="form-control form-control-lg ">
                            <option disabled value="">Moving to another place</option>
                            @foreach ($relocations as $relocate)
                                <option value="{{ $relocate->id }}">{{ $relocate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-lg mb-3 ">
                        <label class="col-12">Native language</label>
                        <select wire:model="state.language_native" class="form-control form-control-lg ">
                            <option disabled value="">Native language</option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="input-group input-group-lg mb-3 col-7">
                            <label class="col-12">second language</label>
                            <select wire:model="state.language_second" class="form-control form-control-lg ">
                                <option disabled value="">second language</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-5">
                            <label class="col-12">level</label>
                            <select wire:model="state.language_second_perfection_id"
                                class="form-control form-control-lg ">
                                <option disabled value="">level</option>
                                @foreach ($languagePerfections as $langPerfection)
                                    <option value="{{ $langPerfection->id }}">{{ $langPerfection->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-group input-group-lg mb-3 col-7">
                            <label class="col-12">third language</label>
                            <select wire:model="state.language_third" class="form-control form-control-lg ">
                                <option disabled value="">third language</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-lg mb-3 col-5">
                            <label class="col-12">level</label>
                            <select wire:model="state.language_third_perfection_id"
                                class="form-control form-control-lg ">
                                <option disabled value="">level</option>
                                @foreach ($languagePerfections as $langPerfection)
                                    <option value="{{ $langPerfection->id }}">{{ $langPerfection->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <input type="submit" class="btn btn_form_settings btn-block p-2" value="save">
                    </div>
                </form>
            </div>

            <!--==============[ Start change Personal statement]=========================-->
            <div id="Personal_profile" class="col-lg-11 m-auto pb-4" wire:ignore>
                <h3 class="color_h">Change Personal statement</h3>
                <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
                    <br>
                    <div class="form-group">
                        <label class="col-12">brief about me</label>
                        <textarea wire:model="state.bio" class="form-control @error('bio') is-invalid @enderror"
                            id="exampleFormControlTextarea1" rows="3" placeholder="brief about me"
                            maxlength="200"></textarea>
                        @error('bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-12">A profile of your desired partner</label>
                        <textarea wire:model="state.partner_bio"
                            class="form-control @error('partner_bio') is-invalid @enderror"
                            id="exampleFormControlTextarea1" rows="3" placeholder="A profile of your desired partner"
                            maxlength="200"></textarea>
                        @error('partner_bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3 ">
                        <label class="col-12">The required relationship</label>
                        <select wire:model="state.relationship_id" required="required"
                            class="form-control form-control-lg ">
                            <option disabled value="">The required relationship</option>
                            @foreach ($relationships as $relationship)
                                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-lg mb-3 ">
                        <label class="col-12">Desired method of marriage</label>
                        <select wire:model="state.marriage_id" required="required"
                            class="form-control form-control-lg ">
                            <option disabled value="">Desired method of marriage</option>
                            @foreach ($marriages as $marriage)
                                <option value="{{ $marriage->id }}">{{ $marriage->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
                    </div>

                </form>
            </div>

            <!--==============[ Start change Education and work]=========================-->
            <div id="Education_and_work" class="col-lg-11 m-auto pb-4" wire:ignore>
                <h3 class="color_h">Change Education and work</h3>
                <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
                    <br>
                    <div class="input-group input-group-lg mb-3 ">
                        <label class="col-12">Education</label>
                        <select wire:model="state.education_id" required="required"
                            class="form-control form-control-lg ">
                            <option value="">Education</option>
                            @foreach ($educations as $education)
                                <option value="{{ $education->id }}">{{ $education->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-12">competence</label>
                        <textarea wire:model="state.competence" class="form-control" id="exampleFormControlTextarea1"
                            rows="3" placeholder="competence" maxlength="200"></textarea>
                    </div>
                    <div class="input-group input-group-lg mb-3 ">
                        <label class="col-12">the work</label>
                        <select wire:model="state.work_status_id" required="required"
                            class="form-control form-control-lg ">
                            <option disabled value="">the work</option>
                            @foreach ($workStatuses as $workStatus)
                                <option value="{{ $workStatus->id }}">{{ $workStatus->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <label class="col-12">Monthly income</label>
                        <input wire:model="state.income" placeholder="Monthly income" type="number"
                            class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    @if (!is_null($state['gender']) && $state['gender'] == 'male')
                        <div class="input-group input-group-lg mb-3 ">
                            <label class="col-12">Do you accept the wife's work?</label>
                            <select wire:model="state.accept_wife_work_status_id" required="required"
                                class="form-control form-control-lg ">
                                <option disabled value="">Do you accept the wife's work?</option>
                                @foreach ($acceptWifeWorkStatuses as $acceptence)
                                    <option value="{{ $acceptence->id }}">{{ $acceptence->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group input-group-lg mb-3 ">
                            <label class="col-12">Do you accept studying the wife after marriage?</label>
                            <select wire:model="state.accept_wife_study_status_id" required="required"
                                class="form-control form-control-lg ">
                                <option disabled value=""> Do you accept studying the wife after marriage?</option>
                                @foreach ($acceptWifeStudyStatuses as $studyAcceptence)
                                    <option value="{{ $studyAcceptence->id }}">{{ $studyAcceptence->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    @if (!is_null($state['gender']) && $state['gender'] == 'female')
                        <div class="input-group input-group-lg mb-3 ">
                            <label class="col-12">You want the work?</label>
                            <select wire:model="state.wife_work_status_id" required="required"
                                class="form-control form-control-lg ">
                                <option disabled value=""> You want the work?</option>
                                @foreach ($wifeWorkStatuses as $wifeWorkStatus)
                                    <option value="{{ $wifeWorkStatus->id }}">{{ $wifeWorkStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group input-group-lg mb-3 ">
                            <label class="col-12">Do you want to study after marriage?</label>
                            <select wire:model="state.wife_study_status_id" required="required"
                                class="form-control form-control-lg ">
                                <option disabled value=""> Do you want to study after marriage?</option>
                                @foreach ($wifeStudyStatuses as $wifeStudyStatus)
                                    <option value="{{ $wifeStudyStatus->id }}">{{ $wifeStudyStatus->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="mt-4">
                        <input type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
                    </div>

                </form>
            </div>

            <!--==============[ Start change Religious_status]=========================-->
            <div id="Religious_status" class="col-lg-11 m-auto pb-4" wire:ignore>
                <h3 class="color_h">Change Social status</h3>

                <form id="captcha_form" method="post" action="#">
                    <br>

                    <!-- => [ Start select Religious ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Religious</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Religious</option>
                            <option value="born Muslim">born Muslim</option>
                            <option value="converted to Islam">converted to Islam</option>
                            <option value="I intend to convert to Islam">I intend to convert to Islam</option>
                            <option value="Druze">Druze</option>
                            <option value="Alawi">Alawi</option>
                            <option value="Yazidi">Yazidi</option>
                            <option value="Qadiani">Qadiani</option>
                            <option value="atheist">atheist</option>
                            <option value="Christian">Christian</option>
                            <option value="Jew">Jew</option>
                            <option value="other">other</option>
                        </select>
                    </div>
                    <!-- => [ End select Religious ] !-->

                    <!-- => [ Start select Method ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="Method" class="col-12">Method</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Method</option>
                            <option value="salafi">salafi</option>
                            <option value="ashari">ashari</option>
                            <option value="Sunnah denied">Sunnah denied</option>
                            <option value="sofi">sofi</option>
                            <option value="zydi">zydi</option>
                            <option value="gafari">gafari</option>
                            <option value="matridi">matridi</option>
                            <option value="abadi">abadi</option>
                            <option value="mdkhali">mdkhali</option>
                            <option value="ekhwani">ekhwani</option>
                            <option value="habashi">habashi</option>
                            <option value="protestant">protestant</option>
                            <option value="katholiki">katholiki</option>
                            <option value="arthodox">arthodox</option>
                            <option value="I do not know">I do not know</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <!-- => [ End select Method ] !-->

                    <!-- => [ Start select Commitment ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Commitment</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Commitment</option>
                            <option value="committed">committed</option>
                            <option value="Uncommitted">Uncommitted</option>
                            <option value="Committed sometimes">Committed sometimes</option>
                            <option value="Not interested">Not interested</option>
                        </select>
                    </div>
                    <!-- => [ End select Commitment ] !-->

                    <!-- => [ Start select Prayer ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Prayer</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Prayer</option>
                            <option value="Committed">Committed</option>
                            <option value="I do not pray">I do not pray</option>
                            <option value="I pray sometimes">I pray sometimes</option>
                            <option value="Friday prayer only">Friday prayer only</option>
                            <option value="I often pray">I often pray</option>
                        </select>
                    </div>
                    <!-- => [ End select Prayer ] !-->

                    <!-- => [ Start select Al-fajr prayer ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Al-fajr prayer</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Al-fajr prayer</option>
                            <option value="Committed">Committed</option>
                            <option value="sometimes">sometimes</option>
                            <option value="Not interested">Not interested</option>
                        </select>
                    </div>
                    <!-- => [ End select Al-fajr prayer ] !-->

                    <!-- => [ Start select fasting ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">fasting</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">fasting</option>
                            <option value="ramadan">ramadan</option>
                            <option value="Ramadan and more">Ramadan and more</option>
                            <option value="Sunnah denied">Sunnah denied</option>
                            <option value="Not every Ramadan">Not every Ramadan</option>
                            <option value="I fast some days of Ramadan">I fast some days of Ramadan</option>
                            <option value="I do not fast">I do not fast</option>
                        </select>
                    </div>
                    <!-- => [ End select fasting ] !-->

                    <!-- => [ Start select Reading the Qoran ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Reading the Qoran</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Reading the Qoran</option>
                            <option value="Read daily">Read daily</option>
                            <option value="Read a lot">Read a lot</option>
                            <option value="Read a little">Read a little</option>
                            <option value="Scarcely">Scarcely</option>
                            <option value="Do not read">Do not read</option>
                        </select>
                    </div>
                    <!-- => [ End select Reading the Qoran ] !-->

                    <!-- => [ Start select Headdress ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Headdress</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Headdress</option>
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                            <option value="Showing a tuft of hair">Showing a tuft of hair</option>
                        </select>
                    </div>
                    <!-- => [ End select Headdress ] !-->

                    <!-- => [ Start select Jilbab ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Jilbab</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Jilbab</option>
                            <option value="Full robes">Full robes</option>
                            <option value="Jilbab covering the knees">Jilbab covering the knees</option>
                            <option value="Jilbab covering the middle">Jilbab covering the middle</option>
                            <option value="No jilbab">No jilbab</option>
                            <option value="No but I don't want to wear it">No but I don't want to wear it</option>
                        </select>
                    </div>
                    <!-- => [ End select Jilbab ] !-->

                    <!-- => [ Start select Niqab ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Niqab</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Niqab</option>
                            <option value="No and I would like to wear it">No and I would like to wear it</option>
                            <option value="No, but if my husband wants that, I will wear it">No, but if my husband
                                wants that, I will wear it</option>
                            <option value="Finery">Finery</option>
                            <option value="sometimes">sometimes</option>

                        </select>
                    </div>
                    <!-- => [ End select Niqab ] !-->

                    <!-- => [ Start select Beard ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Beard</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Beard</option>
                            <option value="Light">Light</option>
                            <option value="heavy">heavy</option>
                            <option value="long">long</option>
                        </select>
                    </div>
                    <!-- => [ End select Beard ] !-->

                    <!-- => [ Start select Tafaqah in religion ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Tafaqah in religion</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Tafaqah in religion</option>
                            <option value="Know the basics">Know the basics</option>
                            <option value="Read or attend lessons sometimes">Read or attend lessons sometimes
                            </option>
                            <option value="Interested in education and try it">Interested in education and try it
                            </option>
                            <option value="Seek knowledge">Seek knowledge</option>
                        </select>
                    </div>
                    <!-- => [ End select JiTafaqah in religionlbab ] !-->

                    <!-- => start input If you listen to the lessons, who will you listen to?  !-->
                    <div class="form-group">
                        <label for="" class="col-12">If you listen to the lessons, who will you listen
                            to?</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="If you listen to the lessons, who will you listen to?"
                            maxlength="200"></textarea>
                    </div>
                    <!-- => End input If you listen to the lessons, who will you listen to? !-->

                    <!-- => [ Start select Listening to music] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Listening to music</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Listening to music</option>
                            <option value="Listen">Listen</option>
                            <option value="Listen a little">Listen a little</option>
                            <option value="I hear, but I want to leave it">I hear, but I want to leave it</option>
                            <option value="I don't hear songs">I don't hear songs</option>
                            <option value="I do not hear and I do not want her at home">I do not hear and I do not
                                want her at home</option>
                        </select>
                    </div>
                    <!-- => [ End select Listening to music ] !-->


                    <!-- => [ Start select Movies and series ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Movies and series</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Movies and series</option>
                            <option value="Watch it">Watch it</option>
                            <option value="A little">A little</option>
                            <option value="rarely ">rarely </option>
                            <option value="No">No</option>
                            <option value="No, and I don't want her at home">No, and I don't want her at home
                            </option>
                        </select>
                    </div>
                    <!-- => [ End select Movies and series ] !-->

                    <!-- => [ Start select Friends of the opposite sex ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Friends of the opposite sex</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Friends of the opposite sex</option>
                            <option value="I have no problem with that">I have no problem with that</option>
                            <option value="I have my own controls but">I have my own controls but</option>
                            <option value="I do not have it and I refuse to do so">I do not have it and I refuse to
                                do so</option>
                            <option value="Connect with colleagues outside of work">Connect with colleagues outside
                                of work</option>
                        </select>
                    </div>
                    <!-- => [ End select Friends of the opposite sex ] !-->

                    <div class="mt-4">
                        <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
                    </div>

                </form>
            </div>

            <!--==============[ Start change Social status]=========================-->
            <div id="Social_status" class="col-lg-11 m-auto pb-4" wire:ignore>
                <h3 class="color_h">Change Social status</h3>

                <form id="captcha_form" method="post" action="#">
                    <br>

                    <!-- => [ Start select Marital Status ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Marital Status</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Marital Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="His wife died">His wife died</option>
                            <option value="divorced">divorced</option>
                        </select>
                    </div>
                    <!-- => [ End select Marital Status] !-->

                    <!-- => start input Determine the reason for the divorce, if any  !-->
                    <div class="form-group">
                        <label for="" class="col-12">Determine the reason for the divorce, if any</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Determine the reason for the divorce, if any" maxlength="200"></textarea>
                    </div>
                    <!-- => End input Determine the reason for the divorce, if any !-->

                    <!-- => [ Start select Do you have children? ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Do you have children?</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Do you have children?</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Yes, but not with me">Yes, but not with me</option>
                        </select>
                    </div>
                    <!-- => [ End select Do you have children? ] !-->

                    <!-- => start input number of children  !-->
                    <div class="input-group input-group-lg mb-3">
                        <label for="" class="col-12">number of children</label>
                        <input name="username" placeholder="number of children" type="number" class="form-control"
                            aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <!-- => End input number of children !-->

                    <!-- => start input Information about children !-->
                    <div class="form-group">
                        <label for="" class="col-12">Marital Status</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Information about children" maxlength="200"></textarea>
                    </div>
                    <!-- => End input Information about children!-->


                    <!-- => [ Start select Do you want multiplicity? ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Do you want multiplicity?</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Do you want multiplicity?</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Yes, but in agreement with the other party">Yes, but in agreement with
                                the other party</option>
                            <option value="I don't think about it but if I wanted to, I would do it">I don't think
                                about it but if I wanted to, I would do it</option>
                            <option value="I would not do that without her consent">I would not do that without her
                                consent</option>
                        </select>
                    </div>
                    <!-- => [ End select Do you want multiplicity?] !-->

                    <!-- => [ Start select Do you accept polygamy? ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Do you accept polygamy?</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Do you accept polygamy?</option>
                            <option value="I agree">I agree</option>
                            <option value="I do not agree">I do not agree</option>
                            <option value="I agree if he was married previously, and I do not agree to marry after me">I
                                agree if he was married previously, and I do not agree to marry after me</option>
                            <option value="I would love to work if I am allowed">I would love to work if I am
                                allowed</option>
                            <option value="We may agree on that.">We may agree on that.</option>
                        </select>
                    </div>
                    <!-- => [ End select Do you accept polygamy?] !-->

                    <!-- => [ Start select desire to have children ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">desire to have children</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">desire to have children</option>
                            <option value="I would like it">I would like it</option>
                            <option value="I do not want it">I do not want it</option>
                            <option value="Yes but not now">Yes but not now</option>
                            <option value="According to the desire of the other party">According to the desire of
                                the other party</option>
                        </select>
                    </div>
                    <!-- => [ End select desire to have children ] !-->

                    <!-- => [ Start select Current type of housing ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Current type of housing</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Current type of housing</option>
                            <option value="Owner">Owner</option>
                            <option value="tenant">tenant</option>
                        </select>
                    </div>
                    <!-- => [ End select Curren b t type of housing ] !-->

                    <!-- => [ Start select housing form ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">housing form</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">housing form</option>
                            <option value="Detached house">Detached house</option>
                            <option value="Apartment">Apartment</option>
                            <option value="room">room</option>
                            <option value="student residence">student residence</option>
                            <option value="shared housing">shared housing</option>
                        </select>
                    </div>
                    <!-- => [ End select ousing form ] !-->

                    <!-- => [ Start select housing form ] !-->
                    <div class="input-group input-group-lg mb-3 ">
                        <label for="" class="col-12">Housing method</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Housing method</option>
                            <option value="Alone">Alone</option>
                            <option value="with family">with family</option>
                            <option value="with friends">with friends</option>

                        </select>
                    </div>
                    <!-- => [ End select Housing method] !-->


                    <div class="mt-4">
                        <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
                    </div>

                </form>
            </div>

            <!--==============[ Start change the shape ]=========================-->
            <div id="the_shape" class="col-lg-11 m-auto pb-4" wire:ignore>
                <h3 class="color_h">Change the shape</h3>

                <form id="captcha_form" class="row" method="post" action="#">
                    <br>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Length</label>
                        <input type="number" class="form-control form-control-lg" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Length">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">the weight</label>
                        <input type="number" class="form-control form-control-lg" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="the weight">
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">body type</label>
                        <select name="body_type" required="required" class="form-control form-control-lg ">
                            <option value="">body type</option>
                            <option value="harmonic">harmonic</option>
                            <option value="Athlete">Athlete</option>
                            <option value="prone to obesity">prone to obesity</option>
                            <option value="skinny">skinny</option>
                            <option value="a bit fat">a bit fat</option>
                            <option value="Fat">Fat</option>
                            <option value="Weak">Weak</option>
                            <option value="graceful">graceful</option>

                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1"> skin colour</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value=""> skin colour</option>
                            <option value="white">white</option>
                            <option value="very light">very light</option>
                            <option value="light">light</option>
                            <option value="italic Tan">italic Tan</option>
                            <option value="wheaten">wheaten</option>
                            <option value="dark">dark</option>
                            <option value="very dark">very dark</option>
                        </select>
                    </div>


                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">hair colour</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">hair colour</option>
                            <option value="Black">Black</option>
                            <option value="Brown">Brown</option>
                            <option value="Light Brown">Light Brown</option>
                            <option value="Blond">Blond</option>
                            <option value="Red">Red</option>
                            <option value="white">white</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">hair length</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">hair length</option>
                            <option value="tall a little bald">tall a little bald</option>
                            <option value="shaved">shaved</option>
                            <option value="short">short</option>
                            <option value="long">long</option>
                            <option value="very long">very long</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">hair type</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">hair type</option>
                            <option value="smooth">smooth</option>
                            <option value="wavy">wavy</option>
                            <option value="slightly curly">slightly curly</option>
                            <option value="curly much">curly much</option>
                            <option value="other">other</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">Eye color</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Eye color</option>
                            <option value="black">black</option>
                            <option value="brown">brown</option>
                            <option value="hazel">hazel</option>
                            <option value="green">green</option>
                            <option value="blue">blue</option>
                        </select>
                    </div>


                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">Wearing the eye</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">Wearing the eye</option>
                            <option value="no">no</option>
                            <option value="glasses">glasses</option>
                            <option value="lenses">lenses</option>

                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">physical health</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">physical health</option>
                            <option value="good">good</option>
                            <option value="some persistent diseases">some persistent diseases</option>
                            <option value="partial disability">partial disability</option>

                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">psychological pattern</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">psychological pattern</option>
                            <option value="Normal">Normal</option>
                            <option value="Nervous">Nervous</option>
                            <option value="Romantic">Romantic</option>
                            <option value="hypersensitive">hypersensitive</option>
                            <option value="fast angry">fast angry</option>
                            <option value="irritable">irritable</option>
                            <option value="cold Nervous">cold Nervous</option>
                            <option value="suspicious">suspicious</option>
                            <option value="curious">curious</option>
                            <option value="mean">mean</option>
                            <option value="Fun">Fun</option>

                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">physical health</label>
                        <select name="" required="required" class="form-control form-control-lg ">
                            <option value="">physical health</option>
                            <option value="no">no</option>
                            <option value="glasses">glasses</option>
                            <option value="lenses">lenses</option>

                        </select>
                    </div>

                    <div class="form-group  mb-3 col-md-6">
                        <label for="exampleFormControlTextarea1">Clarification on physical health</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>



                    <div class="mt-4 col-12">
                        <input name="login" id="btn_login" type="submit" class="btn btn_form_settings btn-block p-2"
                            value="submit">
                    </div>

                </form>
            </div>


            <!--==============[ Start change their_lifestyle ]=========================-->
            <div id="their_lifestyle" class="col-lg-11 m-auto pb-4" wire:ignore>
                <h3 class="color_h">Change their lifestyle</h3>

                <form id="captcha_form" class="row" method="post" action="#">
                    <br>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">smoking</label>
                        <select name="smoking" required="required" class="form-control form-control-lg ">
                            <option value="">smoking</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="No and I hate its smell">No and I hate its smell</option>
                            <option value="A little">A little</option>
                            <option value="hookah only">hookah only</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">Alcohol</label>
                        <select name="Alcohol" required="required" class="form-control form-control-lg ">
                            <option value="">Alcohol</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="No And I can't eat it">No And I can't eat it</option>
                            <option value="Fry">Fry</option>

                        </select>
                    </div>


                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">halal food</label>
                        <select name="halal_food" required="required" class="form-control form-control-lg ">
                            <option value="">halal food</option>
                            <option value="Halal only">Halal only</option>
                            <option value="Halal if label">Halal if label</option>
                            <option value="It does not matter">It does not matter</option>
                            <option value="vegetarian">vegetarian</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">food style</label>
                        <select name="food_style" required="required" class="form-control form-control-lg ">
                            <option value="">food style</option>
                            <option value="Arabic">Arabic</option>
                            <option value="Turkish">Turkish</option>
                            <option value="Western">Western</option>
                            <option value="Asian">Asian</option>
                            <option value="Fast Food">Fast Food</option>
                            <option value="hearty meals">hearty meals</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="exampleInputEmail1">Interests</label>
                        <select name="Interests" required="required" class="form-control form-control-lg ">
                            <option value="">Interests</option>
                            <option value="Sports">Sports</option>
                            <option value="reading">reading</option>
                            <option value="writing">writing</option>
                            <option value="travel">travel</option>
                            <option value="games computer">games computer</option>
                            <option value="talk">talk</option>
                            <option value="go to Cafeteria">go to Cafeteria</option>
                            <option value="Challenging Games">Challenging Games</option>
                            <option value="Chess">Chess</option>
                            <option value="Disco">Disco</option>
                            <option value="sitting in nature">sitting in nature</option>
                            <option value="games Movement">games Movement</option>
                            <option value="Watching movies">Watching movies</option>
                            <option value="Watching movies cartoon">Watching movies cartoon</option>
                            <option value="Going out with friends">Going out with friends</option>
                            <option value="Walking">Walking</option>

                        </select>
                    </div>


                    <div class="form-group  mb-3 col-md-6">
                        <label for="exampleFormControlTextarea1">Favorite books</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group  mb-3 col-md-6">
                        <label for="exampleFormControlTextarea1">favorite places</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group  mb-3 col-md-6">
                        <label for="exampleFormControlTextarea1">Other interests</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>


                    <div class="mt-4 col-12">
                        <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
                    </div>

                </form>
            </div>




        </div>
    </div>
</div>
@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                timer: event.detail.timer,
                icon: event.detail.type,
            });
        })

        addEventListener('swal:confirm', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('delete', event.detail.id);
                }
            });
        })
    </script>
@endpush

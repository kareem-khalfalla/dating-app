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
            <select wire:model.defer="state.country_of_residence_id" required="required"
                class="form-control form-control-lg @error('country_of_residence_id') is-invalid @enderror">
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
            <select wire:model.defer="state.nationality_id" required="required"
                class="form-control form-control-lg @error('nationality_id') is-invalid @enderror">
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
                <input wire:model.defer="state.postal_code" placeholder="Postal code" type="text"
                    class="form-control @error('postal_code') is-invalid @enderror" aria-label="Large"
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
            <select wire:model.defer="state.residency_id" class="form-control form-control-lg ">
                @foreach ($residencies as $residency)
                    <option value="{{ $residency->id }}">{{ $residency->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Moving to another place</label>
            <select wire:model.defer="state.relocate_id" class="form-control form-control-lg ">
                @foreach ($relocations as $relocate)
                    <option value="{{ $relocate->id }}">{{ $relocate->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Native language</label>
            <select wire:model.defer="state.language_native" class="form-control form-control-lg ">
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="input-group input-group-lg mb-3 col-7">
                <label class="col-12">second language</label>
                <select wire:model.defer="state.language_second" class="form-control form-control-lg ">
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group input-group-lg mb-3 col-5">
                <label class="col-12">level</label>
                <select wire:model.defer="state.language_second_perfection_id" class="form-control form-control-lg ">
                    @foreach ($languagePerfections as $langPerfection)
                        <option value="{{ $langPerfection->id }}">{{ $langPerfection->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="input-group input-group-lg mb-3 col-7">
                <label class="col-12">third language</label>
                <select wire:model.defer="state.language_third" class="form-control form-control-lg ">
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group input-group-lg mb-3 col-5">
                <label class="col-12">level</label>
                <select wire:model.defer="state.language_third_perfection_id" class="form-control form-control-lg ">
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

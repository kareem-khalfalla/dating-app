<div id="Detailed_information" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change detailed information') }}</h3>
    <form wire:submit.prevent="updateDetails" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 mt-3">
            <label class="col-12">{{ __('settings.Birthday') }}</label>
            <input wire:model.defer="state.dob" placeholder="{{ __('settings.Birthday') }}" type="date"
                class="form-control @error('dob') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('dob')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Country of Origin') }}</label>
            <select wire:model="selectedCountry"
                class="form-control form-control-lg @error('selectedCountry') is-invalid @enderror">
                <option>---</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">
                        {{ $country->translations[app()->getLocale() == 'ar' ? 'fa' : app()->getLocale()] ?? $country->name }}
                    </option>
                @endforeach
            </select>
            @error('selectedCountry')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Country of Residence') }}</label>
            <select wire:model="state.country_of_residence_id"
                class="form-control form-control-lg @error('country_of_residence_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">
                        {{ $country->translations[app()->getLocale() == 'ar' ? 'fa' : app()->getLocale()] ?? $country->name }}
                    </option>
                @endforeach
            </select>
            @error('country_of_residence_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3">
            <label class="col-12">{{ __('settings.Nationality') }}</label>
            <x-selectbox wire:model.defer="state.nationality_id" :data="$nationalities" :error="'nationality_id'" />
        </div>

        <div class="form-row">
            @if ($selectedCountry)
                <div class="input-group input-group-lg mb-3 col-6">
                    <label class="col-12">{{ __('settings.City') }}</label>
                    <x-selectbox wire:model="selectedState" :data="$countryStates" :error="'selectedState'" />
                </div>
            @endif
            <div class="input-group input-group-lg mb-3 col-6">
                <label class="col-12">{{ __('settings.Postal code') }}</label>
                <input wire:model.defer="state.postal_code" placeholder="{{ __('settings.Postal code') }}"
                    type="text" class="form-control @error('postal_code') is-invalid @enderror" aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">
                @error('postal_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Type of accommodation') }}</label>
            <x-selectbox wire:model.defer="state.residence_status_id" :data="$residenceStatuses"
                :error="'residence_status_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Moving to another place') }}</label>
            <x-selectbox wire:model.defer="state.relocate_status_id" :data="$relocations"
                :error="'relocate_status_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Native language') }}</label>
            <x-selectbox wire:model.defer="state.language_native_id" :data="$languages" :error="'language_native_id'" />
        </div>
        <div class="form-row">
            <div class="input-group input-group-lg mb-3 col-7">
                <label class="col-12">{{ __('settings.second language') }}</label>
                <x-selectbox wire:model.defer="state.language_second_id" :data="$languages"
                    :error="'language_second_id'" />
            </div>
            @if (isset($state['language_second_id']))
                <div class="input-group input-group-lg mb-3 col-5">
                    <label class="col-12">{{ __('settings.level') }}</label>
                    <x-selectbox wire:model.defer="state.language_second_perfection_id" :data="$languagePerfections"
                        :error="'language_second_perfection_id'" />
                </div>
            @endif
        </div>
        <div class="form-row">
            <div class="input-group input-group-lg mb-3 col-7">
                <label class="col-12">{{ __('settings.third language') }}</label>
                <x-selectbox wire:model.defer="state.language_third_id" :data="$languages"
                    :error="'language_third_id'" />
            </div>
            @if (isset($state['language_third_id']))
                <div class="input-group input-group-lg mb-3 col-5">
                    <label class="col-12">{{ __('settings.level') }}</label>
                    <x-selectbox wire:model.defer="state.language_third_perfection_id" :data="$languagePerfections"
                        :error="'language_third_perfection_id'" />
                </div>
            @endif
        </div>
        <div class="mt-4">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

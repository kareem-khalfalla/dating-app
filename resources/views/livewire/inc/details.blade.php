<div id="Detailed_information" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change detailed information') }}</h3>
    <form wire:submit.prevent="updateDetails" id="captcha_form" method="post" action="#">
        <br>
        <div class="row">
            <div class="input-group input-group-lg mb-3 col-md-6">
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
            <div class="form-row col-12">
                <div class="input-group input-group-lg mb-3 col-md-6">
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

                <div class="input-group input-group-lg mb-3 col-md-6">
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
            <div class="input-group input-group-lg mb-3 col-md-6">
                <label class="col-12">{{ __('settings.Type of accommodation') }}</label>
                <x-selectbox wire:model.defer="state.residence_status">
                    <option value="">---</option>
                    <x-selectboxes.residence_statuses />
                </x-selectbox>
            </div>
            <div class="input-group input-group-lg mb-3 col-md-6">
                <label class="col-12">{{ __('settings.Moving to another place') }}</label>
                <x-selectbox wire:model.defer="state.relocate_status">
                    <option value="">---</option>
                    <x-selectboxes.relocate_statuses />
                </x-selectbox>
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
                @if (isset($state['second_language_id']))
                    <div class="input-group input-group-lg mb-3 col-5">
                        <label class="col-12">{{ __('settings.level') }}</label>
                        <x-selectbox wire:model.defer="state.second_language_perfection">
                            <option value="">---</option>
                            <x-selectboxes.language_perfection />
                        </x-selectbox>
                    </div>
                @endif
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
                @if (isset($state['third_language_id']))
                    <div class="input-group input-group-lg mb-3 col-5">
                        <label class="col-12">{{ __('settings.level') }}</label>
                        <x-selectbox wire:model.defer="state.third_language_perfection">
                            <option value="">---</option>
                            <x-selectboxes.language_perfection />
                        </x-selectbox>
                        @error('third_language_perfection')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif
            </div>
            <div class="mt-4 col-12">
                <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
            </div>
        </div>
    </form>
</div>

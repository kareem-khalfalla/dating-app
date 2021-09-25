<div id="Religious_status" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change Religion status') }}</h3>
    <form wire:submit.prevent="updateReligionInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Religious') }}</label>
            <x-selectbox wire:model.defer="state.religion_id" :data="$religions" :error="'religion_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label for="ReligionMethod" class="col-12">{{ __('settings.ReligionMethod') }}</label>
            <x-selectbox wire:model.defer="state.religion_method_id" :data="$religionMethods"
                :error="'religion_method_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Commitment') }}</label>
            <x-selectbox wire:model.defer="state.obligation_id" :data="$obligations" :error="'obligation_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Prayer') }}</label>
            <x-selectbox wire:model.defer="state.prayer_id" :data="$prayers" :error="'prayer_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Al-fajr prayer') }}</label>
            <x-selectbox wire:model.defer="state.alfajr_prayer_id" :data="$alfajrPrayers" :error="'alfajr_prayer_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.fasting') }}</label>
            <x-selectbox wire:model.defer="state.fasting_id" :data="$fastings" :error="'fasting_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Reading the Qoran') }}</label>
            <x-selectbox wire:model.defer="state.reading_quran_id" :data="$readingQurans" :error="'reading_quran_id'" />
        </div>
        @if (Auth::user()->gender == 'female')
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Headdress') }}</label>
                <x-selectbox wire:model.defer="state.headdress_id" :data="$headdresses" :error="'headdress_id'" />
            </div>
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Niqab') }}</label>
                <x-selectbox wire:model.defer="state.robe_status_id" :data="$robeStatuses" :error="'robe_status_id'" />
            </div>
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Veil') }}</label>
                <x-selectbox wire:model.defer="state.veil_status_id" :data="$veilStatuses" :error="'veil_status_id'" />
            </div>
        @else
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.BeardStatus') }}</label>
                <x-selectbox wire:model.defer="state.beard_status_id" :data="$beardStatuses"
                    :error="'beard_status_id'" />
            </div>
        @endif
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.TafaqahStatus in religion') }}</label>
            <x-selectbox wire:model.defer="state.tafaqah_status_id" :data="$tafaqahStatuses"
                :error="'tafaqah_status_id'" />
        </div>
        <div class="form-group">
            <label
                class="col-12">{{ __('settings.If you listen to the lessons, who will you listen to?') }}</label>
            <textarea wire:model.defer="state.lesson_listing"
                class="form-control @error('lesson_listing') is-invalid @enderror" id="exampleFormControlTextarea1"
                rows="3" placeholder="{{ __('settings.If you listen to the lessons, who will you listen to?') }}"
                maxlength="200"></textarea>
            @error('lesson_listing')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Listening to music') }}</label>
            <x-selectbox wire:model.defer="state.music_status_id" :data="$musicStatuses" :error="'music_status_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Movies and series') }}</label>
            <x-selectbox wire:model.defer="state.show_status_id" :data="$showStatuses" :error="'show_status_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Friends of the opposite sex') }}</label>
            <x-selectbox wire:model.defer="state.friend_status_id" :data="$friendStatuses"
                :error="'friend_status_id'" />
        </div>
        <div class="mt-4">
            <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2"
                value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

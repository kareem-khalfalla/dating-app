<div id="Religious_status" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change Religion status') }}</h3>
    <form wire:submit.prevent="updateReligionInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Religious') }}</label>
            <x-selectbox wire:model.defer="state.religion">
                <option value="">---</option>
                <x-selectboxes.religions />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label for="ReligionMethod" class="col-12">{{ __('settings.ReligionMethod') }}</label>
            <x-selectbox wire:model.defer="state.religion_method">
                <option value="">---</option>
                <x-selectboxes.religion_method />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Commitment') }}</label>
            <x-selectbox wire:model.defer="state.obligation">
                <option value="">---</option>
                <x-selectboxes.obligations />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Prayer') }}</label>
            <x-selectbox wire:model.defer="state.prayer">
                <option value="">---</option>
                <x-selectboxes.prayers />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Al-fajr prayer') }}</label>
            <x-selectbox wire:model.defer="state.alfajr_prayer">
                <option value="">---</option>
                <x-selectboxes.alfajr_prayer_statuses />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.fasting') }}</label>
            <x-selectbox wire:model.defer="state.fasting">
                <option value="">---</option>
                <x-selectboxes.fastings />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Reading the Qoran') }}</label>
            <x-selectbox wire:model.defer="state.reading_quran">
                <option value="">---</option>
                <x-selectboxes.reading_quran_statuses />
            </x-selectbox>
        </div>
        @if (Auth::user()->gender == 'female')
            @include('livewire.inc.religion-female')
        @else
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.BeardStatus') }}</label>
                <x-selectbox wire:model.defer="state.beard_status">
                    <option value="">---</option>
                    <x-selectboxes.male.beard_statuses />
                </x-selectbox>
            </div>
        @endif
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.TafaqahStatus in religion') }}</label>
            <x-selectbox wire:model.defer="state.tafaqah_status">
                <option value="">---</option>
                <x-selectboxes.tafaqah_statuses />
            </x-selectbox>
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
            <x-selectbox wire:model.defer="state.music_status">
                <option value="">---</option>
                <x-selectboxes.music_statuses />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Movies and series') }}</label>
            <x-selectbox wire:model.defer="state.show_status">
                <option value="">---</option>
                <x-selectboxes.shows_statuses />
                </option>
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Friends of the opposite sex') }}</label>
            <x-selectbox wire:model.defer="state.friend_status">
                <option value="">---</option>
                <x-selectboxes.friend_statuses />
            </x-selectbox>
        </div>
        <div class="mt-4">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

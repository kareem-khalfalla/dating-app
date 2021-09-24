<div id="Religious_status" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change Religion status') }}</h3>
    <form wire:submit.prevent="updateReligionInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Religious') }}</label>
            <select wire:model.defer="state.religion_id" required="required"
                class="form-control form-control-lg @error('religion_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($religions as $religion)
                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                @endforeach
            </select>
            @error('religion_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label for="ReligionMethod" class="col-12">{{ __('settings.ReligionMethod') }}</label>
            <select wire:model.defer="state.religion_method_id" required="required"
                class="form-control form-control-lg @error('religion_method_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($methods as $method)
                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                @endforeach
            </select>
            @error('religion_method_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Commitment') }}</label>
            <select wire:model.defer="state.obligation_id" required="required"
                class="form-control form-control-lg @error('obligation_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($obligations as $obligation)
                    <option value="{{ $obligation->id }}">{{ $obligation->name }}</option>
                @endforeach
            </select>
            @error('obligation_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Prayer') }}</label>
            <select wire:model.defer="state.prayer_id" required="required"
                class="form-control form-control-lg @error('prayer_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($prayers as $prayer)
                    <option value="{{ $prayer->id }}">{{ $prayer->name }}</option>
                @endforeach
            </select>
            @error('prayer_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Al-fajr prayer') }}</label>
            <select wire:model.defer="state.alfajr_prayer_id" required="required"
                class="form-control form-control-lg @error('alfajr_prayer_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($alfajrPrayers as $alfajrPrayer)
                    <option value="{{ $alfajrPrayer->id }}">{{ $alfajrPrayer->name }}</option>
                @endforeach
            </select>
            @error('alfajr_prayer_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.fasting') }}</label>
            <select wire:model.defer="state.fasting_id" required="required"
                class="form-control form-control-lg @error('fasting_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($fastings as $fasting)
                    <option value="{{ $fasting->id }}">{{ $fasting->name }}</option>
                @endforeach
            </select>
            @error('fasting_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Reading the Qoran') }}</label>
            <select wire:model.defer="state.reading_quran_id" required="required"
                class="form-control form-control-lg @error('reading_quran_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($readingQurans as $readingQuran)
                    <option value="{{ $readingQuran->id }}">{{ $readingQuran->name }}</option>
                @endforeach
            </select>
            @error('reading_quran_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        @if (Auth::user()->gender == 'female')
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Headdress') }}</label>
                <select wire:model.defer="state.headdress_id" required="required"
                    class="form-control form-control-lg @error('headdress_id') is-invalid @enderror">
                    <option>---</option>
                    @foreach ($headdresses as $headdress)
                        <option value="{{ $headdress->id }}">{{ $headdress->name }}</option>
                    @endforeach
                </select>
                @error('headdress_id')
                    <div class="invalid-feedback">
                        <small id="passError" class="text-danger col-12">{{ $message }}</small>
                    </div>
                @enderror
            </div>
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Niqab') }}</label>
                <select wire:model.defer="state.robe_status_id" required="required"
                    class="form-control form-control-lg @error('robe_status_id') is-invalid @enderror">
                    <option>---</option>
                    @foreach ($robeStatuses as $robe)
                        <option value="{{ $robe->id }}">{{ $robe->name }}</option>
                    @endforeach
                </select>
                @error('robe_status_id')
                    <div class="invalid-feedback">
                        <small id="passError" class="text-danger col-12">{{ $message }}</small>
                    </div>
                @enderror
            </div>
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Veil') }}</label>
                <select wire:model.defer="state.veil_status_id" required="required"
                    class="form-control form-control-lg @error('veil_status_id') is-invalid @enderror">
                    <option>---</option>
                    @foreach ($veilStatuses as $veil)
                        <option value="{{ $veil->id }}">{{ $veil->name }}</option>
                    @endforeach
                </select>
                @error('veil_status_id')
                    <div class="invalid-feedback">
                        <small id="passError" class="text-danger col-12">{{ $message }}</small>
                    </div>
                @enderror
            </div>
        @else
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.BeardStatus') }}</label>
                <select wire:model.defer="state.beard_status_id" required="required"
                    class="form-control form-control-lg @error('beard_status_id') is-invalid @enderror">
                    <option>---</option>
                    @foreach ($beardStatuses as $beardStatus)
                        <option value="{{ $beardStatus->id }}">{{ $beardStatus->name }}</option>
                    @endforeach
                </select>
                @error('beard_status_id')
                    <div class="invalid-feedback">
                        <small id="passError" class="text-danger col-12">{{ $message }}</small>
                    </div>
                @enderror
            </div>
        @endif
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.TafaqahStatus in religion') }}</label>
            <select wire:model.defer="state.tafaqah_status_id" required="required"
                class="form-control form-control-lg @error('tafaqah_status_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($tafaqahStatuses as $tafaqahStatus)
                    <option value="{{ $tafaqahStatus->id }}">{{ $tafaqahStatus->name }}</option>
                @endforeach
            </select>
            @error('tafaqah_status_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
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
            <select wire:model.defer="state.music_status_id" required="required"
                class="form-control form-control-lg @error('music_status_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($musicStatuses as $musicStatus)
                    <option value="{{ $musicStatus->id }}">{{ $musicStatus->name }}</option>
                @endforeach
            </select>
            @error('music_status_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Movies and series') }}</label>
            <select wire:model.defer="state.show_status_id" required="required"
                class="form-control form-control-lg @error('show_status_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($showStatuses as $showStatus)
                    <option value="{{ $showStatus->id }}">{{ $showStatus->name }}</option>
                @endforeach
            </select>
            @error('show_status_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Friends of the opposite sex') }}</label>
            <select wire:model.defer="state.friend_status_id" required="required"
                class="form-control form-control-lg @error('friend_status_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($friendStatuses as $friendStatus)
                    <option value="{{ $friendStatus->id }}">{{ $friendStatus->name }}</option>
                @endforeach
            </select>
            @error('friend_status_id')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="mt-4">
            <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2"
                value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

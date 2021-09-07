<div id="Religious_status" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('profiles.Change Religion status') }}</h3>

    <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Religious') }}</label>
            <select wire:model.defer="state.religion_id" required="required" class="form-control form-control-lg ">
                @foreach ($religions as $religion)
                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label for="Method" class="col-12">{{ __('profiles.Method') }}</label>
            <select wire:model.defer="state.method_id" required="required" class="form-control form-control-lg ">
                @foreach ($methods as $method)
                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Commitment') }}</label>
            <select wire:model.defer="state.obligation_id" required="required" class="form-control form-control-lg ">
                @foreach ($obligations as $obligation)
                    <option value="{{ $obligation->id }}">{{ $obligation->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Prayer') }}</label>
            <select wire:model.defer="state.prayer_id" required="required" class="form-control form-control-lg ">
                @foreach ($prayers as $prayer)
                    <option value="{{ $prayer->id }}">{{ $prayer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Al-fajr prayer') }}</label>
            <select wire:model.defer="state.alfajr_prayer_id" required="required" class="form-control form-control-lg ">
                @foreach ($alfajrPrayers as $alfajrPrayer)
                    <option value="{{ $alfajrPrayer->id }}">{{ $alfajrPrayer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.fasting') }}</label>
            <select wire:model.defer="state.fasting_id" required="required" class="form-control form-control-lg ">
                @foreach ($fastings as $fasting)
                    <option value="{{ $fasting->id }}">{{ $fasting->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Reading the Qoran') }}</label>
            <select wire:model.defer="state.reading_quran_id" required="required" class="form-control form-control-lg ">
                @foreach ($readingQurans as $readingQuran)
                    <option value="{{ $readingQuran->id }}">{{ $readingQuran->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Headdress') }}</label>
            <select wire:model.defer="state.headdress_id" required="required" class="form-control form-control-lg ">
                @foreach ($headdresses as $headdress)
                    <option value="{{ $headdress->id }}">{{ $headdress->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Reading the Qoran</label>
            <select wire:model.defer="state.veil_status_id" required="required" class="form-control form-control-lg ">
                                @foreach ($veilStatuses as $veilStatus)
                    <option value="{{ $veilStatus->id }}">{{ $veilStatus->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Niqab') }}</label>
            <select wire:model.defer="state.robe_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($robeStatuses as $robe)
                    <option value="{{ $robe->id }}">{{ $robe->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.BeardStatus') }}</label>
            <select wire:model.defer="state.beard_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($beardStatuses as $beardStatus)
                    <option value="{{ $beardStatus->id }}">{{ $beardStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.TafaqahStatus in religion') }}</label>
            <select wire:model.defer="state.tafaqah_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($tafaqahStatuses as $tafaqahStatus)
                    <option value="{{ $tafaqahStatus->id }}">{{ $tafaqahStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="col-12">{{ __('profiles.If you listen to the lessons, who will you listen
                to?') }}</label>
            <textarea wire:model.defer="state.lesson_listing"
                class="form-control @error('lesson_listing') is-invalid @enderror" id="exampleFormControlTextarea1"
                rows="3" placeholder="{{ __('profiles.If you listen to the lessons, who will you listen to?') }}" maxlength="200"></textarea>
            @error('lesson_listing')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Listening to music') }}</label>
            <select wire:model.defer="state.music_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($musicStatuses as $musicStatus)
                    <option value="{{ $musicStatus->id }}">{{ $musicStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Movies and series') }}</label>
            <select wire:model.defer="state.show_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($showStatuses as $showStatus)
                    <option value="{{ $showStatus->id }}">{{ $showStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('profiles.Friends of the opposite sex') }}</label>
            <select wire:model.defer="state.friend_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($friendStatuses as $friendStatus)
                    <option value="{{ $friendStatus->id }}">{{ $friendStatus->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- => [ End select Friends of the opposite sex ] !-->

        <div class="mt-4">
            <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('profiles.save') }}">
        </div>

    </form>
</div>

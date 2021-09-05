<div id="Religious_status" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">Change Religion status</h3>

    <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Religious</label>
            <select wire:model.defer="state.religion_id" required="required" class="form-control form-control-lg ">
                <option disabled>Religious</option>
                @foreach ($religions as $religion)
                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label for="Method" class="col-12">Method</label>
            <select wire:model.defer="state.method_id" required="required" class="form-control form-control-lg ">
                <option disabled>Method</option>
                @foreach ($methods as $method)
                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Commitment</label>
            <select wire:model.defer="state.obligation_id" required="required" class="form-control form-control-lg ">
                <option disabled>Commitment</option>
                @foreach ($obligations as $obligation)
                    <option value="{{ $obligation->id }}">{{ $obligation->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Prayer</label>
            <select wire:model.defer="state.prayer_id" required="required" class="form-control form-control-lg ">
                <option disabled>Prayer</option>
                @foreach ($prayers as $prayer)
                    <option value="{{ $prayer->id }}">{{ $prayer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Al-fajr prayer</label>
            <select wire:model.defer="state.alfajr_prayer_id" required="required" class="form-control form-control-lg ">
                <option disabled>Al-fajr prayer</option>
                @foreach ($alfajrPrayers as $alfajrPrayer)
                    <option value="{{ $alfajrPrayer->id }}">{{ $alfajrPrayer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">fasting</label>
            <select wire:model.defer="state.fasting_id" required="required" class="form-control form-control-lg ">
                <option disabled>fasting</option>
                @foreach ($fastings as $fasting)
                    <option value="{{ $fasting->id }}">{{ $fasting->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Reading the Qoran</label>
            <select wire:model.defer="state.reading_quran_id" required="required" class="form-control form-control-lg ">
                <option disabled>Reading the Qoran</option>
                @foreach ($readingQurans as $readingQuran)
                    <option value="{{ $readingQuran->id }}">{{ $readingQuran->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Headdress</label>
            <select wire:model.defer="state.headdress_id" required="required" class="form-control form-control-lg ">
                <option disabled>Headdress</option>
                @foreach ($headdresses as $headdress)
                    <option value="{{ $headdress->id }}">{{ $headdress->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Reading the Qoran</label>
            <select wire:model.defer="state.veil_id" required="required" class="form-control form-control-lg ">
                <option disabled>Reading the Qoran</option>
                @foreach ($veils as $veil)
                    <option value="{{ $veil->id }}">{{ $veil->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Niqab</label>
            <select wire:model.defer="state.robe_id" required="required" class="form-control form-control-lg ">
                <option disabled>Niqab</option>
                @foreach ($robes as $robe)
                    <option value="{{ $robe->id }}">{{ $robe->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Beard</label>
            <select wire:model.defer="state.beard_id" required="required" class="form-control form-control-lg ">
                <option disabled>Beard</option>
                @foreach ($beards as $beard)
                    <option value="{{ $beard->id }}">{{ $beard->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Tafaqah in religion</label>
            <select wire:model.defer="state.tafaqah_id" required="required" class="form-control form-control-lg ">
                <option disabled>Tafaqah in religion</option>
                @foreach ($tafaqahs as $tafaqah)
                    <option value="{{ $tafaqah->id }}">{{ $tafaqah->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="col-12">If you listen to the lessons, who will you listen
                to?</label>
            <textarea wire:model.defer="state.lesson_listing"
                class="form-control @error('lesson_listing') is-invalid @enderror" id="exampleFormControlTextarea1"
                rows="3" placeholder="If you listen to the lessons, who will you listen to?" maxlength="200"></textarea>
            @error('lesson_listing')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Listening to music</label>
            <select wire:model.defer="state.music_status_id" required="required" class="form-control form-control-lg ">
                <option disabled>Listening to music</option>
                @foreach ($musicStatuses as $musicStatus)
                    <option value="{{ $musicStatus->id }}">{{ $musicStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Movies and series</label>
            <select wire:model.defer="state.show_status_id" required="required" class="form-control form-control-lg ">
                <option disabled>Movies and series</option>
                @foreach ($showStatuses as $showStatus)
                    <option value="{{ $showStatus->id }}">{{ $showStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Friends of the opposite sex</label>
            <select name="state.friend_status_id" required="required" class="form-control form-control-lg ">
                <option disabled>Friends of the opposite sex</option>
                @foreach ($friendStatuses as $friendStatus)
                    <option value="{{ $friendStatus->id }}">{{ $friendStatus->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- => [ End select Friends of the opposite sex ] !-->

        <div class="mt-4">
            <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
        </div>

    </form>
</div>

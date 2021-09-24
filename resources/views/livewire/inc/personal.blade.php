<div id="Personal_profile" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change Personal statement') }}</h3>
    <form wire:submit.prevent="updatePersonalInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="form-group">
            <label class="col-12">{{ __('settings.brief about me') }}</label>
            <textarea wire:model.defer="state.bio" class="form-control @error('bio') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('settings.brief about me') }}"
                maxlength="200"></textarea>
            @error('bio')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-12">{{ __('settings.A profile of your desired partner') }}</label>
            <textarea wire:model.defer="state.partner_bio"
                class="form-control @error('partner_bio') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                placeholder="{{ __('settings.A profile of your desired partner') }}" maxlength="200"></textarea>
            @error('partner_bio')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.The required relationship') }}</label>
            <select wire:model.defer="state.relationship_status_id" required="required"
                class="form-control form-control-lg @error('relationship_status_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($relationships as $relationship)
                    <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                @endforeach
            </select>
            @error('relationship_status_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Desired method of marriageStatus') }}</label>
            <select wire:model.defer="state.marriage_status_id" required="required"
                class="form-control form-control-lg @error('marriage_status_id') is-invalid @enderror">
                <option>---</option>
                @foreach ($marriageStatuses as $marriageStatus)
                    <option value="{{ $marriageStatus->id }}">{{ $marriageStatus->name }}</option>
                @endforeach
            </select>
            @error('marriage_status_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-4">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

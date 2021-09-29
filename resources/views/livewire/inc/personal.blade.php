<div id="Personal_profile" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change Personal statement') }}</h3>
    <form wire:submit.prevent="updatePersonalInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="form-group">
            <label class="col-12">{{ __('settings.brief about me') }}</label>
            <x-textarea wire:model.defer="state.bio" placeholder="{{ __('settings.brief about me') }}" />
        </div>
        <div class="form-group">
            <label class="col-12">{{ __('settings.A profile of your desired partner') }}</label>
            <x-textarea wire:model.defer="state.partner_bio" placeholder="{{ __('settings.A profile of your desired partner') }}" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.The required relationship') }}</label>
            <x-selectbox wire:model.defer="state.relationship_status">
                <option value="">---</option>
                <x-selectboxes.relationship_statuses />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Desired method of marriageStatus') }}</label>
            <x-selectbox wire:model.defer="state.marriage_status">
                <option value="">---</option>
                <x-selectboxes.marriage_statuses />
            </x-selectbox>
        </div>
        <div class="mt-4">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

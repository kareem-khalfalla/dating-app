<div id="change_password" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change Password') }}</h3>
    <form id="captcha_form" wire:submit.prevent="updatePassword" method="post">
        <br>
        <div class="input-group input-group-lg mb-3 mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"></i></span>
            </div>
            <x-input wire:model.defer="state.current_password" placeholder="{{ __('settings.Old password') }}"
                type="password" />
        </div>
        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"></i></span>
            </div>
            <x-input wire:model.defer="state.password" placeholder="{{ __('settings.password') }}" type="password" />
        </div>
        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                        aria-hidden="true"></i></span>
            </div>
            <input wire:model.defer="state.password_confirmation" placeholder="{{ __('settings.Confirm password') }}"
                type="password" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn_form_settings btn-block p-2">{{ __('settings.save') }}</button>
        </div>
    </form>
</div>

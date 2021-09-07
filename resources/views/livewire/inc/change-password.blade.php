<div id="change_password" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('profiles.Change Password') }}</h3>
    <form id="captcha_form" wire:submit.prevent="updatePassword" method="post">
        <br>
        <div class="input-group input-group-lg mb-3 mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"></i></span>
            </div>
            <input wire:model.defer="state.current_password" placeholder="{{ __('profiles.Old password') }}" type="password"
                class="form-control @error('current_password') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('current_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"></i></span>
            </div>
            <input wire:model.defer="state.password" placeholder="{{ __('profiles.password') }}" type="password"
                class="form-control @error('password') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                        aria-hidden="true"></i></span>
            </div>
            <input wire:model.defer="state.password_confirmation" placeholder="{{ __('profiles.Confirm password') }}" type="password"
                class="form-control @error('password_confirmation') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn_form_settings btn-block p-2">{{ __('profiles.save') }}</button>
        </div>
    </form>
</div>

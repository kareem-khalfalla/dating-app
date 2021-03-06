<div id="change_main_information" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change main information') }}</h3>
    <form wire:submit.prevent="updateUserInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-user"></i></span>
            </div>
            <input wire:model.defer="state.name" placeholder="{{ __('register.fullname') }}" type="text"
                class="form-control @error('name') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-user-circle"></i></span>
            </div>
            <input wire:model.defer="state.username" placeholder="{{ __('register.username') }}" type="text"
                class="form-control @error('username') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-envelope"
                        aria-hidden="true"></i></span>
            </div>
            <input wire:model.defer="state.email" placeholder="{{ __('register.email') }}" type="email"
                class="form-control @error('email') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-phone"
                        aria-hidden="true"></i></span>
            </div>
            <input wire:model.defer="state.phone" placeholder="{{ __('register.phone') }}" type="tel"
                class="form-control @error('phone') is-invalid @enderror" aria-label="Large"
                aria-describedby="inputGroup-sizing-sm">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-2 mb-2 pr-2">
            <label class="mr-3"><b>{{ __('settings.Gender') }}</b></label>
            <label class="radio-inline p-2">
                <input type="radio" name="gender" wire:model.defer="state.gender" wire:model.defer="state.gender"
                    id="male" value="male">
                &nbsp;{{ __('settings.Male') }}
            </label>
            <label class="radio-inline p-2">
                <input type="radio" name="gender" wire:model.defer="state.gender" wire:model.defer="state.gender"
                    id="female" value="female">
                &nbsp;{{ __('settings.Female') }}
            </label>
        </div>
        <div class="mt-4">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

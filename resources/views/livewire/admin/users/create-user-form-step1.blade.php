<div class="card card-body shadow">
    @if ($currentStep == 1 && is_null($user))
        <h2 class="mb-4">{{ __('register.Add New User') }}</h2>
    @else
        <h2 class="mb-4">{{ __('register.Update User') }}</h2>
    @endif
    <div class="row">
        <div class="input-group input-group-lg mb-3 col-md-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-user"></i></span>
            </div>
            <x-input wire:model.defer="state.name" placeholder="{{ __('register.fullname') }}" type="text" />
        </div>
        <div class="input-group input-group-lg mb-3 col-md-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-user-circle"></i></span>
            </div>
            <x-input wire:model.defer="state.username" placeholder="{{ __('register.username') }}" type="text" />
        </div>
        <div class="input-group input-group-lg mb-3 col-md-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-envelope"></i></span>
            </div>
            <x-input wire:model.defer="state.email" placeholder="{{ __('register.email') }}" type="email" />
        </div>
        <div class="input-group input-group-lg mb-3 col-md-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-phone"
                        aria-hidden="true"></i></span>
            </div>
            <x-input wire:model.defer="state.phone" placeholder="{{ __('register.phone') }}" type="tel" />
        </div>
        <div class="input-group input-group-lg mb-3 col-md-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                        aria-hidden="true"></i></span>
            </div>
            <x-input id="rpassword" wire:model.defer="state.password" placeholder="{{ __('register.password') }}"
                type="password" />
        </div>
        <div class="input-group input-group-lg mb-3 col-md-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                        aria-hidden="true"></i></span>
            </div>
            <x-input id="cpassword" wire:model.defer="state.password_confirmation"
                placeholder="{{ __('register.cofirm password') }}" type="password" />
            <small id="passError"
                class="d-none text-danger col-12">{{ __('register.password not
                much') }}</small>
        </div>
        <div class="mt-2 mb-2 col-md-6 pr-2">
            <label class="mr-3"><b>{{ __('register.Gender') }}</b></label>
            <label class="radio-inline p-2 @error('gender') is-invalid @enderror"><input type="radio" name="gender"
                    wire:model.defer="state.gender" value="male">&nbsp;{{ __('register.Male') }}</label>
            <label class="radio-inline p-2 @error('gender') is-invalid @enderror"><input type="radio" name="gender"
                    wire:model.defer="state.gender" value="female">&nbsp;{{ __('register.Female') }}</label>
            @error('gender')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <input type="hidden" name="register">
        <div class="mt-2 mb-1 mt-4 ml-3">
            <a href="add_user_step2.html">
                <button wire:click.prevent="nextStep" type="submit"
                    class="btn {{ $currentStep == 1 ? 'btn-success' : 'btn-dark' }} btn-block m-auto">{{ __('register.Next') }}</button>
            </a>
        </div>
        <br>
    </div>

</div>

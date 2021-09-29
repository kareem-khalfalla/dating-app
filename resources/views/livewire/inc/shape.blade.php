<div id="the_shape" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change the shape') }}</h3>
    <form wire:submit.prevent="updateShapeInfo" id="captcha_form" class="row" method="post" action="#">
        <br>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Length') }}</label>
            <x-input wire:model.defer="state.height" type="number" min="40" max="222" placeholder="Length" />
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.the weight') }}</label>
            <x-input wire:model.defer="state.weight" type="number" min="40" max="222" placeholder="the weight" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.body type') }}</label>
            <x-selectbox wire:model.defer="state.body_status">
                <option value="">---</option>
                <x-selectboxes.body_statuses />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1"> {{ __('settings.skinStatus colour') }}</label>
            <x-selectbox wire:model.defer="state.skin_status">
                <option value="">---</option>
                <x-selectboxes.skin_statuses />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.hair colour') }}</label>
            <x-selectbox wire:model.defer="state.hair_color">
                <option value="">---</option>
                <x-selectboxes.hair_colors />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.hair length') }}</label>
            <x-selectbox wire:model.defer="state.hair_length">
                <option value="">---</option>
                <x-selectboxes.hair_lengths />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.hair type') }}</label>
            <x-selectbox wire:model.defer="state.hair_kind">
                <option value="">---</option>
                <x-selectboxes.hair_types />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Eye color') }}</label>
            <x-selectbox wire:model.defer="state.eye_color">
                <option value="">---</option>
                <x-selectboxes.eye_colors />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Wearing the eye') }}</label>
            <x-selectbox wire:model.defer="state.eye_glass">
                <option value="">---</option>
                <x-selectboxes.eye_glasses />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.physical healthStatus') }}</label>
            <x-selectbox wire:model.defer="state.health_status">
                <option value="">---</option>
                <x-selectboxes.health_statuses />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.psychological pattern') }}</label>
            <x-selectbox wire:model.defer="state.psychological_pattern">
                <option value="">---</option>
                <x-selectboxes.psychological_pattern_statuses />
            </x-selectbox>
        </div>
        <div class="form-group  mb-3 col-md-6">
            <label
                for="exampleFormControlTextarea1">{{ __('settings.Clarification on physical healthStatus') }}</label>
            <x-textarea wire:model.defer="state.clarification" />
        </div>
        <div class="mt-4 col-12">
            <input name="login" id="btn_login" type="submit" class="btn btn_form_settings btn-block p-2"
                value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

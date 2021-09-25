<div id="the_shape" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change the shape') }}</h3>
    <form wire:submit.prevent="updateShapeInfo" id="captcha_form" class="row" method="post" action="#">
        <br>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Length') }}</label>
            <input wire:model.defer="state.height" type="number"
                class="form-control form-control-lg @error('height') is-invalid @enderror" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Length">
            @error('height')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.the weight') }}</label>
            <input wire:model.defer="state.weight" type="number"
                class="form-control form-control-lg @error('weight') is-invalid @enderror" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="the weight">
            @error('weight')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.body type') }}</label>
            <x-selectbox wire:model.defer="state.body_status_id" :data="$bodyStatuses" :error="'body_status_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1"> {{ __('settings.skinStatus colour') }}</label>
            <x-selectbox wire:model.defer="state.skin_status_id" :data="$skinStatuses" :error="'skin_status_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.hair colour') }}</label>
            <x-selectbox wire:model.defer="state.hair_color_id" :data="$hairColors" :error="'hair_color_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.hair length') }}</label>
            <x-selectbox wire:model.defer="state.hair_length_id" :data="$hairLengths" :error="'hair_length_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.hair type') }}</label>
            <x-selectbox wire:model.defer="state.hair_kind_id" :data="$hairKinds" :error="'hair_kind_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Eye color') }}</label>
            <x-selectbox wire:model.defer="state.eye_color_id" :data="$eyeColors" :error="'eye_color_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Wearing the eye') }}</label>
            <x-selectbox wire:model.defer="state.eye_glass_id" :data="$eyeGlasses" :error="'eye_glass_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.physical healthStatus') }}</label>
            <x-selectbox wire:model.defer="state.health_status_id" :data="$healthStatuses"
                :error="'health_status_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.psychological pattern') }}</label>
            <x-selectbox wire:model.defer="state.psychological_pattern_id" :data="$psychologicalPatterns"
                :error="'psychological_pattern_id'" />
        </div>
        <div class="form-group  mb-3 col-md-6">
            <label
                for="exampleFormControlTextarea1">{{ __('settings.Clarification on physical healthStatus') }}</label>
            <textarea wire:model.defer="state.clarification"
                class="form-control @error('clarification') is-invalid @enderror" id="exampleFormControlTextarea1"
                rows="3"></textarea>
            @error('clarification')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="mt-4 col-12">
            <input name="login" id="btn_login" type="submit" class="btn btn_form_settings btn-block p-2"
                value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

<div id="Social_status" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change Social status') }}</h3>
    <form wire:submit.prevent="updateSocialInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Marital Status') }}</label>
            <x-selectbox wire:model.defer="state.marital_status_id" :data="$maritalStatuses"
                :error="'marital_status_id'" />
        </div>
        <div>
            @if (isset($state['marital_status_id']) && $state['marital_status_id'] == 4)
                <div class="form-group">
                    <label
                        class="col-12">{{ __('settings.Determine the reason for the divorce, if any') }}</label>
                    <textarea wire:model.defer="state.divorced_reason"
                        class="form-control @error('divorced_reason') is-invalid @enderror"
                        id="exampleFormControlTextarea1" rows="3"
                        placeholder="{{ __('settings.Determine the reason for the divorce, if any') }}"
                        maxlength="200"></textarea>
                    @error('divorced_reason')
                        <div class="invalid-feedback">
                            <small id="passError" class="text-danger col-12">{{ $message }}</small>
                        </div>
                    @enderror
                </div>
            @endif
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Do you have children?') }}</label>
            <x-selectbox wire:model.defer="state.children_status_id" :data="$childrenStatuses"
                :error="'children_status_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.number of children') }}</label>
            <input wire:model.defer="state.children_count" placeholder="{{ __('settings.number of children') }}"
                min="0" max="9" type="number" class="form-control @error('children_count') is-invalid @enderror"
                aria-label="Large" aria-describedby="inputGroup-sizing-sm">
            @error('children_count')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-12">{{ __('settings.Information about children') }}</label>
            <textarea wire:model.defer="state.children_information"
                class="form-control @error('children_information') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"
                placeholder="{{ __('settings.Information about children') }}" maxlength="200"></textarea>
            @error('children_information')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        @if ($state['gender'] == 'male')
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Do you want polygamy?') }}</label>
                <x-selectbox wire:model.defer="state.polygamy_status_id" :data="$polygamyStatuses"
                    :error="'polygamy_status_id'" />
            </div>
        @endif
        @if ($state['gender'] == 'female')
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Do you accept polygamy?') }}</label>
                <x-selectbox wire:model.defer="state.wife_polygamy_status_id" :data="$wifePolygamyStatuses"
                    :error="'wife_polygamy_status_id'" />
            </div>
        @endif
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.desire to have children') }}</label>
            <x-selectbox wire:model.defer="state.children_desire_status_id" :data="$childrenDesireStatuses"
                :error="'children_desire_status_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Current type of housing') }}</label>
            <x-selectbox wire:model.defer="state.shelter_type_id" :data="$shelterTypes" :error="'shelter_type_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.housing form') }}</label>
            <x-selectbox wire:model.defer="state.shelter_shape_id" :data="$shelterShapes" :error="'shelter_shape_id'" />
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Housing method') }}</label>
            <x-selectbox wire:model.defer="state.shelter_way_id" :data="$shelterWays" :error="'shelter_way_id'" />
        </div>
        <div class="mt-4">
            <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2"
                value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

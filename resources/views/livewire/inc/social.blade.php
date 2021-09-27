<div id="Social_status" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change Social status') }}</h3>
    <form wire:submit.prevent="updateSocialInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Marital Status') }}</label>
            <x-selectbox wire:model="state.marital_status">
                <option value="">---</option>
                <x-selectboxes.marital_statuses />
            </x-selectbox>
        </div>
        <div>
            @if (isset($state['marital_status']) && $state['marital_status'] == 'divorced')
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
            <x-selectbox wire:model.defer="state.children_status">
                <option value="">---</option>
                <x-selectboxes.children_statuses />
            </x-selectbox>
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
                <x-selectbox wire:model.defer="state.male_polygamy_status">
                    <option value="">---</option>
                    <x-selectboxes.male.polygamy_statuses />
                </x-selectbox>
            </div>
        @else
            <div class="input-group input-group-lg mb-3 ">
                <label class="col-12">{{ __('settings.Do you accept polygamy?') }}</label>
                <x-selectbox wire:model.defer="state.female_polygamy_status">
                    <option value="">---</option>
                    <x-selectboxes.female.can_polygamy_statuses />
                </x-selectbox>
            </div>
        @endif
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.desire to have children') }}</label>
            <x-selectbox wire:model.defer="state.children_desire_status">
                <option value="">---</option>
                <x-selectboxes.children_desire_statuses />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Current type of housing') }}</label>
            <x-selectbox wire:model.defer="state.shelter_type">
                <option value="">---</option>
                <x-selectboxes.shelter_type_statuses />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.housing form') }}</label>
            <x-selectbox wire:model.defer="state.shelter_shape">
                <option value="">---</option>
                <x-selectboxes.shelter_way_statuses />
            </x-selectbox>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">{{ __('settings.Housing method') }}</label>
            <x-selectbox wire:model.defer="state.shelter_way">
                <option value="">---</option>
                <x-selectboxes.shelter_shape_statuses />
            </x-selectbox>
        </div>
        <div class="mt-4">
            <input type="submit" class="btn btn_form_settings btn-block p-2"
                value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

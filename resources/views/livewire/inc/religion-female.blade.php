<div class="input-group input-group-lg mb-3 ">
    <label class="col-12">{{ __('settings.Headdress') }}</label>
    <x-selectbox wire:model.defer="state.headdress">
        <option value="">---</option>
        <x-selectboxes.female.headdress_statuses />
    </x-selectbox>
</div>
<div class="input-group input-group-lg mb-3 ">
    <label class="col-12">{{ __('settings.Niqab') }}</label>
    <x-selectbox wire:model.defer="state.veil_status">
        <option value="">---</option>
        <x-selectboxes.female.niqab_statuses />
    </x-selectbox>
</div>
<div class="input-group input-group-lg mb-3 ">
    <label class="col-12">{{ __('settings.Veil') }}</label>
    <x-selectbox wire:model.defer="state.robe_status">
        <option value="">---</option>
        <x-selectboxes.female.jilbab_statuses />
    </x-selectbox>
</div>

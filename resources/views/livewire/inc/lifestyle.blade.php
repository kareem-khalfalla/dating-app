<div id="their_lifestyle" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change their lifestyle') }}</h3>
    <form wire:submit.prevent="updateLifestyleInfo" id="captcha_form" class="row" method="post" action="#">
        <br>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.smoking') }}</label>
            <x-selectbox wire:model.defer="state.smoke_status">
                <option value="">---</option>
                <x-selectboxes.smoke_statuses />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Alcohol') }}</label>
            <x-selectbox wire:model.defer="state.alcohol_status">
                <option value="">---</option>
                <x-selectboxes.alcohol_statuses />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.halal food') }}</label>
            <x-selectbox wire:model.defer="state.halal_food_status">
                <option value="">---</option>
                <x-selectboxes.halal_food_statuses />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.food style') }}</label>
            <x-selectbox wire:model.defer="state.food_type">
                <option value="">---</option>
                <x-selectboxes.food_type_statuses />
            </x-selectbox>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Interests') }}</label>
            <x-selectbox wire:model.defer="state.hobbies" multiple>
                <x-selectboxes.hobbies />
            </x-selectbox>
        </div>
        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('settings.Favorite books') }}</label>
            <x-textarea wire:model.defer="state.books" />
        </div>
        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('settings.favorite places') }}</label>
            <x-textarea wire:model.defer="state.places" />
        </div>
        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('settings.Other interests') }}</label>
            <x-textarea wire:model.defer="state.interests" />
        </div>
        <div class="mt-4 col-12">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

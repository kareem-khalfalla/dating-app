<div id="their_lifestyle" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change their lifestyle') }}</h3>
    <form wire:submit.prevent="updateLifestyleInfo" id="captcha_form" class="row" method="post" action="#">
        <br>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.smoking') }}</label>
            <x-selectbox wire:model.defer="state.smoke_status_id" :data="$smokeStatuses" :error="'smoke_status_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Alcohol') }}</label>
            <x-selectbox wire:model.defer="state.alcohol_status_id" :data="$alcoholStatuses"
                :error="'alcohol_status_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.halal food') }}</label>
            <x-selectbox wire:model.defer="state.halal_food_status_id" :data="$halalFoodStatuses"
                :error="'halal_food_status_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.food style') }}</label>
            <x-selectbox wire:model.defer="state.food_type_id" :data="$foodTypes" :error="'food_type_id'" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Interests') }}</label>
            <x-selectbox wire:model.defer="state.hobby_id" :data="$hobbies" :error="'hobby_id'" />
        </div>
        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('settings.Favorite books') }}</label>
            <textarea wire:model.defer="state.books" class="form-control @error('books') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('books')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('settings.favorite places') }}</label>
            <textarea wire:model.defer="state.places" class="form-control @error('places') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('places')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('settings.Other interests') }}</label>
            <textarea wire:model.defer="state.interests" class="form-control @error('interests') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('interests')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="mt-4 col-12">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

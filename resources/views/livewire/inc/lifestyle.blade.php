<div id="their_lifestyle" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('profiles.Change their lifestyle') }}</h3>

    <form wire:submit.prevent="updateInfo" id="captcha_form" class="row" method="post" action="#">
        <br>

        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('profiles.smoking') }}</label>
            <select wire:model.defer="state.smoke_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($smokeStatuses as $smokeStatus)
                    <option value="{{ $smokeStatus->id }}">{{ $smokeStatus->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('profiles.Alcohol') }}</label>
            <select wire:model.defer="state.alcohol_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($alcoholStatuses as $alcoholStatus)
                    <option value="{{ $alcoholStatus->id }}">{{ $alcoholStatus->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('profiles.halal food') }}</label>
            <select wire:model.defer="state.halal_food_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($halalFoodStatuses as $halalFoodStatuses)
                    <option value="{{ $halalFoodStatuses->id }}">{{ $halalFoodStatuses->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('profiles.food style') }}</label>
            <select wire:model.defer="state.food_type_id" required="required" class="form-control form-control-lg ">
                @foreach ($food_types as $food)
                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('profiles.Interests') }}</label>
            <select wire:model.defer="state.hobby_id" required="required" class="form-control form-control-lg ">
                @foreach ($hobbies as $hobby)
                    <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('profiles.Favorite books') }}</label>
            <textarea wire:model.defer="state.books" class="form-control @error('books') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('books')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('profiles.favorite places') }}</label>
            <textarea wire:model.defer="state.places" class="form-control @error('places') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('places')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('profiles.Other interests') }}</label>
            <textarea wire:model.defer="state.interests" class="form-control @error('interests') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('interests')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="mt-4 col-12">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('profiles.save') }}">
        </div>
    </form>
</div>

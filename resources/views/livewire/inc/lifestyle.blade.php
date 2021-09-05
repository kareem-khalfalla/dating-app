<div id="their_lifestyle" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">Change their lifestyle</h3>

    <form wire:submit.prevent="updateInfo" id="captcha_form" class="row" method="post" action="#">
        <br>

        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">smoking</label>
            <select wire:model.defer="state.smoke_id" required="required" class="form-control form-control-lg ">
                <option disabled>smoking</option>
                @foreach ($smokes as $smoke)
                    <option value="{{ $smoke->id }}">{{ $smoke->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">Alcohol</label>
            <select wire:model.defer="state.alcohol_id" required="required" class="form-control form-control-lg ">
                <option disabled>Alcohol</option>
                @foreach ($alcohols as $alcohol)
                    <option value="{{ $alcohol->id }}">{{ $alcohol->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">halal food</label>
            <select wire:model.defer="state.halal_food_id" required="required" class="form-control form-control-lg ">
                <option disabled>halal food</option>
                @foreach ($halalFoods as $halalFood)
                    <option value="{{ $halalFood->id }}">{{ $halalFood->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">food style</label>
            <select wire:model.defer="state." required="required" class="form-control form-control-lg ">
                <option disabled>food style</option>
                @foreach ($foods as $food)
                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">Interests</label>
            <select wire:model.defer="state.hobby_id" required="required" class="form-control form-control-lg ">
                <option disabled>Interests</option>
                @foreach ($hobbies as $hobby)
                    <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">Favorite books</label>
            <textarea wire:model.defer="state.books" class="form-control @error('books') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('books')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">favorite places</label>
            <textarea wire:model.defer="state.places" class="form-control @error('places') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('places')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>

        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">Other interests</label>
            <textarea wire:model.defer="state.interests" class="form-control @error('interests') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('interests')
                <div class="invalid-feedback">
                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="mt-4 col-12">
            <input type="submit" class="btn btn_form_settings btn-block p-2" value="save">
        </div>
    </form>
</div>

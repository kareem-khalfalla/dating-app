<div id="the_shape" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">{{ __('settings.Change the shape') }}</h3>
    <form wire:submit.prevent="updateInfo" id="captcha_form" class="row" method="post" action="#">
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
            <select wire:model.defer="state.body_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($bodyStatuses as $bodyStatus)
                    <option value="{{ $bodyStatus->id }}">{{ $bodyStatus->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1"> {{ __('settings.skinStatus colour') }}</label>
            <select wire:model.defer="state.skin_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($skins as $skinStatus)
                    <option value="{{ $skinStatus->id }}">{{ $skinStatus->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.hair colour') }}</label>
            <select wire:model.defer="state.hair_color_id" required="required" class="form-control form-control-lg ">
                @foreach ($hairColors as $hairColor)
                    <option value="{{ $hairColor->id }}">{{ $hairColor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.hair length') }}</label>
            <select wire:model.defer="state.hair_length_id" required="required" class="form-control form-control-lg ">
                @foreach ($hairLengths as $hairLength)
                    <option value="{{ $hairLength->id }}">{{ $hairLength->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.hair type') }}</label>
            <select wire:model.defer="state.hair_kind_id" required="required" class="form-control form-control-lg ">
                @foreach ($hairKinds as $hairKind)
                    <option value="{{ $hairKind->id }}">{{ $hairKind->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Eye color') }}</label>
            <select wire:model.defer="state.eye_color_id" required="required" class="form-control form-control-lg ">
                @foreach ($eyeColors as $eyeColor)
                    <option value="{{ $eyeColor->id }}">{{ $eyeColor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.Wearing the eye') }}</label>
            <select wire:model.defer="state.eye_glass_id" required="required" class="form-control form-control-lg ">
                @foreach ($eyeGlasses as $eyeGlass)
                    <option value="{{ $eyeGlass->id }}">{{ $eyeGlass->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.physical healthStatus') }}</label>
            <select wire:model.defer="state.health_status_id" required="required" class="form-control form-control-lg ">
                @foreach ($healthStatuses as $healthStatus)
                    <option value="{{ $healthStatus->id }}">{{ $healthStatus->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="exampleInputEmail1">{{ __('settings.psychological pattern') }}</label>
            <select wire:model.defer="state.psychological_pattern_id" required="required"
                class="form-control form-control-lg ">
                @foreach ($psychologicalPatterns as $psychologicalPattern)
                    <option value="{{ $psychologicalPattern->id }}">{{ $psychologicalPattern->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group  mb-3 col-md-6">
            <label for="exampleFormControlTextarea1">{{ __('settings.Clarification on physical healthStatus') }}</label>
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
            <input name="login" id="btn_login" type="submit" class="btn btn_form_settings btn-block p-2" value="{{ __('settings.save') }}">
        </div>
    </form>
</div>

<div id="Personal_profile" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h">Change Personal statement</h3>
    <form wire:submit.prevent="updateInfo" id="captcha_form" method="post" action="#">
        <br>
        <div class="form-group">
            <label class="col-12">brief about me</label>
            <textarea wire:model.defer="state.bio" class="form-control @error('bio') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3" placeholder="brief about me" maxlength="200"></textarea>
            @error('bio')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-12">A profile of your desired partner</label>
            <textarea wire:model.defer="state.partner_bio" class="form-control @error('partner_bio') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3" placeholder="A profile of your desired partner"
                maxlength="200"></textarea>
            @error('partner_bio')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">The required relationship</label>
            <select wire:model.defer="state.relationship_id" required="required" class="form-control form-control-lg ">
                <option disabled value="">The required relationship</option>
                @foreach ($relationships as $relationship)
                    <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group input-group-lg mb-3 ">
            <label class="col-12">Desired method of marriage</label>
            <select wire:model.defer="state.marriage_id" required="required" class="form-control form-control-lg ">
                <option disabled value="">Desired method of marriage</option>
                @foreach ($marriages as $marriage)
                    <option value="{{ $marriage->id }}">{{ $marriage->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <input name="" id="" type="submit" class="btn btn_form_settings btn-block p-2" value="submit">
        </div>

    </form>
</div>

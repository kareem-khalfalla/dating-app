<div id="change_photo" class="col-lg-11 m-auto pb-4" wire:ignore.self>
    <h3 class="color_h mb-3">Change photo</h3>
    <br>
    <div class="row">
        <figure class="col-md-6">
            <img src="{{ !is_null($image) ? $image->temporaryUrl() : asset('img/avatar.png') }}" alt="..."
                class="img-thumbnail">
        </figure>
        @if (!empty($imageName))
            <figure class="col-md-6">
                <img src="{{ asset('storage/' . $imageName) }}" alt="..." class="img-thumbnail">
            </figure>
        @endif
        <div class="form-group col-md-6 m-auto">
            <label for="exampleFormControlFile1">choose image</label>
            <input type="file" wire:model.defer="image" class="form-control-file @error('image') is-invalid @enderror"
                id="exampleFormControlFile1" accept="image/*">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="mt-4">
                <button wire:click="updateOrCreateImage" class="btn btn_form_settings btn-block p-2">save</button>
            </div>
        </div>
    </div>
</div>

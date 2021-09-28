@php
$error = substr(strstr($attributes['wire:model.defer'], '.'), 1);
@endphp

<textarea {{ $attributes }} class="form-control @error($error) is-invalid @enderror" id="exampleFormControlTextarea1"
    rows="3" placeholder="{{ __('settings.brief about me') }}" maxlength="200"></textarea>
@error($error)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror

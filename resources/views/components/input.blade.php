@php
$error = substr(strstr($attributes['wire:model.defer'], '.'), 1);
@endphp
<input {{ $attributes }} class="form-control @error($error) is-invalid @enderror" aria-label="Large"
    aria-describedby="inputGroup-sizing-sm">
@error($error)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror

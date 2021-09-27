@php
$isInvalid = '';
$error = '';

if (strstr($attributes['wire:model.defer'], '.', true) == 'state') {
    $error .= substr(strstr($attributes['wire:model.defer'], '.'), 1);
} else {
    $error .= $attributes['wire:model.defer'];
}

if (strstr($attributes['wire:model'], '.', true) == 'state') {
    $error .= substr(strstr($attributes['wire:model'], '.'), 1);
}else{
    $error .= $attributes['wire:model'];
}

@endphp
@error($error)
    @php
    $isInvalid .= 'is-invalid';
    @endphp
@enderror
<select {{ $attributes->merge(['class' => 'form-control form-control-lg ' . $isInvalid]) }}>
    {{ $slot }}
</select>
@error($error)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror

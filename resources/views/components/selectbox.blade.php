@php
$isInvalid = '';
@endphp
@error($error)
    @php
    $isInvalid .= 'is-invalid';
    @endphp
@enderror
<select {{ $attributes->merge(['class' => 'form-control form-control-lg ' . $isInvalid]) }}>
    <option value="">---</option>
    @foreach ($data as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
@error($error)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror

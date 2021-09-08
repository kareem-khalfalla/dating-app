<div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="submit" action="">
        <input wire:model="state.name" type="text" class="form-control form-lg mb-2 @error('name') is-invalid @enderror"
            placeholder="{{ __('welcome.Name') }}">
        @error('name')
            <div class="invalid-feedback">
                <small id="passError" class="text-danger col-12">{{ $message }}</small>
            </div>
        @enderror
        <input wire:model="state.email" type="email"
            class="form-control form-lg mb-2 @error('email') is-invalid @enderror" placeholder="{{ __('welcome.Email') }}">
        @error('email')
            <div class="invalid-feedback">
                <small id="passError" class="text-danger col-12">{{ $message }}</small>
            </div>
        @enderror
        <textarea wire:model="state.message" placeholder="{{ __('welcome.Message here') }}..."
            class="form-control @error('message') is-invalid @enderror" name="" id="" cols="30" rows="5"></textarea>
        @error('message')
            <div class="invalid-feedback">
                <small id="passError" class="text-danger col-12">{{ $message }}</small>
            </div>
        @enderror
        <button class="btn btn-dark btn-block mt-3">{{ __('welcome.Send') }}</button>
    </form>
</div>
